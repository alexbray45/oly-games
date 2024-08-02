<?php

class DataAccess {
    // Global date format
    public $mariadb_dateformat = "Y-m-d H:i:s"; //maria_db date time format

    private $conn = null;

    // Connection method
    private function GetConnection(){
        try{

            //connection parameters
            $server     =   "localhost";
            $database   =   "funolympicgamesdb";
            $username   =   "root";
            $password   =   "";
            $port       =   "3306";

            //connectionstring
            $conn = new PDO("mysql:host={$server}:{$port}; dbname={$database}", $username, $password);

            //catch exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //return connection
            return $conn;

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
    // Function to get database data using EXECUTE method | WITH PARAMETERS
    function GetData($sql, $params=null){
        try{
            $conn = (new DataAccess())->GetConnection(); 

             /* handle parameters */
            $values = is_array($params)? $params : ( (is_null($params))? array() : array($params) );
            $stmt   = $conn->prepare($sql); //strtolower($sql)
            $stmt->execute($values);
            $arr_data = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch returns array so use count to get count
            //free objects
            $stmt->closeCursor(); 
            $conn = null;

            return $arr_data;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // Function to save update delete using EXECUTE method | WITH PARAMETERS
    function ExecuteCommand($sql, $params=null){
        try{
            $conn = $this->GetConnection(); 

             /* handle parameters */
            $values = is_array($params)? $params : ( (is_null($params))? array() : array($params) );
            //prepare and execute
            $stmt = $conn->prepare($sql); //strtolower($sql)
            $stmt->execute($values);
            $count = $stmt->rowCount();

            //free objects
            $stmt->closeCursor();
            $conn = null;

            return $count;

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    // Function to get staff details along with the role
    public function GetStaffDetailsWithRole($username) {
        try {
            $sql = "SELECT s.StaffID, s.FirstName, s.LastName, s.Username, s.PasswordHash, r.RoleName 
                    FROM Staff s
                    JOIN Roles r ON s.RoleID = r.RoleID
                    WHERE s.Username = ?";
            $arrvalues = array($username);
            $arrstaff = $this->GetData($sql, $arrvalues);
            return count($arrstaff) > 0 ? $arrstaff[0] : false; // Return the first record if found, else false
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // Function to add a new booking
    public function AddBooking($carParkID, $spaceType, $startTime, $endTime, $customerName, $customerContact, $employeeID, $company, $isPriority) {
        try {
            $this->conn = $this->GetConnection();
            $this->conn->beginTransaction();
    
            // Find an available space or a non-priority booked space that can be displaced
            $sqlFindSpace = "SELECT ps.SpaceID, b.BookingID FROM ParkingSpaces ps
                LEFT JOIN Bookings b ON ps.SpaceID = b.SpaceID AND NOT(b.EndTime <= ? OR b.StartTime >= ?)
                WHERE ps.CarParkID = ? AND ps.SpaceType = ? 
                AND (b.SpaceID IS NULL OR (b.IsPriority = FALSE AND ? = TRUE))  -- Check for priority displacement
                ORDER BY b.IsPriority ASC, b.SpaceID DESC  -- prioritize replacing non-priority bookings
                LIMIT 1;";
    
            $stmt = $this->conn->prepare($sqlFindSpace);
            $stmt->execute([$endTime, $startTime, $carParkID, $spaceType, $isPriority]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result && !empty($result['SpaceID'])) {
                $spaceID = $result['SpaceID'];
                $displacedBookingID = $result['BookingID'];
    
                // Displace the existing non-priority booking if necessary
                if ($displacedBookingID && $isPriority) {
                    $this->displaceBooking($displacedBookingID);  // Handle displacement logic
                }
    
                // Insert the new booking
                $sqlInsertBooking = "INSERT INTO Bookings (SpaceID, StartTime, EndTime, CustomerName, CustomerContact, EmployeeID, Company, IsPriority) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sqlInsertBooking);
                $stmt->execute([$spaceID, $startTime, $endTime, $customerName, $customerContact, $employeeID, $company, $isPriority]);
                $bookingID = $this->conn->lastInsertId(); // Get the ID of the newly inserted booking
                $this->conn->commit();

                 // Return both the SpaceID and BookingID as an associative array
                return [
                    'SpaceID' => $spaceID,
                    'BookingID' => $bookingID
                ];
            } else {
                $this->conn->rollback();
                throw new Exception("No available parking spaces of the requested type, priority considered.");
            }
        } catch (Exception $ex) {
            $this->conn->rollback();
            throw $ex;
        } finally {
            $this->conn = null;
        }
    }

    // Function to displace a booking
    private function displaceBooking($bookingID) {
        $sqlDeleteBooking = "DELETE FROM Bookings WHERE BookingID = ?";
        $stmt = $this->conn->prepare($sqlDeleteBooking);
        $stmt->execute([$bookingID]);
        // Log this action
        error_log("Displaced booking ID: $bookingID");
    }

    // Function to search for available parking spaces
    public function searchAvailableSpaces($date, $spaceType, $carParkID) {
        $sql = "SELECT ps.SpaceID, ps.SpaceType, cp.CarParkName FROM ParkingSpaces ps
                JOIN CarPark cp ON ps.CarParkID = cp.CarParkID
                WHERE ps.SpaceType = ? AND cp.CarParkID = ?
                AND ps.SpaceID NOT IN (
                    SELECT b.SpaceID FROM Bookings b WHERE DATE(b.StartTime) <= ? AND DATE(b.EndTime) >= ?
                )";
        $stmt = $this->GetConnection()->prepare($sql);
        $stmt->execute([$spaceType, $carParkID, $date, $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Funtion to fetch carpark names
    public function getAllCarparks() {
        $sql = "SELECT CarParkID, CarParkName FROM CarPark ORDER BY CarParkName ASC";
        $stmt = $this->GetConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParkingSpacesStatus() {
        try {
            $this->conn = $this->GetConnection();
            date_default_timezone_set('Europe/Berlin');  // This will set the timezone to CEST
            $currentDateTime = date('Y-m-d H:i:s');  // Get the current date and time
            $sql = "SELECT ps.SpaceID, ps.SpaceType,
                        CASE
                            WHEN EXISTS (
                                SELECT 1
                                FROM Bookings b
                                WHERE b.SpaceID = ps.SpaceID
                                AND b.StartTime <= ?
                                AND b.EndTime >= ?
                            ) THEN 'occupied'
                            ELSE 'available'
                        END AS Status
                    FROM ParkingSpaces ps
                    ORDER BY ps.SpaceID ASC;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$currentDateTime, $currentDateTime]);
            $spaces = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Log the result for debugging
            error_log("Parking Spaces Status at {$currentDateTime}: " . print_r($spaces, true));

            return $spaces;
        } catch (Exception $ex) {
            // Log the exception details
            error_log("Error fetching parking spaces status: " . $ex->getMessage());
            throw $ex;
        } finally {
            if ($this->conn != null) {
                $this->conn = null;  // Close connection
            }
        }
    }
    
    /**
     * Function to get booking history within a date range
     * 
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function GetBookingHistory($startDate, $endDate) {
        try {
            $conn = $this->GetConnection();

            // Prepare SQL to fetch booking history within the specified date range
            $sql = "SELECT b.BookingID, b.StartTime, b.EndTime, ps.SpaceType, b.CustomerName, b.CustomerContact 
                    FROM Bookings b
                    JOIN ParkingSpaces ps ON b.SpaceID = ps.SpaceID
                    WHERE b.StartTime >= ? AND b.EndTime <= ?
                    ORDER BY b.StartTime ASC";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$startDate, $endDate]);

            // Fetch and return the results
            $bookingHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $bookingHistory;
        } catch (PDOException $e) {
            throw new Exception('Database error: ' . $e->getMessage());
        }
    }

            

    //------
}



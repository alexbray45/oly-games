<?php
    //start the session
    session_start();

    //include external files needed
    include 'connectionString.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        try {
            require_once "connectionString.php";
            $query = "SELECT * FROM funolympiccommittee WHERE Username = :username";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(':username' => $username));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                $hashedPassword = $user['Password']; // Reading passwords from the column named 'Password' in the database
    
                // Verify the password
                if (md5($password) === $hashedPassword) { // For MD5 hashed passwords
                    session_start();
                    header("Location: adminArea.php");
                    $_SESSION['username'] = $user['Username'];
                    exit();
                } else {
                    echo '<script>alert("Invalid Username or Password. Please try again.");window.location = "login.php";</script>';
                }
            } else {
                echo '<script>alert("Invalid Username or Password. Please try again.");window.location = "login.php";</script>';
            }
        } catch (PDOException $ex) {
            die("Query failed: " . $ex->getMessage());
        }
    }
?>
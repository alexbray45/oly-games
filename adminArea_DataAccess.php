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
}


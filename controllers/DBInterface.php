<?php
    class DBInterface {
        public static $instance;

        public function __construct() {
            $dbHost = 'localhost';
            $dbUser = 'root';
            $dbPass = '';
            $dbName = 'phpcrud';
            if(isset(self::$instance)) {
                return self::$instance;
            } else {
                try {
                    self::$instance = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPass);
                } catch (PDOException $exception) {
                    // If there is an error with the connection, stop the script and display the error.
                    exit('Failed to connect to database!');
                }
            }
        }

        
    }
?>
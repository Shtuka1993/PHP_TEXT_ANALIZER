<?php
    class DBInterface {
        const RECORDS_PER_PAGE = 10;
        const TABLE_NAME = DB_DATA_TABLE_NAME;

        public static $instance;

        public function __construct() {
            $dbDriver =  DB_DRIVER;
            $dbHost = DB_HOST;
            $dbUser = DB_USER;
            $dbPass = DB_PASS;
            $dbName = DB_NAME;
            if(isset(self::$instance)) {
                return self::$instance;
            } else {
                try {
                    self::$instance = new PDO($dbDriver . ':host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPass);
                } catch (PDOException $exception) {
                    // If there is an error with the connection, stop the script and display the error.
                    exit('Failed to connect to database!');
                }
            }
        }

        public function readData($page) {
            $stmt = self::$instance->prepare('SELECT * FROM ' . self::TABLE_NAME . ' ORDER BY id LIMIT :current_page, :record_per_page');
            $stmt->bindValue(':current_page', ($page-1)*self::RECORDS_PER_PAGE, PDO::PARAM_INT);
            $stmt->bindValue(':record_per_page', self::RECORDS_PER_PAGE, PDO::PARAM_INT);
            $stmt->execute();
            // Fetch the records so we can display them in our template.
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

        public function totalCountOfData() {
            $num_items = $pdo->query('SELECT COUNT(*) FROM '.self::TABLE_NAME)->fetchColumn();
        }

        
    }
?>
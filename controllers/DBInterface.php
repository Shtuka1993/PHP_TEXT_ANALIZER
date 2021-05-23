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

        public function findByHash($hash) {
            $stmt = self::$instance->prepare('SELECT * FROM ' . self::TABLE_NAME . ' ORDER BY id LIMIT :current_page, :record_per_page');
            $stmt->bindValue(':current_page', ($page-1)*self::RECORDS_PER_PAGE, PDO::PARAM_INT);
            $stmt->bindValue(':record_per_page', self::RECORDS_PER_PAGE, PDO::PARAM_INT);
            $stmt->execute();
            // Fetch the records so we can display them in our template.
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

        public function addData($data) {
            $text = $data['text'];
            $hash = $data['hash'];
            $num_of_chars = $data['Number of characters'];
            $num_of_words = $data['Number of words'];
            $num_of_sentances = $data['Number of sentances'];
            $average_word_length = $data['Average word length']; 
            $average_number_of_words = $data['Average number of words in a sentances']; 
            $number_of_palindromes = $data['Number of palindrome words'];
            $is_polindrome = $data['Is the whole text palindrome'];
            $record_generated = $data['Report generated'];
            $execution_time = $data['Execution time'];
            $stmt = self::$instance->prepare('INSERT INTO ' . self::TABLE_NAME . ' VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$text, $hash, $num_of_chars, $num_of_words, $num_of_sentances, $average_word_length, $average_number_of_words, $is_polindrome, $record_generated, $execution_time]);
        }

        public function totalCountOfData() {
            $num_items = self::$instance->query('SELECT COUNT(*) FROM '.self::TABLE_NAME)->fetchColumn();
        }

        
    }
?>
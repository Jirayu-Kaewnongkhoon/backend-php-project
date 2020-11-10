<?php
    date_default_timezone_set("Asia/Bangkok");
    
    class Database {
        
        // private $host = 'localhost';
        // private $db_name = 'id15150467_repair_application';
        // private $username = 'id15150467_root';
        // private $password = 'xlHSIr|_AIq6>cNh';

        private $host = 'localhost';
        private $db_name = 'php_project';
        private $username = 'root';
        private $password = '';

        private $conn;

        // DB Connect
        public function connect() {
            $this->conn = null;

            try {

                $this->conn = new PDO(
                    'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                    $this->username,
                    $this->password
                );

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
        
            return $this->conn;
        }

    }
?>
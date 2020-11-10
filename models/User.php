<?php
    class User {

        private $conn;

        // User Properties
        public $user_id;
        public $user_name;
        public $password;
        public $role_id;
        public $head_id;

        public function __construct($db) {
            $this->conn = $db;
        }

        // Get User
        public function getUser() {
            // Create query
            $query = "CALL getUser(
                :user_name,
                :password
            );";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_name = htmlspecialchars(strip_tags($this->user_name));
            $this->password = htmlspecialchars(strip_tags($this->password));

            // Bind data
            $stmt->bindParam(':user_name', $this->user_name);
            $stmt->bindParam(':password', $this->password);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get Staff List
        public function getStaff($user_id) {
            // Create query
            $query = "CALL getStaff(:user_id);";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $user_id = htmlspecialchars(strip_tags($user_id));

            // Bind data
            $stmt->bindParam(':user_id', $user_id);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }
?>
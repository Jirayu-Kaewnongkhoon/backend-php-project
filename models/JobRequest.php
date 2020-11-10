<?php
    class JobRequest {
        
        private $conn;

        // JobReauest Properties
        public $job_id;
        public $description;
        public $building;
        public $floor;
        public $room;
        public $pre_timestmp;
        public $pre_image_path;
        public $requester_id;
        public $head_id;
        public $staff_id;
        public $post_timestmp;
        public $post_image_path;
        public $job_status_id;

        public function __construct($db) {
            $this->conn = $db;
        }
        
        // Get JobRequest List
        public function getJobRequest() {
            // Create query
            $query = "CALL getJobRequest(:head_id);";
            
            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->head_id = htmlspecialchars(strip_tags($this->head_id));

            // Bind data
            $stmt->bindParam(':head_id', $this->head_id);
            
            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Create JobRequest
        public function createJobRequest() {
            // Create query
            $query = "CALL createJobRequest(
                :requester_id,
                :building,
                :floor,
                :room,
                :description,
                :pre_timestmp,
                :pre_image_path
            )";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->requester_id = htmlspecialchars(strip_tags($this->requester_id));
            $this->building = htmlspecialchars(strip_tags($this->building));
            $this->floor = htmlspecialchars(strip_tags($this->floor));
            $this->room = htmlspecialchars(strip_tags($this->room));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->pre_timestmp = htmlspecialchars(strip_tags($this->pre_timestmp));
            $this->pre_image_path = htmlspecialchars(strip_tags($this->pre_image_path));

            // Bind data
            $stmt->bindParam(':requester_id', $this->requester_id);
            $stmt->bindParam(':building', $this->building);
            $stmt->bindParam(':floor', $this->floor);
            $stmt->bindParam(':room', $this->room);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':pre_timestmp', $this->pre_timestmp);
            $stmt->bindParam(':pre_image_path', $this->pre_image_path);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        // Assign Job to Staff
        public function createJobAssignment() {
            // Create query
            $query = "CALL createJobAssignment(
                :staff_id,
                :job_id
            );";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->staff_id = htmlspecialchars(strip_tags($this->staff_id));
            $this->job_id = htmlspecialchars(strip_tags($this->job_id));

            // Bind data
            $stmt->bindParam(':staff_id', $this->staff_id);
            $stmt->bindParam(':job_id', $this->job_id);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        // Get JobAssignment List 
        public function getJobAssignment($user_id) {
            // Create query
            $query = "CALL getJobAssignment(:user_id);";

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

        // Get Job by ID
        public function getJobById($job_id) {
            // Create query
            $query = "CALL getJobById(:job_id);";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $job_id = htmlspecialchars(strip_tags($job_id));

            // Bind data
            $stmt->bindParam(':job_id', $job_id);
            
            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Update Job Status
        public function updateJobStatus() {
            // Create query
            $query = "CALL updateJobStatus(
                :job_status_id,
                :post_image_path,
                :post_timestmp,
                :job_id
            );";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->job_status_id = htmlspecialchars(strip_tags($this->job_status_id));

            // Bind data
            $stmt->bindParam(':job_status_id', $this->job_status_id);
            $stmt->bindParam(':post_image_path', $this->post_image_path);
            $stmt->bindParam(':post_timestmp', $this->post_timestmp);
            $stmt->bindParam(':job_id', $this->job_id);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;

        }

        // Get Job History
        public function getJobHistory($user_id) {
            // Create query
            $query = "CALL getJobHistory(:user_id);";

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

        // Get Reports
        public function getReports() {
            // Create query
            $query = "CALL getReports();";

            // Prepare statment
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

    }
?>
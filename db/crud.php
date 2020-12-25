<?php
    class crud{
        //private database object
        private $db;

        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new choir member into the choirmanagement database
        public function insertChoirMember($firstname, $lastname, $emailaddress, $address, $gender, $avatar_path){
            try {
                $sql = "INSERT INTO choir_member (firstname, lastname, emailaddress, address, gender_id, avatar_path) 
                VALUES (:firstname, :lastname, :emailaddress, :address, :gender, :avatar_path)";
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':firstname', $firstname);
                $stmt->bindparam(':lastname', $lastname);
                $stmt->bindparam(':emailaddress', $emailaddress);
                $stmt->bindparam(':address', $address);
                $stmt->bindparam(':gender', $gender);
                $stmt->bindparam(':avatar_path', $avatar_path);

                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editChoirMember($id, $firstname, $lastname, $emailaddress, $address, $gender){
            try {
                $sql = "UPDATE `choir_member` SET `firstname`= :firstname,`lastname`= :lastname,
                `emailaddress`= :emailaddress,`address`= :address, `gender_id`= :gender 
                WHERE choir_member_id = :id";

                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':firstname', $firstname);
                $stmt->bindparam(':lastname', $lastname);
                $stmt->bindparam(':emailaddress', $emailaddress);
                $stmt->bindparam(':address', $address);
                $stmt->bindparam(':gender', $gender);

                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }  
        }

        public function getChoirMember(){

            try {
                //code...
                $sql = "SELECT * FROM choir_member c inner join gender g on c.gender_id = g.gender_id";
                $result = $this->db->query($sql);
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }      
        }

        public function getChoirMemberDetails($id){
            try {
                //code...
                $sql = "SELECT * FROM choir_member c inner join gender g on c.gender_id = g.gender_id 
                where choir_member_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }                  
        }

        public function deleteChoirMember($id){
            try {
                $sql = "DELETE FROM choir_member where choir_member_id = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getGender(){
            try {
                //code...
                
                $sql = "SELECT * FROM gender";
                $result = $this->db->query($sql);
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function getGenderById($id){
            try {
                //code...
                
                $sql = "SELECT * FROM gender WHERE gender_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt -> bindparam (':id', $id);
                $stmt->execute();
                $result = $stmt -> fetch();
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    }

    //putting in try catches
?>
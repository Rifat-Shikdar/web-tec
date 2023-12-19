<?php

$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "project";

function getAll()
{
  global $dbhost;
  global $dbuser;
  global $dbpass;
  global $dbname;

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);

  }
 
            $stmt = $conn->prepare("Select id, firstname,lastname,dob,email,phoneNumber,gender, bloodGroup from patient");
            $stmt->execute();
            $result = $stmt->get_result();

            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                $data[]= array(
                    'id'=> $row["id"],
                    'firstname' =>$row["firstname"], 
                    'lastname' =>$row["lastname"],
                    'dob' =>$row["dob"],
                    'email' =>$row["email"],
                    'phoneNumber' =>$row["phoneNumber"],
                    'gender' =>$row["gender"],
                    'bloodGroup' =>$row["bloodGroup"]
                    
                );
                    
                
                
                }
              } 
           $stmt->close();
           $conn->close();

            return $data;

}
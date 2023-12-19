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
 
            $stmt = $conn->prepare("Select email, testName,TestDate,medicalHistory from testreport");
            $stmt->execute();
            $result = $stmt->get_result();

            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                $data[]= array(
                    'email'=> $row["email"],
                    'testName' =>$row["testName"], 
                    'TestDate' =>$row["TestDate"],
                    'medicalHistory' =>$row["medicalHistory"],
                  
                    
                );
                    
                
                
                }
              } 
           $stmt->close();
           $conn->close();

            return $data;

}
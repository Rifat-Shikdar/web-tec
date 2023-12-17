<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "project";

function Connection()
{
  global $dbhost;
  global $dbuser;
  global $dbpass;
  global $dbname;

  return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}
// $con=Connection();

// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }
// echo "Connected successfully";
// function sanitize($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// --------------------------------------
// function getAll()
// {
//   $email = sanitize($_SESSION['email']);

//   $dbhost = "127.0.0.1";
//   $dbuser = "root";
//   $dbpass = "";
//   $dbname = "project";

//   $con = Connection();
//   $stmt = $con->prepare( "Select firstName,lastName,dob,email,phoneNumber,gender, bloodGroup ,securityQuestion, id from patient Where email ='$email';");
//   $stmt->execute();
//   $result = $stmt->get_result();

//   $data = array();
//   if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//       $data[] = array(
//         'firstName' => $row["firstName"],
//         'lastName' => $row["lastName"],
//         'dob' => $row["dob"],
//         'email' => $row["email"],
//         'phoneNumber' => $row["phoneNumber"],
//         'gender' => $row["gender"],
//         'bloodGroup' => $row["bloodGroup"],
//         'securityQuestion' => $row["securityQuestion"],
//         'id' => $row["id"], );
//     }

//   }
//   $stmt->close();
//   $con->close();

//   return $data;
// }


?>
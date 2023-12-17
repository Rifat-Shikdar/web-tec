<?php
session_start();
require "../models/connection.php";

// require "user.php";
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sessionTimeout = 10;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $rememberMe = isset($_POST['rememberMe']) ? $_POST['rememberMe'] : false;
    $flag = true;

    // email---------
    if (empty($email)) {
        $_SESSION['emailErr'] = "*Email is empty";
        $flag = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErr'] = "*Invalid email format";
        $flag = false;
    } else {
        $_SESSION['emailErr'] = "";
        $_SESSION['email'] = $email;
    }
    // password-------------
    if (empty($password)) {
        $_SESSION['passwordErr'] = "*Password is empty";
        $flag = false;
    } else {
        $_SESSION['passwordErr'] = "";
        $_SESSION['password'] = $password;
    }

    
   

        //     $sql = "select * from patient where email='{$email}' and password='{$password}'";
        //     $result = mysqli_query($con, $sql);
        //     $count = mysqli_num_rows($result);

        //     if ($count == 1) {
        //         $_SESSION['track'] = "Ok";
        //         header("Location: patientProfile.php");
        //     } else {
        //         $_SESSION['passwordErr'] = "<br>*Invalid Email or Password";
        //         header("Location: login.php");
        //     }
        // } else {
        //     $_SESSION['track'] = "No";
        //     header("Location: login.php");

        if ($flag) {
            $_SESSION['track'] = "Ok";
            $con = Connection();
    
            $stmt = $con->prepare("SELECT * from patient where email= ? AND password= ?");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $stmt->bind_result($id, $firstName, $lastName, $dob, $email, $phoneNumber, $gender, $bloodGroup, $password, $securityQuestion);
            $stmt->store_result();
    
            if ($stmt->num_rows == 1) {
                // Set session variables
                $_SESSION['id'] = $id;
    
                // Set cookies if "Remember Me" is checked
                if ($rememberMe) {
                    // Set cookies to expire after 10 seconds
                    $cookieExpiration = time() + 10;
                    setcookie('email', $email, $cookieExpiration, '/');
                    setcookie('password', $password, $cookieExpiration, '/');
                }
    
                // Store login time in session
                $_SESSION['login_time'] = time();
    
                header('Location: ../views/patientProfile.php');
                exit();
            } else {
                $_SESSION['passwordErr'] = "*Invalid Email or Password";
                header('Location:../views/login.php');
                exit();
            }
        } else {
            header('Location: ../views/login.php');
            exit();
        }
    } else {
        // Check if user should be logged out
        if (isset($_SESSION['login_time']) && time() - $_SESSION['login_time'] > $sessionTimeout) {
            // Log out the user
            session_unset();
            session_destroy();
    
            // Clear cookies
            setcookie('email', '', time() - 3600, '/');
            setcookie('password', '', time() - 3600, '/');
    
            header('Location: ../views/login.php');
            exit();
        } 
    }
?>
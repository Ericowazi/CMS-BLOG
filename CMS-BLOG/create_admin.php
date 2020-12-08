<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $fullname = $conn->real_escape_string($_POST["Fullname"]);
        
        $username = $conn->real_escape_string($_POST["Username"]);
        // username validation / checking if username exists
        $data = "SELECT * FROM admin_tab WHERE username='$username'"; //query to check username
        $execute = mysqli_query($conn, $data);

        if (strlen($username)<3) {
            $_SESSION["ErroMessage"]="Username should be at-least 3 characters";
            redirect_to("admins.php");
        } elseif ($execute->num_rows==1) { //if username already exists
            $_SESSION["ErroMessage"]="Username already Exists. Try a different Username";
            redirect_to("admins.php");
        }

        $password = $conn->real_escape_string($_POST["Password"]);

        $confirm_password = $conn->real_escape_string($_POST["ConfirmPassword"]);

        if (strlen($password)<7) {
            $_SESSION["ErroMessage"]="Password should be at-least 7 characters";
            redirect_to("admins.php");
        } elseif ($password!==$confirm_password) {
            $_SESSION["ErroMessage"]="Password do not match";
            redirect_to("admins.php");
        } 

        // set current time
        date_default_timezone_set("Africa/Nairobi");
        $current_time = time();
        $datetime = strftime("%m-%d-%Y",$current_time);
        $datetime;

        $admin = $_SESSION['username'];
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin_tab(datetime,fullname,username,password,addedby) VALUES('$datetime','$fullname','$username','$password_hash','$admin')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["SuccessMessage"]="Admin Added Successfully";
            redirect_to("admins.php");
        } else {
            $_SESSION["ErroMessage"]="Something went wrong. Try Again!";
            redirect_to("admins.php");
        }


?>
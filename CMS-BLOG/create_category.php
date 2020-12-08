<?php 
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $category = $conn->real_escape_string($_POST['category']);
        // category validations
        if (empty($category)) {
                $_SESSION["ErroMessage"]="All fields must be filled out";
                redirect_to("category.php");
        } elseif (strlen($category)<3) {
            $_SESSION["ErroMessage"]="Category name too short";
            redirect_to("category.php");
        } elseif (strlen($category)>99) {
                $_SESSION["ErroMessage"]="Too Long";
                redirect_to("category.php");
        }

        // setting date
        date_default_timezone_set("Africa/Nairobi");
        $currenttime = time();
        $datetime = strftime("%B-%d-%Y %H:%M:%S",$currenttime);
        $datetime;

        // Admin
        $admin= $_SESSION['username'];

        $sql = "INSERT INTO category(name,creatorname,datetime) VALUES('$category','$admin','$datetime')";
        $result = mysqli_query($conn, $sql);


        if ($result) {
                $_SESSION["SuccessMessage"]="Category Added Successfully";
                redirect_to("category.php");
        } else {
                $_SESSION["ErroMessage"]="Failed. Try Again!";
                redirect_to("category.php");
        }


    
?>
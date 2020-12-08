<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $title = $conn->real_escape_string(trim($_POST["Title"]));
        // Title validations
        if (empty($title)) {
                $_SESSION["ErroMessage"]="Title cannot be empty!";
                redirect_to("addnewpost.php");
        } elseif (strlen($title)<2) {
            $_SESSION["ErroMessage"]="Title should be at-least 2 characters!";
            redirect_to("addnewpost.php");
        } elseif (strlen($title)>99) {
                $_SESSION["ErroMessage"]="Title Too Long!";
                redirect_to("addnewpost.php");
        }


        $category = $conn->real_escape_string($_POST["Category"]);

        $author = $_SESSION['username'];

        $body = $conn->real_escape_string(trim($_POST["Post"]));
        // Body validations
        if (empty($body)) {
                $_SESSION["ErroMessage"]="Post cannot be empty!";
                redirect_to("addnewpost.php");
        } elseif (strlen($body)<2) {
            $_SESSION["ErroMessage"]="Post should be at least-2 characters!";
            redirect_to("addnewpost.php");
        } 

        //setting date
        date_default_timezone_set("Africa/Nairobi");
        $time = time();
        $datetime = strftime("%B-%d-%Y", $time);
        $datetime;

        // Image Upload
        $image = $_FILES["Image"]["name"];
        // $tempname = $_FILES['Image']['tmp_name'];
        // $folder = "upload/".$image;
        $target = "upload/".basename($_FILES["Image"]["name"]);

        $sql = "INSERT INTO admins(datetime,title,category,author,image,body) VALUES('$datetime','$title','$category','$author','$image','$body')";
        $query = mysqli_query($conn, $sql);

        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target)) {
            $_SESSION["SuccessMessage"]="Post Submitted! Image Uploaded Successfully!";
            redirect_to("addnewpost.php");
        } elseif (!move_uploaded_file($_FILES["Image"]["tmp_name"], $target)) {
            $_SESSION["ErroMessage"]="Post Submitted! Image not Uploaded!";
            redirect_to("addnewpost.php");
        } elseif ($query) {
            $_SESSION["SuccessMessage"]="Post Submitted Successfully!";
            redirect_to("addnewpost.php");
        } else {
            $_SESSION["ErroMessage"]="Something went wrong! Try Again!";
            redirect_to("addnewpost.php");
        }







?>
<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        // get post id
        $get_id = $_GET['Edit'];



        $title = $conn->real_escape_string($_POST["Title"]);


        $category = $conn->real_escape_string($_POST["Category"]);

        $author = $_SESSION['username'];

        $body = $conn->real_escape_string($_POST["Post"]);

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

        $sql = "UPDATE admins SET datetime='$datetime', title='$title', category='$category', author='$author', image='$image', body='$body'
                WHERE id='$get_id'";
        $query = mysqli_query($conn, $sql);

        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target)) {
            $_SESSION["SuccessMessage"]="Post Updated! Image Uploaded Successfully!";
            redirect_to("dashboard.php");
        } elseif (!move_uploaded_file($_FILES["Image"]["tmp_name"], $target)) {
            $_SESSION["SuccessMessage"]="Post Updated! Image wasn't chosen!";
            redirect_to("dashboard.php");
        } elseif ($query) {
            $_SESSION["SuccessMessage"]="Post Updated Successfully!";
            redirect_to("dashboard.php");
        } else {
            $_SESSION["ErroMessage"]="Something went wrong! Try Again!";
            redirect_to("dashboard.php");
        }







?>
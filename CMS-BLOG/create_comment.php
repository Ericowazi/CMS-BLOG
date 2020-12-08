<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $postid = $_GET['id'];

        $Name = $conn->real_escape_string($_POST["Name"]);

        $Email = $conn->real_escape_string($_POST["Email"]);

        $Comment = $conn->real_escape_string($_POST["Comment"]);
        // validations
        if (empty($Name) || empty($Email) || empty($Comment)) {
                $_SESSION["ErroMessage"]="All fields are required!";
        } elseif (strlen($Comment)>500) {
            $_SESSION["ErroMessage"]="Comment should NOT exceed 500 characters!";
            redirect_to("viewpost.php?id={$postid }");
        } 

        // Approve_by && approve_date will be set after comment approval
        $approve_by = "Pending";
        $approve_date = "Pending";

        //setting date
        date_default_timezone_set("Africa/Nairobi");
        $time = time();
        $datetime = strftime("%m-%d-%Y %H:%M:%S", $time);
        $datetime;

        $sql = "INSERT INTO comments(datetime,name,email,comment,status,Approve_by,approve_date,post_id) 
                VALUES('$datetime','$Name','$Email','$Comment','OFF','$approve_by','$approve_date','$postid')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION["SuccessMessage"]="Comment Submitted Successfully! Waiting Approval";
            redirect_to("viewpost.php?id={$postid }");
        } else {
            $_SESSION["ErroMessage"]="Something went wrong! Try Again!";
            redirect_to("viewpost.php?id={$postid }");
        }







?>
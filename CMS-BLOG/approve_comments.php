<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $comment_id = $_GET['id'];
        $admin = $_SESSION['username'];
        
        date_default_timezone_set("Africa/Nairoi");
        $time_now = time();
        $date_approved = strftime("%m-%d-%Y %H:%M:%S");
        $date_approved;

        $sql = "UPDATE comments SET status='ON', approve_by='$admin', approve_date='$date_approved' WHERE id='$comment_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION['SuccessMessage'] = "Comment Approved Successfully";
            redirect_to("comment.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again!";
            redirect_to("comment.php");
        }
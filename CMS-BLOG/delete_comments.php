<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $comment_id = $_GET['id'];

        $sql = "DELETE FROM comments WHERE id='$comment_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION['SuccessMessage'] = "Comment Deleted Successfully";
            redirect_to("comment.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again!";
            redirect_to("comment.php");
        }
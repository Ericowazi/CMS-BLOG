<?php
     include_once 'includes/conn.php';
     include 'includes/session.php';
     include 'includes/functions.php';

     $get_id = $_GET['Delete'];

     $sql = "DELETE FROM admins WHERE id='$get_id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
         $_SESSION["SuccessMessage"] = "Post deleted successfully";
         redirect_to("dashboard.php");
     } else {
        $_SESSION["ErrorMessage"] = "Something went wrong! Try Again!";
        redirect_to("dashboard.php");
     }



?>
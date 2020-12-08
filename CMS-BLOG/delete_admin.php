<?php 
        include('includes/conn.php');
        include('includes/session.php');
        include('includes/functions.php');

        $admin_id = $_GET['id'];

        $sql = "DELETE FROM admin_tab WHERE id='$admin_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION["SuccessMessage"]="Admin deleted successfully";
            redirect_to("Admins.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again!";
            redirect_to("Admins.php");
        }
<?php
        include_once 'includes/conn.php';
        include 'includes/session.php';
        include 'includes/functions.php';

        $category_id = $_GET['id'];

        $sql = "DELETE FROM category WHERE id='$category_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION['SuccessMessage'] = "Category Deleted Successfully";
            redirect_to("category.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again!";
            redirect_to("category.php");
        }
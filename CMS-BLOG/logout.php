<?php 
        include('includes/session.php');
        include('includes/functions.php');
        
        $_SESSION['user_id']=null;
        session_destroy();
        redirect_to("login.php");
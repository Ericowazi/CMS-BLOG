<?php
        include('conn.php');

function redirect_to($new_location){
    header("Location:".$new_location);
    exit;
}

function login(){
    if (isset($_SESSION['user_id'])) {
        return true;
    }
}

function confirm_login(){
    if (!login()) {
        $_SESSION['ErroMessage']="Login Required";
        redirect_to("login.php");
    }
}

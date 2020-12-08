<?php

    session_start();

    function errorMessage(){
        if (isset($_SESSION["ErroMessage"])) {
            $output = "<div class=\"alert alert-danger\">";
            $output .= htmlentities($_SESSION["ErroMessage"]);
            $output .= "&nbsp; <span class=\"glyphicon glyphicon-remove-sign\"></span>";
            $output .= "</div>";
            $_SESSION["ErroMessage"] = null;

            return $output;
        }
    }

    function successMessage(){
        if (isset($_SESSION["SuccessMessage"])) {
            $output = "<div class=\"alert alert-success\">";
            $output .= htmlentities($_SESSION["SuccessMessage"]);
            $output .= "&nbsp; <span class=\"glyphicon glyphicon-ok-sign\"></span>";
            $output .= "</div>";
            $_SESSION["SuccessMessage"] = null;

            return $output;
        }
    }



?>
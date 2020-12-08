<?php 
        include('includes/conn.php');
        include('includes/session.php');
        include('includes/functions.php');

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['Password']);

        if (empty($username) || empty($password)) {
            $_SESSION['ErroMessage']="Username / Password cannot be empty";
            redirect_to("login.php");
        }

        $sql = "SELECT * FROM admin_tab WHERE username='$username'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query)==1) {
            while ($login=mysqli_fetch_assoc($query)) {
                if (password_verify($password, $login['password'])) {
                    $_SESSION['user_id']=$login['id'];
                    $_SESSION['username']=$login['username'];
                    $_SESSION['SuccessMessage']="Welcome {$_SESSION['username']} :)";
                    redirect_to("dashboard.php");
                } else {
                    $_SESSION['ErroMessage']="Invalid Username / Password";
                    redirect_to("login.php");
                }
            }
        }

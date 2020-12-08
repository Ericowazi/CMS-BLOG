<?php include('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container-fluid">
    <div class="row row-login">
        <div class="col-sm-offset-4 col-sm-4 login-page">
            <div style="margin-top: 20px;"> 
                <?php  echo errorMessage(); echo successMessage(); ?>
            </div>
            <div class="login">
                <p>Sign in to start your session</p>
                <form action="log_in.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="username"> <span class="FieldInfo">Username*</span> </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user text-info"></span>
                                </span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password"> <span class="FieldInfo">Password*</span> </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock text-info"></span>
                                </span>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" value="">
                            </div>
                        </div>
                        <br>
                        <p>Don't have an account? <a href="sign_up.php">Register</a> <br>  
                            <a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a> 
                        </p>
                        <br>
                        <button type="submit" class="btn btn-primary pull pull-right" style="margin-right: 1%;">
                                <span class="glyphicon glyphicon-log-out"></span> Login</button>
                    </fieldset>
                </form>
            </div> <!--  End Login -->
        </div> <!--  End Col-sm-4 -->

    </div> <!--  End row -->
</div> <!--  End Container fluid -->



<?php include('includes/footer.php'); ?>


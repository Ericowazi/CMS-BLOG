<?php include('includes/conn.php'); ?>
<?php include("includes/header.php"); ?>

<div class="class" style="height: 8px; background: #1ab394"></div>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collaped" data-toggle="collapse" data-target="#navbarmenucollapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color: #1ab394; font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;">
            <span style="color: #dce2e1;"
            class="glyphicon glyphicon-edit"></span>&nbsp;wazi</a>
        </div> <!-- End Navbar-header -->

        <div class="collapse navbar-collapse" id="navbarmenucollapse">
            <ul id="nav" class="nav navbar-nav navbar-right">
                    <li> <a href="dashboard.php">
                        <span class="glyphicon glyphicon-th"></span> </a> </li>
                    <li> <a href="addnewpost.php">
                        <span class="glyphicon glyphicon-plus"></span>
                        New Post</a> </li>
                    <li > <a href="category.php">
                        Categories</a> </li>
                    <li class="active"> <a href="admins.php">
                        <span class="glyphicon glyphicon-user"></span> Admin </a> </li>
                    <li> <a href="comment.php">
                        comments
                        <?php 
                                    //   comment count query for un-approved comment
                                    $sql = "SELECT COUNT(*) FROM comments WHERE status='OFF'";
                                    $query = mysqli_query($conn, $sql);

                                    $rowcount = mysqli_fetch_array($query);

                                    $total_row = array_shift($rowcount);
                                    if ($total_row>0) {
                                ?>

                                    <span class="label label-warning"><?php echo $total_row ?></span>

                                <?php } elseif ($total_row==0) {?>
                                    <span class="label label-warning">0</span>
                                <?php } ?>
                        </a> </li>
                    <li> <a href="blog.php?Page=1" target="_blank">
                        Live Preview</a> </li>
                    <li> <a href="logout.php">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Logout</a> </li>
            </ul>
        </div>
    </div> <!-- End Container -->
</nav> <!-- End Nav -->

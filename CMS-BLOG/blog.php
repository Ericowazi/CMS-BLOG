<?php include_once('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include("includes/navbar.php"); ?>

<body style="background: #efeaea;" >

<div class="container" style="background:">
    <div class="row">
        <div class="col-sm-8">
        <?php 
        if (isset($_GET['Page'])) {
            $page = $_GET['Page'];

            if ($page==0 || $page<1) {
                $page_count = 0;
            } else {
                $page_count = ($page*5)-5;
            }
        $sql = "SELECT * FROM admins ORDER BY id desc LIMIT $page_count,5";
        $query = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_array($query)) {
            $post_id = $row['id'];
?>
        <div class="postblog thumbnail" style="">
            <img class="img-responsive img-rounded" style="max-height:400px; width: 100%;" src="upload/<?php echo htmlentities($row['image']); ?>" alt="" class="image-responsive">
            <div class="caption">
                <h1 id="heading"> <?php echo htmlentities($row['title']); ?> </h1>
                <p class="desc" style=""> 
                    <span class="author"> <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo htmlentities($row['author']); ?></span> 
                    <span class="date">&nbsp; <span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php echo htmlentities($row['datetime']); ?>  </span>
                    <span class="category">&nbsp; <span class="glyphicon glyphicon-tags"></span>&nbsp; <?php echo htmlentities($row['category']); ?>  </span> 
                    <?php //get comments count for each post
                            $sql_com = "SELECT COUNT(*) FROM comments WHERE status='ON' AND id='$post_id'";
                            $query_com = mysqli_query($conn, $sql_com);

                            $row_com = mysqli_fetch_array($query_com);
                            $total_com = array_shift($row_com);
                            if ($total_com>0) {
                    ?>
                    &nbsp;<span class="badge" style="padding: 4px 12px;"> Comments: <?php echo $total_com ?> </span>
                            <?php } ?>
                </p>
                <hr>
                <p class="postbody" style=""> <?php
                    if (strlen($row['body'])>150) {
                        $row['body'] = substr($row['body'],0,150)."...";
                    }
                    echo htmlentities($row['body']); ?>
                    
                    <a href="viewpost.php?id=<?php echo htmlentities($row['id']); ?>">
                        <span class="">Read More &rsaquo; &rsaquo;</span>
                    </a>

                </p>
            </div>
        </div>  

        <?php } ?>
        <?php } else {
                $sql = "SELECT * FROM admins ORDER BY id desc LIMIT 0,5"; 
                $query = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="postblog thumbnail" style="">
                    <img class="img-responsive img-rounded" style="max-height:400px; width: 100%;" src="upload/<?php echo htmlentities($row['image']); ?>" alt="" class="image-responsive">
                    <div class="caption">
                        <h1 id="heading"> <?php echo htmlentities($row['title']); ?> </h1>
                        <p class="desc" style=""> 
                        <span class="author"> <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo htmlentities($row['author']); ?></span> 
                        <span class="date">&nbsp; <span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php echo htmlentities($row['datetime']); ?>  </span>
                        <span class="category">&nbsp; <span class="glyphicon glyphicon-tags"></span>&nbsp; <?php echo htmlentities($row['category']); ?>  </span> </p>
                        <hr>
                        <p class="postbody" style=""> <?php
                            if (strlen($row['body'])>150) {
                                $row['body'] = substr($row['body'],0,150)."...";
                            }
                            echo htmlentities($row['body']); ?>
                            
                            <a href="viewpost.php?id=<?php echo htmlentities($row['id']); ?>">
                                <span class="">Read More &rsaquo; &rsaquo;</span>
                            </a>
        
                        </p>
                    </div>
                </div>  
        
                <?php } //End while ?>
        <?php } //End else / End page ?>
        <nav>
            <ul class="pagination">
                <?php   if (isset($page)) { //if page is set for back button
                            if ($page>1) { //back button
                ?>
                        <li><a href="blog.php?Page=<?php echo $page-1; ?>"> &laquo; </a></li>
                      
                <?php   }
                        } //End back button
                ?>

                <?php 

                        $pagination_sql = "SELECT COUNT(*) FROM admins"; //all blog posts
                        $pagination_query = mysqli_query($conn, $pagination_sql);

                        $pagination_row = mysqli_fetch_array($pagination_query);
                        $total_rows = array_shift($pagination_row);

                        $totalpages = $total_rows/5; //number of pages
                        $totalpages = ceil($totalpages); // if page number is above or below the available num of pages

                        for ($i=1; $i <= $totalpages ; $i++) { 

                        if (isset($page)) {

                            if ($i==$page) { 
                ?>
                        <li class="active"><a href="blog.php?Page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                <?php } else { ?>
                        <li><a href="blog.php?Page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                <?php } 
                      } //End if (isset($page))
                      }  //End For loop
                ?>

                <?php   if (isset($page)) { //if page is set for forward button
                            if ($page+1<=$totalpages) { //forward button
                ?>
                        <li><a href="blog.php?Page=<?php echo $page+1; ?>"> &raquo; </a></li>
                      
                <?php   }
                        } //End forward button
                ?>
            </ul>
        </nav>
        </div> <!-- End col-md-8 -->

<?php include("includes/sidebar.php"); ?>
 
<?php include("includes/footer.php"); ?>

<?php 
     include_once('includes/conn.php'); 
     include('includes/session.php'); 
     include("includes/functions.php");
     include("includes/navbar.php");

 ?>     
 
 <body style="background: #efeaea;" >

    <div class="container" style="background:">
        <div class="row">
            <div class="col-sm-8 postbycategory">
        <?php 
        if (isset($_GET['Category'])) {
            $category = $_GET['Category'];

            $sql = "SELECT * FROM admins WHERE category='$category'";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
        
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

            <?php } ?>
            <?php   } else {?>
                    <h3 id="no-cat-post" style="">
                        Ooops! No post yet on this category. Kindly try a diferent category
                    </h3>
            <?php }  ?>
        <?php } ?>
            </div> <!-- End col-md-8 -->

<?php include("includes/sidebar.php"); ?>

<?php include("includes/footer.php"); ?>
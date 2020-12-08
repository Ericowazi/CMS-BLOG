<?php include_once('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include("includes/navbar.php"); ?>

<body style="background: #f5f8f7;" >

<div class="container" style="background:">
    <div class="row">
        <div class="col-sm-8">
        <div class="errors">
                <?php   echo errorMessage(); 
                        echo successMessage();
                ?>
        </div>

        <?php
        // Show post query 
        $getid = $_GET["id"];
        $sql = "SELECT * FROM admins WHERE id='$getid' ORDER BY datetime desc ";
        $query = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_array($query)) {
?>
        <div class="postblog thumbnail" style="">
            <!-- post area -->
            <img class="img-responsive img-rounded" style="max-height:500px; width: 100%;" src="upload/<?php echo htmlentities($row['image']); ?>" alt="" class="image-responsive">
            <div class="caption">
                <h1 id="heading"> <?php echo htmlentities($row['title']); ?> </h1>
                <p class="desc" style=""> 
                <span class="author"> <span class="glyphicon glyphicon-user"></span> <?php echo htmlentities($row['author']); ?></span> 
                <span class="date">&nbsp; <span class="glyphicon glyphicon-time"></span> <?php echo htmlentities($row['datetime']); ?>  </span>
                <span class="category">&nbsp; <span class="glyphicon glyphicon-tags"></span> <?php echo htmlentities($row['category']); ?>  </span> </p>
                <hr>
                <p class="postbody-viewpost" style=""> <?php echo nl2br($row['body']); ?> </p>
            </div>

            <hr>

            <!-- SHOW COMMENTS -->
            <p> <span class="comment-hd"> Comments</span> <span class="comment-hd-2">.</span> </p>

            <?php
                    // comment query for post
                    $sql = "SELECT * FROM comments WHERE post_id='$getid' AND status='ON'";
                    $query = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($query) > 0) {

                    while ($cm_row = mysqli_fetch_array($query)) {
                    
            
            ?>
            <div class="c-m">
                <p class="comment-title"> <span><span class="glyphicon glyphicon-user"></span> <?php echo htmlentities($cm_row['name']); ?></span> &nbsp; 
                     <?php echo htmlentities($cm_row['datetime']); ?>
                </p>
                <p class="comment-body"><?php echo nl2br($cm_row['comment']); ?></p>
            </div> <!-- End show comment box -->

            <?php }?> <!-- End while for comment query -->

            <?php } else { ?>
            
            <!-- if no comment yet  -->
            <div class="c-m">
                <p class="comment-title"> <span><span class="glyphicon glyphicon-user"></span> user </span> &nbsp; 
                     Date
                </p>
                <p class="comment-body">No comments Yet! <br>Be the first one to comment on this post</p>
            </div> <!-- End null show comment box -->

            <?php }?> <!-- End if comment statement -->


            <hr>

            <p class="comment-p"><span class="comment">Share your thoughts with us <span class="glyphicon glyphicon-arrow-down"></span></span> </p>

                    <div class="f-a field-area">


                        <form action="create_comment.php?id=<?php echo $getid ?>" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group form-name">
                                    <label for="Name"> <span class="FieldInfo">Name</span> </label>
                                    <input value="" type="text" class="form-control" name="Name" id="name" placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="Email"> <span class="FieldInfo">Email</span> </label>
                                    <input value="" type="email" class="form-control" name="Email" id="email" placeholder="Email" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="commentarea"> <span class="FieldInfo" >Comment</span> </label>
                                    <textarea required value="" name="Comment" id="commentarea" cols="20" rows="5" class="form-control" placeholder="Write your comment"></textarea>
                                </div>
                                <br>
                                <!-- <input type="submit" id="submit" class="btn btn-success btn-block" name="submit" value="Add" > -->
                                <button type="submit" class="btn btn-comment pull pull-right" >Comment</button>
                            </fieldset>
                        </form> <!--  end form -->
                        <br>
                    </div> <!-- End field-area -->

        </div>  

        <?php } ?> <!-- End WHILE statement for post -->
        </div> <!-- End col-md-8 -->

<?php include("includes/sidebar.php"); ?>
 
<?php include("includes/footer.php"); ?>

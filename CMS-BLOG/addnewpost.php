<?php include_once('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include 'includes/functions.php'; ?>
<?php confirm_login(); ?>
<?php include 'includes/admin/adminnav.php' ?>

<body>
    
    <div class="container-fluid">
        <div class="row">

            <?php include('includes/admin/admin_sidebar.php'); ?>

            <div class="col-sm-10" style="">
                <div class="col-sm-8">
                    <h3 style="margin-top:50px; margin-bottom: 20px; color: #0b8871;">Add New Post</h3>

                    <div class="errors"><?php  echo errorMessage(); 
                        echo successMessage();
                        ?>
                    </div>

                <div class="category thumbnail info" 
                style=" margin-bottom:50px; padding: 20px 8px 30px 8px; background: #d9edf7; border: 2px solid #0b8871; border-style: dotted; ">
                    <div class="field-area">
                        <form action="create_post.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Title"> <span class="FieldInfo">Title:</span> </label>
                                    <input type="text" class="form-control" name="Title" id="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="categoryselect"> <span class="FieldInfo">Category:</span> </label>
                                    <select name="Category" id="categoryselect" class="form-control">
                                     <?php
                                        $sql = "SELECT * FROM category ORDER BY datetime desc";
                                        $query = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row["id"] ;
                                     ?>

                                     <option> <?php echo htmlentities($row["name"]); ?></option>

                                     <?php } ?>

                                    </select> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="imageselect"> <span class="FieldInfo">Image:</span> </label>
                                    <input type="file" class="form-control" name="Image" id="imageselect">
                                </div>
                                <div class="form-group">
                                    <label for="postarea"> <span class="FieldInfo" >Post:</span> </label>
                                    <textarea name="Post" id="postarea" cols="30" rows="10" class="form-control" placeholder="Write something great!"></textarea>
                                </div>
                                <br>
                                <!-- <input type="submit" id="submit" class="btn btn-success btn-block" name="submit" value="Add" > -->
                                <button type="submit" class="btn btn-primary pull pull-right" style="margin-right: 5%;">Submit Post</button>
                            </fieldset>
                        </form> <!--  end form -->
                        <br>
                    </div> <!-- End field-area -->

                </div> <!-- End Category -->

                </div> <!-- End Col-sm-8 -->

            </div> <!-- End Col-sm-10 -->

        </div> <!-- End Row -->

    </div> <!-- End container fluid -->

    <?php include('includes/footer.php'); ?>
</body>
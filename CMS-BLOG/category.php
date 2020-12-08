<?php include_once('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/functions.php'); ?>
<?php confirm_login(); ?>
<?php include 'includes/admin/adminnav.php' ?>

<body>
    
    <div class="container-fluid">
        <div class="row">

            <?php include('includes/admin/admin_sidebar.php'); ?>

            <div class="col-sm-10" style="height: 600px; overflow: auto;">
            <div class="category" style="padding-top:30px;  ">

            
            <div><?php  echo errorMessage(); 
                        echo successMessage();
            ?></div>
            <h3 style="margin-bottom: 30px; color: #0b8871;">Manage Categories</h3>

            <div>
                <form action="create_category.php" method="POST">
                    <fieldset>
                <table class="table">  <!-- Add Category table-->
                    <thead>
                            <tr class="info">
                                <!-- <th> <label for="name" ><span class="glyphicon glyphicon-tags"></span></label> </th> -->
                                <th> <label for="name" class="pull pull-right">Add Category</label> </th>
                                <th><input type="text" class="form-control" name="category" id="categoryname" placeholder="Category Name"></th>
                                <th><input type="submit" id="submit" class="btn btn-success btn-block" name="submit" value="Add" ></th>
                            </tr>
                        </thead> <!-- End thead -->
                </table> <!-- End Add Category table-->
                    </fieldset>
                </form> <!--  end form -->
            </div>
            </div> <!-- End Category -->

            <div class="table table-responsive">
            
            <hr>
                    <?php
                        $sql = "SELECT * FROM category ORDER BY datetime asc";
                        $query = mysqli_query($conn, $sql); 
                        $sr_no = 0;

                        if (mysqli_num_rows($query) > 0) {
                    ?>
                            <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th></th>
                                    <th># No</th>
                                    <th>Date Created</th>
                                    <th>Category Name</th>
                                    <th>Created By</th>
                                    <!-- <th>Edit</th> -->
                                    <th>Delete</th>
                                </tr>
                            </thead> <!-- End thead -->

                    <?php while ($row = mysqli_fetch_array($query)) {
                        $sr_no++;
                    ?>
                        <tbody>
                        <tr class="info">
                            <td> <span class="glyphicon glyphicon-chevron-right"></span>&nbsp; </td>
                            <td> <?php echo $sr_no; ?> </td>
                            <td> <?php echo htmlentities($row["datetime"]); ?> </td>
                            <td style="color: #0b8871;"> <?php echo htmlentities($row["name"]); ?> </td>
                            <td> <?php echo htmlentities($row["creatorname"]); ?> </td>
                            <!-- <td>

                            &nbsp; <a class="td-a-dash" href="edit_category.php?Edit=<?php //echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-edit"></span></a>

                            </td> -->
                            <td>
                            &nbsp; <a class="td-d" onclick="return confirm('Are you sure you want to delete?')"
                             href="delete_category.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    </tbody> <!-- End Tbody -->

                    <?php } ?> <!-- End -- while -->
                </table> <!-- End Table -->

            <?php    } else { ?>
                <table class="table">
                        <thead>
                            <tr class="success">
                                <th></th>
                                <th># No</th>
                                <th>Category Name</th>
                                <th>Date Created</th>
                                <th>Created By</th>
                            </tr>
                        </thead> <!-- End thead -->
                        <tbody>
                            <tr class="info">
                                <td> <span class="glyphicon glyphicon-chevron-right"></span>&nbsp; </td>
                                <td> None </td>
                                <td> None </td>
                                <td> None </td>
                                <td> None </td>
                            </tr>
                        </tbody> <!-- End Tbody -->
                    </table>
                   <?php } ?> <!-- End-- if statement -->

            </div>

            </div> <!-- End Col-sm-10 -->
        </div> <!-- End Row -->
    </div> <!-- End container fluid -->

    <?php include('includes/footer.php'); ?>
</body>
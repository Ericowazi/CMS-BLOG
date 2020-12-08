<?php include_once('includes/conn.php'); ?>
<?php include('includes/session.php'); ?>
<?php include 'includes/functions.php'; ?>
<?php confirm_login(); ?>
<?php include('includes/admin/adminnav.php'); ?>

<body>
    
    <div class="container-fluid">
        <div class="row">

            <?php include('includes/admin/admin_sidebar.php'); ?>

            <div class="col-sm-10" style="height:600px; overflow: auto;">
            <div style="padding-top:30px;"><?php  echo errorMessage(); 
                        echo successMessage();
            ?></div>
            <div class="category" style="padding-top:20px;">
            
            <h3 style="margin-bottom: 30px; color: #0b8871;">Manage Admins</h3>
            <a class="td-a-dash" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> 
                <span style="margin-top: -110px; margin-left: 60%;" class=" btn btn-primary">Add New Admin</span> </a>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby=" ← myModalLabel" aria-hidden="true"> 
                        <div class="modal-dialog"> 
                            <div style="background: #cee4f8;" class="modal-content">
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal"> 
                                        <span aria-hidden="true">&times;</span> <span class="sr-only">Close</span> 
                                    </button>
                                                
                                    <h4 style=" color: #0b8871; margin-bottom: 30px;">Add New Admin</h4>

                                    <div class="admin-add" style="margin-bottom: 30px; background: #cee4f8;">
                                        <form action="create_admin.php" method="post" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label for="Fullname"> <span class="FieldInfo">Fullname*</span> </label>
                                                    <input type="text" class="form-control" name="Fullname" id="Fullname" placeholder="Fullname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Username"> <span class="FieldInfo">Username*</span> </label>
                                                    <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Password"> <span class="FieldInfo">Password*</span> </label>
                                                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ConfirmPassword"> <span class="FieldInfo">Confirm Password*</span> </label>
                                                    <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" required placeholder="Confirm Password">
                                                </div>
                                                <br>
                                                <!-- <input type="submit" id="submit" class="btn btn-success btn-block" name="submit" value="Add" > -->
                                                <button type="submit" class="btn btn-primary pull pull-right" style="margin-right: 1%;">Create Admin</button>
                                            </fieldset>
                                        </form> <!--  end form -->
                                    </div> <!-- End Admin-add / Col-sm- -->
                                </div > <!-- End Modal-header -->
                            </div > 
                        </div > 
                    </div > <!-- End Modal -->

            </div> <!-- End Category -->

            <div class="table table-responsive">
            
                    <?php
                        $sql = "SELECT * FROM admin_tab ORDER BY id desc";
                        $query = mysqli_query($conn, $sql); 
                        $sr_no = 0;

                        if (mysqli_num_rows($query) > 0) {
                    ?>
                            <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th></th>
                                    <th># No</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Date Created</th>
                                    <th>Added-By</th>
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
                            <td> <?php echo htmlentities($row["fullname"]); ?> </td>
                            <td style="color: #0b8871;"> <?php echo htmlentities($row["username"]); ?> </td>
                            <td> <?php echo htmlentities($row["datetime"]); ?> </td>
                            <td> <?php echo htmlentities($row["addedby"]); ?> </td>
                            <!-- <td>

                            &nbsp; <a class="td-a-dash" href="edit_category.php?Edit=<?php //echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-edit"></span></a>

                            </td> -->
                            <td>
                                <?php 
                                        if ($_SESSION['username']==$row['username']) { ?>
                                        <span style="color: #0dbd39; margin-left:20px; font-size: 1.6em;" class="glyphicon glyphicon-ok-sign"></span>
                                     <?php   } else { ?>
                            &nbsp; <a class="td-d" onclick="return confirm('Are you sure you want to delete?')"
                             href="delete_admin.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-trash"></span></a>

                                <?php      }
                                
                                ?>
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
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Date Created</th>
                                    <th>Added-By</th>
                                    <th>Delete</th>
                            </tr>
                        </thead> <!-- End thead -->
                        <tbody>
                            <tr class="info">
                                <td> <span class="glyphicon glyphicon-chevron-right"></span>&nbsp; </td>
                                <td> None </td>
                                <td> None </td>
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
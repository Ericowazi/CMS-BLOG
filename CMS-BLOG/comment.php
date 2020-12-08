<?php include 'includes/conn.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php confirm_login(); ?>
<?php include 'includes/admin/adminnav.php'; ?>

<body>
    
    <div class="container-fluid" style="">
        <div class="row">

            <?php include('includes/admin/admin_sidebar.php'); ?>

            <div class="col-sm-10">
            <div style="margin-top:20px;"><?php  echo errorMessage(); 
                        echo successMessage();
            ?></div>

            <!--Un-Approved Comments -->
            <h4 style="margin-top: 30px; margin-bottom: 30px; color: #0b8871;">Un-approved Comments</h4>

            <div class="table table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="danger">
                            <th> C#ID </th>
                            <th> Name </th>
                            <th> Date </th>
                            <th> Comment </th>
                            <th> Approve </th>
                            <th> Delete </th>
                            <th> Details </th>
                        </tr>
                    </thead>
            <?php 
                // Query for un-approved comments
                $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY datetime desc";
                $query = mysqli_query($conn, $sql);

                $id = 0;

                if (mysqli_num_rows($query)>0) {
                while ($row = mysqli_fetch_array($query)) {
                $id++;
            ?>
                    <tbody>
                        <tr class="info">
                            <td><?php echo $id; ?></td>
                            <td style="color: #0b8871"><?php echo htmlentities($row['name']); ?></td>
                            <td><?php echo htmlentities($row['datetime']); ?></td>
                            <td><?php 
                                echo htmlentities($row['comment']); 
                                ?>
                            </td>
                            <td>
                            &nbsp; <a class="td-a"  style="" href="approve_comments.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-ok"></span></a>
                            </td>
                            <td>
                            &nbsp; <a class="td-d" onclick="return confirm('Are you sure you want to delete?')"
                                        href="delete_comments.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>
                            <a class="btn btn-info" href="viewpost.php?id=<?php echo htmlentities($row['post_id']); ?>" target="_blank">Details</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>  <!-- While statement -->
                <?php } else {?>  <!-- no comment do -->
                    <tbody>
                        <tr class="info">
                            <td><?php echo $id; ?></td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>
                            &nbsp; <a class="td-a" href="">
                            <span class="glyphicon glyphicon-ok"></span></a>
                            </td>
                            <td>
                            &nbsp; <a class="td-d" href="">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>
                            <a class="btn btn-info" href="" target="_blank">Details</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>  <!-- End if statement -->
                </table>
            </div>
            <hr>


            <!-- Approved Comments -->
            <h4 style="margin-bottom: 30px; color: #0b8871;">Approved Comments</h4>

            <div class="table table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="success">
                            <th> C#ID </th>
                            <th> Name </th>
                            <th> Date </th>
                            <th> Comment </th>
                            <th> Approved by </th>
                            <th> Disapprove </th>
                            <th> Delete </th>
                            <th> Details </th>
                        </tr>
                    </thead>
            <?php 
                // Query for approved comments
                $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY approve_date desc";
                $query = mysqli_query($conn, $sql);

                $id = 0;
                if (mysqli_num_rows($query)>0) {
                
                while ($row = mysqli_fetch_array($query)) {
                $id++;
            ?>
                    <tbody>
                        <tr class="info">
                            <td><?php echo $id; ?></td>
                            <td style="color: #0b8871"><?php echo htmlentities($row['name']); ?></td>
                            <td><?php echo htmlentities($row['datetime']); ?></td>
                            <td><?php 
                                echo htmlentities($row['comment']); 
                                ?>
                            </td>
                            <td><?php echo htmlentities($row['approve_by']); ?></td>
                            <td>
                            &nbsp; <a class="td-a-a" onclick="return confirm('Are you sure you want to Dis-approve?')"
                                      href="disapprove_comments.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                            <td>
                            &nbsp; <a class="td-d" onclick="return confirm('Are you sure you want to delete?')"
                                        href="delete_comments.php?id=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>
                            <a class="btn btn-info" href="viewpost.php?id=<?php echo htmlentities($row['post_id']); ?>" target="_blank">Details</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>  <!-- While statement -->
                <?php } else {?>  <!-- no comment do -->
                    <tbody>
                        <tr class="info">
                            <td><?php echo $id; ?></td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>
                            &nbsp; <a class="td-a-a" href="">
                            <span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                            <td>
                            &nbsp; <a class="td-d" href="">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>
                            <a class="btn btn-info" href="" target="_blank">Details</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>  <!-- End if statement -->

                </table>
            </div>
            </div> <!-- End Col-sm-10 -->
        </div> <!-- End Row -->
    </div> <!-- End container fluid -->

    <?php include 'includes/footer.php'; ?>
</body>
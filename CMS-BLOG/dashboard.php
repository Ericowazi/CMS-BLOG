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

            <h3 style="margin-bottom: 30px; color: #0b8871;">Manage Posts</h3>

            <div class="table table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="success">
                            <th> P#ID </th>
                            <th> Post Title </th>
                            <th> Published </th>
                            <th> Author </th>
                            <th> Category </th>
                            <th> Image </th>
                            <th> Comments </th>
                            <th> Edit </th>
                            <th> Delete </th>
                            <th> Lve Preview </th>
                        </tr>
                    </thead>
            <?php 

                // Query for post table in dashboard manage post
                $sql = "SELECT * FROM admins ORDER BY id desc";
                $query = mysqli_query($conn, $sql);

                $id = 0;

                while ($row = mysqli_fetch_array($query)) {
                    $post_id2 = $row['id'];
                    $id++;
            ?>
                    <tbody>
                        <tr class="info">
                            <td><?php echo htmlentities($id) ?></td>
                            <td style="color: #0b8871;"><?php
                                    if (strlen($row['title'])>20) {
                                        $row['title'] = substr($row['title'],0,20)."..";
                                    }
                                    echo htmlentities($row['title']);
                                    ?>
                            </td>
                            <td><?php echo htmlentities($row['datetime']); ?></td>
                            <td><?php echo htmlentities($row['author']); ?></td>
                            <td><?php echo htmlentities($row['category']); ?></td>
                            <td> <img style="height: 30px; width: 50px;" src="upload/<?php echo htmlentities($row['image']); ?>" alt=""> </td>
                            <td><?php 
                                    //   comment count query for un-approved comment
                                    $sql = "SELECT COUNT(*) FROM comments WHERE post_id='$post_id2' AND status='OFF'";
                                    $queryy = mysqli_query($conn, $sql);

                                    $rowcount = mysqli_fetch_array($queryy);

                                    $total_row = array_shift($rowcount);
                                    if ($total_row>0) {
                                ?>
                                
                                    <span class="label label-danger pull p"><?php echo $total_row ?></span>

                                <?php } ?>
                                
                                <?php 
                                    //   comment count query for approved comment
                                    $sql = "SELECT COUNT(*) FROM comments WHERE post_id='$post_id2' AND status='ON'";
                                    $queryy = mysqli_query($conn, $sql);

                                    $rowcount = mysqli_fetch_array($queryy);

                                    $total_row = array_shift($rowcount);
                                    if ($total_row>0) {
                                ?>

                                    <span style="margin-right: 25px" class="label label-success pull pull-right"><?php echo $total_row ?></span>

                                <?php } ?>
                            </td>
                            <td>
                            &nbsp; <a class="td-a-dash" href="editpost.php?Edit=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td>
                            &nbsp; <a class="td-d" onclick="return confirm('Are you sure you want to delete?')"
                                        href="delete_post.php?Delete=<?php echo htmlentities($row['id']); ?>">
                            <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>
                            <a class="btn btn-success" href="viewpost.php?id=<?php echo htmlentities($row['id']); ?>" target="_blank">Live Preview</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            </div> <!-- End Col-sm-10 -->
        </div> <!-- End Row -->
    </div> <!-- End container fluid -->

    <?php include 'includes/footer.php'; ?>
</body>
        <div class="col-sm-offset-1 col-sm-3 sidebar">
            <div class="about-me">
                <h4 class="me">About Me</h4>
                <div class="img">
                    <img style="width:150px; height:150px;" class="img-responsive img-circle" src="./upload/112778.jpg" alt="">
                </div>
                <div class="body">
                <h4>Admin Owazi</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, exercitationem odit praesentium sed mollitia quidem dicta 
                quaerat officia minus maxime nemo dignissimos? Quam ad dolorum repellat iusto voluptatibus fugiat aut?
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, exercitationem odit praesentium sed mollitia quidem dicta 
                quaerat officia minus maxime nemo dignissimos? Quam ad dolorum repellat iusto voluptatibus fugiat aut? </p>
                </div>
            </div>

            <div class="categories"> <!-- Categories in table format -->
                <?php 
                $sql = "SELECT * FROM category "; //get all categories from dB
                $query = mysqli_query($conn, $sql);

                if (mysqli_num_rows($query)) { 
                ?>
                    <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Categories</h3></th>
                                    </tr>
                                </thead>
                        <?php while ($row = mysqli_fetch_array($query)) { 
                                    $category = $row['name'];
                        ?>
                            <tbody>
                                <?php 
                                        $sql2 = "SELECT COUNT(*) FROM admins WHERE category='$category'"; //count posts in each category
                                        $query2 = mysqli_query($conn, $sql2);
                                        
                                        $row2= mysqli_fetch_assoc($query2);
                                        $total = array_shift($row2);
                                        
                                        if ($total<1) {
                                ?>
                                        <tr>
                                            <td><a href="postbycategory.php?Category=<?php echo $category; ?>"> <?php echo $category; ?></a></td>
                                        </tr>
                                            <h5></p>
                                <?php       
                                        } else {
                                
                                ?>
                                        <tr>
                                            <td><a href="postbycategory.php?Category=<?php echo $category; ?>"> <?php echo $category; ?> &nbsp; (<?php echo $total; ?>)</a></td>
                                        </tr>
                                <?php } ?> <!-- End if $total -->
                            </tbody>
                        <?php } ?> <!-- End while -->
                    </table>
                
                <?php } ?>  <!-- End if -->
            </div> <!-- End Category table -->

            <!-- Categories in panel body...Uncomment if you prefer this -->
            <!-- <div class="panel panel-primary categories"> <!-- Categories in panel format -->
                <!-- <div class="panel-heading"> -->
                    <!-- Categories
                </div> -->
                <?php 
                    // $sql = "SELECT * FROM category "; //get categories
                    // $query = mysqli_query($conn, $sql);

                    // if (mysqli_num_rows($query)) { 
                    //     while ($row = mysqli_fetch_array($query)) { 
                    //         $category = $row['name'];
                    ?>
                <!-- <div class="panel-body"> -->

                    <!-- match categories with their posts count-->
                    <?php 
                            // $sql2 = "SELECT COUNT(*) FROM admins WHERE category='$category'";
                            // $query2 = mysqli_query($conn, $sql2);
                            
                            // $row2= mysqli_fetch_assoc($query2);
                            // $total = array_shift($row2);
                            
                            // if ($total<1) {
                    ?>
                                <!-- <a href="categorypost.php?id=<?php //$row['name']; ?>"> <?php //echo $row['name']; ?></a> -->
                    <?php       
                            // } else {
                    
                    ?>
                                <!-- <a href="categorypost.php?id=<?php //$row['name']; ?>"> <?php //echo $row['name']; ?> &nbsp; (<?php //echo $total; ?>)</a> -->
                    <?php //} ?> <!-- End i $total -->
                <!-- </div> -->
                <?php //} ?> <!-- End while -->
                <?php //} ?> <!-- End if statement -->
            <!-- </div> End categories panel  --> 


            <div class="panel recent-post">
                <div class="panel-heading">
                    Recent Post
                </div> <!-- End Panel-heading -->

                <div class="panel-body">
                    <?php 
                            $sqlRP = "SELECT * FROM admins ORDER BY id desc LIMIT 0,6";
                            $queryRP = mysqli_query($conn, $sqlRP);

                            while ($rowRP=mysqli_fetch_array($queryRP)) {
                    
                    ?>
                    <a href="viewpost.php?id=<?php echo $rowRP['id']; ?>">
                        <div style="padding-bottom: 20px;">
                                
                                <?php if (empty($rowRP['image'])) { //if there's no image ?>
                                <img style="height:50px; width: 30%; float:left; margin-right: 10px;" 
                                class="img-responsive" src="upload/optical-illusion-wallpaper-hd-1920x1200-101856.jpg" alt=""> <br>
                                
                                <?php } else { ?>
                                
                                <img style="height:50px; width: 30%; float:left; margin-right: 10px;" 
                                class="img-responsive" src="upload/<?php echo $rowRP['image'];  ?>" alt=""> <br>
                                <?php } ?>

                               <p style="margin-top: -20px;"> 
                                    <span style="font-weight: bolder;"> 
                                    <?php 
                                            if (strlen($rowRP['title'])<30) {
                                                echo htmlentities($rowRP['title']) ." "; 
                                    ?> 
                                    </span> 
                                    <?php if (strlen($rowRP['body'])>20) {$rowRP['body'] = substr($rowRP['body'],0,20);}
                                            echo htmlentities($rowRP['body'])."<hr>"; 
                                    ?>
                                </p> 
                                <p style="margin-top: -20px;">
                                    <?php } elseif (strlen($rowRP['title'])>25) {
                                            if (strlen($rowRP['title'])>40) {$rowRP['title'] = substr($rowRP['title'],0,40);}
                                            echo htmlentities($rowRP['title'])."<hr>"; 
                                        }
                                    ?>
                                </p>
                            
                        </div>
                    </a>
                            <?php } ?>
                </div> <!-- End Panel-body -->

                <div class="panel-footer">
                    <marquee behavior="" direction="">
                        DID YOU KNOW IT COSTS YOU NOTHING TO BE KIND
                    </marquee>
                </div> <!-- End Panel-footer -->

            </div> <!-- End Panel recent-post -->

        </div> <!-- End col-md-4 -->
    </div> <!-- End Row  -->
</div> <!-- End Container -->
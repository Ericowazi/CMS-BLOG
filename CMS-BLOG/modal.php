
                            <a class="td-a-dash" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> 
                                <span class="glyphicon glyphicon-edit"></span> </a>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby=" ← myModalLabel" aria-hidden="true"> 
                                        <div class="modal-dialog"> 
                                            <div class="modal-content">
                                                <div class="modal-header"> 
                                                    <?php 
                                                          $get_id2 = $_GET['id'];

                                                          $sql = "SELECT * FROM category WHERE id='$get_id2'";
                                                          $catquery = mysqli_query($conn, $sql);

                                                          while ($cat_row = mysqli_fetch_array($catquery)) {
                                                          
                                                    ?> 
                                                    <label for="CategoryName"><?php echo htmlentities($cat_row["name"]); ?></label> 
                                                    <?php } ?>
                                                </div > 
                                                    <button type="button" class="close" data-dismiss="modal"> 
                                                        <span aria-hidden="true">&times;</span> <span class="sr-only">Close</span> 
                                                    </button>
                                            </div > 
                                        </div > 
                                    </div >
<?php

    require_once('header.php');
    require_once('d-base/mysql.php');

?>

<div class="alert alert-secondary my-2 text-center">
   <h3> <b>Student Information<b> </h3>
</div>


<div class="row my-2 d-flex justify-content-center">
    <div class="col-md-7">
        <div class="list-group">
        
            <?php

                $mysql->fetch("students");
                $students = $mysql->students;
            ?>

            <?php if ( isset( $mysql->error) ) if ($mysql->error == 0) {?>

                <div class ="alert alert-warning"><?php echo $mysql->error_msg; ?></div>

            <?php } ?>

            <a href="#" class="list-group-item list-group-item-action active text-center"> <?php echo count($students);?> Students</a>

            <?php

                #loop through students array
                foreach($students as $student)
                {
                    ?>
                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#x<?php echo $student['id'];?>"><span class="badge badge-primary mx-3"><?php echo $student['id']; ?></span> <span class="badge badge-danger mx-3"><?php echo $student['name']; ?></span> <span class="badge badge-dark mx-3 float-right">CLASS <?php echo $student['class']; ?></span>  </a>
                    
                    <!-- modal -->
                    <div class="modal fade" id="x<?php echo $student['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><span class="badge badge-danger"><?php echo $student['name'];?> : <?php echo $student['id'];?></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            
                                        <h1><?php echo $student['name'];?></h1>
                                    
                                        <h2 class="text-success"><?php echo $student['phone_number'];?></h2>
                                   
                                        <h3><?php echo $student['location'];?></h3>
                                   
                                        <h5>Class <?php echo $student['class'];?></h5>

                                        <h6 class="text-danger font-weight-bold"> <?php echo $student['email'];?></h6>

                                        <a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-warning">Edit</a>
                                   
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- modal -->

                    <?php
                }
                #loop through students array

            ?>
        </div>
    </div>
</div>



<?php
    require_once('footer.php');
?>
    

    
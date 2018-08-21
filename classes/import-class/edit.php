<?php

    require_once('header.php');
    require_once('d-base/mysql.php');

?>

<div class="row d-flex justify-content-center my-4">

    <div class="col-md-7">

        <div class="alert alert-warning">
            <h2>Edit Student Details</h2>
        </div>
        <?php
            $id = $_GET['id'];
            $mysql->get("students","id", $id);
            
        ?>

        <?php if ( isset( $mysql->error) ) if ($mysql->error == 0) {?>

            <div class ="alert alert-danger"><?php echo $mysql->error_msg; ?></div>

        <?php } ?>

        <form action="#" method="POST">
            <label class="font-weight-bold text-danger">ID</label><input type="text"  class="form-control" name="id" value="<?php echo $mysql->students[0]['id']?>" readonly/>
            <label class="font-weight-bold text-danger">Name</label><input type="text" name="name" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['name']; ?>" required/>
            <label class="font-weight-bold text-danger">Email Address</label><input type="email"  class="form-control text-right text-success" name="email" value="<?php echo $mysql->students[0]['email']?>" />
            <label class="font-weight-bold text-danger">Phone Number</label><input type="text" name="phone_number" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['phone_number']; ?>" required/>
            <label class="font-weight-bold text-danger">Location</label><input type="text" name="location" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['location']; ?>" required/>
            <label class="font-weight-bold text-danger">Class</label><input type="text" name="class" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['class']; ?>" required/>
            <hr/>
            <div class="form-inline d-flex justify-content-center row">
                <button type="submit" class="form-control mx-2 btn-primary col-md-4">Enter</button>
            </div>
            <hr/>
            <?php 

                if($_POST)
                {
                    $mysql->update("students", $_POST);
                }
                if (isset($mysql->query_code))
                {
                    if( $mysql->query_code == 0 )
                    {
                ?>
                    <div class="alert alert-success"><?php echo $mysql->query_msg; ?></div>
                <?php
                    }
                    else if( $mysql->query_code == 1 )
                    {
                ?>
                        <div class="alert alert-danger"><?php echo $mysql->query_msg; ?></div>
                <?php
                    }
                }
            
            ?>
        </form>

    </div>

</div>


<?php 


require_once('footer.php');

?>
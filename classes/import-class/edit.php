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
            $mysql->get_student("id", $id);
            
        ?>

        <form action="#" method="POST">
            <label class="font-weight-bold text-danger">Name</label><input type="text" name="name" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['name']; ?>" required/>
            <label class="font-weight-bold text-danger">Phone Number</label><input type="text" name="name" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['phone_number']; ?>" required/>
            <label class="font-weight-bold text-danger">Location</label><input type="text" name="name" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['location']; ?>" required/>
            <label class="font-weight-bold text-danger">Class</label><input type="text" name="name" class="form-control text-right text-success" value="<?php echo $mysql->students[0]['class']; ?>" required/>
            <hr/>
            <div class="form-inline d-flex justify-content-center row">
                <button type="submit" class="form-control mx-2 btn-primary col-md-4">Enter</button>
            </div>
        </form>

    </div>

</div>


<?php 

require_once('footer.php');

?>
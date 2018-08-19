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

                $mysql->fetch_students();
                $students = $mysql->students;
            ?>

            <a href="#" class="list-group-item list-group-item-action active text-center"> <?php echo count($students);?> Students</a>

            <?php

                #loop through students array
                foreach($students as $student)
                {
                    ?>
                    <a href="#" class="list-group-item list-group-item-action"> <span class="badge badge-primary mx-3"><?php echo $student['id']; ?></span> <span class="badge badge-danger mx-3"><?php echo $student['name']; ?></span> </a>
                

                    <?php
                }
                #loop through students array

            ?>
        </div>
    </div>
</div>



<?php
    include('footer.php');
?>
    

    
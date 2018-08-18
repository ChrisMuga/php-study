<?php
include('header.php');
include('d-base/mysql.php');

?>
<?php

if($mysql->connection_signal == 0)
{
    ?>

        <div class="alert alert-success my-2 text-right">
            <p> <?php echo $mysql->connection_msg; ?> </p>
        </div>


    <?php
}
else
{
    ?>


        <div class="alert alert-danger my-2 text-right">
            <p> <?php echo $mysql->connection_msg; ?> </p>
        </div>

    <?php
}
?>

<div class="alert alert-primary my-2 text-right">
   <h3> <b>Student Information<b> </h3>
</div>

<div class="row my-2">
    <div class="col-md-6">
        <h4>Register Student</h4>
        <hr/>
        <form action="" method="post">
            <input type="number" class="form-control" value="<?php echo rand(10,10000); ?>" required/>
            <input type="text" class="form-control" placeholder="Student Name" required/>
            <input type="text" class="form-control" placeholder="Student Name" required/>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>
    

    
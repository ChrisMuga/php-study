<?php
require_once('header.php');
require_once('d-base/mysql.php');

?>
<?php

if($mysql->connection_signal == 0)
{
    ?>

        <div class="alert alert-success my-2 text-right alert-dismissible fade show" role="alert">
            <p> <?php echo $mysql->connection_msg; ?> </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
}
else
{
    ?>


        <div class="alert alert-danger my-2 text-right alert-dismissible fade show" role="alert">
            <p> <?php echo $mysql->connection_msg; ?> </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
}
?>

<div class="alert alert-primary my-2 text-center">
   <h3> <b>Student Information<b> </h3>
</div>

<div class="row my-2 d-flex justify-content-center">
    <div class="col-md-4 py-4">
        <h3 class="text-danger">Register Student</h3>
        <hr/>
        <?php 

            if(empty($_POST))
            {
                echo "Empty";
            }
            else
            {
                #echo "Not Empty";
                $mysql->insert("students",$_POST);
                if($mysql->query_code == 0)
                {
                    ?>

                    <div class="alert alert-success"><?php echo $mysql->query_msg; ?></div>
                    
                    <?php
                }
                else
                {
                    ?>

                    <div class="alert alert-danger"><?php echo $mysql->query_msg; ?></div>
                    
                    <?php
                }
            }

        ?>
        <form action="#" method="post">
            <input type="number"    class="form-control text-danger"                    value="<?php echo rand(10,10000);?>" name="id" required/>
            <input type="text"      class="form-control"    placeholder="Student Name"  name="name" required/>
            <input type="text"      class="form-control"    placeholder="Phone Number"  name="phone_number" required/>
            <input type="text"      class="form-control"    placeholder="Location"      name="location" required/>
            <input type="number"    class="form-control"    placeholder="Class"         name="class" required/>
            <input type="email"      class="form-control"    placeholder="Email Address"  name="email" required/>
            <hr/>
            <input type="submit"    class="form-control btn btn-primary"                value="Enter"/>
            <input type="reset"     class="form-control btn btn-secondary"              value="Clear"/>
        </form>
    </div>
</div>

<?php
require_once('footer.php');
?>
    

    
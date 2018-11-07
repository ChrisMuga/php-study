<?php
require_once('header.php');
require_once('d-base/mysql.php');

?>

<!-- row -->

<div class = "row my-2 d-flex justify-content-center">

    <!-- col -->
        <form action=""></form>
        <div class="alert alert-dark">Student Log-In</div>
        <input type="mail" class="form-control" name="email"  placeholder="E-Mail Address"/>
        <input type="password" class="form-control" name="email"  placeholder="Password"/>
        <hr/>
        <!-- buttons -->
        <div class = "row">
            <div class="col-md-8">
                <button class="btn btn-success form-control">Enter &nbsp; <i class="fas fa-arrow-right"></i> </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger form-control">Clear &nbsp; <i class="fas fa-brush"></i></button>
            </div>
        </div>
        <!-- buttons -->
    </div>
    <!-- col -->

</div>

<!-- row -->

<?php


?>
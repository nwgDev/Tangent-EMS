<?php
    include ('header/header.php')
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View Employee
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    include ('view-employee.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include ('footer/footer.php')
?>
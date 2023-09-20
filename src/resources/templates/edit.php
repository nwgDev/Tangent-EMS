<?php
    session_start();

    include ('header/header.php')

?>

<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    include('edit-employee.php');
                    ?>

                    <script>
                        function addSkillField() {
                            var container = document.getElementById("skills-container");
                            var input = document.createElement("input");
                            input.type = "text";
                            input.name = "skills[]";
                            input.required = true;
                            container.appendChild(input);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include ('footer/footer.php')
?>
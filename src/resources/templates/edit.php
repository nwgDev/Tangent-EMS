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
                        let rowCounter = 1; // Used to assign unique IDs to each row

                        function addRow() {
                            const skillRows = document.getElementById('skillRows');

                            const rowDiv = document.createElement('div');
                            rowDiv.classList.add('row-container');
                            rowDiv.id = `row${rowCounter}`;

                            rowDiv.innerHTML = `
                            <div class="row">
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="skills[]" class="form-control">
                                    </div>
                               </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="year_exp[]" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <?php
                            include ('../../App/seniority-ratings.php');
                            ?>
                            </div>
                            <div class="col-md-2">
                                <button type="button" "removeRow('row${rowCounter}')" class="btn btn-danger btn-sm form-control float-end" >Remove</button>
                            </div>
                            </div><br>
                            `;

                            skillRows.appendChild(rowDiv);
                            rowCounter++;
                        }

                        function removeRow(rowId) {
                            const rowToRemove = document.getElementById(rowId);
                            rowToRemove.remove();
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
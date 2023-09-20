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
                    <h4>New Employee
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../../App/add.php" method="POST">

                        <div class="mb-3">
                            <label>Basic Info</label>
                        </div>

                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email_address" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Address Info</label>
                        </div>

                        <div class="mb-3">
                            <label>Street Address </label>
                            <input type="text" name="street_address" class="form-control">
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City </label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Skills</label>
                        </div>

                            <div id="skillRows">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="skills">Skill</label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Yrs Exp</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Seniority Rating</label>

                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>

                            </div>
                        <br>
                        <div class="col-md-3">
                            <button type="button" onclick="addRow()" class="btn btn-secondary btn-sm  form-control" >Add New Skill</button>
                        </div>

                        <br>
                        <div class="mb-3">
                            <button type="submit" name="save_employee" class="btn btn-primary float-sm-end">Save and Add Employee</button>
                        </div>

                    </form>

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
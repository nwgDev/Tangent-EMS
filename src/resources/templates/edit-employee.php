<?php
include_once '../../Helpers/EmployeeManager.php';
include_once '../../Config/config.php';
include_once '../../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

if(isset($_GET['id']))
    {
       $employee = EmployeeManager::getEmployee($_GET['id']);

        if($employee > 0)
        {
            ?>
            <form action="../../App/edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $employee[0]['id']; ?>">

                <div class="mb-3">
                    <label>Basic Info</label>
                </div>

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $employee[0]['first_name']; ?>">
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $employee[0]['last_name']; ?>">
                </div>

                <div class="mb-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" value="<?= $employee[0]['contact_number']; ?>">
                </div>

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email_address" class="form-control" value="<?= $employee[0]['email_address']; ?>">
                </div>

                <div class="mb-3">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="<?= $employee[0]['date_of_birth']; ?>">
                </div>

                <div class="mb-3">
                    <label>Address Info</label>
                </div>

                <div class="mb-3">
                    <label>Street Address </label>
                    <input type="text" name="street_address" class="form-control" value="<?= $employee[0]['street_address']; ?>">
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City </label>
                                <input type="text" name="city" class="form-control" value="<?= $employee[0]['city']; ?>">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" value="<?= $employee[0]['postal_code']; ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="<?= $employee[0]['country']; ?>">
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

                <div class="mb-3">
                    <button type="submit" name="save_employee" class="btn btn-primary float-sm-end">Save changes to Employee</button>
                </div>

            </form>
            <?php
        }
    }
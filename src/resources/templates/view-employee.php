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
            <div class="mb-3">
                <label>Basic Info</label>
            </div>

            <div class="mb-3">
                <label>First Name</label>
                <p class="form-control">
                    <?= $employee[0]['first_name']; ?>
                </p>
            </div>

            <div class="mb-3">
                <label>Last Name</label>
                <p class="form-control">
                    <?= $employee[0]['last_name']; ?>
                </p>
            </div>

            <div class="mb-3">
                <label>Contact Number</label>
                <p class="form-control">
                    <?= $employee[0]['contact_number']; ?>
                </p>
            </div>

            <div class="mb-3">
                <label>Email Address</label>
                <p class="form-control">
                    <?= $employee[0]['email_address']; ?>
                </p>
            </div>

            <div class="mb-3">
                <label>Date of Birth</label>
                <p class="form-control">
                    <?= $employee[0]['date_of_birth']; ?>
                </p>
            </div>

            <div class="mb-3">
                <label>Address Info</label>
            </div>

            <div class="mb-3">
                <label>Street Address </label>
                <p class="form-control">
                    <?= $employee[0]['street_address']; ?>
                </p>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City </label>
                            <p class="form-control">
                                <?= $employee[0]['city']; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <p class="form-control">
                                <?= $employee[0]['postal_code']; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>Country</label>
                        <p class="form-control">
                            <?= $employee[0]['country']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
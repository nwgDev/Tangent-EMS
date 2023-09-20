<?php
include_once '../../Helpers/EmployeeManager.php';
include_once '../../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

$employees = EmployeeManager::getAllEmployees();

if($employees > 0)
{
    foreach($employees as $employee)
    {
        ?>
        <tr>
            <td><?= $employee['first_name']; ?></td>
            <td><?= $employee['last_name']; ?></td>
            <td><?= $employee['contact_number']; ?></td>
            <td><?= $employee['email_address']; ?></td>
            <td><?= $employee['country']; ?></td>
            <td>
                <a href="view.php?id=<?= $employee['id']; ?>" class="btn btn-info btn-sm">View</a>
                <a href="edit.php?id=<?= $employee['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                <form action="../../App/delete.php" method="POST" class="d-inline">
                    <button type="submit" name="delete_employee" value="<?=$employee['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        <?php
    }
}
else
{
    echo "<h5> No Record Found </h5>";
}
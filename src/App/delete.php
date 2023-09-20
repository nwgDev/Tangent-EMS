<?php
session_start();

use TANGENT\Config\DBManager;
use TANGENT\Helpers\EmployeeManager;

include_once '../Helpers/EmployeeManager.php';
include_once '../Config/config.php';
include_once '../Config/DBManager.php';
include_once 'Employee.php';
include_once '../Validations/AddEmployeeValidations.php';

function removeEmployee($id)
{
    $exist = DBManager::getInstance()->exists('employees', ['id'  => $id]);

    if ($exist) {
        $employee_response = EmployeeManager::deleteEmployee('employees', 'id = '."'".$id."'");

        if ($employee_response) {
            return EmployeeManager::deleteEmployeeSkills('employee_skills', 'employee_id = '."'".$id."'");
        }
    }

    return $exist;
}

if(isset($_POST['delete_employee']))
{
    $response  = removeEmployee($_POST['delete_employee']);

    if($response === true)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: ../resources/templates/index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: ../resources/templates/index.php");
        exit(0);
    }
}

$_SESSION['message'] = "Employee ID Not provided";
header("Location: ../resources/templates/index.php");
exit(0);
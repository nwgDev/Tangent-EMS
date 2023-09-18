<?php

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

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    $response  = removeEmployee($id);

    if ($response === true) {
        header('Content-Type: application/json');
        echo json_encode(['success' => 'Employee successfully deleted']);
        exit();
    } else {
        header('Content-Type: application/json');
        echo json_encode(['errors:' => 'Employee does not exists!']);
        exit();
    }
}

header('Content-Type: application/json');
echo json_encode(['errors:' => 'Employee id is not provided!']);
exit();
<?php
session_start();

include_once '../Helpers/EmployeeManager.php';
include_once '../Config/config.php';
include_once '../Config/DBManager.php';
include_once '../Logs/Traits/LogActivity.php';
include_once 'Employee.php';
include_once 'EmployeeSkills.php';
include_once '../Validations/AddEmployeeValidations.php';
include_once '../Validations/AddEmployeeSkillsValidations.php';

use TANGENT\App\Employee;
use TANGENT\App\EmployeeSkills;
use TANGENT\Config\DBManager;
use TANGENT\Helpers\EmployeeManager;
use TANGENT\Logs\Traits\LogActivity;

function updateEmployee($employee, $newSkills)
{
    $results = EmployeeManager::editEmployee('employees', $employee);

    if($results === true && !empty($newSkills)) {
        if(DBManager::getInstance()->exists('employees', ['id'  => $employee->getID(),])) {

            $updatedSkills = EmployeeManager::updatedSkills('employee_skills', $newSkills, $employee->getID());

            $employeeSkills = new EmployeeSkills (
                $employee->getID(),
                $updatedSkills,
                ADMIN,
                NOW
            );

            EmployeeManager::editEmployeeSkills('employee_skills', $employeeSkills);
        }
    }
    return $results;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee = new Employee(
        $_POST["id"],
        json_encode($_POST["seniority_rating_id"]),
        json_encode($_POST["year_exp"]),
        $_POST["first_name"],
        $_POST["last_name"],
        $_POST["contact_number"],
        $_POST["email_address"],
        $_POST["date_of_birth"],
        $_POST["street_address"],
        $_POST["city"],
        $_POST["postal_code"],
        $_POST["country"],
        ADMIN,
        NOW
    );

    $newSkills = $_POST["skills"];

    $results = updateEmployee($employee, $newSkills);

    if ($results === true) {
        LogActivity::logActivity('Employee Updated Successfully by admin '.ADMIN);
        $_SESSION['message'] = "Employee Updated Successfully";
        header('Location: ../resources/templates/index.php');
        exit(0);
    }
    else {
        LogActivity::logActivity('Employee not Updated');
        $_SESSION['message'] = json_encode(['errors:' => $results]);
        header('Location: ../resources/templates/index.php');
        exit(0);
    }
}
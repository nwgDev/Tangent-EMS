<?php
include_once '../Helpers/EmployeeManager.php';
include_once '../Config/config.php';
include_once '../Config/DBManager.php';
include_once 'Employee.php';
include_once 'EmployeeSkills.php';
include_once '../Validations/AddEmployeeValidations.php';
include_once '../Validations/AddEmployeeSkillsValidations.php';

use TANGENT\App\Employee;
use TANGENT\App\EmployeeSkills;
use TANGENT\Config\DBManager;
use TANGENT\Helpers\EmployeeManager;

function saveEmployee($employee, $skills)
{
    $results = EmployeeManager::eddEmployee('employees', $employee);

    if($results && !empty($skills)) {
        if(DBManager::getInstance()->exists('employees', ['id'  => $employee->getID(),])) {
            $employeeSkills = new EmployeeSkills (
                $employee->getID(),
                json_encode($skills),
                ADMIN,
                NOW
            );

            EmployeeManager::addEmployeeSkills('employee_skills', $employeeSkills);
        }
    }
    return $results;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $employee = new Employee(EMPLOYEE_ID,
        $_POST["seniority_rating_id"],
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

    $skills = $_POST["skills"];

    $results = saveEmployee($employee, $skills);

    if ($results === true) {
        header('Content-Type: application/json');
        echo json_encode(['success' => 'Employee successfully saved']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['errors:' => $results]);
    }
}


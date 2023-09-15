<?php
include_once '../Helpers/EmployeeManager.php';
include_once '../Config/config.php';
include_once '../Config/DBManager.php';
include_once 'Employee.php';
include_once '../Validations/AddEmployeeValidations.php';

use TANGENT\App\Employee;
use TANGENT\App\EmployeeSkills;
use TANGENT\Config\DBManager;
use TANGENT\Helpers\EmployeeManager;

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
    print_r(json_encode($skills));
    echo "<br>";
    echo "Skills:<br>";
    foreach ($skills as $skill) {
        echo "- " . $skill . "<br>";
    }

    $results = EmployeeManager::AddEmployee('employees', $employee);

    if($results) {

        if(DBManager::getInstance()->exists($this->table, ['id'  => $this->obj_employee->getID(),])) {
            $employee_skills = new EmployeeSkills (
                $this->obj_employee->getID(),
                json_encode($skills),
                ADMIN,
                NOW
            );
        }
    }
    var_dump($results);
}


<?php


namespace TANGENT\Helpers;

use TANGENT\Validations\AddEmployeeSkillsValidations;
use TANGENT\Validations\AddEmployeeValidations;
use TANGENT\Config\DBManager;

class EmployeeManager
{
    public static function AddEmployee($table_name, $employee)
    {
        $validation = new AddEmployeeValidations($employee, $table_name);
        $no_errors = $validation->validateEmployee();
        $errors = $validation->getErrors();

        if ($no_errors) {
            $arrEmployee = [
                'id' => $employee->getID(),
                'seniority_rating_id' => $employee->getSeniorityRating(),
                'first_name' => $employee->getFirstName(),
                'last_name' => $employee->getLastName(),
                'contact_number' => $employee->getContactNumber(),
                'email_address'  => $employee->getEmail(),
                'date_of_birth' => $employee->getDateOfBirth(),
                'street_address' => $employee->getStreetAddress(),
                'city' => $employee->getCity(),
                'postal_code' => $employee->getPostalCode(),
                'country' => $employee->getCountry(),
                'created_by' => $employee->getCreatedBy(),
                'created_at' => $employee->getCreatedAt(),
            ];

            DBManager::getInstance()->create($table_name,  $arrEmployee);

            return true;
        }
        return $errors;
    }

    public static function AddEmployeeSkills($table_name, $employeeSkills)
    {
        $validation = new AddEmployeeSkillsValidations($employeeSkills);
        $no_errors = $validation->validateEmployeeSkills();
        $errors = $validation->getErrors();

        if ($no_errors) {
            $arrEmployeeSkills = [
                'employee_id' => $employeeSkills->getEmployee(),
                'skills' => $employeeSkills->getSkills(),
                'created_by' => $employeeSkills->getCreatedBy(),
                'created_at' => $employeeSkills->getCreatedAt(),
            ];

            DBManager::getInstance()->create($table_name,  $arrEmployeeSkills);

            return true;
        }
        return $errors;

    }

    /**
     * @return array
     * TODO (WIP)
     */
    public static function getAllEmployees()
    {
        $results = DBManager::getInstance()->query("SELECT * FROM employees");
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()) {
                //echo "ID: " . $row['id'] . ", Name: " . $row['first_name'] . ", Email: " . $row['email_address'] . "<br>";
            }
        }
        return [];
    }

    /**
     * @return array
     */
    public static function getEmployeeSkills()
    {
        $results = DBManager::getInstance()->query("SELECT * FROM employees");
        if($results->num_rows > 0){
            return $results->fetch_assoc();
        }
        return [];
    }

    /**
     * @param $data
     * @param $employee
     */
    public function updateEmployee($data, $employee)
    {
        $_table = 'employees';
        $_where = 'id ='.$employee;
        DBManager::getInstance()->update($_table, $data, $_where, $employee);
    }
}
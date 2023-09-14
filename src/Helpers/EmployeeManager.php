<?php


namespace TANGENT\Helpers;

use TANGENT\Validations\Validations;
use TANGENT\Config\DBManager;

class EmployeeManager
{
    public static function AddEmployee($table_name, $employee)
    {
        $validation = new Validations($employee, $table_name);
        $no_errors = $validation->validate();
        $errors = $validation->getErrors();

        if ($no_errors) {
            $arr_employee = [
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
                'created_by' => ADMIN,
                'created_at' => date("Y-m-d H:i:s"),
            ];

            DBManager::getInstance()->create($table_name,  $arr_employee);

            return true;
        }
        return $errors;
    }

    /**
     * @return array
     */
    public function getAllEmployees()
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
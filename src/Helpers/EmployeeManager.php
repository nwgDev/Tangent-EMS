<?php


namespace TANGENT\Helpers;

use TANGENT\Validations\AddEmployeeSkillsValidations;
use TANGENT\Validations\AddEmployeeValidations;
use TANGENT\Config\DBManager;

class EmployeeManager
{
    /**
     * @param $table_name
     * @param $employee
     * @return array|bool|int|\mysqli_result|string
     */
    public static function addEmployee($table_name, $employee)
    {
        $date = [
            'id' => $employee->getID(),
            'created_by' => $employee->getCreatedBy(),
            'created_at' => $employee->getCreatedAt(),
            ];

        $results = self::employeeFields($table_name, $employee, false);

        $arrEmployee = array_merge($results, $date);

        $response = DBManager::getInstance()->create($table_name,  $arrEmployee);

        if($response) {
            return $response;
        }
        return $results;
    }

    public static function addEmployeeSkills($table_name, $employeeSkills)
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

            return DBManager::getInstance()->create($table_name,  $arrEmployeeSkills);
        }
        return $errors;

    }

    public static function editEmployee($table_name, $employee)
    {
        $date = [
            'updated_by' => $employee->getCreatedBy(),
            'updated_at' => $employee->getCreatedAt(),
        ];

        $results = self::employeeFields($table_name, $employee, true);

        $arrEmployee = array_merge($results, $date);
        $where_condition = 'id ='."'".$employee->getID()."'";

        $response = DBManager::getInstance()->update($table_name,  $arrEmployee, $where_condition);

        if($response) {
            return $response;
        }

        return $results;
    }

    public static function editEmployeeSkills($table_name, $employeeSkills)
    {
        $validation = new AddEmployeeSkillsValidations($employeeSkills);
        $no_errors = $validation->validateEmployeeSkills();
        $errors = $validation->getErrors();

        if ($no_errors) {
            $arrEmployeeSkills = [
                'skills' => $employeeSkills->getSkills(),
                'updated_by' => $employeeSkills->getCreatedBy(),
                'updated_at' => $employeeSkills->getCreatedAt(),
            ];

            $where_condition = 'employee_id ='."'".$employeeSkills->getEmployee()."'";

            return DBManager::getInstance()->update($table_name,  $arrEmployeeSkills, $where_condition);
        }
        return $errors;

    }

    public static function updatedSkills($table_name, $employeeSkills, $employee)
    {
        $existingSkills = [];
        $updatedSkills = [];
        $newSkillsUpper = array_map('strtoupper', $employeeSkills);

        $result = DBManager::getInstance()->query(
            "SELECT skills FROM $table_name where employee_id = ". "'". $employee."'");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $existingSkills = json_decode(strtoupper($row['skills']), true);
        }

        foreach ($newSkillsUpper as $newSkill) {
            if (!in_array($newSkill, $existingSkills)) {
                $existingSkills[] = $newSkill;

                $updatedSkills = json_encode($existingSkills);
            }
        }

        if (empty($updatedSkills)) {
            return $existingSkills;
        }

        return $updatedSkills;
    }

    /**
     * @return array
     */
    public static function getSeniorityRatings()
    {
        $results = DBManager::getInstance()->query("SELECT * FROM seniority_ratings");
        $response = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $response[] = $row;
            }
            return $response;
        }
        return [];
    }

    /**
     * @return array
     */
    public static function getAllEmployees()
    {
        $results = DBManager::getInstance()->query("SELECT * FROM employees");
        $response = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $response[] = $row;
            }
            return $response;
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

    public static function getEmployee($employee)
    {
        $sql = "SELECT * FROM employees WHERE id = ". "'". $employee."'";

        $results = DBManager::getInstance()->query($sql);

        $response = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $response[] = $row;
            }
            return $response;
        }
        return [];
    }

    public static function deleteEmployee($table, $employee)
    {
        return DBManager::getInstance()->delete($table,$employee);
    }

    public static function deleteEmployeeSkills($table, $employee)
    {
         return DBManager::getInstance()->delete($table,$employee);
    }

    public static function searchEmployee($searchTerm)
    {
        $sql = "SELECT * FROM employees WHERE 
        first_name LIKE '%$searchTerm%' OR 
        last_name LIKE '%$searchTerm%' OR 
        email_address  LIKE '%$searchTerm%'";

        $results = DBManager::getInstance()->query($sql);

        $response = [];
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $response[] = $row;
            }
            return $response;
        }
        return [];
    }

    private static function employeeFields($table_name, $employee, $bool)
    {
        $validation = new AddEmployeeValidations($employee, $table_name);
        $no_errors = $validation->validateEmployee($bool);
        $errors = $validation->getErrors();

        if ($no_errors) {
            return [
                'seniority_rating_id' => $employee->getSeniorityRating(),
                'year_exp' => $employee->getYearExp(),
                'first_name' => $employee->getFirstName(),
                'last_name' => $employee->getLastName(),
                'contact_number' => $employee->getContactNumber(),
                'email_address'  => $employee->getEmail(),
                'date_of_birth' => $employee->getDateOfBirth(),
                'street_address' => $employee->getStreetAddress(),
                'city' => $employee->getCity(),
                'postal_code' => $employee->getPostalCode(),
                'country' => $employee->getCountry(),
            ];
        }
        return $errors;
    }
}

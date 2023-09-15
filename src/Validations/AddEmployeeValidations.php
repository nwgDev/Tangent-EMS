<?php


namespace TANGENT\Validations;


use DateTime;
use TANGENT\Config\DBManager;

class AddEmployeeValidations
{
    private $obj_employee;
    private $table;
    private $errors = [];

    public function __construct($employee, $table)
    {
        $this->obj_employee = $employee;
        $this->table = $table;
    }

    public function validateEmployee()
    {
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateEmailAddress();
        $this->validateDateOfBirth();
        $this->validateContactNumber();
        $this->validatePostalCode();
        $this->validateCity();
        $this->validateCountry();
        return empty($this->errors);
    }

    private function validateFirstName()
    {
        if (empty($this->obj_employee->getFirstName())) {
            $this->errors[] = "First name is required.";

        }else{
            if (!is_string($this->obj_employee->getFirstName())) {
                $this->errors[] = "First name is not a string.";
            }
        }
    }

    private function validateLastName()
    {
        if (empty($this->obj_employee->getLastName())) {
            $this->errors[] = "Last name is required.";

        }else{
            if (!is_string($this->obj_employee->getLastName())) {
                $this->errors[] = "Last name is not a string.";
            }
        }
    }

    private function validateEmailAddress()
    {
        if (!empty($this->obj_employee->getEmail())){
            if (!filter_var($this->obj_employee->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->errors[] = "Invalid email address.";
            }

            if(DBManager::getInstance()->exists($this->table, ['email_address'  => $this->obj_employee->getEmail(),]))
            {
                $this->errors[] = "Email address already exists.";
            }
        }else {
            $this->errors[] = "Email address is required.";
        }
    }

    private function validateDateOfBirth()
    {
        if (!empty($this->obj_employee->getDateOfBirth())) {
            $birthDate = new DateTime($this->obj_employee->getDateOfBirth());
            $currentDate = new DateTime();
            $currentYear = date("Y");
            $birthYear = date("Y", strtotime($birthDate->format('Y-m-d H:i:s')));

            if ($birthYear >= $currentYear) {
                $this->errors[] = "Date of birth year must be less than the current year.";

            }else{
                $age = $currentDate->diff($birthDate);

                if ($age->y < 18) {
                    $this->errors[] = "Employee should be 18 years or older.";
                }
            }
        }else {
            $this->errors[] = "Date of birth is required.";
        }
    }

    private function validatePostalCode()
    {
        if (empty($this->obj_employee->getPostalCode())) {
            $this->errors[] = "Postal code is required.";
        }
    }

    private function validateContactNumber()
    {
        if (empty($this->obj_employee->getContactNumber())) {
            $this->errors[] = "Contact number is required.";
        }
    }

    private function validateCity()
    {
        if (empty($this->obj_employee->getCity())) {
            $this->errors[] = "City is required.";
        }
    }

    private function validateCountry()
    {
        if (empty($this->obj_employee->getCountry())) {
            $this->errors[] = "Country is required.";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
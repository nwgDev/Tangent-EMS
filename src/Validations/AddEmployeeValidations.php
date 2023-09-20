<?php


namespace TANGENT\Validations;


use DateTime;
use TANGENT\Config\DBManager;

class AddEmployeeValidations
{
    private $objEmployee;
    private $table;
    private $errors = [];

    public function __construct($employee, $table)
    {
        $this->objEmployee = $employee;
        $this->table = $table;
    }

    public function validateEmployee($bool)
    {
        $this->validateID();
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateEmailAddress($bool);
        $this->validateDateOfBirth();
        $this->validateContactNumber();
        $this->validatePostalCode();
        $this->validateCity();
        $this->validateCountry();
        return empty($this->errors);
    }

    private function validateID()
    {

        $pattern = '/^[A-Z]{2}\d{4}$/';
        $isIDValid = preg_match($pattern, $this->objEmployee->getID());
        if(!$isIDValid){
            $this->errors[] = "Server error: ID is not valid";
        }
    }

    private function validateFirstName()
    {
        if (empty($this->objEmployee->getFirstName())) {
            $this->errors[] = "First name is required.";

        }else{
            if (!is_string($this->objEmployee->getFirstName())) {
                $this->errors[] = "First name is not a string.";
            }
        }
    }

    private function validateLastName()
    {
        if (empty($this->objEmployee->getLastName())) {
            $this->errors[] = "Last name is required.";

        }else{
            if (!is_string($this->objEmployee->getLastName())) {
                $this->errors[] = "Last name is not a string.";
            }
        }
    }

    private function validateEmailAddress($update_employee = false)
    {
        if (!empty($this->objEmployee->getEmail())){
            if (!filter_var($this->objEmployee->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->errors[] = "Invalid email address.";
            }

            if (!$update_employee)
            {
                if(DBManager::getInstance()->exists($this->table, ['email_address'  => $this->objEmployee->getEmail(),]))
                {
                    $this->errors[] = "Email address already exists.";
                }
            }
        }else {
            $this->errors[] = "Email address is required.";
        }
    }

    private function validateDateOfBirth()
    {
        if (!empty($this->objEmployee->getDateOfBirth())) {
            $birthDate = new DateTime($this->objEmployee->getDateOfBirth());
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
        if (empty($this->objEmployee->getPostalCode())) {
            $this->errors[] = "Postal code is required.";
        }
    }

    private function validateContactNumber()
    {
        if (empty($this->objEmployee->getContactNumber())) {
            $this->errors[] = "Contact number is required.";
        }
    }

    private function validateCity()
    {
        if (empty($this->objEmployee->getCity())) {
            $this->errors[] = "City is required.";
        }
    }

    private function validateCountry()
    {
        if (empty($this->objEmployee->getCountry())) {
            $this->errors[] = "Country is required.";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
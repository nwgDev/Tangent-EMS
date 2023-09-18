<?php


namespace TANGENT\Validations;


class AddEmployeeSkillsValidations
{
    private $objEmployeeSkiils;
    private $errors = [];

    public function __construct($employee_skills)
    {
        $this->objEmployeeSkiils = $employee_skills;
    }

    public function validateEmployeeSkills()
    {
        $this->validateSkills();
        return empty($this->errors);
    }

    private function validateSkills()
    {
        $skills = $this->objEmployeeSkiils->getSkills();

        if(!empty($skills) && is_array($skills)) {
            $this->errors[] = "Skill/s is required.";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
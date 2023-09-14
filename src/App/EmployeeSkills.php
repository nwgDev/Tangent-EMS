<?php


namespace TANGENT\App;


class EmployeeSkills
{
    private $employee;
    private $skills;
    private $updated_at;
    private $updated_by;
    private $created_at;
    private $created_by;

    public function __construct($employee, $skills, $created_by, $created_at){

        $this->employee = $employee;
        $this->skills = $skills;
        $this->created_at = $created_at;
        $this->created_by = $created_by;
    }

    public function getEmployee()
    {
        return $this->employee;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function getUpdateAt()
    {
        return $this->updated_at;
    }

    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
    }

    public function setUpdateAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
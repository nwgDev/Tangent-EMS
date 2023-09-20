<?php


namespace TANGENT\App;


class Employee
{
    private $id;
    private $seniority_rating_id;
    private $year_exp;
    private $first_name;
    private $last_name;
    private $contact_number;
    private $email_address;
    private $date_of_birth;
    private $street_address;
    private $city;
    private $postal_code;
    private $country;
    private $created_by;
    private $created_at;
    private $updated_at;
    private $updated_by;

    public function __construct($id, $seniority_rating_id,$year_exp, $first_name, $last_name, $contact_number,
                                $email_address, $date_of_birth, $street_address,$city, $postal_code,
                                $country, $created_by, $created_at){
        $this->id = $id;
        $this->seniority_rating_id = $seniority_rating_id;
        $this->year_exp = $year_exp;
        $this->first_name = ucwords($first_name);
        $this->last_name = ucwords($last_name);
        $this->contact_number = $contact_number;
        $this->email_address = $email_address;
        $this->date_of_birth = $date_of_birth;
        $this->street_address = $street_address;
        $this->city = ucwords($city);
        $this->postal_code = $postal_code;
        $this->country = ucwords($country);
        $this->created_at = $created_at;
        $this->created_by = $created_by;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getYearExp()
    {
        return $this->year_exp;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getSeniorityRating()
    {
        return $this->seniority_rating_id;
    }

    public function getStreetAddress()
    {
        return $this->street_address;
    }

    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    public function getEmail()
    {
        return $this->email_address;
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

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setSeniorityRating($seniority_rating_id)
    {
        $this->seniority_rating_id = $seniority_rating_id;
    }

    public function setStreetAddress($street_address)
    {
        $this->street_address = $street_address;
    }

    public function setContactNumber($contact_number)
    {
       $this->contact_number = $contact_number;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setYearExp($year_exp)
    {
        $this->year_exp = $year_exp;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    public function setEmail($email_address)
    {
        $this->email_address = $email_address;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
    }

    public function setUpdateAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}

 

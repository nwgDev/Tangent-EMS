<?php


namespace TANGENT\Tests\Unit;


use PHPUnit\Framework\TestCase;
use TANGENT\App\Employee;

class AddEmployeeTest extends TestCase
{
    public function testEmptyFields()
    {
        $post = [
            'id' => '',
            "seniority_rating_id" => "",
            "year_exp" =>"",
            "first_name" => "",
            "last_name" => "",
            "contact_number" => "",
            "email_address" => "",
            "date_of_birth" => "",
            "street_address" => "",
            "city" => "",
            "postal_code" => "",
            "country" => "",
            "created_by" => "",
            "created_at" => ""
        ];

        $employee = $this->createObject($post);

        $this->assertEmpty($employee->getFirstName());
        $this->assertEmpty($employee->getCity());
        $this->assertEmpty($employee->getContactNumber());
        $this->assertEmpty($employee->getCountry());
        $this->assertEmpty($employee->getCreatedAt());
        $this->assertEmpty($employee->getCreatedBy());
        $this->assertEmpty($employee->getDateOfBirth());
        $this->assertEmpty($employee->getEmail());
        $this->assertEmpty($employee->getPostalCode());
        $this->assertEmpty($employee->getYearExp());
    }

    public function testEmployeeCreation()
    {
        $post = [
            "id" => "NW1236",
            "seniority_rating_id" => ['2'],
            "year_exp" => ['2'],
            "first_name" => "nana",
            "last_name" => "nkwi",
            "contact_number" => "0121111111",
            "email_address" => "win@gmail.com",
            "date_of_birth" => "1990-02-02",
            "street_address" => "154 llama",
            "city" => "JHB",
            "postal_code" => "0000",
            "country" => "South Africa"
        ];

        $employee = $this->createObject($post);

        $this->assertInstanceOf(Employee::class, $employee);

        $this->assertEquals($post["id"], $employee->getId());
        $this->assertEquals($post["seniority_rating_id"], $employee->getSeniorityRating());
        $this->assertEquals(ucwords($post["first_name"]), $employee->getFirstName());
        $this->assertEquals(ucwords($post["last_name"]), $employee->getLastName());
        $this->assertEquals(($post["postal_code"]), $employee->getPostalCode());
        $this->assertEquals(($post["email_address"]), $employee->getEmail());
        $this->assertEquals(ucwords($post["city"]), $employee->getCity());
        $this->assertEquals(ucwords($post["country"]), $employee->getCountry());
    }

    private function createObject($post)
    {
        return new Employee(
            $post["id"],
            $post["seniority_rating_id"],
            $post["year_exp"],
            $post["first_name"],
            $post["last_name"],
            $post["contact_number"],
            $post["email_address"],
            $post["date_of_birth"],
            $post["street_address"],
            $post["city"],
            $post["postal_code"],
            $post["country"],
            '',
            ''
        );
    }
}
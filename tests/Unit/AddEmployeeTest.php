<?php


namespace TANGENT\Tests\Unit;


use PHPUnit\Framework\TestCase;
use TANGENT\App\Employee;

class AddEmployeeTest extends TestCase
{
    public function testEmptyFields()
    {
        $post = [
            "seniority_rating_id" => "",
            "first_name" => "",
            "last_name" => "",
            "contact_number" => "",
            "email_address" => "",
            "date_of_birth" => "",
            "street_address" => "",
            "city" => "",
            "postal_code" => "",
            "country" => ""
        ];

        $employee = $this->createObject($post);

        $this->assertNull($employee);
    }

    public function testEmployeeCreation()
    {
        $post = [
            "seniority_rating_id" => 2,
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

        $this->assertEquals(EMPLOYEE_ID, $employee->getId());
        $this->assertEquals($post["seniority_rating_id"], $employee->getSeniorityRating());
        $this->assertEquals($post["first_name"], $employee->getFirstName());
    }

    private function createObject($post)
    {
        return new Employee(
            '',
            $post["seniority_rating_id"],
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
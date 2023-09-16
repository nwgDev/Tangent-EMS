<?php


include_once '../Helpers/EmployeeManager.php';
include_once '../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

$results = EmployeeManager::getAllEmployees();
//var_dump($results);
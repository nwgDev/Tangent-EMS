<?php
include_once '../Helpers/EmployeeManager.php';
include_once '../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

$results = EmployeeManager::getAllEmployees();

header('Content-Type: application/json');
echo json_encode($results);
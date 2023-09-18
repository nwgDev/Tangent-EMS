<?php
include_once '../Helpers/EmployeeManager.php';
include_once '../Config/config.php';
include_once '../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

$searchTerm = $_POST['search_term'];

$results = EmployeeManager::searchEmployee($searchTerm);

header('Content-Type: application/json');
echo json_encode($results);


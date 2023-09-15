<?php
$numbers_length = 4;
$letters_length = 2;
$numbers = substr(str_shuffle('0123456789'),1,$numbers_length);
$letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$letters_length);

define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','employee_db');
define('EMPLOYEE_ID', $letters.$numbers);
define('ADMIN', 'WN1234');
define('NOW',  date("Y-m-d H:i:s"));

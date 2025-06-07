<?php
require 'conn.php';

$dbname = $_GET['db_name'];
$table_name = $_GET['table_name'];
$first_field_input = $_GET['first_field_input'];
$second_field_input = $_GET['second_field_input'];

createDB($dbname);
createTable($table_name, $first_field_input, $second_field_input);
?>
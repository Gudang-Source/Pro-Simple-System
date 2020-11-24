<?php
date_default_timezone_set("Asia/Jakarta");
require "Medoo.php";

use Medoo\Medoo;

$con = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'digital_entreprenuer',
    'server' => "localhost",
    'username' => "root",
    'password' => "mysql"
]);

session_start();

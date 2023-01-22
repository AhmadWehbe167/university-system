<?php

$servename = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root12345';
$dbName = 'uni';

$conn = mysqli_connect($servename, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
<?php

//conexion
$server = 'localhost';
$username = 'fsponton2';
$password = '123';
$baseDatos = 'systemDigitalStock';

$database = mysqli_connect($server, $username, $password, $baseDatos);

mysqli_query($database, "SET NAMES 'utf8'");

// iniciar la session
if(!isset($_SESSION)){
session_start();
}


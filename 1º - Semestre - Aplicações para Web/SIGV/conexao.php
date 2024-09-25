<?php

$hostname = "localhost";
$DB_name = "db_sigv";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $DB_name);
if ($mysqli -> connect_errno){
    echo "Falha ao conectar: (".$mysqli->connect_errno . ") " . $mysqli->connect_error;
}
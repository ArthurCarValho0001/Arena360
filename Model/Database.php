<?php

define("HOST", "localhost");
define("USER", "root");     
define("PASS", "");         
define("BASE", "arena360"); 

$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die("Falha na conexao: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>
<?php
function get_config() {
    $host = 'localhost';
    $user = 'root';
    $pass='';
    $db = 'jatochegando';
    $conn = new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error) {
        throw new Exception("Erro de conexão: " . $conn->connect_error);
    }
    return $conn;
}
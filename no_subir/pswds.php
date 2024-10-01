<?php
if (!isset($_GET['password'])) {
    echo "Por favor definir: ?password=";
} else {
    $password = $_GET['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    echo "Contraseña: " . $password . "<br>";
    echo "Hash: " . $hashed_password . "<br>";
}
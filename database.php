<?php
$servername = "localhost";
$username = "root";
$password = "Egamberdiyev";
$database = "crud-php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "ma'lumotlar bazasiga ulandi !";
} catch (PDOException $err) {
    echo "Xatolik :" . $err->getMessage();
}

<?php
$host = 'localhost';
$db = 'php-prova';
$user = 'postgres';
$pass = 'ceub123456'; // senha do banco de dados da faculdade
$port = '5432';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
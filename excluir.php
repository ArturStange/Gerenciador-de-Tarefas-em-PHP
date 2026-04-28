<?php
session_start();
if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) {
    header("Location: login.php");
    exit;
}

require 'conexao.php';

$id = $_GET['id'];
$usuario_id = $_SESSION["usuario_id"];

$stmt = $pdo->prepare("DELETE FROM tarefas WHERE id = ? AND usuario_id = ?");
$stmt->execute([$id, $usuario_id]);

header("Location: index.php");
exit;
?>
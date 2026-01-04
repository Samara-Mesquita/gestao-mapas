<?php
include 'conexao.php';

/* ===== RECEBER ID DO MAPA ===== */
$idMapa = isset($_POST['id_mapa']) ? intval($_POST['id_mapa']) : 0;

/* ===== VALIDAR ===== */
if ($idMapa <= 0) {
    http_response_code(400);
    die('Mapa inválido');
}

/* ===== DELETE SEGURO ===== */
$stmt = $conn->prepare("
    DELETE FROM pontos
    WHERE id_mapa = ?
");

$stmt->bind_param('i', $idMapa);
$stmt->execute();

echo 'OK';

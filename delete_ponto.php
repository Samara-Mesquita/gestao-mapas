<?php
include 'conexao.php';

/* ===== RECEBER DADOS ===== */
$idPonto = isset($_POST['id']) ? intval($_POST['id']) : 0;
$idMapa  = isset($_POST['id_mapa']) ? intval($_POST['id_mapa']) : 0;

/* ===== VALIDAR ===== */
if ($idPonto <= 0 || $idMapa <= 0) {
    http_response_code(400);
    die('Dados inválidos');
}

/* ===== DELETE SEGURO ===== */
$stmt = $conn->prepare("
    DELETE FROM pontos
    WHERE id = ? AND id_mapa = ?
");

$stmt->bind_param('ii', $idPonto, $idMapa);
$stmt->execute();

/* ===== CONFIRMA EXCLUSÃO ===== */
if ($stmt->affected_rows === 0) {
    http_response_code(404);
    die('Ponto não encontrado');
}

echo 'OK';

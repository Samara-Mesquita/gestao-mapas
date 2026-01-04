<?php
include 'conexao.php';

/* ===== RECEBER DADOS ===== */
$idPonto = isset($_POST['id_ponto']) ? intval($_POST['id_ponto']) : 0;
$nome    = trim($_POST['nome'] ?? '');
$idMapa  = isset($_POST['id_mapa']) ? intval($_POST['id_mapa']) : 0;

/* ===== VALIDAR ===== */
if ($idPonto <= 0 || $idMapa <= 0 || $nome === '') {
    http_response_code(400);
    die('Dados inválidos');
}

/* ===== UPDATE SEGURO ===== */
$stmt = $conn->prepare("
    UPDATE pontos 
    SET nome = ?
    WHERE id = ? AND id_mapa = ?
");

$stmt->bind_param(
    'sii',
    $nome,
    $idPonto,
    $idMapa
);

$stmt->execute();

/* ===== VERIFICA SE ALTEROU ===== */
if ($stmt->affected_rows === 0) {
    http_response_code(404);
    die('Ponto não encontrado');
}

echo 'OK';


<?php
include 'conexao.php';

/* ===== RECEBER DADOS ===== */
$nome   = trim($_POST['nome'] ?? '');
$lat    = isset($_POST['latitude']) ? floatval($_POST['latitude']) : null;
$lng    = isset($_POST['longitude']) ? floatval($_POST['longitude']) : null;
$idMapa = isset($_POST['id_mapa']) ? intval($_POST['id_mapa']) : 0;

/* ===== VALIDAR ===== */
if ($nome === '' || $lat === null || $lng === null || $idMapa <= 0) {
    http_response_code(400);
    die('Dados incompletos');
}

/* ===== MARCO ZERO (PRAÇA DA SÉ) ===== */
$latCentro = -23.55052;
$lngCentro = -46.633308;

/* ===== CÁLCULO AUTOMÁTICO DA ZONA ===== */
if ($lat > $latCentro) {
    $zona = 'norte';
} elseif ($lat < $latCentro) {
    $zona = 'sul';
} elseif ($lng > $lngCentro) {
    $zona = 'leste';
} else {
    $zona = 'oeste';
}

/* ===== INSERT SEGURO ===== */
$stmt = $conn->prepare("
    INSERT INTO pontos (id_mapa, nome, latitude, longitude, zona)
    VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param(
    'isdds',
    $idMapa,
    $nome,
    $lat,
    $lng,
    $zona
);

$stmt->execute();

/* ===== RESPOSTA ===== */
echo 'OK';


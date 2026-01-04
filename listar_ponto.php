<?php
include 'conexao.php';

/* ===== VALIDAR ID DO MAPA ===== */
$id_mapa = isset($_GET['id_mapa']) ? intval($_GET['id_mapa']) : 0;

if ($id_mapa <= 0) {
    echo json_encode([]);
    exit;
}

/* ===== BUSCAR PONTOS DO MAPA ===== */
$sql = "
    SELECT 
        id,
        nome,
        latitude,
        longitude,
        zona
    FROM pontos
    WHERE id_mapa = $id_mapa
    ORDER BY id DESC
";

$result = $conn->query($sql);

/* ===== MONTAR JSON ===== */
$pontos = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $pontos[] = $row;
    }
}

/* ===== RETORNO ===== */
header('Content-Type: application/json');
echo json_encode($pontos);

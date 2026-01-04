<?php
include 'conexao.php';

/* ===== LISTAR MAPAS COM TOTAL DE PONTOS ===== */
$sql = "
    SELECT 
        m.id,
        m.nome,
        m.data_criacao,
        COUNT(p.id) AS total_pontos
    FROM mapas m
    LEFT JOIN pontos p ON p.id_mapa = m.id
    GROUP BY m.id, m.nome, m.data_criacao
    ORDER BY m.data_criacao DESC, m.id DESC
";

$result = $conn->query($sql);

$mapas = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $mapas[] = $row;
    }
}

/* ===== RETORNO JSON ===== */
header('Content-Type: application/json');
echo json_encode($mapas);

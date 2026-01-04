<?php
include 'conexao.php';

$nome = trim($_POST['nome'] ?? '');
$data = $_POST['data_criacao'] ?? '';

if ($nome === '' || $data === '') {
    die('Dados do mapa incompletos');
}

/*
 Converte a data (YYYY-MM-DD) para DATETIME
 Ex: 2025-01-20 -> 2025-01-20 00:00:00
*/
$dataFormatada = $data . ' 00:00:00';

/* PREPARED STATEMENT (SEGURANÇA) */
$stmt = $conn->prepare("
    INSERT INTO mapas (nome, data_criacao)
    VALUES (?, ?)
");

$stmt->bind_param('ss', $nome, $dataFormatada);
$stmt->execute();

/* ID DO MAPA CRIADO */
$idMapa = $stmt->insert_id;

/* REDIRECIONA PARA O MAPA */
header("Location: mapa.php?id=$idMapa");
exit;


<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mapa_db";

/* ===== CONEXÃO ===== */
$conn = new mysqli($host, $user, $pass, $db);

/* ===== VERIFICA ERRO ===== */
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

/* ===== CHARSET (IMPORTANTE) ===== */
$conn->set_charset("utf8mb4");

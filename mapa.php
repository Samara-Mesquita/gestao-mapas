<?php
include 'conexao.php';

$ID_MAPA = intval($_GET['id'] ?? 0);

if (!$ID_MAPA) {
    die('Mapa não informado');
}

// Busca o mapa no banco
$sqlMapa = "SELECT * FROM mapas WHERE id = $ID_MAPA";
$resMapa = $conn->query($sqlMapa);

if ($resMapa->num_rows === 0) {
    die('Mapa não encontrado');
}

$mapa = $resMapa->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/favico.ico.png" type="image/x-icon">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/mapa.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <title><?= htmlspecialchars($mapa['nome']) ?></title>
</head>

<body>

<div class="container">

    <header class="header">
        <h1><?= htmlspecialchars($mapa['nome']) ?></h1>
        <p>Cadastro e visualização de pontos por zona</p>
        <a href="index.php" class="btn-primary">← Voltar</a>
    </header>

    <div class="layout-mapa">

        <!-- PAINEL LATERAL -->
        <aside class="painel">
            <h3>Pontos cadastrados</h3>

            <p class="contador">
                Total de pontos: <strong id="totalPontos">0</strong>
            </p>

            <ul id="listaPontos"></ul>

            <button class="btn-danger" onclick="excluirTodos()">Excluir todos</button>
        </aside>

        <!-- MAPA -->
        <main class="mapa-area">
            <div id="map"></div>
        </main>

    </div>
</div>

<!-- MODAL -->
<div id="modal" class="modal">
    <h3>Novo Ponto</h3>

    <form id="formPonto">
        <input type="hidden" name="id_ponto" id="id_ponto">
        <input type="hidden" name="id_mapa" value="<?= $ID_MAPA ?>">

        <input type="text" name="nome" id="nomePonto" placeholder="Nome do ponto" required>

        <input type="hidden" name="latitude">
        <input type="hidden" name="longitude">

        <div class="acoes-modal">
            <button type="submit" class="btn">Salvar</button>
            <button type="button" class="btn-secundario" onclick="fecharModal('modal')">Cancelar</button>
        </div>
    </form>
</div>

<!-- LEAFLET -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- VARIÁVEL GLOBAL DO MAPA (IMPORTANTE) -->
<script>
    const ID_MAPA = <?= $ID_MAPA ?>;
</script>

<!-- JAVASCRIPT -->
<script src="js/base.js"></script>
<script src="js/mapa.js"></script>

</body>
</html>

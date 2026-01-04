<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favico.ico.png" type="image/x-icon">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Map</title>
</head>
<body>

<div class="page-wrapper">
    <div class="page">

        <div class="Mapas">
            <h2>Mapas</h2>
            <button class="btn-primary" onclick="abrirModalMapa()">+ Criar Mapa</button>
        </div>

        <div class="nomes">
            <div id="listaMapas"></div>
        </div>

    </div>
</div>

<!-- MODAL CRIAR MAPA -->
<div id="modalMapa" class="modal">
    <h3>Criar novo mapa</h3>

    <form action="criar_mapa.php" method="post">
        <input type="text" name="nome" placeholder="Nome do mapa" required>
        <input type="date" name="data_criacao" required>

        <div class="acoes-modal">
            <button type="submit" class="btn">Criar mapa</button>
            <button type="button" class="btn-secundario" onclick="fecharModalMapa()">Cancelar</button>
        </div>
    </form>
</div>

<!-- JS -->
<script src="js/base.js"></script>
<script src="js/index.js"></script>

</body>
</html>

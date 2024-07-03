<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'templates/header.php'; ?>
    <title>Editar Clientes</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Editar Clientes</h1>
        <input type="text" id="search" class="form-control mt-3" placeholder="Buscar Cliente" onkeyup="searchCliente()">
        <div id="clientes" class="mt-3"></div>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar para a Página Inicial</a>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'templates/header.php'; ?>
    <title>Cadastro de Cliente</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Cadastro de Cliente</h1>
        <form id="form-cadastro" class="mt-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" placeholder="Telefone">
            </div>
            <button type="button" class="btn btn-primary" onclick="createCliente()">Salvar</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar para a Página Inicial</a>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

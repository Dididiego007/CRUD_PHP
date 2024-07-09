<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script/script.js"></script>
</head>
<body>
    <form id="clienteForm" method="POST" action="bancodedados.php">
        <input type="hidden" id="id" name="id">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control bg-dark text-light" id="nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control bg-dark text-light" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control bg-dark text-light" id="telefone" name="telefone" placeholder="Telefone" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</body>
</html>
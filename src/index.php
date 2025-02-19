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

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gerenciamento de Clientes</h1>
        <div class="card bg-secondary mb-4">
            <div class="card-header">Cadastrar Cliente</div>
            <div class="card-body">
                <form id="clienteForm">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control bg-dark text-light" id="nome" name="nome"
                            placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-dark text-light" id="email" name="email"
                            placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control bg-dark text-light" id="telefone" name="telefone"
                            placeholder="Telefone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
                </form>
            </div>
        </div>
        <div class="card bg-secondary">
            <div class="card-header">Clientes</div>
            <div class="card-body">
                <form id="pesquisaForm">
                    <div class="form-group">
                        <label for="pesquisar">Nome do Cliente</label>
                        <input type="text" class="form-control bg-dark text-light" id="pesquisaInput" name="pesquisar"
                            placeholder="Digite o nome ou o e-mail do cliente">
                    </div>
                    <button type="button" class="btn btn-primary" id="searchButton">Pesquisar</button>
                </form>
                <table class="table table-bordered table-striped table-dark" id="clientesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
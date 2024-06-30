function createCliente() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;

    const data = new FormData();
    data.append('nome', nome);
    data.append('email', email);
    data.append('telefone', telefone);

    $.ajax({
        url: 'ajax/create.php',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            alert('Cliente cadastrado com sucesso!');
            document.getElementById('form-cadastro').reset();
        },
        error: function (xhr, status, error) {
            alert('Erro ao cadastrar cliente: ' + error);
        }
    });
}

function searchCliente() {
    const search = document.getElementById('search').value;

    $.ajax({
        url: 'ajax/search.php',
        type: 'GET',
        data: { search: search },
        success: function (response) {
            const clientes = JSON.parse(response);
            let output = '<ul class="list-group">';
            clientes.forEach(cliente => {
                output += `<li class="list-group-item">${cliente.nome} - ${cliente.email} - ${cliente.telefone}
                           <button class="btn btn-danger btn-sm float-right ml-2" onclick="deleteCliente(${cliente.id})">Excluir</button>
                           <button class="btn btn-primary btn-sm float-right" onclick="editCliente(${cliente.id})">Editar</button></li>`;
            });
            output += '</ul>';
            document.getElementById('clientes').innerHTML = output;
        },
        error: function (xhr, status, error) {
            alert('Erro ao buscar clientes: ' + error);
        }
    });
}

function deleteCliente(id) {
    $.ajax({
        url: 'ajax/delete.php',
        type: 'POST',
        data: { id: id },
        success: function (response) {
            alert('Cliente excluído com sucesso!');
            searchCliente();
        },
        error: function (xhr, status, error) {
            alert('Erro ao excluir cliente: ' + error);
        }
    });
}

function editCliente(id) {
    // Aqui você pode redirecionar para uma página de edição com o id do cliente ou abrir um modal para edição.
}

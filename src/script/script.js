$(document).ready(function() {
    function carregarClientes(searchTerm = '') {
        $.ajax({
            url: 'classes/cliente_read.php',
            type: 'GET',
            data: { termo: searchTerm },
            beforeSend: function() {
                $('#clientesTable tbody').html('<tr><td colspan="5" class="text-center"><i class="fas fa-spinner fa-spin"></i> Carregando...</td></tr>');
            },
            success: function(data) {
                $('#clientesTable tbody').html(data);
            }
        });
    }
    carregarClientes();
    
    $('#searchButton').on('click', function() {
        var searchTerm = $('#pesquisaInput').val();
        carregarClientes(searchTerm);
    });

    $('#pesquisaForm').on('submit', function(e) {
        e.preventDefault();
    });

    $('#clienteForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'classes/cliente_create_update.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#clienteForm')[0].reset();
                carregarClientes();
            }
        });
    });

    $(document).on('click', '.editar', function() {
        let id = $(this).data('id');
        $.ajax({
            url: 'classes/cliente_get.php',
            type: 'GET',
            data: { id: id },
            success: function(data) {
                let cliente = JSON.parse(data);
                $('#id').val(cliente.id);
                $('#nome').val(cliente.nome);
                $('#email').val(cliente.email);
                $('#telefone').val(cliente.telefone);
            }
        });
    });

    $(document).on('click', '.deletar', function() {
        if (confirm('Tem certeza que deseja deletar este cliente?')) {
            let id = $(this).data('id');
            $.ajax({
                url: 'classes/cliente_delete.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    carregarClientes();
                }
            });
        }
    });

    $('#clienteForm').on('submit', function(e) {
        e.preventDefault();
        
        var id = $('#id').val();
        var url = id ? 'classes/cliente_create_update.php' : 'classes/cliente_create.php';
        var data = $(this).serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.startsWith('Erro')) {
                    alert(response); // Exibe a mensagem de erro
                } else {
                    alert(response); // Exibe uma mensagem de sucesso ou outra lógica
                    $('#clienteForm')[0].reset();
                    $('#id').val('');
                    carregarClientes(); // Recarrega a lista de clientes após o sucesso
                }
            }
        });
    });
   


    $('#cancelar').on('click', function() {
        $('#clienteForm')[0].reset();
        $('#id').val('');
    });


});

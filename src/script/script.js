$(document).ready(function() {

    // Função para carregar clientes na tabela
    function carregarClientes(searchTerm = '') {
        $.ajax({
            url: 'classes/cliente_read.php',
            type: 'GET',
            data: { termo: searchTerm },
            beforeSend: function() {
                // Mostra um spinner de carregamento na tabela
                $('#clientesTable tbody').html('<tr><td colspan="5" class="text-center"><i class="fas fa-spinner fa-spin"></i> Carregando...</td></tr>');
            },
            success: function(data) {
                // Atualiza o corpo da tabela com os dados dos clientes recebidos
                $('#clientesTable tbody').html(data);
            }
        });
    }
    
    // Carrega a lista de clientes ao abrir a página
    carregarClientes();
    
    // Evento de clique no botão de pesquisa
    $('#searchButton').on('click', function() {
        var searchTerm = $('#pesquisaInput').val();
        // Atualiza a tabela de clientes com base no termo de pesquisa
        carregarClientes(searchTerm);
    });

    // Impede o envio padrão do formulário de pesquisa
    $('#pesquisaForm').on('submit', function(e) {
        e.preventDefault();
    });

    // Evento de envio do formulário de criação/atualização de cliente
    $('#clienteForm').on('submit', function(e) {
        e.preventDefault();
        
        var id = $('#id').val();
        // Decide a URL com base na presença do ID (criação ou atualização)
        var url = id ? 'classes/cliente_create_update.php' : 'classes/cliente_create.php';
        var data = $(this).serialize();

        // Envia os dados do formulário via AJAX para criar ou atualizar um cliente
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                // Exibe um alerta com a resposta da operação (sucesso ou erro)
                if (response.startsWith('Erro')) {
                    alert(response); 
                } else {
                    alert(response); 
                    // Limpa o formulário e o campo de ID após o sucesso na operação
                    $('#clienteForm')[0].reset();
                    $('#id').val('');
                    // Atualiza a lista de clientes na tabela
                    carregarClientes();
                }
            }
        });
    });

    // Evento de clique no botão de editar 
    $(document).on('click', '.editar', function() {
        let id = $(this).data('id');
        // Busca os dados do cliente via AJAX pelo ID e preenche o formulário de edição
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

    // Evento de clique no botão de deletar 
    $(document).on('click', '.deletar', function() {
        if (confirm('Tem certeza que deseja deletar este cliente?')) {
            let id = $(this).data('id');
            // Deleta o cliente via AJAX pelo ID e atualiza a lista de clientes na tabela
            $.ajax({
                url: 'classes/cliente_delete.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Exibe um alerta com a resposta da operação de exclusão
                    alert(response);
                    carregarClientes();
                }
            });
        }
    });

    // Evento de clique no botão de cancelar (limpa o formulário e o campo de ID)
    $('#cancelar').on('click', function() {
        $('#clienteForm')[0].reset();
        $('#id').val('');
    });

});

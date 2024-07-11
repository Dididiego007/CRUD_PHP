<?php

class Cliente {
    private $conexao;

    public function __construct() {
        // Inicia a conexão com o banco de dados usando PDO
        $this->conexao = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtém o próximo ID disponível na tabela de clientes
    private function getProximoId() {
        $stmt = $this->conexao->prepare("SELECT MAX(id) as max_id FROM clientes");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['max_id'] + 1;
    }

    // Cria um novo cliente no banco de dados
    public function criar($nome, $email, $telefone) {
        // Verifica se o cliente já existe pelo email
        $existeCliente = $this->verificarClienteExistente($email);
        
        if ($existeCliente) {
            return "Erro: Cliente com o email '$email' já cadastrado.";
        }

        // Caso não exista, procede com a inserção do cliente
        $id = $this->getProximoId();
        $stmt = $this->conexao->prepare("INSERT INTO clientes (id, nome, email, telefone) VALUES (:id, :nome, :email, :telefone)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        return $stmt->execute();
    }

    // Atualiza os dados de um cliente no banco de dados
    public function atualizar($id, $nome, $email, $telefone) {
        // Verifica se o email pertence a outro cliente (exceto o cliente que está sendo atualizado)
        $existeOutroCliente = $this->verificarClienteExistente($email, $id);
        
        if ($existeOutroCliente) {
            return "Erro: Email '$email' já está sendo usado por outro cliente.";
        }

        // Caso não exista outro cliente com o mesmo email, procede com a atualização
        $stmt = $this->conexao->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        return $stmt->execute();
    }

    // Verifica se um cliente já existe pelo email
    private function verificarClienteExistente($email, $id = null) {
        if ($id) {
            $stmt = $this->conexao->prepare("SELECT COUNT(*) AS total FROM clientes WHERE email = :email AND id <> :id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
        } else {
            $stmt = $this->conexao->prepare("SELECT COUNT(*) AS total FROM clientes WHERE email = :email");
            $stmt->bindParam(':email', $email);
        }

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    // Busca os dados de um cliente pelo ID
    public function ler($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Deleta um cliente do banco de dados pelo ID
    public function deletar($id) {
        $stmt = $this->conexao->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Atualiza os IDs dos clientes após uma exclusão
    public function atualizarIds($id) {
        $stmt = $this->conexao->prepare("UPDATE clientes SET id = id - 1 WHERE id > :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Pesquisa clientes pelo termo (nome, email ou telefone)
    public function pesquisar($termo) {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE nome LIKE :termo OR email LIKE :termo OR telefone LIKE :termo");
        $termoParam = '%' . $termo . '%';
        $stmt->bindParam(':termo', $termoParam);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lista todos os clientes, opcionalmente filtrando por termo de pesquisa
    public function lerTodos($termo = '') {
        if (!empty($termo)) {
            return $this->pesquisar($termo);
        } else {
            $stmt = $this->conexao->prepare("SELECT * FROM clientes ORDER BY id ASC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

?>

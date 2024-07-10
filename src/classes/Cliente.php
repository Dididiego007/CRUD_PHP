<?php

class Cliente {
    private $conexao;

    public function __construct() {
        $this->conexao = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function getProximoId() {
        $stmt = $this->conexao->prepare("SELECT MAX(id) as max_id FROM clientes");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['max_id'] + 1;
    }

    public function criar($nome, $email, $telefone) {
        $id = $this->getProximoId();
        $stmt = $this->conexao->prepare("INSERT INTO clientes (id, nome, email, telefone) VALUES (:id, :nome, :email, :telefone)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        return $stmt->execute();
    }

    public function ler($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $email, $telefone) {
        $stmt = $this->conexao->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        return $stmt->execute();
    }

    public function deletar($id) {
        $stmt = $this->conexao->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function atualizarIds($id) {
        $stmt = $this->conexao->prepare("UPDATE clientes SET id = id - 1 WHERE id > :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function pesquisar($termo) {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE nome LIKE :termo OR email LIKE :termo OR telefone LIKE :termo");
        $termoParam = '%' . $termo . '%';
        $stmt->bindParam(':termo', $termoParam);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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
<?php

class Cliente {
    private $conexao;

    public function __construct() {
        $this->conexao = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    }

    private function getProximoId() {
        $stmt = $this->conexao->prepare("SELECT id FROM clientes ORDER BY id ASC");
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = 1;
        foreach ($clientes as $cliente) {
            if ($cliente['id'] != $id) {
                return $id;
            }
            $id++;
        }
        return $id;
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

    public function lerTodos() {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<?php
require_once 'Database.php';
require_once 'Cliente.php';

class ClienteDAO {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function create(Cliente $cliente) {
        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->execute();
    }

    public function readAll() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Cliente $cliente) {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->bindParam(':id', $cliente->getId());
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function search($search) {
        $sql = "SELECT * FROM clientes WHERE nome LIKE :search OR email LIKE :search OR telefone LIKE :search";
        $stmt = $this->db->prepare($sql);
        $search = "%$search%";
        $stmt->bindParam(':search', $search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

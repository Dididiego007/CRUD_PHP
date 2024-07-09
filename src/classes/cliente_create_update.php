<?php
require_once 'Cliente.php';

$cliente = new Cliente();

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

if ($id) {
    if ($cliente->atualizar($id, $nome, $email, $telefone)) {
        echo 'Cliente atualizado com sucesso!';
    } else {
        echo 'Erro ao atualizar cliente.';
    }
} else {
    if ($cliente->criar($nome, $email, $telefone)) {
        echo 'Cliente criado com sucesso!';
    } else {
        echo 'Erro ao criar cliente.';
    }
}
?>

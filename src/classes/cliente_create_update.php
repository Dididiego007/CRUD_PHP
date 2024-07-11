<?php
require_once 'Cliente.php';

$cliente = new Cliente();

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

if ($id) {
    $resultado = $cliente->atualizar($id, $nome, $email, $telefone);
    if ($resultado === true) {
        echo 'Cliente atualizado com sucesso!';
    } else {
        echo 'Erro ao atualizar cliente: ' . $resultado; 
    }
} else {
    $resultado = $cliente->criar($nome, $email, $telefone);
    if ($resultado === true) {
        echo 'Cliente criado com sucesso!';
    } else {
        echo 'Erro ao criar cliente: ' . $resultado; 
    }
}
?>

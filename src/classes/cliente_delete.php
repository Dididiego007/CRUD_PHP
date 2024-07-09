<?php
require_once 'Cliente.php';

$cliente = new Cliente();
$id = $_POST['id'];

if ($cliente->deletar($id)) {
    echo 'Cliente deletado com sucesso!';
} else {
    echo 'Erro ao deletar cliente.';
}
?>

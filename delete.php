<?php

include_once 'Cliente.php';

$database = new Database();
$db = $database->getConnection();

$cliente = new Cliente($db);

$cliente->id = $_POST['id'];

if($cliente->delete()) {
    echo "Cliente deletado com sucesso.";
} else {
    echo "Erro ao deletar cliente.";
}

?>

<?php
require_once 'Cliente.php';

$termo = $_GET['termo'];
$cliente = new Cliente();
$clientes = $cliente->lerTodos($termo);

echo json_encode($clientes);
?>
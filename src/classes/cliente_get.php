<?php
require_once 'Cliente.php';

$cliente = new Cliente();
$id = $_GET['id'];

$result = $cliente->ler($id);
echo json_encode($result);
?>

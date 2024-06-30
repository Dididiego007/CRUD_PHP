<?php
require_once '../classes/ClienteDAO.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$cliente = new Cliente($nome, $email, $telefone);
$cliente->setId($id);

$dao = new ClienteDAO();
$dao->update($cliente);
?>

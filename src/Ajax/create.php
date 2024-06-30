<?php
require_once '../classes/ClienteDAO.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$cliente = new Cliente($nome, $email, $telefone);
$dao = new ClienteDAO();
$dao->create($cliente);
?>

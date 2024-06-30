<?php
require_once '../classes/ClienteDAO.php';

$dao = new ClienteDAO();
$clientes = $dao->readAll();
echo json_encode($clientes);
?>

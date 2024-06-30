<?php
require_once '../classes/ClienteDAO.php';

$search = $_GET['search'];
$dao = new ClienteDAO();
$clientes = $dao->search($search);
echo json_encode($clientes);
?>

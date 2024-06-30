<?php
require_once '../classes/ClienteDAO.php';

$id = $_POST['id'];
$dao = new ClienteDAO();
$dao->delete($id);
?>

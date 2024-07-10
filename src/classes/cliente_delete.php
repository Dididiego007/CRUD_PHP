<?php
require_once 'Cliente.php';

if (isset($_POST['id'])) {
    $cliente = new Cliente();
    $id = $_POST['id'];

    if ($cliente->deletar($id)) {
        $cliente->atualizarIds($id);
        echo json_encode(['status' => 'success', 'message' => 'Cliente deletado com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar cliente.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID do cliente não foi enviado.']);
}
?>
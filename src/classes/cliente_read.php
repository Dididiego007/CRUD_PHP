<?php
require_once 'Cliente.php';

$cliente = new Cliente();
$clientes = $cliente->lerTodos();

foreach ($clientes as $cliente) {
    echo '<tr>';
    echo '<td>' . $cliente['id'] . '</td>';
    echo '<td>' . $cliente['nome'] . '</td>';
    echo '<td>' . $cliente['email'] . '</td>';
    echo '<td>' . $cliente['telefone'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-sm btn-primary editar" data-id="' . $cliente['id'] . '">Editar</button> ';
    echo '<button class="btn btn-sm btn-danger deletar" data-id="' . $cliente['id'] . '">Deletar</button>';
    echo '</td>';
    echo '</tr>';
}
?>

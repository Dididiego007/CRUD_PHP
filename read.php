<?php

include_once 'Cliente.php';

$database = new Database();
$db = $database->getConnection();

$cliente = new Cliente($db);

$stmt = $cliente->read();
$num = $stmt->rowCount();

if($num > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        echo "<tr>
                <td>{$id}</td>
                <td>{$nome}</td>
                <td>{$email}</td>
                <td>{$telefone}</td>
                <td>{$endereco}</td>
                <td>
                    <button class='delete-btn' data-id='{$id}'>Deletar</button>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum cliente encontrado.</p>";
}

?>

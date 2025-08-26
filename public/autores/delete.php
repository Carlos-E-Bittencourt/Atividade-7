<?php
include '../db.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID inválido. <a href='read.php'>Voltar</a>";
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM autores WHERE id_autor = $id";

if ($conn->query($sql) === true){
        echo "Autor excluído com sucesso.
        <a href='read.php'>Ver registros.</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
exit;
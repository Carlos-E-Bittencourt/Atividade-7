<?php

include '../db.php';

$sql = "SELECT * FROM autores";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titulo = trim($_POST['titulo']);
    $genero = trim($_POST['genero']);
    $ano = trim($_POST['publicacao']);
    $autor = trim($_POST['autores']);

    $sql = "INSERT INTO livros(titulo, genero, ano_publicacao, id_autor_fk) VALUES ('$titulo', '$genero', '$ano', '$autor')";

    if ($conn->query($sql) === true){
        echo "Registro criado com sucesso!
                <a href='read.php'>Ver registros.</a>";
    }else{
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Adicionar Livro</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a href="#" class="navbar-brand fs-2">Adicionar Livro</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título: <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="Titulo" placeholder="Título"></label>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero: <input type="text" class="form-control" id="genero" name="genero" aria-describedby="Genero" placeholder="Gênero"></label>
                </div>

                <div class="mb-3">
                    <label for="publicacao" class="form-label">Ano Publicação: <input type="number" class="form-control" id="publicacao" name="publicacao" aria-describedby="publicacao" placeholder="Publicação"></label>
                </div>

                <div class="mb-3">
                    <label for="autor" class="form-label">Autor: </label>
                    <select class="form-label" name="autores" id="autor-select">
                        <option value="" selected disabled>Selecione...</option>
                        <?php
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
                
            </form>

        </div>
    </div>
</body>
</html>
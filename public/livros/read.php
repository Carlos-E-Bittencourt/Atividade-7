<?php

include '../db.php';

$sql = "SELECT * FROM livros";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Lista de Livros</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="create.php" class="nav-item btn btn-outline-light">Adicionar Livro</a>
                <a href="../../index.php" class="nav-item btn btn-outline-light">Voltar</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Gênero</th>
                        <th>Ano Publicação</th>
                        <th>ID Autor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id_livro']; ?></td>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['genero']; ?></td>
                                <td><?php echo $row['ano_publicacao']; ?></td>
                                <td><?php echo $row['id_autor_fk']; ?></td>
                                
                                <td>
                                    <a href="update.php?id=<?php echo $row['id_livro']; ?>" class="nav-item btn btn-outline-dark">Editar Autor</a> |
                                    <a href="delete.php?id=<?php echo $row['id_livro']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-item btn btn-outline-dark">Excluir Autor</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum livro encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>



    <?php $conn->close(); ?>
</body>
</html>
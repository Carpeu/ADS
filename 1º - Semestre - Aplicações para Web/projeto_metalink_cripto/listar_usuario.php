
<?php
    session_start();  
    include 'conexao.php'; 
	
    if(isset($_GET['m'])) {  
        echo $_GET['m'];  
    }

    $conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");  

    $sql = "SELECT * FROM usuario"; 

    $resultado = mysqli_query($conexao, $sql); 

    if(!$resultado) { 
        $msgERRO = "<p> Falha ao buscar Usuario. Verifique!!</p>"; 
        $msgERRO .= mysqli_error($conexao);
        echo $msgERRO;      
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario|Listar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Usuario|Listar</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-MAIL</th>
                    <th>Password</th>
                    <th>Telefone</th>
                    <th>User</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Armazenar todos os resultados em um array
                    $resultados = [];
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $resultados[] = $row;
                    }
                    // Iterar sobre o array de resultados
                    foreach ($resultados as $resultado) :
                ?>
                    <tr>
                        <td><?php echo $resultado['idusuario']; ?></td>
                        <td><?php echo $resultado['nome']; ?></td>
                        <td><?php echo $resultado['email']; ?></td>
                        <td><?php echo $resultado['password']; ?></td>
                        <td><?php echo $resultado['telefone']; ?></td>
                        <td><?php echo $resultado['user']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Ações">
                                <a href="editar.php?id=<?php echo $resultado['idusuario']; ?>" class="btn btn-primary">Editar</a>
                                <a href="excluir.php?id=<?php echo $resultado['idusuario']; ?>" class="btn btn-danger">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-3">
            <a href="registro.php" class="btn btn-success">REGISTRAR</a>
            <a href="inicio.php" class="btn btn-primary">VOLTAR</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

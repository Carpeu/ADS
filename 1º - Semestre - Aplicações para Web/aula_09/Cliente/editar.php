
<?php
        // Obter ID do cliente
        if(isset($_GET['id']) ){
            echo $_GET['id'];
        }

        // Conectar no BD
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");

        // Criar script SQL para buscar dados do cliente
        $sql = "SELECT * FROM cliente WHERE idCliente = " . $_GET['id']; 

        // Executar SQL
        $resultado = mysqli_query($conexao, $sql);

        // Verificar resultado
        if (!$resultado) {
            $msgERRO = "<p>Falha ao buscar Produto. Verifique!</p>";
            $msgERRO .= mysqli_error($conexao);
            echo $msgERRO;
            exit();
        }

        // Obter dados do cliente
        $arResultado = mysqli_fetch_assoc($resultado);
    ?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Cliente|Editar</title>
</head> 

    <body> 
        <h3>Cliente|Editar</h3> 
         <form method="post" action="cEditar.php"> 
        ID: <input type="text" name="id_cliente" value="<?php echo $arResultado['idCliente']; ?>">
    <br> 
        Nome:
        <input type="text" name="nome_cli" value="<?php echo $arResultado["nome_cli"]; ?>">
    <br>
        Telefone: 
        <input type="text" name="telefone_cli" value= "<?php echo $arResultado["telefone_cli"];?>">
        </br> 
        
        </br> 
        <input type="submit" value="EDITAR"> 
        </form> 
    </body> 
</html> 



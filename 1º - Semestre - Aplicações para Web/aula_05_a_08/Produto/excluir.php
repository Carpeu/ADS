

<?php
   
	if(isset($_GET['id']) ){
		echo $_GET['id'];
	}

    # CONECTAR NO BD
    $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");  

    # CRIAR SCRIPT SQL
    $sql = "SELECT * FROM produto WHERE idProduto = " . $_GET['id']; 

    # EXECUTAR COMANDO SQL NO BD
    $resultado = mysqli_query($conexao, $sql); 
    
    # VERIFICAR RESULTADO
    if(! $resultado){ 
        $msgERRO = "<p> Falha ao buscar Produto. Verifique!!</p>"; 
        $msgERRO .= mysqli_error($conexao);
        echo $msgERRO;       
    }

    # CONVERTER EM VETOR
    $arResultado = mysqli_fetch_assoc($resultado); 
        
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Produto|Ecluir</title>
</head> 

    <body> 
        <h3>Produto|Excluir</h3> 
        <p>Deseja realmente excluir o produto <strong><?php echo $arResultado['nomeProduto']; ?></strong>?</p>
    <form method="post" action="cExcluir.php">
        <input type="hidden" name="id_produto" value="<?php echo $arResultado['idProduto']; ?>">
        <input type="submit" value="SIM"> &nbsp;  <!--  &nbsp; - Deixa um espaço entre as tags -->
        <button><a href="listar_prod.php">NÃO</a></button>
    </form>
    </body> 
</html> 



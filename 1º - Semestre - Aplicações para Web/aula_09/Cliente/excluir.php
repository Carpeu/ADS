

<?php
   
	if(isset($_GET['id']) ){
		echo $_GET['id'];
	}

    # CONECTAR NO BD
    $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");  

    # CRIAR SCRIPT SQL
    $sql = "SELECT * FROM cliente WHERE idCliente = " . $_GET['id']; 

    # EXECUTAR COMANDO SQL NO BD
    $resultado = mysqli_query($conexao, $sql); 
    
    # VERIFICAR RESULTADO
    if(! $resultado){ 
        $msgERRO = "<p> Falha ao buscar Cliente. Verifique!!</p>"; 
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
        <p>Deseja realmente excluir o cliente <strong><?php echo $arResultado['nome_cli']; ?></strong>?</p>
    <form method="post" action="cExcluir.php">
        <input type="hidden" name="id_cliente" value="<?php echo $arResultado['idCliente']; ?>">
        <input type="submit" value="SIM"> &nbsp;  <!--  &nbsp; - Deixa um espaço entre as tags -->
        <button><a href="listarCliente.php">NÃO</a></button>
    </form>
    </body> 
</html> 



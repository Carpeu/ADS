

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
        <form method="post" action="cCadastrar.php"> 
        Nome: 
        <input type="tetxt" name="nome_prod" value= <?php echo $arResultado['idProduto']; ?>> 
        </br> 
        Valor: 
        <input type="text" name="valor_prod" value= <?php echo $arResultado['valorUnitario'];?>> 
        </br> 
        Ativo: 
        <select name="ativo_prod" value= <?php echo $arResultado['bolAtivo'];?>> 
            <option value="XX">Selecione</option> 
            <option value="1">SIM</option> 
            <option value="2">NÂO</option> 
        </select> 
        </br> 
        <input type="submit" value="EDITAR"> 
        </form> 
    </body> 
</html> 



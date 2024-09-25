
<?php
   
	if(isset($_GET['id']) ){
		// echo $_GET['id'];
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
    
    <title>Produto|Editar</title>
</head> 

    <body> 
        <h3>Produto|Editar</h3> 
         <form method="post" action="cEditar.php"> 
         ID: <input type="text" name="id_produto" value="<?php echo $arResultado['idProduto']; ?>">
    <br> 
    Nome:
    <input type="text" name="nome_prod" value="<?php echo $arResultado['nomeProduto']; ?>">
    <br>
        Valor: 
        <input type="text" name="valor_prod" value= "<?php echo $arResultado['valorUnitario'];?>">
        </br> 
        Ativo:
    <select name="ativo_prod">
      <option value="XX">Selecione</option>
      <option value="1" <?php if ($arResultado['bolAtivo'] == 1) echo "selected"; ?>>SIM</option>
      <option value="2" <?php if ($arResultado['bolAtivo'] == 2) echo "selected"; ?>>NÃO</option>
    </select>
        </br> 
        <input type="submit" value="EDITAR"> 
        </form> 
    </body> 
</html> 



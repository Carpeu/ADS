<?php
	//echo $_GET['m'];
	
	
    #CONECTAR NO BD
	$conexao = mysqli_connect('localhost', "root", "", "loja n");
	
    #CRIAR SCRIPT SQL
	$sql = "SELECT * FROM produto";
	
    #EXECUTAR COMANDO SQL NO BD
	$resultado =  mysqli_query($conexao, $sql);
	
    #VERIFICAR RESULTADO
	if( !$resultado ){
        $msgErro = "<p>Falha ao buscar Produto. Verifique!</p>";
        $msgErro .= mysqli_error($conexao);
        echo $msgErro;
    }
	
	print_r($resultado);
	
	# CONVERTER EM VETOR
	$arResultado = mysqli_fetch_assoc($resultado);	
	echo "<pre>";
	print_r($arResultado);
	echo "</pre>";
	
	
	
	do{
		echo "<br>" . $arResultado['idProduto'];
		echo " - " . $arResultado['nome'];
		echo " - " . $arResultado['valorUnitario'];
	
	}while( $arResultado = mysqli_fetch_assoc($resultado) );
	
    #FECHAR CONEXÃO BD
	mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Produto|Listar</title>
	</head>
	<body>
		<h3>Produto|Listar</h3>
		<!-- table com os dados da tabela do BD -->
		<table border="1">
			<tr>
				<th>#</th>
				<th>PRODUTO</th>
				<th>VALOR</th>
				<th>ATIVO</th>
				<th>AÇÕES</th>
			</tr>
			
			<tr>
				<td>1</td>
				<td>Café</td>
				<td>R$ 1,50</td>
				<td>Sim</td>
				<td>xyz</td>
			</tr>
			
			<tr>
				<td>2</td>
				<td>Suco</td>
				<td>R$ 3,00</td>
				<td>Não</td>
				<td>xyz</td>
			</tr>
		</table>
	</body>
</html>
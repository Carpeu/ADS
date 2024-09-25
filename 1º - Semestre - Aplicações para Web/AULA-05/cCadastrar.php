<?php
	
	//print_r($_POST);
	
	# RECUPERAR OS DADOS DO HTML
	$prod_nome = $_POST['nome_prod'];
	$prod_valor = $_POST['valor_prod'];
	$prod_ativo = $_POST['ativo_prod'];
	
	# VALIDAR DADOS
	if($prod_nome == ""){// se o campo está vazio
		// Criar msg de erro para usuário
		$msgErro = "O campo [nome] é obrigatório.";
		// Redirecionar para a página cadastrar
		header("Location: cadastrar.php");
		exit();// parar a execução
	}
	
	if(empty($prod_valor)){// se o campo está vazio
		// Criar msg de erro
		$msgErro = "O campo [valor] precisa ser preenchido.";
		// Redirecionar para página cadastrar
		header("Location: cadastrar.php");
		exit(); //parar execução
	}
	
	if($prod_ativo == "XX"){// se o campo foi selecionado
		$msgErro = "O campo [ativo] deve ser informado.";		
		header("Location: cadastrar.php");
		exit();
	}
	
	echo "Dados preenchidos";
	
	# CONECTAR NO BD
		/*
			mysqli_connect(
				SERVIDOR,
				USUÁRIO DO BD,
				SENHAR DESTE USUÁRIO NO BD,
				NOME DO BD
			)
		*/
	$conexao = mysqli_connect("127.0.0.1","root", "", "lojan");
		
	// a conexão foi realizada?
	if($conexao){
		echo "<p>Conexão realizada com sucesso.";
	}
	
	# CRIAR SCRIPT SQL
	$sql = "INSERT INTO produto
		(nomeProduto,valorUnitario, bolAtivo) ";
	
	$sql .= " VALUES ('$prod_nome', $prod_valor, $prod_ativo);";
		
	echo "<p>SQL: " . $sql;
	
	# EXECUTAR COMANDO SQL NO BD
	/*
		mysqli_query(
			CONEXÃO,
			SQL
		)
	*/
	$resultado = mysqli_query($conexao, $sql);
	
	# VERIFICAR RESULTADO
	if($resultado){
		echo "<p>Produto cadastrado com Sucesso!";
	}else{
		$msgErro = "<p>Falha ao cadastrar Produto. Verifique!</p>";
		$msgErro .= mysqli_error($conexao);
		echo $msgErro;
	}
	
	# FECHAR CONEXÃO BD
	mysqli_close($conexao);
	

?>














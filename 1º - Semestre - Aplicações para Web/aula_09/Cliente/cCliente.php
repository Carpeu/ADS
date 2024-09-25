
<?php
	// Recuperar dados do HTML
	if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Verifica se o método de envio é POST
		$nome_cliente = $_POST['nome_cli'];  // Obtém o nome do cliente digitado no campo "nome_cli" do BD
		$telefone_cliente = $_POST['telefone_cli'];  // Obtém o telefone do cliente digitado no campo "telefone_cli" do BD
		
		$msgERRO = "";  // Inicia a variável de mensagem de erro

	// Conectar ao banco de dados
	// Define os parâmetros de conexão
	$host = "127.0.0.1";
	$usuario = "root";
	$senha = "";
	$banco = "lojan";

	$conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");  // Estabelece a conexão com o banco de dados

	// Verificar conexão
	if($conexao){//se a conexão foi realizada
        echo " - ";
    }
	// Definir variáveis para mensagens de erro
	$msgErroNome = "";  // Define a variável para armazenar a mensagem de erro do nome
	$msgErroTelefone = "";  // Define a variável para armazenar a mensagem de erro do telefone

	// Validar dados
	if (empty($nome_cliente)) { // Valida se o nome do cliente foi preenchido
		$msgErroNome = "<p>O campo 'Nome' é obrigatório.</p>"; // Se o nome não foi preenchido, define a mensagem de erro
}
	if (empty($telefone_cliente)) {  // Valida se o telefone do cliente foi preenchido
		$msgErroTelefone = "<p>O campo 'Telefone' é obrigatório.</p>";  // Se o telefone não foi preenchido, define a mensagem de erro
	}
	// Se houver erro, exibir as mensagens e parar a execução
	if (!empty($msgERRO)) {  // Verifica se há mensagens de erro
        echo $msgERRO;  // Exibe as mensagens de erro
	exit(); // Para a execução do script
	}	
	// Criar script SQL
	$sql = "INSERT INTO cliente (nome_cli, telefone_cli) VALUES ('$nome_cliente', '$telefone_cliente')"; // Cria a consulta SQL para inserir o cliente no banco de dados
	
        echo "<p>SQL: " . $sql;  // Exibe a consulta SQL para fins de depuração

	// Executar consulta para inserir dados
	$resultado = mysqli_query($conexao, $sql);  // Executa a consulta SQL

	if (!$resultado) {  // Verifica se a consulta foi bem-sucedida
		echo "<p>Falha ao cadastrar cliente: " . mysqli_error($conexao) . "</p>";  // Exibe uma mensagem de erro informando que a consulta falhou
	} else {
		echo "<p>Cliente cadastrado com sucesso!</p>";  // Exibe uma mensagem informando que o cliente foi cadastrado com sucesso
	}	
	 if ($resultado) { // Se a consulta foi bem-sucedida
        $msg = "<p> Cliente cadastrado com Sucesso!";  // Define a mensagem de sucesso
        header("Location: listarCliente.php?m=$msg");  // Redireciona para a página de listagem de clientes com a mensagem
    } else {  // Define a mensagem de erro
        $msgERRO = "<p> Falha ao cadastrar Cliente !</p>";
        $msgERRO .= mysqli_error($conexao);  // Concatena o erro da consulta à mensagem
        header("Location: clienteCadastrar.php?msg=$msgERRO");  // Redireciona para a página de cadastro com a mensagem de erro
        exit(); // Para a execução do script
    }
	// Fechar conexão com o banco de dados
	mysqli_close($conexao);
	} else {
    // Redireciona para a página cadastrar.php
    header("Location: clienteCadastrar.php");
    exit(); // Para a execução do script
	}
?>

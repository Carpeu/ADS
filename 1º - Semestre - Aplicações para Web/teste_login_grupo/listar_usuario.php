
<?php
    
    session_start();  //  Inicia a sessão do usuário no servidor.
    include 'conexao.php'; // Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.
	
	if(isset($_GET['m']) ){  // Verifica se existe uma mensagem na URL.
		echo $_GET['m'];  // Exibe a mensagem na página.
	}

    # CONECTAR NO BD
    $conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");  // Estabelece conexão com o banco de dados MySQL

    # CRIAR SCRIPT SQL
    $sql = "SELECT * FROM usuario"; // Define o script SQL para selecionar todos os produtos da tabela 'produto'

    # EXECUTAR COMANDO SQL NO BD
    $resultado = mysqli_query($conexao, $sql); // Executa o comando SQL no banco de dados
    
    # VERIFICAR RESULTADO
    if(! $resultado){ // Se houver falha na execução do comando SQL, exibe uma mensagem de erro
        $msgERRO = "<p> Falha ao buscar Usuario. Verifique!!</p>"; // Define uma mensagem de erro indicando falha ao buscar usuario e solicita que o usuário verifique
        $msgERRO .= mysqli_error($conexao);// Concatena a mensagem de erro com a mensagem de erro específica retornada pela função mysqli_error(),
        // que retorna a descrição do último erro ocorrido durante a execução da consulta SQL no banco de dados.
        echo $msgERRO; // Exibe a mensagem de erro completa na página.      
    }

    #CONVERTER EM VETOR
    $arResultado = mysqli_fetch_assoc($resultado); // Converte o resultado da consulta em um array associativo
        
?>

<!DOCTYPE html> <!-- Declaração do tipo de documento HTML -->
<html> <!-- Tag raiz que envolve todo o documento HTML -->
<head> <!-- Início da seção de cabeçalho do documento HTML -->
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres para UTF-8 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> <!-- Define as configurações de visualização para dispositivos móveis -->
    <title>Usuario|Listar</title> <!-- Define o título da página como "Produto|Listar" -->
</head> <!-- Fim da seção de cabeçalho do documento HTML -->
<body> <!-- Início do corpo do documento HTML -->
    <h2>Usuario|Listar</h2> <!-- Título da página -->
	
    <!-- Tabela com os dados da tabela do BD -->
    <table border="1"> <!-- Início da tabela com borda -->
        <tr> <!-- Início de uma linha na tabela -->
            <th>ID</th> <!-- Define o cabeçalho da coluna de identificação -->
            <th>Nome</th> <!-- Define o cabeçalho da coluna de nome do usuario -->
            <th>E-MAIL</th> <!-- Define o cabeçalho da coluna de email -->
            <th>password</th><!-- Define o cabeçalho da coluna de senha -->
            <th>telefone</th>
            <th>user</th>
            <th>AÇÔES</th>

	
        </tr> <!-- Fim da linha na tabela -->
        <?php
            // Este loop percorre cada linha do resultado da consulta e armazena os dados em um array associativo chamado $arResultado.
            while ($arResultado = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";  // Inicia uma nova linha na tabela.
                echo "<td>" . $arResultado['idusuario'] . "</td>"; // Exibe o ID do usuário na coluna
                echo "<td>" . $arResultado['nome'] . "</td>"; // Exibe o nome do usuário na coluna
                echo "<td>" . $arResultado['email'] . "</td>"; // Exibe o e-mail do usuário na coluna
                echo "<td>" . $arResultado['password'] . "</td>";
                echo "<td>" . $arResultado['telefone'] . "</td>";
                echo "<td>" . $arResultado['user'] . "</td>"; //  Exibe a senha do usuário na coluna
                echo "<td>"; // Inicia a coluna de ações.
                echo "<a href='editar.php?id=" . $arResultado['idusuario'] . "'>EDITAR</a> | "; // Cria um link para a página de edição com o ID do usuário.
                echo "<a href='excluir.php?id=" . $arResultado['idusuario'] . "'>EXCLUIR</a>"; //  Cria um link para a página de exclusão com o ID do usuário.
                echo "</td>"; // Finaliza a coluna de ações.
                echo "</tr>"; // Finaliza a linha na tabela.
              }
              ?>
    </table> <!-- Fim da tabela -->
	
    <br/><br/>
	<button><a href="registro.php">REGISTRAR</a></button>
			<br/><br/>
			
    <!-- FECHAR CONEXÃO DO BD -->
    <?php mysqli_close($conexao); ?> <!-- Fecha a conexão com o banco de dados -->
    
</body> <!-- Fim do corpo do documento HTML -->
</html> <!-- Fim da tag HTML -->

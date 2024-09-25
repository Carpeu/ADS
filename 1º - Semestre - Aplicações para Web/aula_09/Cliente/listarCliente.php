
<?php
		echo $_GET['m'];  // Exibe a mensagem passada na URL (GET)
		
        // Conectar ao banco de dados
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");  // Conexão com o banco de dados MySQL

        // Criar script SQL 
        $sql = "SELECT * FROM cliente";  // Criar script SQL para selecionar todos os clientes
		
		# Executar Comando SQL no Banco de Dados
        $resultado = mysqli_query($conexao, $sql);  // Executa o comando SQL e armazena o resultado em '$resultado'

        // Verificar resultados
        if(! $resultado){  // Verifica se a consulta foi bem-sucedida
        $msgERRO = "<p> Nenhum cliente encontrado Verifique!!</p>";  // Se não houver resultados, exibir mensagem de erro
        $msgERRO .= mysqli_error($conexao); // Adiciona detalhes do erro à mensagem
        echo $msgERRO;  // Exibe a mensagem de erro      
    }
 ?>


<!DOCTYPE html> <!-- Declaração do tipo de documento como HTML5 -->
<html lang="pt-br"> <!-- Abertura da tag HTML com especificação da linguagem como português do Brasil -->
	<head> <!-- Início do cabeçalho do documento HTML -->
		<meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 para suportar caracteres especiais -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define a viewport para responsividade em dispositivos móveis -->
		<title>Cliente|Listar</title> <!-- Define o título da página como "Cliente|Listar" -->
	</head> <!-- Fim do cabeçalho do documento HTML -->
	<body> <!-- Início do corpo do documento HTML -->
		<h3>Cliente|Listar</h3> <!-- Título da página -->
		<!-- table com os dados da tabela do BD -->
		<table border="1"> <!-- Início da tabela com borda -->
			<tr> <!-- Abre uma nova linha na tabela -->
				<th>CLIENTE</th> <!-- Define um cabeçalho de coluna para a coluna "CLIENTE" -->
				<th>NOME</th> <!-- Define um cabeçalho de coluna para a coluna "NOME" -->
				<th>TELEFONE</th> <!-- Define um cabeçalho de coluna para a coluna "TELEFONE" -->
			</tr> <!-- Fecha a linha na tabela -->

		<?php while ($arResultado = mysqli_fetch_assoc($resultado)) { // Loop para percorrer os resultados da consulta e exibir os dados na tabela
                echo "<tr>"; // Abre uma nova linha na tabela
                echo "<td>" . $arResultado["idCliente"] . "</td>"; // Exibe o ID do cliente
                echo "<td>" . $arResultado["nome_cli"] . "</td>"; // Exibe o nome do cliente
                echo "<td>" . $arResultado["telefone_cli"] . "</td>"; // Exibe o telefone do cliente
				echo "<td>";
                echo "<a href='editar.php?id=" . $arResultado['idCliente'] . "'>EDITAR</a> | ";
                echo "<a href='excluir.php?id=" . $arResultado['idCliente'] . "'>EXCLUIR</a>";
                echo "</td>";
                echo "</tr>"; // Fecha a linha na tabela
            } ?>
			
		</table> <!-- Fim da tabela -->
		<!-- Fechar conexão com o banco de dados -->
        <?php mysqli_close($conexao); ?>
		
	</body> <!-- Fim do corpo do documento HTML -->
</html> <!-- Fim da tag HTML -->

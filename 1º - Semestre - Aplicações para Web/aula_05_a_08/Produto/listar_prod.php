
<?php
    // echo $_GET['m'];  // Exibe a mensagem passada via parâmetro GET
	
	if(isset($_GET['m']) ){
		echo $_GET['m'];
	}

    # CONECTAR NO BD
    $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");  // Estabelece conexão com o banco de dados MySQL

    # CRIAR SCRIPT SQL
    $sql = "SELECT * FROM produto"; // Define o script SQL para selecionar todos os produtos da tabela 'produto'

    # EXECUTAR COMANDO SQL NO BD
    $resultado = mysqli_query($conexao, $sql); // Executa o comando SQL no banco de dados
    
    # VERIFICAR RESULTADO
    if(! $resultado){ // Se houver falha na execução do comando SQL, exibe uma mensagem de erro
        $msgERRO = "<p> Falha ao buscar Produto. Verifique!!</p>"; // Define uma mensagem de erro indicando falha ao buscar produtos e solicita que o usuário verifique
        $msgERRO .= mysqli_error($conexao);// Concatena a mensagem de erro com a mensagem de erro específica retornada pela função mysqli_error(),
        // que retorna a descrição do último erro ocorrido durante a execução da consulta SQL no banco de dados.
        echo $msgERRO; // Exibe a mensagem de erro completa na página.      
    }

    //print_r ($resultado);  // Imprime o resultado da consulta (apenas para debug)

    #CONVERTER EM VETOR
    $arResultado = mysqli_fetch_assoc($resultado); // Converte o resultado da consulta em um array associativo
    // echo "<pre>"; // Exibe a tag <pre>, que define um texto pré-formatado, mantendo espaçamentos e quebras de linha
   // print_r($arResultado); // Imprime o conteúdo do array $arResultado de forma formatada para fácil visualização.
    // echo "</pre>";// Exibe a tag de fechamento </pre>, indicando o fim do bloco de texto pré-formatado.

    // for ($i = 0; $i<7; $i++){ echo "<br>" . $i;}

    // $y = 0; while($y < 7){ echo "<br>" . $y; $y++;}
       
?>

<!DOCTYPE html> <!-- Declaração do tipo de documento HTML -->
<html> <!-- Tag raiz que envolve todo o documento HTML -->
<head> <!-- Início da seção de cabeçalho do documento HTML -->
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres para UTF-8 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> <!-- Define as configurações de visualização para dispositivos móveis -->
    <title>Produto|Listar</title> <!-- Define o título da página como "Produto|Listar" -->
</head> <!-- Fim da seção de cabeçalho do documento HTML -->
<body> <!-- Início do corpo do documento HTML -->
    <h2>Produto|Listar</h2> <!-- Título da página -->
	
    <!-- Tabela com os dados da tabela do BD -->
    <table border="1"> <!-- Início da tabela com borda -->
        <tr> <!-- Início de uma linha na tabela -->
            <th>#</th> <!-- Define o cabeçalho da coluna de identificação -->
            <th>PRODUTO</th> <!-- Define o cabeçalho da coluna de nome do produto -->
            <th>VALOR</th> <!-- Define o cabeçalho da coluna de valor do produto -->
            <th>ATIVO</th> <!-- Define o cabeçalho da coluna de status ativo do produto -->
            <th>AÇÔES</th>
	
        </tr> <!-- Fim da linha na tabela -->
        <?php
            // Loop para percorrer os resultados da consulta e exibir os dados na tabela
            while ($arResultado = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $arResultado['idProduto'] . "</td>";
                echo "<td>" . $arResultado['nomeProduto'] . "</td>";
                echo "<td>" . $arResultado['valorUnitario'] . "</td>";
                echo "<td>" . $arResultado['bolAtivo'] . "</td>";
                echo "<td>";
                echo "<a href='editar.php?id=" . $arResultado['idProduto'] . "'>EDITAR</a> | ";
                echo "<a href='excluir.php?id=" . $arResultado['idProduto'] . "'>EXCLUIR</a>";
                echo "</td>";
                echo "</tr>";
              }
              ?>
    </table> <!-- Fim da tabela -->
	
    <br/><br/>
	<button><a href="cadastrar.php">CADASTRAR</a></button>
			<br/><br/>
			
    <!-- FECHAR CONEXÃO DO BD -->
    <?php mysqli_close($conexao); ?> <!-- Fecha a conexão com o banco de dados -->
    
</body> <!-- Fim do corpo do documento HTML -->
</html> <!-- Fim da tag HTML -->

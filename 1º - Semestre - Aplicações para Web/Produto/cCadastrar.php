
<?php
    // print_r ($_POST); 
    
    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Recupera os dados enviados via método POST
        $prod_nome = $_POST['nome_prod'];  // Recupera o nome do produto
        $prod_valor = $_POST['valor_prod'];  // Recupera o valor do produto
        $prod_ativo = $_POST['ativo_prod'];  // Recupera o status de ativo do produto

        $msgERRO = ""; // Variavel mensagem de erro

    # VALIDAR DADOS
   if ($prod_nome == "") { // Se o campo está vazio
        $msgERRO .= "O campo nome é obrigatório.<br>";  // Adiciona uma mensagem de erro caso o campo 'Nome'esteja vazio
    }

    if (empty($prod_valor)) { // Se o campo está vazio
        $msgERRO .= "O campo valor precisa ser preenchido.<br>"; // Adiciona uma mensagem de erro caso o campo 'Valor' esteja vazio
    }

    if ($prod_ativo == "XX") { // Se o campo foi selecionado
        $msgERRO .= "O campo [ativo] deve ser informado.<br>"; // Adiciona uma mensagem de erro caso o campo 'Ativo'não tenha sido selecionado
    }

    // Se houver erro, exibe a mensagem de erro na própria página cadastrar.php
    if (!empty($msgERRO)) {
        echo $msgERRO;  // Exibe a mensagem de erro na tela
        exit(); // Encerra a execução do script
    }
            echo "Dados preenchidos";  // Mensagem para indicar que os dados foram preenchidos corretamente

    # CONECTAR NO BD
        /* 
            mysqli_connect(
                SERVIDOR,
                USUARIO DO BD,
                SENHA DESTE USUARIO DO BD,
                NOME DO BD
            )
        */
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); // Realiza a conexão com o banco de dados
        // echo "<pre>: ";
        // print_r ($conexao);
        // echo "</pre>: ";

        // conexão realizada ?
        if($conexao){//se a conexão foi realizada
        echo "<p>Conexão realizado comsucesso."; // Exibe mensagem de sucesso
    }

    # CRIAR SCRIPT SQL
        $sql = "INSERT INTO produto (nomeProduto, valorUnitario, bolAtivo) ";  // Define o script SQL para inserção de um novo produto na tabela 'produto'
        // VALUES (1, 'Prodto X', 5.36, true);";
        $sql .= "VALUES ('$prod_nome', $prod_valor, $prod_ativo);"; // Concatena os valores dos campos da tabela produto no script SQL
        
        echo "<p>SQL: " . $sql;  // Exibe o script SQL na tela

    # EXECUTAR COMANDO SQL NO BD
        /*
            mysqli_query(
                CONEXÃO,
                SQL
            )
        */
       $resultado = mysqli_query ($conexao, $sql);  // Executa o comando SQL no banco de dados

    # VERIFICAR RESULTADO
        if ($resultado) {  // Se a operação foi bem-sucedida
        $msg = "<p> Produto cadastrado com Sucesso!"; // Exibe uma mensagem de sucesso
        header("Location: listar_prod.php?m=$msg"); // Redireciona para a página de listar com uma mensagem de sucesso
    } else { // Se a operação falhou
        $msgERRO = "<p> Falha ao cadastrar Produto. Verifique!!</p>"; // Exibe uma mensagem de erro
        $msgERRO .= mysqli_error($conexao); // Adiciona a mensagem de erro do MySQL
        header("Location: cadastrar.php?msg=$msgERRO"); // Redireciona para a página de cadastro com a mensagem de erro
        exit(); // Para a execução do script
    }

    // Fechar conexão BD
    mysqli_close($conexao);
} else {
    // Redireciona para a página cadastrar.php
    header("Location: cadastrar.php");
    exit(); // Para a execução do script
}
?>
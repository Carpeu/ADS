
<?php
    // print_r ($_POST);
    
    # RECUPERAR OS DADOS DO HTML
    $cli_nome = $_POST['nome_cli'];
    $cli_telefone = $_POST['telefone_cli'];
    $cli_ativo = $_POST['ativo_cli'];

    # VALIDAR DADOS
    if($cli_nome == ""){ // se o campo está vazio
        // Cria mensagem de erro para o usuário
        $msgERRO = "O campo [nome] é obrigatório.";
        // Redirecionar para página cadastrar
        header("Location: cadastrar.php");
        exit(); // para a execução
    }

    if(empty ($cli_telefone)){ // se o campo está vazio
        // Criar mensagem de ERRO
        $msgERRO = "O campo [valor] precisa ser preenchido.";
        // Redirecionar para página cadastrar
        header("Location: cadastrar.php");
        exit(); // para a execução
    }

    if($cli_ativo == "XX"){ // se o campo foi selecionado
        $msgERRO = "O campo [ativo] deve ser informado.";
        // Redirecionar para página cadastrar
        header("Location: cadastrar.php");
        exit(); // para a execução
    }
        
    echo "Dados preenchidos";

    # CONECTAR NO BD
        /* 
            mysqli_connect(
                SERVIDOR,
                USUARIO DO BD,
                SENHA DESTE USUARIO DO BD,
                NOME DO BD
            )
        */
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan");
        // echo "<pre>: ";
        // print_r ($conexao);
        // echo "</pre>: ";

        // conexão realizada ?
        if($conexao){ 
            echo "<p> Conecxão realizada com sucesso.";

        }

    # CRIAR SCRIPT SQL
        $sql = "INSERT INTO produto (nomeCliente, telefoneCli, bolAtivo) ";  
        // VALUES (1, 'Prodto X', 5.36, true);";
        $sql .= "VALUES ('$cli_nome', $cli_telefone, $cli_ativo);";
        
        echo "<p>SQL: " . $sql;

    # EXECUTAR COMANDO SQL NO BD
        /*
            mysqli_query(
                CONEXÃO,
                SQL
            )
        */
       $resultado = mysqli_query ($conexao, $sql);

    # VERIFICAR RESULTADO
        if($resultado){
            echo "<p> Produto cadastrado com Sucesso!!";           
        } 
        else{
            // echo "<p> Falha ao cadastrar Produto. Verifique!!";
            $msgERRO = "<p> Falha ao cadastrar Produto. Verifique!!</p>";
            $msgERRO .= mysqli_error($conexao);
        }

    #FECHAR CONEXÂO BD
        mysqli_close($conexao);

    
    
    
?>
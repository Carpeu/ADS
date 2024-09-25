<?php 
    //print_r($_POST);
# RECUPERAR OS DADOS DO HTML
    $prod_nome = $_POST['nome_prod'];
    $prod_valor = $_POST['valor_prod'];
    $prod_ativo = $_POST['ativo_prod'];

# VALIDAR DADOS
    if($prod_nome == ""){//se o campo está vazio
        // Cria msg de erro
        $msgErro = "O campo [nome] é obrigatório.";
        //redirecionar para a página cadastrar
        header("Location: cadastrar.php");
        exit(); //para a execução
    }

    if(empty ($prod_valor)){ //se o campo está vazio
        // Cria msg de erro
        $msgErro = "O campo [valor] precisa ser preenchido.";
        //redirecionar para a página cadastrar
        header("Location: cadastrar.php");
        exit(); //para a execução
    }

    if($prod_ativo == "XX"){//se o campo está vazio
        $msgErro = "O campo [ativo] deve ser informado.";
        //redirecionar para a página cadastrar
        header("Location: cadastrar.php");
        exit(); //para a execução
    }

    echo "Dados preenchidos";
#CONECTAR NO BD
    /*
        mysqli_connect( //TEM 4 PARAMETROS
            SERVIDOR //PODE DER POR DOMINIO OU IP,
            USUÁRIO,
            SENHA DESTE USUÁRIO NO BD,
            NOME DO BD
        )
    */

    $conexao = mysqli_connect('localhost', "root", "", "loja n");

    //echo "<pre>YYY: ";
    //print_r($conexao);
    //echo "</pre>";

    if($conexao){//se a conexão foi realizada
        echo "<p>Conexão realizado comsucesso.";
    }

#CRIAR SCRIPT SQL
    $sql = "INSERT INTO produto (nome, valorUnitario, ativo) VALUES('$prod_nome', $prod_valor, $prod_ativo);";

    echo "<p>SQL: " . $sql;

#EXECUTAR COMANDO SQL NO BD
    /*
    mysqli_query(
        CONEXÃO,
        SQL
    )
    */
    $resultado =  mysqli_query($conexao, $sql);

#VERIFICAR RESULTADO
    if($resultado){
        $msg = "<p>Produto cadastrado com Sucesso.</p>";
		header("Location: listar_prod.php?m=$msg");
		exit();
    }else{
        $msgErro = "<p>Falha ao cadastrar Produto. Verifique!</p>";
        $msgErro .= mysqli_error($conexao);
        echo $msgErro;
    }
    
#FECHAR CONEXÃO BD
mysqli_close($conexao);


/* 
    etapas
    # RECUPERAR OS DADOS DO HTML
    # VALIDAR DADOS
    #CONECTAR NO BD
    #CRIAR SCRIPT SQL
    #EXECUTAR COMANDO SQL NO BD
    #VERIFICAR RESULTADO
    #FECHAR CONEXÃO BD
    
*/
?>
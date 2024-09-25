<?php
    
    session_start(); 


    print_r($_POST);
    print_r($_SESSION);



    # RECUOERAR OS DADOS DO HTML
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];
    $bolAtivo = $_POST['bolAtivo'];
    $user = $_GET['idusuario'];
    
    
    # VALIDAR DADOS
    if($titulo == "") { // se o campo está vazio
        $msgErro = "O campo titulo é obrigatório."; //criar a mesagem de erro para usuário
        header("Location: links.php "); // Redirecionar para a página cadastrar
        exit(); // para a execução
    }

    if($link == ""){ // se o campo foi selecionado
        $msgErro = "O campo url deve ser informado.";
        header("Location: links.php"); // Redirecionar para a página cadastrar
        exit(); // para a execução
        echo $msgErro;
       
    }

    if($bolAtivo == "XX"){ // se o campo foi selecionado
        $msgErro = "O campo [ativo] deve ser informado.";
        header("Location: links.php"); // Redirecionar para a página cadastrar
        exit(); // para a execução
        echo $msgErro;
       
    }

   

    echo "Dados Preenchidos";
    # CONECTAR NO BD
    $conexao = mysqli_connect("127.0.0.1","root", "", "metalink");
    if($conexao){
        echo "<p> Conexão realizada com sucesso.";
    }
    
   
    # CRIAR SCRIPT SQL

    $sql = "INSERT INTO links (titulo, link, bolAtivo, Usuario_idUsuario) ";
    $sql .= "VALUES ($titulo, $link, $bolAtivo, $user)";



    echo "<p>SQL: . $sql";

    exit;



    # EXECUTAR COMANDO SQL NO BD
    $resultado = mysqli_query($conexao, $sql);
    # VERIFICAR RESULTADO
    if($resultado){
        $msg = "<p>Link cadastrado com sucesso!";
        header("Location: links.php?m=$msg");
        exit();
    } else {
       $msgErro = "<p>Falha ao cadastrar  Link. Verifique!</p>";
       $msgErro .= mysqli_error($conexao);
       echo $msgErro;
    }
    # FECHAR CONEXÃO BD
    mysqli_close($conexao);
?>

<?php
    
    session_start();

    if (empty($_POST)) {
        header("Location: editar.php?id=" . $_GET['id']);
        exit();
    }

    // Definir variáveis de mensagem
        $msg = "";
        $msgERRO = "";

    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $prod_nome = $_POST['nome_prod'];  
        $prod_valor = $_POST['valor_prod'];  
        $prod_ativo = $_POST['ativo_prod'];  
        $idProduto = $_POST['id_produto'];

    # CONECTAR NO BD
        
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); 

    # CRIAR SCRIPT SQL
        
        $sql = "UPDATE produto SET nomeProduto ='$prod_nome', valorUnitario ='$prod_valor', bolAtivo ='$prod_ativo' WHERE idProduto ='$id_produto'";  
       
        echo "<p>SQL: " . $sql;  

    # EXECUTAR COMANDO SQL NO BD
    
       $resultado = mysqli_query ($conexao, $sql);  

    # VERIFICAR RESULTADO
        if ($resultado) {  
        header("Location: listar_prod.php?m=$msg"); 
    } else { // Se a operação falhou
        $msgERRO .= mysqli_error($conexao); 
        header("Location: editar.php?msg=$msgERRO"); 
        exit(); // Para a execução do script
    }

    // Fechar conexão BD
    mysqli_close($conexao);

    exit(); // Para a execução do script
}
?>
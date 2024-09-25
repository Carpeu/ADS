
<?php
    
    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $prod_nome = $_POST['nome_prod'];  
        $prod_valor = $_POST['valor_prod'];  
        $prod_ativo = $_POST['ativo_prod'];  

        $msgERRO = ""; 

    # VALIDAR DADOS
   if ($prod_nome == "") { 
        $msgERRO .= "O campo nome é obrigatório.<br>";  
    }

    if (empty($prod_valor)) { 
        $msgERRO .= "O campo valor precisa ser preenchido.<br>"; 
    }

    if ($prod_ativo == "XX") { 
        $msgERRO .= "O campo [ativo] deve ser informado.<br>"; 
    }

    
    if (!empty($msgERRO)) {
        echo $msgERRO;  
        exit(); 
    }
            echo "Dados preenchidos";  

    # CONECTAR NO BD
        
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); 
        
        // conexão realizada ?
        if($conexao){
        echo "<p>Conexão realizado comsucesso."; 
    }

    # CRIAR SCRIPT SQL
        $sql = "UPDATE produto SET (nomeProduto, valorUnitario, bolAtivo) ";  
       
        $sql .= "VALUES ('$prod_nome', $prod_valor, $prod_ativo);"; 
        
        echo "<p>SQL: " . $sql;  

    # EXECUTAR COMANDO SQL NO BD
    
       $resultado = mysqli_query ($conexao, $sql);  

    # VERIFICAR RESULTADO
        if ($resultado) {  
        $msg = "<p> Produto cadastrado com Sucesso!"; 
        header("Location: listar_prod.php?m=$msg"); 
    } else { // Se a operação falhou
        $msgERRO = "<p> Falha ao cadastrar Produto. Verifique!!</p>"; 
        $msgERRO .= mysqli_error($conexao); 
        header("Location: editar.php?msg=$msgERRO"); 
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
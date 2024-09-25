


<?php
    
    // Obter ID do produto
    if (empty($_POST)) {
        header("Location: excluir.php?id=" . $_GET['id']);
        exit();
    }

    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $idProduto = $_POST['id_produto'];  

        $msgERRO = ""; 

    # CONECTAR NO BD
        
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); 
        
        // conexão realizada ?
        if($conexao){
        echo "<p>Conexão realizado comsucesso."; 
    }

    # CRIAR SCRIPT SQL
        $sql = "DELETE FROM produto WHERE idProduto = $idProduto";
        
        echo "<p>SQL: " . $sql;  

    # EXECUTAR COMANDO SQL NO BD
    
       $resultado = mysqli_query ($conexao, $sql);  

    # VERIFICAR RESULTADO
        if ($resultado) {  
        header("Location: listar_prod.php?m=$msg"); 
    } else { // Se a operação falhou
        $msgERRO .= mysqli_error($conexao); 
        header("Location: listar_prod.php?msg=$msgERRO"); 
        exit(); // Para a execução do script
    }

    // Fechar conexão BD
    mysqli_close($conexao);
    exit(); // Para a execução do script
}
?>
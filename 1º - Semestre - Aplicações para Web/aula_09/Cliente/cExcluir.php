


<?php
    
    // Obter ID do produto
    if (empty($_POST)) {
        header("Location: excluir.php?id=" . $_GET['id']);
        exit();
    }

    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id_cliente = $_POST['id_Cliente'];  

        $msgERRO = ""; 

    # CONECTAR NO BD
        
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); 
        
        // conexão realizada ?
        if($conexao){
        echo "<p>Conexão realizado comsucesso."; 
    }

    # CRIAR SCRIPT SQL
        $sql = "DELETE FROM cliente WHERE id_Cliente = ?";
        
        echo "<p>SQL: " . $sql; 
        
    # Associar parâmetros (se usar prepare)
            if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id_cliente); // 'i' indica inteiro
  }

    # EXECUTAR COMANDO SQL NO BD
    
       $resultado = mysqli_stmt_execute($stmt);  

    # VERIFICAR RESULTADO
        if ($resultado) {   
            $msg = "Cliente excluído com sucesso!";
        header("Location: listarCliente.php?m=$msg"); 
    } else { // Se a operação falhou
        $msgERRO .= mysqli_error($conexao); 
        header("Location: listarCliente.php?msg=$msgERRO"); 
        exit(); // Para a execução do script
    }

    // Fechar conexão BD
    mysqli_close($conexao);
    exit(); // Para a execução do script
}
?>
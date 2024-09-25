
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
        $nome_cliente = $_POST['nome_cli']; 
        $telefone_cliente = $_POST['telefone_cli'];
        $id_cliente = $_POST['id_Cliente']; 


    # CONECTAR NO BD
        
        $conexao = mysqli_connect("127.0.0.1", "root", "", "lojan"); 

    # CRIAR SCRIPT SQL
        
        $sql = "UPDATE cliente SET nome_cli = ?, telefone_cli = ? WHERE idCliente = ?"; 
       
        echo "<p>SQL: " . $sql;  

        // Preparar consulta
            $stmt = mysqli_prepare($conexao, $sql);

        // Associar variáveis aos parâmetros
            mysqli_stmt_bind_param($stmt, "sss", $nome_cliente, $telefone_cliente, $id_cliente);

    # EXECUTAR COMANDO SQL NO BD
    
    $resultado = mysqli_stmt_execute($stmt);  

    # VERIFICAR RESULTADO
        if ($resultado) {  
        header("Location: listarCliente.php?m=$msg"); 
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

<?php
    
    session_start();  //  Inicia a sessão do usuário no servidor.
    include 'conexao.php'; // Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.

    // Se não houver dados no POST, redireciona para a página editar.php com o ID na URL
    if (empty($_POST)) { // Verifica se o array $_POST está vazio. Se estiver, significa que a página foi acessada diretamente e não via formulário.
        header("Location: editar.php?id=" . $_GET['id']); // Redireciona para a página editar.php com o ID do usuário na URL.
        exit(); // Encerra o script
    }

    // Definir variáveis de mensagem
        $msg = ""; // Variável para armazenar a mensagem de sucesso.
        $msgERRO = ""; // Variável para armazenar a mensagem de erro.

    # RECUPERAR OS DADOS DO HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  //  Verifica se o método de requisição é POST.
        $nome = $_POST['nome'];  
        $email = $_POST['email'];  
        $password = $_POST['password'];  
        $id_cliente = $_POST['idusuario'];
        $user = $_POST['user'];
        $telefone = $_POST['telefone'];

    // Verificar se o ID foi recebido
        if (!$id_cliente) {
        header("Location: editar.php?msg=Erro: ID do usuário não informado!");
        exit();
        }
    
    # CRIAR SCRIPT SQL  
        $sql = "UPDATE usuario SET nome ='$nome', email ='$email', password ='$password', telefone ='$telefone', user ='$user' WHERE idusuario ='$idusuario'";   
        // Cria o script SQL para atualizar o usuário com os dados do formulário.

    # EXECUTAR COMANDO SQL NO BD
    
       $resultado = mysqli_query ($conexao, $sql);  //Executa o script SQL no banco de dados usando a função `mysqli_query

    # VERIFICAR RESULTADO
        if ($resultado) {  // Verifica se a consulta foi bem sucedida.
        header("Location: listar_usuario.php?m=$msg"); // Redireciona para a página listar_usuario.php com a mensagem de sucesso na variável $msg.
    } else { // Se a operação falhou
        $msgERRO .= mysqli_error($conexao); // Adiciona a mensagem de erro do MySQL à variável $msgERRO.
        header("Location: editar.php?msg=$msgERRO"); // Redireciona para a página editar.php com a mensagem de erro na variável $msgERRO.
        exit(); // Para a execução do script
    }

    // Fechar conexão BD
    mysqli_close($conexao);

    exit(); // Para a execução do script
}
?>

<?php
       session_start();  //  Inicia a sessão do usuário no servidor.
       include 'conexao.php'; // Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.
        
        // Verifica se o ID do usuário está presente na URL via GET
        if(isset($_GET['id']) ){  // Exibe o valor da variável 'id'
            $id_cliente = $_GET['id']; // Armazena o ID recebido via GET
        }

        // Conectar no BD
        $conexao = mysqli_connect("127.0.0.1", "root", "", "metalink"); // necta ao banco de dados usando a função mysqli_connect.

        // Criar script SQL para buscar dados do usuario
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE idusuario = ?"); // Cria o script SQL para buscar o usuário com o ID especificado.

        // Vincular o valor do ID ao placeholder
        $stmt->bind_param("i", $id_cliente); // Vincula o valor da variável $id_cliente ao placeholder ? no script SQL.
        //  $stmt - Essa variável armazena a consulta SQL preparada.
        // Executar a consulta
        $stmt->execute();

        // Obter o resultado da consulta
        $resultado = $stmt->get_result(); // Obtém o resultado da consulta como um objeto.

        

        // Verificar resultado
        if (!$resultado) { // Exibe uma mensagem de erro
            $msgERRO = "<p>Falha ao buscar Usuario. Verifique!</p>"; // Adiciona o erro específico do MySQL à mensagem
            $msgERRO .= mysqli_error($conexao); // Exibe a mensagem de erro e interrompe o script
            echo $msgERRO;
            exit();
        }

        // Obter dados do usuario
        $arResultado = mysqli_fetch_assoc($resultado); // Converte o resultado da consulta em um array associativo e armazena os dados do usuário.
    ?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Usuario|Editar</title>
</head> 

    <body> 
        <h3>Usuario|Editar</h3> 
         <form method="post" action="cEditar.php"> <!-- Método POST envia os dados para cEditar.php para processamento -->
        ID: 
        <input type="text" name="idusuario" value="<?php echo $arResultado['idusuario']; ?>"> <!-- Mostra o ID do usuário -->
    <br> 
        Nome:
        <input type="text" name="nome" value="<?php echo $arResultado['nome']; ?>"> <!-- Mostra o nome do usuário -->
    <br>
        E-mail: 
        <input type="text" name="email" value= "<?php echo $arResultado['email'];?>"> <!-- Mostra o e-mail do usuário -->
        </br> 
        Senha:
        <input type="text" name="password" value="<?php echo $arResultado['password']; ?>"> <!-- Mostra a senha do usuário -->
    <br>
        </br> 
        user:
        <input type="text" name="user" value="<?php echo $arResultado['user']; ?>"> <!-- Mostra a senha do usuário -->
    <br>
        </br> 
        telefone:
        <input type="number" name="telefone" value="<?php echo $arResultado['telefone']; ?>"> <!-- Mostra a senha do usuário -->
    <br>
       
        <input type="submit" value="EDITAR"> 
        </form> 
    </body> 
</html> 

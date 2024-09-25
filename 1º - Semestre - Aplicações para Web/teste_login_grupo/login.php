
<!DOCTYPE html>
<!-- Define o tipo de documento como HTML5. -->
<html lang="pt-br">
<!-- Define o idioma padrão da página como português do Brasil. -->

<head>
    <!-- Início da seção de cabeçalho da página. -->
    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres UTF-8 para garantir o suporte a caracteres especiais. -->
    <title>Login</title>
    <!-- Define o título da página exibido na aba do navegador. -->
</head>
<!-- Fim da seção de cabeçalho da página. -->
<body>
    <!-- Início do corpo da página. -->
    <h2>Login</h2>
    <!-- Exibe um título. -->

     <!-- Início do formulário. Quando enviado, os dados serão processados por verificar_login.php via método POST. -->
    <form action="verificar_login.php" method="post">
        <!-- Campo de entrada para o email do usuário, requerido para preenchimento e validado como um endereço de email. -->
        Email: <input type="email" name="email" required><br>
        <!-- Campo de entrada para a senha do usuário, requerido para preenchimento e oculta os caracteres digitados. -->
        Senha: <input type="password" name="password" required><br>
       
        <input type="submit" value="Entrar"> <!-- Botão de envio do formulário, com o texto "Entrar". -->
        
    </form>
    <!-- Fim do formulário. -->
</body>
<!-- Fim do corpo da página. -->
</html>
<!-- Fim do documento HTML. -->




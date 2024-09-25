
<!DOCTYPE html>
<!-- Define o tipo de documento como HTML5. -->
<html lang="pt-br">
<!-- Define o idioma padrão da página como português do Brasil. -->

<head>
    <!-- Início da seção de cabeçalho da página. -->

    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres UTF-8 para garantir o suporte a caracteres especiais. -->

    <title>Cadastro de Usuário METALINK</title>
    <!-- Define o título da página exibido na aba do navegador. -->

</head>
<!-- Fim da seção de cabeçalho da página. -->

<body>
    <!-- Início do corpo da página. -->

    <h2>Cadastro de Usuário</h2>
    <!-- Exibe um título -->

    <form action="salvar_usuario.php" method="post">
        <!-- Início do formulário. Quando enviado, os dados serão processados por salvar_usuario.php via método POST. -->

        User: <input type="text" name="user" required><br>
        <!-- Campo de entrada para a senha do usuário, requerido para preenchimento e oculta os caracteres digitados. -->

        Nome: <input type="text" name="nome" required><br>
        <!-- Campo de entrada para o nome do usuário, requerido para preenchimento. -->

        Email: <input type="email" name="email" required><br>
        <!-- Campo de entrada para o email do usuário, requerido para preenchimento e validado como um endereço de email. -->

        Senha: <input type="password" name="password" required><br>
        <!-- Campo de entrada para a senha do usuário, requerido para preenchimento e oculta os caracteres digitados. -->

        telefone: <input type="number" name="telefone" required><br>
        <!-- Campo de entrada para a senha do usuário, requerido para preenchimento e oculta os caracteres digitados. -->

        <input type="submit" value="Cadastrar">
        <!-- Botão de envio do formulário, com o texto "Cadastrar". -->

    </form>
    <!-- Fim do formulário -->
    <?php
        if (isset($_GET['m'])) {
        echo "<p>{$_GET['m']}</p>";
    }
    ?>
</body>
<!-- Fim do corpo da página. -->

</html>
<!-- Fim do documento HTML. -->


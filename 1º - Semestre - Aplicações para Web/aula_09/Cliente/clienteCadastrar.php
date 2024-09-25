

<!DOCTYPE html> <!-- Declaração do tipo de documento como HTML5 -->
<html lang="pt-br"> <!-- Abertura da tag HTML com especificação da linguagem como português do Brasil -->
<head> <!-- Início do cabeçalho do documento HTML -->
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 para suportar caracteres especiais -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define a viewport para responsividade em dispositivos móveis -->
    <title>Cadastrar</title> <!-- Define o título da página como "Cadastrar" -->
</head> <!-- Fim do cabeçalho do documento HTML -->
<body> <!-- Início do corpo do documento HTML -->
    <h3>Cliente|Cadastrar</h3> <!-- Título da página -->
    <!-- Início do formulário. Quando enviado, os dados serão processados por salvar_usuario.php via método POST. -->
    <form method="post" action="cCliente.php"> <!-- Início do formulário HTML com método POST e ação direcionada para "cCliente.php" para processamento dos dados -->
        <!-- Campo de entrada para o nome do cliente -->
        Nome:
        <input type="text"  name="nome_cli"> <!-- Campo de entrada para o nome do cliente -->
        <br/> <!-- Quebra de linha -->
        <!-- Campo de entrada para o telefone do cliente -->
        Telefone:
        <input  type="text" name="telefone_cli"> <!-- Campo de entrada para o telefone do cliente -->
        <br/> <!-- Quebra de linha -->
        <!-- Botão para enviar o formulário -->
        <input  type="submit" value="CADASTRAR"/> <!-- Botão de envio do formulário com rótulo "CADASTRAR" -->
    </form> <!-- Fim do formulário HTML -->
</body> <!-- Fim do corpo do documento HTML -->
</html> <!-- Fim da tag HTML -->

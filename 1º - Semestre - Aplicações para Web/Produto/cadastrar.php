
<!DOCTYPE html> <!-- Declaração do tipo de documento HTML -->
<html lang="pt-br"> <!-- Abertura da tag HTML com especificação do idioma -->
<head> <!-- Início do cabeçalho do documento HTML -->
    <meta charset="UTF-8"> <!-- Meta tag para definir o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag para configuração de visualização em dispositivos móveis -->
    
    <title>Produto|Cadastrar</title> <!-- Define o título da página como "Produto|Cadastrar" -->
</head> <!-- Fim do cabeçalho do documento HTML -->

<body> <!-- Início do corpo do documento HTML -->
    <h3>Produto|Cadastrar</h3> <!-- Título da página -->
    <form method="post" action="cCadastrar.php"> <!-- Início do formulário com método de envio POST e ação para "cCadastrar.php" -->
        Nome: <!-- Campo de entrada para o nome do produto -->
        <input type="tetxt" name="nome_prod"> <!-- Campo de texto para inserir o nome do produto -->

        </br> <!-- Quebra de linha -->

        Valor: <!-- Campo de entrada para o valor do produto -->
        <input type="text" name="valor_prod"> <!-- Campo de texto para inserir o valor do produto -->

        </br> <!-- Quebra de linha -->

        Ativo: <!-- Campo de seleção para indicar se o produto está ativo ou não -->
        <select name="ativo_prod"> <!-- Menu suspenso para selecionar a opção de ativo ou inativo -->
            <option value="XX">Selecione</option> <!-- Opção padrão para seleção -->
            <option value="1">SIM</option> <!-- Opção para indicar que o produto está ativo -->
            <option value="2">NÂO</option> <!-- Opção para indicar que o produto está inativo -->
        </select> <!-- Fim do menu suspenso -->

        </br> <!-- Quebra de linha -->

        <input type="submit" value="CADASTRAR"> <!-- Botão de envio do formulário com valor "CADASTRAR" -->
    </form> <!-- Fim do formulário -->
</body> <!-- Fim do corpo do documento HTML -->
</html> <!-- Fim da tag HTML -->



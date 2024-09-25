<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <h3>Produto|Cadastrar</h3>
    <form method="post" action="cCadastrar.php">
        Nome:
        <input type="text"  name="nome_prod">
        <br/>
        Valor:
        <input  type="text" name="valor_prod">
        <br/>
        Ativo:
        <select name="ativo_prod">
            <option value="XX">Selecione</option>
            <option value="1">SIM</option>
            <option value="0">NÃO</option>
        </select>
        <br/>
        <input  type="submit" value="CADASTRAR"/>
    </form>
</body>
</html>
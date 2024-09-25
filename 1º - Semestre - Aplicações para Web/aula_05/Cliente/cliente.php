
<html>
    <head>
        <title>Cliente|Cadastrar</title>
    </head>
    
    <body>
        <h3>Cliente|Cadastrar</h3>
        <form method="post" action="cCliente.php">
            Nome:
            <input type="tetxt" name="nome_cli">
        </br>
            Telefone:
            <input type="text" name="telefone_cli">
        </br>    
            Ativo:
            <select name="ativo_cli">
                <option value="XX">Selecione</option>
                <option value="1">SIM</option>
                <option value="2">NÂO</option>
            </select>
        </br>
            <input type="submit" value="CADASTRAR">    
        </form>
    </body>
</html>        
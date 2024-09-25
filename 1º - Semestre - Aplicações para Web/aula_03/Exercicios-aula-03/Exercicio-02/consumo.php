
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Consumo Médio</title>
</head>
<body>
    <h1>Resultado do Consumo Médio</h1>
    <?php
    // Verifica se os dados foram enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores do formulário
        $distancia = $_POST["distancia"];
        $combustivel = $_POST["combustivel"];
        
        // Calcula o consumo médio
        $consumo_medio = $distancia / $combustivel;
        
        // Exibe o resultado
        echo "<p>O consumo médio do automóvel é de " . number_format($consumo_medio, 2) . " km/l.</p>";
    } else {
        echo "<p>Nenhum dado foi recebido.</p>";
    }
    ?>
    <p><a href="index.html">Voltar</a></p>
</body>
</html>


<?php

// Dados do HTML
$nome = $_POST['nome'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];


// Calculo da média
$media = ($nota1 + $nota2 + $nota3) / 3;

// Situação final
$situacao;
if ($media >= 7) {
    $situacao = "Aprovado";
} else if ($media >= 5) {
    $situacao = "Recuperação";
} else {
    $situacao = "Reprovado";
}

// Resultado
echo "<h2>Resultado</h2>";
echo "<p>Nome do Aluno: " . $nome;

echo "<p>Média: " . $media;
echo "<p>Situação: " . $situacao;

?>


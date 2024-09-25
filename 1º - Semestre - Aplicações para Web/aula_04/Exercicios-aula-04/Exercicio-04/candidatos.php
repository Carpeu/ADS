<?php
	print_r($_POST);

// Obter os dados do HTML
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$saude = $_POST['saude'];

// Verificar se o candidato é apto
if( ($sexo == "masculino") and ($idade >= 18) and ($saude == "apto") ) {
	echo "<p>$nome está apto para o serviço militar obrigatório.</p>";
} else {
	echo "<p>$nome não está apto para o serviço militar obrigatório.</p>";
}
		
// Resultado
echo "<h2>Resultado do Alistamento</h2>";
echo "<p>Nome: " . $nome;
echo "<p>Sexo: " . $sexo;
echo "<p>Idade: " . $idade . " anos";
echo "<p>Saúde: " . $saude;

?>




<?php
	$host = "127.0.0.1";
	$usuario = "root";
	$senha = "";
	$banco = "lojan";

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
  echo "<p>Erro ao conectar ao banco de dados!</p>";
  exit();
}

?>
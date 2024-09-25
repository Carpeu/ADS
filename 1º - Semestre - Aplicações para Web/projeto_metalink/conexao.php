

<?php

// Conexão ao banco de dados
$servidor = "localhost";  // Endereço do servidor MySQL
$usuario = "root";  // Nome de usuário do banco de dados
$password = "";  // Senha do banco de dados
$banco = "metalink";  // Nome do banco de dados que vai ser utilizado

// Criar a conexão
$conexao = new mysqli($servidor, $usuario, $password, $banco);
// Cria uma nova instância da classe mysqli para estabelecer uma conexão com o banco de dados MySQL,
// utilizando as informações fornecidas: servidor, nome de usuário, senha e nome do banco de dados.

?>




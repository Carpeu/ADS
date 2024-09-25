

<?php //  <?php - Inicio do documento PHP
session_start();  // Inicia a sessão para permitir a manipulação de variáveis de sessão
session_destroy();  // Destrói todas as informações registradas na sessão atual.
header("Location: inicio.php"); // Redireciona o navegador do usuário para a página especificada
exit(); // Finaliza o script para garantir que o código abaixo não seja executado após o redirecionamento.
?> <!--   ?> Fecha o documento PHP-->


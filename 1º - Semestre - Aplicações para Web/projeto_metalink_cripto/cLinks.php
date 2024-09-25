<?php
session_start();

print_r($_POST);
print_r($_SESSION);

# RECUPERAR OS DADOS DO HTML
$titulo = $_POST['titulo'];
$link = $_POST['link'];
$bolAtivo = $_POST['bolAtivo'];

# VALIDAR DADOS
if($titulo == "") { // se o campo está vazio
    $msgErro = "O campo título é obrigatório."; // criar a mensagem de erro para o usuário
    header("Location: links.php?msgErro=".urlencode($msgErro)); // Redirecionar para a página cadastrar
    exit(); // para a execução
}

if($link == ""){ // se o campo foi selecionado
    $msgErro = "O campo URL deve ser informado.";
    header("Location: links.php?msgErro=".urlencode($msgErro)); // Redirecionar para a página cadastrar
    exit(); // para a execução
}

if($bolAtivo == "XX"){ // se o campo foi selecionado
    $msgErro = "O campo [ativo] deve ser informado.";
    header("Location: links.php?msgErro=".urlencode($msgErro)); // Redirecionar para a página cadastrar
    exit(); // para a execução
}

# CONECTAR NO BD
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");
if(!$conexao){
    die("Erro de conexão: " . mysqli_connect_error());
}

# ESCAPAR CARACTERES ESPECIAIS PARA EVITAR SQL INJECTION
$titulo = mysqli_real_escape_string($conexao, $titulo);
$link = mysqli_real_escape_string($conexao, $link);

# RECUPERAR O ID DO USUÁRIO DA SESSÃO, SE ESTIVER DISPONÍVEL
if(isset($_SESSION['idusuario'])){
    $user = $_SESSION['idusuario'];
} else {
    $user = 0; // Defina um valor padrão ou trate isso de outra forma, dependendo da lógica do seu aplicativo
}

# CRIAR SCRIPT SQL
$sql = "INSERT INTO links (titulo, link, bolAtivo, Usuario_idUsuario)
 VALUES ('$titulo', '$link', '$bolAtivo', $user)";

echo "<p>SQL: $sql";

# EXECUTAR COMANDO SQL NO BD
$resultado = mysqli_query($conexao, $sql);

# VERIFICAR RESULTADO
if($resultado){
    $msg = "<p>Link cadastrado com sucesso!";
    header("Location: listar_links.php?msg=".urlencode($msg));
    exit();
} else {
   $msgErro = "<p>Falha ao cadastrar link. Verifique!</p>";
   $msgErro .= mysqli_error($conexao);
   echo $msgErro;
}

# FECHAR CONEXÃO BD
mysqli_close($conexao);
?>

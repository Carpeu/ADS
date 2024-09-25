<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Executa a exclusão do registro
    $sql = "DELETE FROM pessoa WHERE idPessoa = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir o registro: " . $conn->error;
    }
    
    // Redireciona de volta para a listagem
    header("Location: listar_pessoa.php");
    exit;
} else {
    // Se o ID não for fornecido, redireciona de volta para a listagem
    header("Location: listar_pessoa.php");
    exit;
}
?>

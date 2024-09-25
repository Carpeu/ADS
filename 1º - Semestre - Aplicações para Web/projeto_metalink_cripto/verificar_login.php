<?php
session_start(); 

include 'conexao.php';

// Verificação para o login do administrador
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $sql = "SELECT idusuario, nome, email, password, perfil FROM usuario WHERE email='$email'";

    $resultado = $conexao->query($sql); 

    if ($resultado->num_rows == 1) { 
        $arResultado = $resultado->fetch_assoc(); 

        if (password_verify($password, $arResultado['password'])) { 
            $_SESSION['idusuario'] = $arResultado['idusuario']; 
            $_SESSION['nome'] = $arResultado['nome']; 
            
  
            if ($arResultado['perfil'] == 'A') {
                header("Location: telaadm.php"); 
                exit();
            } else {
                header("Location: inicio.php"); 
                exit();
            }
        } else {
            echo "Senha incorreta!"; 
        }
    } else {
        echo "Usuário não encontrado!"; 
    }
} else {
    echo "Campos de email e senha não foram enviados!"; 
}

$conexao->close(); 
exit(); 
?>

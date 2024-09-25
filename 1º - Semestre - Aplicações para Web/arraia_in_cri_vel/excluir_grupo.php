<?php
include 'conexao.php';

if (isset($_GET['idGrupo']) && is_numeric($_GET['idGrupo'])) {
    $id = $_GET['idGrupo'];

    // Prepare and execute the SQL statement
    $sql = "DELETE FROM Grupo WHERE idGrupo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Success message
        echo "Registro excluído com sucesso.";
    } else {
        // Error message
        echo "Erro ao excluir o registro: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Redirect back to the listing
    header("Location: listar_grupo.php");
    exit;
} else {
    // If ID is not provided or not valid, redirect back to the listing
    header("Location: listar_grupo.php");
    exit;
}
?>

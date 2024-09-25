<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário METALINK</title>
    <!-- Adicionando Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cadastro de Usuário</h2>
        <form action="salvar_usuario.php" method="post">
            <div class="form-group">
                <label for="user">Usuário:</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <?php
        if (isset($_GET['m'])) {
            echo "<p>{$_GET['m']}</p>";
        }
        ?>
    </div>
    <!-- Adicionando Bootstrap JS (opcional, apenas se necessário) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

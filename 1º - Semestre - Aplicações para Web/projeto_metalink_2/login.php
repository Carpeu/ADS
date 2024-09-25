<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        .custom-form {
            max-width: 300px;
            padding: 20px; 
            border: 1px solid #ced4da; 
            border-radius: 10px; 
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="custom-form border">
            <h2 class="text-center mb-4">Login</h2>
            <form action="verificar_login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="registro.php" class="btn btn-primary">Registrar-se</a>
                </div>
            </form>
        </div>
    </div>
    
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

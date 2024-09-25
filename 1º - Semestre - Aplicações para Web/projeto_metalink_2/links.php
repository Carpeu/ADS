<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link | Cadastrar</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>    
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Link | Cadastrar</h3>
                        <form method="post" action="cLinks.php">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="form-group">
                                <label for="link">URL:</label>
                                <input type="text" class="form-control" id="link" name="link">
                            </div>
                            <div class="form-group">
                                <label for="bolAtivo">Ativo:</label>
                                <select class="form-control" id="bolAtivo" name="bolAtivo">
                                    <option value="XX">Selecione</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">CADASTRAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicionando jQuery e Popper.js para funcionalidades avançadas do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

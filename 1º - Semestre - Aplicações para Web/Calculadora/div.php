

<!DOCTYPE html>
<html>
<head>
    <title>Divisão</title>
</head>
<body>
    <h2>Divisão</h2>
    <form action="div.php" method="post">
        Valor 1: <input type="text" name="num1"><br>
        Valor 2: <input type="text" name="num2"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        if ($num2 != 0) {
            $resultado = $num1 / $num2;
            echo "Resultado: " . $resultado;
        } else {
            echo "ERRO !!!: Não existe divisão por zero.";
        }
    }
    ?>
	<br/><br/>
	<button><a href="calculadora.php">Voltar</a></button>
</body>
</html>


/*
 
  a tag <html></html> - abertura e fim do documento HTML. 
  a tag <head></head> - início e fim do cabeçalho do documento HTML.
  a tag <body></body> - indica o início e fim do corpo do documento HTML. 
  a tag < form> - Inicia um formulário HTML.
  
  action="ad.php" - os dados do formulário serão enviados para um arquivo chamado "ad.php". 
  Isso significa que quando o usuário preencher e submeter o formulário, os dados serão processados pelo script PHP contido no arquivo "ad.php". 
  Os dados serão enviados para um arquivo chamado "ad.php".
  method="post" - especifica como os dados do formulário serão enviados para o servidor. 
  Com "post", é um método de envio de dados de um formulário HTML para o servidor. Quando um formulário é submetido usando o método POST, 
  os dados do formulário são enviados em uma requisição HTTP ao servidor, mas de forma oculta, ou seja, os dados não são visíveis na URL do navegador.
  method="post" é usado para enviar dados de formulário de maneira segura e eficiente ao servidor, ocultando as informações da URL.
  
  input - é um elemento usado para criar vários tipos de campos de entrada em um formulário.
  type="text" - é um atributo do elemento input
  name="num1" - é um atributo do elemento input
  < input type="text" name="num1"> - cria um campo de entrada de texto em um formulário com o nome "num1", permitindo ao usuários inserirem textos.
    
  < ?php - delimitador de inicio do php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  if - É uma estrutura de controle que permite executar um código se uma condição for verdadeira.
  $_SERVER["REQUEST_METHOD"] é uma variável em PHP que contém o método de requisição HTTP utilizado para acessar a página atual.  
  "POST" - É uma string que representa o método de requisição HTTP utilizado para enviar dados de formulário.
  if ($_SERVER["REQUEST_METHOD"] == "POST") - verifica se o método de requisição HTTP utilizado para acessar a página atual foi POST. 
  Se for verdadeiro, significa que os dados do formulário foram submetidos usando o método POST, e o bloco de código dentro do if será executado. 
  Essa verificação é comum quando se trabalha com formulários em PHP para processar os dados do formulário apenas quando eles são submetidos usando o método POST.
  $num1 - É uma variável criada para receber um valor 
  $_POST - é uma variavel que é usada para coletar dados de um formulário HTML submetido com o método POST. 
  $num1 = $_POST["num1"] - significa que estamos atribuindo o valor inserido no campo de formulário com o nome "num1" a uma variável chamada $num1. 
  if ($num2 != 0) { - Ele verifica se o valor da variável $num2 é diferente de zero. Caso esta condição seja verdadeira, o código dentro do bloco if será executado.
  else { - Se a condição do if não for verdadeira, ou seja, se a variavel $num2 for igual a zero, o código dentro deste bloco else será executado.
  echo "ERRO !!!: Não existe divisão por zero."; - mensagem exibida caso a condição if seja falsa.
  $resultado = $num1 / $num2 - é uma expressão que atribui à variável "$resultado" o resultado da adição dos valores das variáveis $num1 e $num2.
  echo - função usada para imprimir texto ou dados
  echo "Resultado: " . $resultado; - exibe na tela o texto "Resultado: " seguido pelo valor contido na variável $resultado.
   ? > Delimitador de final do php
  
  a tag <br/> - usada para inserir uma quebra de linha.
  a tag	<button></button> - usada para criar um botão.
  a tage <a></a> - âncora que cria um link para outra página - <a href="calculadora.php">Voltar</a>.
  
  
*/
<?php   // delimitador de inicio
echo " Faculdade Projeção";   // echo imprime 

// Criar variavel
$a = 20;   // Variavel do tipo inteiro
$b = "FERNANDO";   // variavel do tipo String
$c = 15.32;   // varialvel tipo decimal



echo "<br/>";
echo $a;    // Imprimir variavel 'a'

echo "<br/>";
echo $b;    // Imprimir variavel 'b'

echo "<br/>";
echo $c;    // Imprimir variavel 'c'

// Concatenação tags html e variaveis
echo "<br/> Eu $b tenho $a anos.";

// Concatenar variaveis
echo "<br/>";
$x = $b . " Benis";
echo $x;
echo "<br/>";
$y = 100;
$z = "<br/>" . $x . " recebeu R$ " . $y;

echo $z;

// soma de variaveis
$soma = $a + $c;
echo"<p>Soma: " . $soma . "<p/>";

echo "<p style='background-color: yellow;'>Soma: " . $soma . "<p/>";

// uso de CONSTANTE
define("UF", "GO");
echo UF;
echo "<br/>";

// alterar valor da variavel
echo "<br/> Variavel A: " . $a; // valor atual
$a = 150;  // novo valor
echo "<br/> Variavel A: " . $a;
echo "<br/>";

// vetor
$mes = array("Janeiro", "Fevereiro", "Março");

// imprimir
echo"<p>";
print_r($mes); // imprimir vetor

// vetor - atribuir valor
$mes[3] = "Abril";

// imprimir
echo"<p>"; // imprimir string
print_r ($mes); // imprimir vetor

// Substituir o valor da posição [1] do vetor
$mes[1] = "FEV";
echo"<p>"; // imprimir string
print_r ($mes); // imprimir vetor

// imprimir uma posição do vetor
echo $mes[2];


// imrpimir vetor sem formatação
echo "<pre>";
print_r($mes);
echo "</pre>";

// operador de comparação
$a = 7;
$b = 10;

// estrutura condicional
if($a == $b) { // == operador de comparação
    // se verdadeiro
    echo "<p> Valores IGUAIS";
} else{
    // se falso
    echo "<p> Valores DIFERENTES";
}


// operador de comparação
$a = 10;
$b = 10;

// estrutura condicional
if($a == $b) { // == operador de comparação
    // se verdadeiro
    echo "<p> Valores IGUAIS";
} else{
    // se falso
    echo "<p> Valores DIFERENTES";
}



if($a > $b) { // > MAIOR
    // se verdadeiro
    echo "<p> Valores 1 é MAIOR";
} else{
    // se falso
    echo "<p> Valores 2 é MENOR";
}


if($a < $b) { // > MENOR
    // se verdadeiro
    echo "<p> Valores 1 é MAIOR";
} else{
    // se falso
    echo "<p> Valores 2 é MENOR";
}


/*
            OPERADORES DE COMPARAÇÃO
            == | Igualdade
            >  | Maior
            <  | Menor
            >= | Maior ou igual
            <= | Menor ou igual
            <> | Diferente
            != | Diferente
*/


//  delimitador de fim
?>  
 


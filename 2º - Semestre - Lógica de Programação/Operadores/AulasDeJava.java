
package aulasdejava;

import java.util.Scanner;
// import java.util.*;
//(java.util.*) - Importa todos os pacotes contidos no java.util

public class AulasDeJava {

    public static void main(String[] args) {
 
        // Tipos de dados Primitivos em Java

      // Valores Inteiros
      
      // Observação as letras ultilizadas (de a até q) são somente para exemplificar
      byte a = -128;
      byte b = 127;
      // Para valores inteiros muito pequenos (valores negativos ou positivos), útilizado para economizar espaços de memória.
      short c = -32768;
      short d = 3277;
      // Para valores inteiros pequenos (valores negativos ou positivos), também usado para economizar espaços de memória.
      int e = -2147483648;
      int f = 2147483647;
      // Para valores inteiros médios, é geralmente a escolha padrão
      long g = -9223372036854775808L;
      long h = 9223372036854775807L;
      /*Perceba a letra L no final do número
      Para valores inteiros muito grandes, utilizado quando você precisa de um intervalo de valores maior do que os previstos por int.*/
        
      // Valores Decimais
      float i = -100.4345f;
      float j = 123243.4345f;
      /*Perceba a letra f no final do número
      Usado para uma precisão menor, se você precisa economizar memória em grandes conjuntos de números decimais. 
      Este tipo de dado nunca deve ser usado para valores muito preciso, como moeda.*/
      
      double k = -3123.434354;
      double l = 321321.3123435;
     /* Usado para uma precisão maior, este tipo de dado é geralmente a opção padrão.*/
      
      boolean m = false;
      boolean n = true;
      // Valores para - Verdadeiro (true ou 1) ou Falso (false ou 0)
      
      char o = 'a';
      char p = '4';
      char q = '?';
    /* Valores para 1(um) Caractere para representar coloca-se aspas simples (' ') 
    Ela tem um valor mínimo de ‘\ u0000’ (ou 0), e um valor máximo de ‘\ uffff’ (ou 65535).*/
     
/* Java possui 50 palavras reservadas. Você não pode usar nenhum dos seguintes termos como identificadores(nomes de variáveis, 
métodos, classes, etc) em seus programas. A palavra-chave const e Goto são reservadas, mas não são utilizadas ​​atualmente. 
“true”, “false” e “null” podem parecer palavras-chave, mas eles são realmente literais, você não pode usá-los como identificadores em seus programas.*/    
    
    
        System.out.println("");
   /* System.out.println(); 
- A instrução System. out. println(), gera uma saída de texto entre aspas duplas significando uma String, 
criando uma nova linha e posicionando o cursor na linha abaixo, o que é identificado pela terminação “ln”.*/

Scanner input = new Scanner(System.in);
 /*A classe Scanner tem como objetivo separar a entrada dos textos em blocos.
Gerando os conhecidos tokens, que são sequências de caracteres separados por delimitadores que por padrão correspondem aos espaços em branco, 
tabulações e mudança de linha.

System.out.println("Informe o valor da base: ");
base = input.nextDouble(); 
Scanner; é uma classe pré definida em um pacote para uma ou mais determinadas funções. 
Seja o Comando: Scanner input = new Scanner (System.in);
É um instrução de declaração de variável que especifica o nome (input) e o tipo (Scanner) de uma variável.*/

/*int x = 10;
 int y = 6; 
 int z = 3;
 double a = 3; 
 double b = 1.0;
 double c = (double)x / y;  //(double)x é o casting da variavel X.
 int h = (int)c;  //  int h = (int)c é o Casting da variavel C.

double c = (double)x / y; ou int h = (int)c;
Operação matemática entre 2 variaveis inteiros (int x / int y) 
o resultado é preciso, ou seja a parte decimal é ignorada.             
Casting - é possível se atribuir o valor de um tipo de variável a outro tipo de variável, 
porém para tal é necessário que esta operação seja apontada ao compilador.
 */

/* Quebra de Linha ( \n )
System.out.println("Eu quero " + x + " Piza com Refri\n");
         (\n - Representa quebra de linha)*/

final double PI = 3.1459;    
/* As variáveis finais é uma variável ou atributo final pode ser inicializada em algum momento após a sua declaração,
 porém uma vez atribuído um valor, este não poderá mais ser alterado.*/

/* Operador de Incremento ( ++x / x++)
x++ Operador de incremento adiciona +1 a variavel 
    Exemplo: x=3 se colocar um x++ o novo valor de x é 4  
    ++x Operador de incremento 
    Exemplo: x=3 se colocar um ++x o novo valor de x é 4 */
 
/* Operador de Decremento ( --x / x-- )
    x-- Operador de decremento subtrai -1 depois da variavel
 
    --x Operador de decremento subtrai -1 antes da variavel */

/* Operador de Resto ( % ) 
int kilos = gramas / 1000;
    gramas = gramas % 1000;
% nesse caso é o Operador de resto ou seja o resto da divisão. 
Exemplo  1.500 gramas % 1.000 kg = 1 e sobram 500 ou 
500 g % 1000 kg = 0 e sobram 500.
A linguagem Java definiu que o simbolo de porcentagem [ % ] será o operador módulo, ou seja, o operador que retorna a sobra da divisão.*/

/* Diferença entre next e nexteLine
   O next ele faz leitura até encontrar um espaço e interrope
   O nextLine faz leitura de dados até encontrar uma quebra de linha */

   /* If e else
   if(idade<1) 
   if 
   nesse exemplo ler-se da seguinte forma, SE (a variavel que esta entre parentese) 
   a minha idade for menor que 1 vai ser executado o que estiver entre os colchetes
   Quando a condição que estiver dentro do if for verdadeira, ela é executada. 
              
   else 
   nesse exemplo ler-se da seguinte forma, ENQUANTO (a variavel que esta entre parentese)
   O else é utilizado para definir o que é executado quando a condição analisada pelo if for falsa.
  
   else if(idade<18)
   else if         
   Nesse exemplo se a variavél for menor que foi informada faça o que está entre colchetes (do if)
   Caso contrario             
   Esse recurso possibilita adicionar uma nova condição à estrutura de decisão para atender 
   a lógica sendo implementada. */         
              
   /* Comparação ( == )
   == dois sinais de igual na variavel significa que esta fazendo uma comparação */

/* Condições para ano ser Bissexto
   Para melhor entender
São bissextos todos os anos múltiplos de 400, p.ex.: 1600, 2000, 2400, 2800...
São bissextos todos os múltiplos de 4, exceto se for múltiplo de 100 mas não de 400, 
        p.ex.: 1996, 2000, 2004, 2008, 2012, 2016, 2020, 2024, 2028...
Não são bissextos anos ímpares e anos pares não-multíplos de 4.     

if((ano % 400 == 0) || (ano % 4 == 0 && ano % 100 != 0))
if((ano % 400 == 0) Se ano for multiplo de 400 
        (% 400 == 0 Se o restante da divisão for igual a zero)
|| (ou)
((ano % 4 == 0 && ano % 100 != 0) Se o ano for multiplo de 4 e ao mesmo tempo ano 
não for multiplo de 100 diferente de zero
        
 != Significa diferente       
 || (|| significa OU) é falsa (false) somente se ambos os operadores forem falsos (false).      
 && isso significa que ambos os lados devem ser Verdade(true) para que a expressão seja Verdade (true).
     
*/ 



    } 
    
}

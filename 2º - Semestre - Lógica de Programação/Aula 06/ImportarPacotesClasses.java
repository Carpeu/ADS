package importarpacotesclasses;

import java.util.Scanner;
// Pode também ultilizar (java.util.*) - Importa todos os pacotes contidos no java.util

public class ImportarPacotesClasses {

    public static void main(String[] args) {
      
       Scanner input = new Scanner(System.in);
 //A classe Scanner tem como objetivo separar a entrada dos textos em blocos.
//Gerando os conhecidos tokens, que são sequências de caracteres separados por delimitadores que por padrão correspondem aos espaços em branco, 
//tabulações e mudança de linha.
       
 double base, altura, areaRetangulo;
 
 System.out.println("Informe o valor da base: ");
 base = input.nextDouble(); 
// Scanner; é uma classe pré definida em um pacote para uma ou mais determinadas funções. 
//Seja o Comando: Scanner input = new Scanner (System.in);
//É um instrução de declaração de variável que especifica o nome (input) e o tipo (Scanner) de uma variável.
 
 System.out.println("Informe o valor da altura: ");
 altura = input.nextDouble();
 // Scanner; é uma classe pré definida em um pacote para uma ou mais determinadas funções. 
//Seja o Comando: Scanner input = new Scanner (System.in);
//É um instrução de declaração de variável que especifica o nome (input) e o tipo (Scanner) de uma variável.
 
 areaRetangulo = base * altura;
 
 System.out.println("A area de um retangulo de base = " + base);
 System.out.println("e altura " + altura);
 System.out.println("e " + areaRetangulo);
 
// System.out.println(); - A instrução System. out. println(), gera uma saída de texto entre aspas duplas significando uma String, 
//criando uma nova linha e posicionando o cursor na linha abaixo, o que é identificado pela terminação “ln”.
 }
   
}

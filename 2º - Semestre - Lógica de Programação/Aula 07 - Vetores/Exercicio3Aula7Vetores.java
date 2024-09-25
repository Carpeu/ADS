/*
 Crie um programa que encontre o maior
número entre os valores passados na linha de
comando carregados em um vetor de 10
elementos.
 */
package exercicio3aula7vetores;

import java.util.Scanner;


public class Exercicio3Aula7Vetores {

   
    public static void main(String[] args) {
        
        Scanner leia = new Scanner(System.in);

    // Declarar as variáveis    
    int y = 10;   // tamanho do vetor
    int x[] = new int[10];   // declaração do vetor "x"
    int i;   // posição

    // Dados (entrada)
    for (i=0; i<y; i++) {
      System.out.println("Informe o numero: ");
      x[i] = leia.nextInt();
    }

// soma de todos os valores, definir o maior e o menor valor
    int soma = 0;
    int menor = x[0];   // x[0] = 1º valor armazenador no vetor "x"
    int maior = x[0];
    for (i = 0; i < y; i++) {
      soma = soma + x[i];

      if (x[i] < menor)
         menor = x[i];

      if (x[i] > maior)
         maior = x[i];
    }

// resultados (saída)
    System.out.println("");
    for (i = 0; i < y; i++) {
      if (x[i] == menor)
        System.out.println("x[] = " + x [i] + " <--- menor valor ");
      else if (x[i] == maior)
              System.out.println("x[] = " + x [i] +  " <--- maior valor ");
           else System.out.println("x[] = " + x[i]);
    }
    System.out.println("Total = " + soma);
  }
  
    }
    


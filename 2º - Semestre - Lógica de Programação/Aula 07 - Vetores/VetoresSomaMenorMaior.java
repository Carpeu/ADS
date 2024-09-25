
package vetoressomamenormaior;

import java.util.Scanner;


public class VetoresSomaMenorMaior {

   
    public static void main(String[] args) {
        Scanner leia = new Scanner(System.in);

    int n = 10; // tamanho do vetor
    int x[] = new int[n]; // declaração do vetor "x"
    int i; // índice ou posição

// Entrada de Dados
    for (i=0; i<n; i++) {
      System.out.printf("Informe %2do. valor de %d: ", (i+1), n);
      x[i] = leia.nextInt();
    }

// Processamento: somar todos os valores, definir o maior e o menor valor
    int soma = 0;
    int menor = x[0]; // v[0] = 1o. valor armazenador no vetor "x"
    int maior = x[0];
    for (i=0; i<n; i++) {
      soma = soma + x[i];

      if (x[i] < menor)
         menor = x[i];

      if (x[i] > maior)
         maior = x[i];
    }

// Saída (resultados)
    System.out.printf("\n");
    for (i=0; i<n; i++) {
      if (x[i] == menor)
        System.out.printf("v[%d] = %2d <--- menor valor\n", i, x[i]);
      else if (x[i] == maior)
              System.out.printf("x[%d] = %2d <--- maior valor\n", i, x[i]);
           else System.out.printf("x[%d] = %2d\n", i, x[i]);
    }

    System.out.printf("\nSoma = %d\n", soma);
  }

} 
/*
2) Faça um programa que calcule a média dos
elementos recebidos na linha de comando ou
carregados diretamente no vetor de float. */


package exercicio2aula7vetores;

import java.util.Scanner;


public class Exercicio2Aula7Vetores {

  
    public static void main(String[] args) {
        
        Scanner leia = new Scanner(System.in);
       
       int x = 5;
       float y[] = new float[x];
       int i;
       
       for(i = 0; i < x; i++){
           
           System.out.println("Informe o numero: ");
           y[i] = leia.nextFloat();
               
       }
        System.out.println("");
        
        float soma = 0;
        float media;
        for(i = 0; i < x; i++){
            System.out.println("y - " + y[i]);
            soma = soma + y[i];
            
        }
        System.out.println("Total: ");
        System.out.println("Soma = " + soma);
        
        media = soma / x;
        System.out.println("Media = " + media);
        
  }

} 
  
        

    


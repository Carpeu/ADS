
package anobissexto;

import java.util.Scanner;

public class AnoBissexto {

    public static void main(String[] args) {
      
    Scanner input = new Scanner(System.in);
        System.out.println("Insira um Ano");
        int ano = input.nextInt();
        
        if((ano % 400 == 0) || (ano % 4 == 0 && ano % 100 != 0)){   
        
        System.out.println("Ano Bisesxto");     
        }      
               
        
   
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

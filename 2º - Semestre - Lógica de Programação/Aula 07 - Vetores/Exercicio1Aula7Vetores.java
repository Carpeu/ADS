
package exercicio1aula7vetores;

import java.util.Arrays;
import java.util.Scanner;


public class Exercicio1Aula7Vetores {

    
    public static void main(String[] args) {
       
        
        Scanner leia = new Scanner(System.in);
        
        String[] nomes = new String[]{"Maria Laura", "Rafael Lucas", "Ana Julia", "Carlos Eduardo", "Lana Sabrina"};
                Arrays.sort(nomes);
                
               for(String nome : nomes){ 
                   System.out.println(nome);
            
        }
    }
    
}

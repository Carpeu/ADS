package ifelseemjava;

import java.util.Scanner;

public class IfElseEmJava {

    public static void main(String[] args) {
     
   Scanner input = new Scanner(System.in);
   
        System.out.println("Infome seu nome:");
        String nome = input.nextLine();
        
        System.out.println("Qual a sua idade ?");
        int idade = input.nextInt();
        
        if(idade<1){
            System.out.println("Idade informada n�o � valida");
        }
        else if(idade<18) {      
              System.out.println(nome+ " � menor de idade");  
        } else {
            System.out.println(nome+ " � maior de idade");
 
              
/* Diferen�a entre next e nexteLine
   O next ele faz leitura at� encontrar um espa�o e interrope
   O nextLine faz leitura de dados at� encontrar uma quebra de linha            
   
   if(idade<1) 
   if 
   nesse exemplo ler-se da seguinte forma, SE (a variavel que esta entre parentese) 
   a minha idade for menor que 1 vai ser executado o que estiver entre os colchetes
   Quando a condi��o que estiver dentro do if for verdadeira, ela � executada. 
              
   else 
   nesse exemplo ler-se da seguinte forma, ENQUANTO (a variavel que esta entre parentese)
   O else � utilizado para definir o que � executado quando a condi��o analisada pelo if for falsa.
  
   else if(idade<18)
   else if         
   Nesse exemplo se a variav�l for menor que foi informada fa�a o que est� entre colchetes (do if)
   Caso contrario             
   Esse recurso possibilita adicionar uma nova condi��o � estrutura de decis�o para atender 
   a l�gica sendo implementada.          
              
    == dois sinais de igual na variavel significa que esta fazendo uma compara��o    
        
                */                
    }       
    }
    
    }
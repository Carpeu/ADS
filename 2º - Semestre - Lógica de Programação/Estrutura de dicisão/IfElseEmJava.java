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
            System.out.println("Idade informada não é valida");
        }
        else if(idade<18) {      
              System.out.println(nome+ " é menor de idade");  
        } else {
            System.out.println(nome+ " é maior de idade");
 
              
/* Diferença entre next e nexteLine
   O next ele faz leitura até encontrar um espaço e interrope
   O nextLine faz leitura de dados até encontrar uma quebra de linha            
   
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
   a lógica sendo implementada.          
              
    == dois sinais de igual na variavel significa que esta fazendo uma comparação    
        
                */                
    }       
    }
    
    }
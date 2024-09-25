/*
Você foi contratado pelo governo para criar um script das eleições. Seu programa deve ter as seguintes características:
Perguntar a idade do usuário
Se for menor de 16 anos, avisar que não pode votar
Se tiver 16 ou 17, avisar que o voto é facultativo
Se tiver mais de 65, avisar que também é facultativo o voto
De 18 até 65, é obrigatório votar
 */
package alinhamentoifelsevotacao;


import java.util.Scanner;


public class AlinhamentoIfElseVotacao {

    
    public static void main(String[] args) {
        
        
       Scanner leia = new Scanner(System.in);
       
       int idade;
       

        System.out.println("Digite sua idade");
       idade = leia.nextInt();
        
        
        if (idade < 16){
            System.out.println("Voce ainda nao pode votar");
        }
        else if(idade < 18){
                System.out.println("Seu voto e facultativo");
        }
        else if(idade > 65){
             System.out.println("Seu voto e facultativo");
        }
         else{
             System.out.println("Seu voto e obrigatorio");
        }
    }
}

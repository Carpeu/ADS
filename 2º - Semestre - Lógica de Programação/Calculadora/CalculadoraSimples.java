package calculadorasimples;

import java.util.Scanner;

public class CalculadoraSimples {
   
    public static void main(String[] args) {
        double n1, n2;
        double adicao, subtracao, multiplicacao, divisao;
        int op;
        
       Scanner entrada = new Scanner(System.in);
       
       System.out.println("Informe o primeiro valor: ");
        n1 = entrada.nextDouble();
        System.out.println("Informe o segundo valor: ");
        n2 = entrada.nextDouble();
              
        System.out.println("Selecione uma opecacao");
        System.out.println("[1] - Somar");
        System.out.println("[2] - Subtrair");
        System.out.println("[3] - Multiplicar");
        System.out.println("[4] - Dividir");
        System.out.println("Digite Sua Opcao: ");
                       
        op = entrada.nextInt();
        
        switch (op) {
            case 1:
                 adicao = n1+n2;
                 System.out.println("A soma e: " + adicao);
                 break;
            case 2:
                subtracao = n1-n2;
                System.out.println("A subitracao e: " + subtracao);
                break;
            case 3:
                multiplicacao = n1*n2;
                System.out.println("A multiplicacao e: " + multiplicacao);
                break;
            case 4:
               if (n1<n2){
                   System.out.println("Impossivel realizar o calculo");
               }
               else{ 
                divisao = n1/n2;
                System.out.println("A divisao e: " + divisao);
                break;
               }
                default:
                System.out.println("Operacao Invalida !!!!");
         
        }
    }
    }

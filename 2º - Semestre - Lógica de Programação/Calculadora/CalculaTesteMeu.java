package calculatestemeu;

import java.util.Scanner;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.showInputDialog;

public class CalculaTesteMeu {

    public static void main(String[] args) {
    
        String operacao;
        double n1, n2;
        boolean continuar = true;
        String decisao;
        int adicao, subtracao, multiplicacao, divisao;
        
        while (continuar == true) {
            Scanner leia = new Scanner(System.in);
        
        System.out.println("Digite a operação: ");
            n1 = leia.nextDouble();
            n2 = leia.nextDouble();
            leia.nextLine();    
        System.out.println("Digite a operação: ");
         int op = leia.nextInt();
           
        operacao = leia.next();
           
    switch(operacao){
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
    
    decisao = JOptionPane.showInputDialog("Deseja fazer outro calculo ? Digite S ou N: ");
            System.out.println("Novo cálculos - Pressione ENTER!!!!");
            leia.nextLine();
            System.out.println("Você saiu!");
       continuar = false;
       System.out.println("Até Mais!");
       
    }        
        }
    } 
}
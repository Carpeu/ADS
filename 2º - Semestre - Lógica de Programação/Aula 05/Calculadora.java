package calculadora;

import java.util.Scanner;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.showInputDialog;

public class Calculadora {

    public static void main(String[] args) {
    
        String operacao;
        double valor1, valor2;
        boolean continuar = true;
        String decisao;
        
        
        while (continuar == true) {
            Scanner leia = new Scanner(System.in);
        
        System.out.println("Digite a operação: ");
            valor1 = leia.nextDouble();
            valor2 = leia.nextDouble();
            leia.nextLine();    
        System.out.println("Digite a operação: ");
           operacao = leia.nextLine();
           
    switch(operacao){
        case "+":
            System.out.println("A soma de " + valor1 + "+" + valor2 + "=" + (valor1+valor2));
        break;
        case "-":
            System.out.println("A subtração de " + valor1 + "-" + valor2 + "=" + (valor1-valor2));
        break;
        case "*":
            System.out.println("A multiplicação de " + valor1 + "*" + valor2 + "=" + (valor1*valor2));
       break;
        case"/":   
            if (valor2==0){
              System.out.println("\nNão Existe Divisão Por Zero ");  
            }
            else{
            System.out.println("A divisão de " + valor1 + "/" + valor2 + "=" + (valor1/valor2));
            break;
            }
           
        default:         
    System.out.println("Operação invalida");
    
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

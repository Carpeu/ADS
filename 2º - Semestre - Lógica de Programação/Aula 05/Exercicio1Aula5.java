package exercicio1aula5;

import java.util.Scanner;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.showInputDialog;

public class Exercicio1Aula5 {

    public static void main(String[] args) {
        
 
   double valorVeiculo, desconto, veiculoDesconto;
   int anoVeiculo, total2000 = 0, totalgeral=0;
   boolean continuar = true;
   String decisao;
   
   while (continuar == true) {
   
        Scanner leia = new Scanner(System.in);
    
   System.out.println("Digite o Valor do Veículo: ");
   valorVeiculo = leia.nextDouble();
  
   System.out.println("Digite o ano do Veículo: ");
   anoVeiculo = leia.nextInt();   
   
   if (anoVeiculo <= 2000){
       desconto = ( valorVeiculo * 12 ) / 100;
  veiculoDesconto = valorVeiculo - desconto;
  System.out.println("O desconto do veiculo sera de: " + desconto + ".\n O valor do carro sera: " + veiculoDesconto);
  total2000++;
  totalgeral++;
   }
       
   if (anoVeiculo > 2000){
       desconto = ( valorVeiculo * 7 ) / 100;    
       veiculoDesconto = valorVeiculo - desconto;
  System.out.println("O desconto do veiculo sera de: " + desconto + ".\n O valor do carro sera: " + veiculoDesconto);
  totalgeral++;
   }
   decisao = JOptionPane.showInputDialog("Deseja fazer outro calculo ? Digite S ou N: ");
   
   if(decisao.equals("S") || (decisao.equals("s"))){
       System.out.println("Novo cálculo");
   } else {
       System.out.println("Você saiu!");
       continuar = false;
       System.out.println("Total de carros até 2000: " + total2000);
       System.out.println("Total de carros geral: " + totalgeral);
       
   }
   }
  }
 }
  
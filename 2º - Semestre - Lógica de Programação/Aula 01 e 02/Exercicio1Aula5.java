package exercicio1aula5;
import java.util.Scanner;
public class Exercicio1Aula5 {

    public static void main(String[] args) {
   double valorVeiculo, desconto, veiculoDesconto;
   int anoVeiculo;
        Scanner leia = new Scanner(System.in);
    
   System.out.println("Digite o Valor do Veículo");
   valorVeiculo = leia.nextDouble();
  
   System.out.println("Digite o ano do Veículo");
   anoVeiculo = leia.nextInt();   
   
   if (anoVeiculo <= 2000){
       desconto = ( valorVeiculo * 12 ) / 100;
       
   }
        
    }
    
}
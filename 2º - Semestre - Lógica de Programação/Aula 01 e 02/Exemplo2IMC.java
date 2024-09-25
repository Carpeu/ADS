package exemplo2imc;
import java.util.Scanner;
        
public class Exemplo2IMC {

    public static void main(String[] args) {
     Scanner ler = new Scanner(System.in);
     
     float IMC, peso, altuta;
     System.out.print("Informe o peso corporal em kg: ");
     peso = ler.nextFloat();
     System.out.print("Informe sua altura em metros: ");
     float altura = ler.nextFloat();
     
     IMC = peso / (altura*altura);
      System.out.print("IMC: " + IMC);       
      
      if (IMC <20){ 
     System.out.print(" - Magro\n");
     
     else if (IMC >= 20 && IMC < 24){
     System.out.print(" - Normal\n");
             }  
     else if (IMC >= 24 && IMC < 29){
     System.out.print(" - Acima do Peso\n");        
             }
     else if (IMC >= 29 && IMC < 34){
     System.out.print(" - Obeso\n");        
             }        
      }
      else{
     System.out.print(" - Muito Obeso\n");     
      }
    }
    }   
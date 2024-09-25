/*
Fernando do Nascimento Benis
Matrícula: 202310215
*/
package exercicioavaliacao1;

import java.util.Scanner;
        
public class ExercicioAvaliacao1 {

    public static void main(String[] args) {
     
     String nome;
     int idade;
     float IMC;
     float peso;
     float altuta;
     int totalMagro = 0;
     int totalNormal = 0;
     int totalApeso = 0;
     int totalObeso = 0;
     int totalMobeso = 0;
     int totalGeral = 10;
     boolean continuar = true;
             
     Scanner ler = new Scanner(System.in);
     
     while ((continuar == true) && (totalGeral) == 10){
     
     System.out.println("Digte seu nome");
     nome = ler.next();
     
     System.out.println("Digite sua idade");
     idade = ler.nextInt();   
     
     System.out.print("Informe o peso corporal em kg: \n");    
     peso = ler.nextFloat();
     
     System.out.print("Informe sua altura em metros: \n");
     float altura = ler.nextFloat();
     
     
     IMC = peso / (altura*altura);
     System.out.print("IMC: " + IMC);       
      
     if (IMC <20){ 
     System.out.print(" - Magro \n");
     totalMagro++;
    }
     else if (IMC >= 20 && IMC < 24){
     System.out.print(" - Normal \n");
     totalNormal++;
             }  
     else if (IMC >= 24 && IMC < 29){
     System.out.print(" - Acima do Peso \n"); 
     totalApeso++;
             }
     else if (IMC >= 29 && IMC < 34){
     System.out.print(" - Obeso \n");  
     totalObeso++;
             }        
     else if (IMC >= 34){
     System.out.print(" - Muito Obeso \n"); 
     totalMobeso++;
             } 
     
     else{
     System.out.println("Total Magro: " + totalMagro);
     System.out.println("Total Normal: " + totalNormal);
     System.out.println("Total Acima do Peso: " + totalApeso);
     System.out.println("Total Obeso: " + totalObeso);
     System.out.println("Total Muito Obeso: " + totalMobeso);
     continuar = false;
     
      }
    }
}
}
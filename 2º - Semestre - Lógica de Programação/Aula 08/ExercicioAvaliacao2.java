/*
Fernando do Nasimento Benis
Matricula: 202310215
*/
package exercicioavaliacao2;

import java.util.Scanner;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.showInputDialog;

public class ExercicioAvaliacao2 {

   
    public static void main(String[] args) {
       
        String nome;
        int idade = 0;
        int azuis;
        int castanhos;
        int verdes;
        int pretos;    
        int louros;
        int cabeloCastanhos;
        float altura;
        float peso;
        float sexoM = 1;
        float sexoF = 2;
        float media;
        int qntLouros = 0, qntVerdes = 0;
        boolean continuar = true;
        String decisao;
        float pessoasM, pessoasF;
        
        
    Scanner ler = new Scanner(System.in);
    
        System.out.println("Digte seu nome");
        nome = ler.next();
     
        System.out.println("Digite seu sexo: 1 ou 2");
        float sexo = ler.nextFloat();
        
        System.out.println("Informe a cor do seus olhos: ");
        
     
        System.out.print("Informe o peso corporal em kg: \n");    
         peso = ler.nextFloat();
     
        System.out.print("Informe sua altura em metros: \n");
        altura = ler.nextFloat();
     
       media = (idade + peso + sexoF) /3;
     
        System.out.print("Media: " + idade);
            media = ler.nextFloat();
        
        
         pessoasM = sexoM / 100;
         
         pessoasF = sexoF / 100;
     
     
    decisao = JOptionPane.showInputDialog("Deseja incluir outra pessoa ? Digite S ou N: ");
   
   if(decisao.equals("S") || (decisao.equals("s"))){
       System.out.println("Novo cálculo");
   } else {
       System.out.println("Você saiu!");
       continuar = false;
       System.out.println("Total de pessoas com cabelos louroes e olhos verdes: " + );
                   
        
        
        
        
        
    }
    
}

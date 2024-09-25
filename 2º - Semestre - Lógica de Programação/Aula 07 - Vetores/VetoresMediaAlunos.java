
package vetoresmediaalunos;

import java.util.Scanner;


public class VetoresMediaAlunos {

    
    public static void main(String[] args) {
        final int Total_Alunos = 4;
        final int Total_Bimestres = 4;
        final double Nota_Minima = 6.0;
 
     Scanner input = new Scanner(System.in);
    String[] nomeAlunos = new String[Total_Alunos];
    double[][] notaAlunos = new double[Total_Alunos][Total_Bimestres];
    double[] mediaAlunos = new double[Total_Alunos];
 
 //Obter nome dos alunos
     for(int i = 0; i < Total_Alunos; ++i){
     System.out.println("Informe o nome do " + (i+1) + "° aluno:");
    nomeAlunos[i] = input.nextLine();
 }
 
     System.out.println("");
 
 //Obter notas dos alunos todos os bimetres
     for(int i = 0; i < Total_Alunos; ++i){
    for(int j = 0; j < Total_Bimestres; ++j){
     System.out.println("Informe a nota do aluno " + nomeAlunos[i] + " para o " + (j+1) + "° bimestre");
 notaAlunos[i][j] = input.nextDouble();
 }
 }
 
 //calcular media alunos
    for(int i = 0; i < Total_Alunos; ++i){
     for(int j = 0; j < Total_Bimestres; ++j){
    mediaAlunos[i] += notaAlunos[i][j];
 }
    mediaAlunos[i] /= Total_Bimestres;
 }
 
 //Mostrar situacao dos alunos
 System.out.println("========== RESULTADO FINAL ==========");
 
    for(int i = 0; i < Total_Alunos; ++i){
 
     if(mediaAlunos[i] >= Nota_Minima ){
    System.out.println("Nome: " + nomeAlunos[i] + " Media: " + mediaAlunos[i] + " Situação: Aprovado");
 continue;
 }
 
    System.out.println("Nome: " + nomeAlunos[i] + " Media: " + mediaAlunos[i] + " Situação: Reprovado");
 }
 
 }
}
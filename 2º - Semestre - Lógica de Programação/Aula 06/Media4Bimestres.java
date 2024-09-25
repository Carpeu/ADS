
package media4bimestres;

import java.util.Scanner;

public class Media4Bimestres {

   
    public static void main(String[] args) {
        final int TOTAL_ALUNOS = 4;
 final int TOTAL_BIMESTRES = 4;
 final double NOTA_MINIMA = 60.0;
 
 Scanner input = new Scanner(System.in);
 //[] Representa Arrays (Vetores) simples
 String[] nomeAlunos = new String[TOTAL_ALUNOS]; 
//[][] Representa Arrays (Vetores) Bidimensionais
 double[][] notaAlunos = new double[TOTAL_ALUNOS][TOTAL_BIMESTRES]; 
 double[] mediaAlunos = new double[TOTAL_ALUNOS];
 
 //Obter nome dos alunos
 for(int i = 0; i < TOTAL_ALUNOS; ++i){
 System.out.println("Informe o nome do " + (i+1) + "° aluno:");
 nomeAlunos[i] = input.nextLine();
 }
 
 System.out.println("");
 
 //Obter notas dos alunos todos os bimetres
 for(int i = 0; i < TOTAL_ALUNOS; ++i){
 for(int j = 0; j < TOTAL_BIMESTRES; ++j){
 System.out.println("Informe a nota do aluno " + nomeAlunos[i] +
 " para o " + (j+1) + "° bimestre");
 notaAlunos[i][j] = input.nextDouble();
 }
 }
 
 //calcular media alunos
 for(int i = 0; i < TOTAL_ALUNOS; ++i){
 for(int j = 0; j < TOTAL_BIMESTRES; ++j){
 mediaAlunos[i] += notaAlunos[i][j];
 }
 mediaAlunos[i] /= TOTAL_BIMESTRES;
 }
 
 //Mostrar situacao dos alunos
 System.out.println("======== RESULTADO FINAL =======");
 
 for(int i = 0; i < TOTAL_ALUNOS; ++i){
 
 if(mediaAlunos[i] >= NOTA_MINIMA ){
 System.out.println("Nome: " + nomeAlunos[i] + " Media: " + mediaAlunos[i] + " Situação: Aprovado");
 continue;
 }
 
 System.out.println("Nome: " + nomeAlunos[i] + " Media: " + mediaAlunos[i] + " Situação: Reprovado");
 }
 
 }
}
/*[] Representa Arrays (Vetores) simples
  [][] Representa Arrays (Vetores) Bidimensionais
A variavel FINAL ultilizada no programa (acima) quer dizer que essa variavel vai ser realizada uma unica vez
e o valor que for atribuido não pode ser alterada no decorrer do programa.

Programa referente a aula 35 do canal De aluno para aluno no Youtube.

*/
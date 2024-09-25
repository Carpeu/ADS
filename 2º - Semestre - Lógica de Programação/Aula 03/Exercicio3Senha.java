package exercicio3senha;

import java.util.Scanner;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.showInputDialog;

public class Exercicio3Senha {

    
    public static void main(String[] args) {
    
    String decisao;    
    int senha;
    int num1, num2;
    int soma;
    int confirmaSenha;
    boolean continuar = true;
    int qtdSenha = 0;
              
        Scanner leia = new Scanner(System.in); 
        System.out.println("cadstre uma senha: ");
        senha = leia.nextInt();
        
        System.out.println("Informe um numero: ");
        num1 = leia.nextInt();
        
        System.out.println("Informe outro numero: ");
        num2 = leia.nextInt();
        
        soma = num1+num2;
        
    while ((continuar == true) && (qtdSenha) <3 ){ 
        System.out.println("Confirme a senha para vizualizar o resultado: ");
        confirmaSenha = leia.nextInt();
        
    if (senha == confirmaSenha){
            System.out.println("A soma do " + num1 + "+" + num2 + "=" + soma);
            continuar = false;
    }
    else{        
            System.out.println("Senha não confere !!!");
                
    if(senha == confirmaSenha){
            System.out.println("A soma do " + num1 + "+" + num2 + "=" + soma);
            continuar = false; 
    }       
    else{    
        System.out.println("Digite a senha novamente! ");
        decisao = JOptionPane.showInputDialog("Deseja tentar" + "Digite a senha novamente? Digite S ou N: ");
   
    if(decisao.equals("S") || (decisao.equals("s"))){
        qtdSenha++;
       leia.nextLine();
    if (qtdSenha == 3){
        System.out.println("Senha bloqueada!! ");}
    }   
    else {
       System.out.println("Você saiu!"); 
        continuar = false;
            
    }
    }  
    }  
    }
    }
    }
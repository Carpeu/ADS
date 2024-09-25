
package testaconta;
import java.util.Scanner;

public class Cliente {
    Scanner ler = new Scanner(System.in);
    private String nome;
    private int codigo;  
    
    
    public void defineNome(){
        System.out.println("Digite o nome do Cliente:");
        this.nome = ler.nextLine();
    
    }
    
    public void setNome(String nome){
    this.nome = nome;
    }
    public String getNome(){ 
        return nome;
    }
    
    public void setCodigo(int codigo){
    this.codigo = codigo;
    }
    public int getCodigo(){ 
        return codigo;
    }
    
}

/*
Defina uma classe para modelar os funcionários 
do banco. Sabendo que todo funcionário possui 
nome e salário, inclua os getters e setters dos 
atributos
*/
package testafuncionarios;


public class Funcionario {
    private String nome;
    private double salario;
    private int codigo;

    public double getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }
    
    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getSalario() {
        return salario;   
        
    }

    public void setSalario(double salario) {
        this.salario = salario;
    }
    public double calculaBonificacao(){
      return this.salario * 0.10;
    }
    public void mostraDados() {
        System.out.println("Nome: " + this.nome);
        System.out.println("Salário: " + this.salario);
        System.out.println("Bonificação: " + calculaBonificacao());
    }
}
    


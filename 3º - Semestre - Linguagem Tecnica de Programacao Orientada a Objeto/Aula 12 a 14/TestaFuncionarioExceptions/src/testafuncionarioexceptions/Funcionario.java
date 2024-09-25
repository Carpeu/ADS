// Aula 13
package testafuncionarioexceptions;


public class Funcionario {
    private double salario;
    
    public void aumentaSalario(double aumento){
        if(aumento < 0){
        IllegalArgumentException erro = new IllegalArgumentException();
        throw erro;
        }        
    }
}

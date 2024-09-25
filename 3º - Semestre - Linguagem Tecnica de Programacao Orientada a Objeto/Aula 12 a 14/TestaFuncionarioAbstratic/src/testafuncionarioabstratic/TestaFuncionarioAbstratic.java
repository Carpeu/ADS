// Aula 12
package testafuncionarioabstratic;

public class TestaFuncionarioAbstratic {

   
    public static void main(String[] args) {
        Gerente f = new Gerente();
        f.setSalario(20000);
        System.out.println("Salário: " + f.getSalario());
        System.out.println("Bonificacao: " + f.calculaBonificacao());
    }
    
}

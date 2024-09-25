
package contabancaria;


public class Contas extends ContaBancaria{
    public static void main(String[] args) {
        ContaPoupanca cp = new ContaPoupanca("Fernando", 12345, 1000.0f, 15);
        ContaEspecial ce = new ContaEspecial("Patricia", 98765, 2000.0f, 1500.0f);

        cp.depositar(500.0f);
        ce.sacar(1000.0f);
        
        cp.calcularNovoSaldo((float) 0.6769); 
        // Taxa de rendimento da Poupança no dia 28/09/2023
        
        System.out.println("Informações da Conta Poupança :");
        cp.mostrarDados();
        
        System.out.println("Informações da Conta Especial :");
        ce.mostrarDados();
        
}
}
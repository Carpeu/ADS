
package testacontasinterfaces;


public class TestaContasInterfaces {

   
    public static void main(String[] args) {
        ContaCorrente c1 = new ContaCorrente();
        ContaPoupanca c2 = new ContaPoupanca();
        
        c1.deposita(500);
        c2.deposita(500);
        // Após depositar
        //System.out.println("Saldo da conta 1: " + c1.getSaldo());
        //System.out.println("Saldo da conta 2: " + c2.getSaldo());
        GeradorDeExtrato g = new GeradorDeExtrato();
        g.geraExtrato(c1);
        g.geraExtrato(c2);
        c1.saca(100);
        c2.saca(100);
        // Após sacar
        //System.out.println("Saldo da conta 1: " + c1.getSaldo());
        //System.out.println("Saldo da conta 2: " + c2.getSaldo());
        
    }
    
}

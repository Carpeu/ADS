/*
Aula 7 - 31/08/2023
*/
package bancoaula7;

import javax.swing.JOptionPane;


public class BancoAula7 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       // CONTA
       Conta c1 = new Conta("123", 2000.0);
       Conta c2 = new Conta ("321", 1500.0);
       
       JOptionPane.showMessageDialog(null, "Saldo da conta1: " + c1.consultaSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2: " + c2.consultaSaldo());
       String deposito = JOptionPane.showInputDialog("Digite o valor para o depósito na conta1: ");
        double valorDeposito = Double.parseDouble(deposito);
        c1.deposito(valorDeposito);
        String saque = JOptionPane.showInputDialog("Digite o valor para o saque na conta2: ");
        double valorSaque = Double.parseDouble(saque);
        c2.saque(valorSaque);
        
        JOptionPane.showMessageDialog(null, "Saldo da conta1 após depósito: " + c1.consultaSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2 após saque: " + c2.consultaSaldo());

        String transferenciaStr = JOptionPane.showInputDialog("Digite o valor para transferência da conta1 para a conta2:");
        double valorTransferencia = Double.parseDouble(transferenciaStr);
        c1.transferir(c2, valorTransferencia);

        JOptionPane.showMessageDialog(null, "Saldo da conta1 após transferência: " + c1.consultaSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2 após transferência: " + c2.consultaSaldo());
       
       
       
    }
    
}

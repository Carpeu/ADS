
import javax.swing.JOptionPane;

public class Conta {
    private String numeroConta;
    private double saldo;

    public Conta(String numeroConta, double saldoInicial) {
        this.numeroConta = numeroConta;
        this.saldo = saldoInicial;
    }

    public void depositar(double valor) {
        if (valor > 0) {
            saldo += valor;
            JOptionPane.showMessageDialog(null, "Depósito de R$" + valor + " realizado com sucesso.");
        } else {
            JOptionPane.showMessageDialog(null, "O valor do depósito deve ser maior que zero.");
        }
    }

    public void sacar(double valor) {
        if (valor > 0 && valor <= saldo) {
            saldo -= valor;
            JOptionPane.showMessageDialog(null, "Saque de R$" + valor + " realizado com sucesso.");
        } else {
            JOptionPane.showMessageDialog(null, "Saldo insuficiente ou valor de saque inválido.");
        }
    }

    public void transferir(Conta destino, double valor) {
        if (valor > 0 && valor <= saldo) {
            saldo -= valor;
            destino.depositar(valor);
            JOptionPane.showMessageDialog(null, "Transferência de R$" + valor + " realizada com sucesso para a conta " + destino.getNumeroConta() + ".");
        } else {
            JOptionPane.showMessageDialog(null, "Saldo insuficiente ou valor de transferência inválido.");
        }
    }

    public double consultarSaldo() {
        return saldo;
    }

    public String getNumeroConta() {
        return numeroConta;
    }

    public void setNumeroConta(String numeroConta) {
        this.numeroConta = numeroConta;
    }

    public static void main(String[] args) {
        Conta conta1 = new Conta("12345", 1000.0);
        Conta conta2 = new Conta("54321", 500.0);

        JOptionPane.showMessageDialog(null, "Saldo da conta1: R$" + conta1.consultarSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2: R$" + conta2.consultarSaldo());

        String depositoStr = JOptionPane.showInputDialog("Digite o valor para depósito na conta1:");
        double valorDeposito = Double.parseDouble(depositoStr);
        conta1.depositar(valorDeposito);

        String saqueStr = JOptionPane.showInputDialog("Digite o valor para saque na conta2:");
        double valorSaque = Double.parseDouble(saqueStr);
        conta2.sacar(valorSaque);

        JOptionPane.showMessageDialog(null, "Saldo da conta1 após depósito: R$" + conta1.consultarSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2 após saque: R$" + conta2.consultarSaldo());

        String transferenciaStr = JOptionPane.showInputDialog("Digite o valor para transferência da conta1 para a conta2:");
        double valorTransferencia = Double.parseDouble(transferenciaStr);
        conta1.transferir(conta2, valorTransferencia);

        JOptionPane.showMessageDialog(null, "Saldo da conta1 após transferência: R$" + conta1.consultarSaldo());
        JOptionPane.showMessageDialog(null, "Saldo da conta2 após transferência: R$" + conta2.consultarSaldo());
    }
}

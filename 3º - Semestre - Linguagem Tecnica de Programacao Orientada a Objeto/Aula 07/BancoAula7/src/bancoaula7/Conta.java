
/* Exercício Aula 07 31/08/2023
Acrescente alguns métodos na classe Conta
para realizar as operações de depósito, saque,
transferência e consultaSaldo.
*/
package bancoaula7;

import javax.swing.JOptionPane;

public class Conta {
    private double saldo;
    private double limite = 500.0;
    private double deposito;
    private double saque;
    private double transferencia;
    private String consultaSaldo;
    private String numeroConta;
    private final int numero;

    public Conta(double saldo, double deposito, double saque, double transferencia, String consultaSaldo, String numeroConta, int numero) {
        this.saldo = saldo;
        this.deposito = deposito;
        this.saque = saque;
        this.transferencia = transferencia;
        this.consultaSaldo = consultaSaldo;
        this.numeroConta = numeroConta;
        this.numero = numero;
    }

    Conta(String string, double d) {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    public double getSaldo() {
        return saldo;
    }

    public void setSaldo(double saldo) {
        this.saldo = saldo;
    }

    public double getLimite() {
        return limite;
    }

    public void setLimite(double limite) {
        this.limite = limite;
    }

    public double getDeposito() {
        return deposito;
    }

    public void setDeposito(double deposito) {
        this.deposito = deposito;
    }

    public double getSaque() {
        return saque;
    }

    public void setSaque(double saque) {
        this.saque = saque;
    }

    public double getTransferencia() {
        return transferencia;
    }

    public void setTransferencia(double transferencia) {
        this.transferencia = transferencia;
    }

    public String getConsultaSaldo() {
        return consultaSaldo;
    }

    public void setConsultaSaldo(String consultaSaldo) {
        this.consultaSaldo = consultaSaldo;
    }

    public String getNumeroConta() {
        return numeroConta;
    }

    public void setNumeroConta(String numeroConta) {
        this.numeroConta = numeroConta;
    }
    
    public void deposito(double v) {  // V =  Valor
        if (v > 0) {
            saldo += v;
            JOptionPane.showMessageDialog(null, "Depósito de " + v );
        } else {
            JOptionPane.showMessageDialog(null, "O valor depositado deve ser maior que zero");
        }
    }
    public void saque(double v) {
        if (v > 0 && v <= saldo) {
            saldo -= v;
            JOptionPane.showMessageDialog(null, "Saque de " + v);
        } else {
            JOptionPane.showMessageDialog(null, "Saldo insuficiente");
        }
    }
    public void transferir(Conta destino, double v) {
        if (v > 0 && v <= saldo) {
            saldo -= v;
            destino.deposito(v);
            JOptionPane.showMessageDialog(null, "Transferência de " + v + destino.getNumeroConta());
        } else {
            JOptionPane.showMessageDialog(null, "Saldo insuficiente ");
        }
    }

 
    }


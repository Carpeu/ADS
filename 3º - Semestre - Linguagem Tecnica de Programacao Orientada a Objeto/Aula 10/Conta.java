
package banco;

import javax.swing.JOptionPane;


public class Conta {
    
    private double saldo;
    private double limite;
    private int numero;

    public Conta(double saldo, double limite, int numero) {
        this.saldo = saldo;
        this.limite = limite;
        this.numero = numero;
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

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }
    
    public void deposita(double saldoL){

        setSaldo(saldoL);
    }
    public boolean saca(double saldoL){
        boolean validado = false;
        
                if(this.saldo>=saldoL){
        setSaldo(this.saldo - saldoL); 
        validado = true;
        }else{
        
            String mensagem =
                String.format("Valor indisponivel. Saldo: " + this.saldo);
        JOptionPane.showMessageDialog(null,mensagem);
            
        }
    return validado;
    }
    
    public void consultaSaldo(){
    String mensagem =
                String.format("Saldo disponivel:" + this.saldo);
        JOptionPane.showMessageDialog(null,mensagem);
        
    
    }
    
    
}

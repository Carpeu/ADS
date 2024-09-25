/*

 */
package testacontaaula06;


public class Conta {
    private double saldo;
    private double limite = 500.0;
    private int numero;
    
    public void setSaldo(double saldo){ // set grava/guarda valor
        this.saldo = saldo;
    }
    public double getSaldo(){ // get mostra valor
        return saldo;
    }
    public void setLimite(double limite){ // set grava/guarda valor
        this.limite = limite;
    }
    public double getLimite(){ // get mostra valor
        return limite;
    }
    public void setNumero(int numero){ // set grava/guarda valor
        this.numero = numero;
    }
    public int getNumero(){ // get mostra valor
        return numero;
    }
}

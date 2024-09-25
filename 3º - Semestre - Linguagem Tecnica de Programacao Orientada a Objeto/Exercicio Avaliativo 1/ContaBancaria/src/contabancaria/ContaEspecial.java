
package contabancaria;


class ContaEspecial extends ContaBancaria {
    private float limite;

    public float getLimite() {
        return limite;
    }

    public void setLimite(float limite) {
        this.limite = limite;
    }

    public float getSaldo() {
        return saldo;
    }

    public void setSaldo(float saldo) {
        this.saldo = saldo;
    }

    
    @Override
    public void sacar(float valor) {
        if (valor <= saldo + limite) {
            saldo -= valor;
        } else {
            System.out.println("Saldo insuficiente ");
        }
    }
}
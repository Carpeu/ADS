
package contabancaria;

    class ContaPoupanca extends ContaBancaria {

    public ContaPoupanca(int diaDeRendimento, String cliente, int num_conta, float saldo) {
        super(cliente, num_conta, saldo);
        this.diaDeRendimento = diaDeRendimento;
    }

    public int getDiaDeRendimento() {
        return diaDeRendimento;
    }

    public void setDiaDeRendimento(int diaDeRendimento) {
        this.diaDeRendimento = diaDeRendimento;
    }

    public float getSaldo() {
        return saldo;
    }

    public void setSaldo(float saldo) {
        this.saldo = saldo;
    }
    private int diaDeRendimento;

    public void calcularNovoSaldo(float taxaRendimento) {
        saldo += saldo * (taxaRendimento / 100);
    }
}


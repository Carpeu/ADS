package testacontasinterfaces;


class ContaCorrente implements Conta{
    private double saldo;
    private final double taxaPorOperacao = 0.45;
    
    public void depoista(double valor){
        this.saldo += valor - this.taxaPorOperacao;
    }
    public void saca(double valor){
        this.saldo -= valor + this.taxaPorOperacao;
    }
    public double getSaldo(){
        return this.saldo;
    }

    @Override
    public void deposita(double valor) {
        
    }

}

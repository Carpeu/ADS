
package bancoaula7;

public class CartaoDeCredito {
    private int numero;
    private String dataDeValidade;
    private Cliente cliente;

    public CartaoDeCredito(int numero, String dataDeValidade, Cliente cliente) {
        this.numero = numero;
        this.dataDeValidade = dataDeValidade;
        this.cliente = cliente;
    }
    
    public void setNumero(int numero){ // set grava/guarda valor
        this.numero = numero;
    }
    public double getNumero(){ // get mostra valor
        return numero;
    }
    public void setDataDeValidade(String dataDeValidade){ // set grava/guarda valor
        this.dataDeValidade = dataDeValidade;
    }
    public String getDataDeValidade(){ // get mostra valor
        return dataDeValidade;
    }
    public void setCliente(Cliente cliente){ // set grava/guarda valor
        this.cliente = cliente;
    }
    public Cliente getCliente(){ // get mostra valor
        return cliente;
    }
}


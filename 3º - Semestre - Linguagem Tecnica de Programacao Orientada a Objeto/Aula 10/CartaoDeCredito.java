
package banco;

public class CartaoDeCredito {
    
    private int numero;
    private String dataDeValidade;

    public CartaoDeCredito(int numero, String dataDeValidade) {
        this.numero = numero;
        this.dataDeValidade = dataDeValidade;
    }
    
    

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public String getDataDeValidade() {
        return dataDeValidade;
    }

    public void setDataDeValidade(String dataDeValidade) {
        this.dataDeValidade = dataDeValidade;
    }
    
    
    
    
}

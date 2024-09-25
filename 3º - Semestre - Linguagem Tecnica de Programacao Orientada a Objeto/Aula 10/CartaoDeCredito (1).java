package testaconta;

public class CartaoDeCredito {
    private int numero;
    private String dataDeValidade;
    private Cliente cliente;
    
    public void setNumero(int numero){
    this.numero = numero;
    }
    public int getNumero(){ 
        return numero;
    }
    
    public void setData(String dataDeValidade){
    this.dataDeValidade = dataDeValidade;
    }
    public String getData(){ 
        return dataDeValidade;
    }
    
    public void setCliente(Cliente cliente){
    this.cliente = cliente;
    }
    public Cliente getCliente(){ 
        return cliente;
    }
    
}

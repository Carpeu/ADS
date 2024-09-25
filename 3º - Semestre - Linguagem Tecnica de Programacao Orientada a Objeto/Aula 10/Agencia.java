
package banco;

public class Agencia {
    
    private String uf;
    private int numero;

    public Agencia(String uf, int numero) {
        this.uf = uf;
        this.numero = numero;
    }
    
    

    public String getUf() {
        return uf;
    }

    public void setUf(String uf) {
        this.uf = uf;
    }

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }
    
    
    
    
}

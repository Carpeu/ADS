
package bancoaula7;


public class Agencia {
    int numero;
    String uf;

    public Agencia(int numero, String uf) {
        this.numero = numero;
        this.uf = uf;
    }
    
    public void setNumero(int numero){ // set grava/guarda valor
        this.numero = numero;
    }
    public int getNumero(){ // get mostra valor
        return numero;
    }
    public void setUf(String uf){ // set grava/guarda valor
        this.uf = uf;
    }
    public String getUf(){ // get mostra valor
        return uf;
    }
}


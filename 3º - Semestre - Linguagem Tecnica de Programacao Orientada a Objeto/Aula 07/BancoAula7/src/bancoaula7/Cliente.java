
package bancoaula7;


public class Cliente {
    private String nome;
    private int codigo;

    public Cliente(String nome, int codigo) {
        this.nome = nome;
        this.codigo = codigo;
    }
    
    public void setNome(String nome){ // set grava/guarda valor
        this.nome = nome;
    }
    public String getNome(){ // get mostra valor
        return nome;
    }
    public void steCodigo(int codigo){ // set grava/guarda valor
        this.codigo = codigo;
}
    public int getCodigo(){ // get mostra valor
        return codigo;
    }
    
}

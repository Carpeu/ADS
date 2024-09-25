
package testafuncionarios;

public class Secretario extends Funcionario {
    private int ramal;
    
    

    public int getRamal() {
        return ramal;
    }

    public void setRamal(int ramal) {
        this.ramal = ramal;
    }
    @Override
    public String mostraDados(){
    return super.mostraDados()+ "\nRamal: " +  getRamal();
    }
}

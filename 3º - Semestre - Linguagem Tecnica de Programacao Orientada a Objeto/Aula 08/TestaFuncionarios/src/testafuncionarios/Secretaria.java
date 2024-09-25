
package testafuncionarios;


public class Secretaria extends Funcionario {
    private int ramal;

    public int getRamal() {
        return ramal;
    }

    public void setRamal(int ramal) {
        this.ramal = ramal;
    }
    @Override
    public void mostraDados() {
        super.mostraDados();
        System.out.println("Número Ramal: " + ramal);
    }
}

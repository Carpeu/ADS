
package testafuncionarios;

public class Telefonista extends Funcionario {
    private int estacaoDeTrabalho;


    
    

    public int getEstacaoDeTrabalho() {
        return estacaoDeTrabalho;
    }

    public void setEstacaoDeTrabalho(int estacaoDeTrabalho) {
        this.estacaoDeTrabalho = estacaoDeTrabalho;
    }
    @Override
    public String mostraDados(){
    return super.mostraDados()+ "\nEstação: " +  getEstacaoDeTrabalho();
    }
}

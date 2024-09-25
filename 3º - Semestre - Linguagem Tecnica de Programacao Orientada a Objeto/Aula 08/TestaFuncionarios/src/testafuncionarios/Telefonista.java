
package testafuncionarios;


public class Telefonista extends Funcionario {
    private int codEstacao;

    public int getCodEstacao() {
        return codEstacao;
    }

    public void setCodEstacao(int codEstacao) {
        this.codEstacao = codEstacao;
    }
    @Override
    public void mostraDados() {
        super.mostraDados();
        System.out.println("Código Estação: " + codEstacao);
    }
}

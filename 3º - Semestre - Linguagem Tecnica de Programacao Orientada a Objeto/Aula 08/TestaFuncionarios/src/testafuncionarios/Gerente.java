
package testafuncionarios;


public class Gerente extends Funcionario {
    private String usuario;
    private String senha;
   
    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }
    @Override
    public double calculaBonificacao() {
        return getSalario() * 0.20;
    }
    @Override
    public void mostraDados() {
        super.mostraDados();
        System.out.println("Usuário: " + usuario);
    }

   
    }
    

  


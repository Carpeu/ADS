
package testafuncionarios;

public class Gerente extends Funcionario{
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
    public double calcBonificacao(){
        
        return super.calcBonificacao() * 2 ;
         
    }
    @Override
    public String mostraDados(){
    return super.mostraDados()+ "\nUsuario: " +  getUsuario() + "\nSenha: " + getSenha();
    }
}


package testafuncionarios;

public class TestaFuncionarios {

    public static void main(String[] args) throws InterruptedException {
    ControleDePonto cdp = new ControleDePonto();        
        
    Gerente g = new Gerente();
    g.setNome("Rafael Cosentino");
    g.setSalario(2000);
    g.setUsuario("rafael.cosentino");
    g.setSenha("12345");
    g.setCodigo(123);
    
        
        System.out.println("GERENTE");
        cdp.registraEntrada(g);
        Thread.sleep(10000);
        System.out.println("");
        System.out.println(g.mostraDados());
        System.out.println("");
        System.out.println("");
        cdp.registraSaida(g);
        
    Telefonista t = new Telefonista();
    t.setNome("Felipe Cosentino");
    t.setSalario(1000);
    t.setEstacaoDeTrabalho(1);
    t.setCodigo(456);
    
        System.out.println("Telefonista");
        cdp.registraEntrada(t);
        Thread.sleep(10000);
        System.out.println("");
        System.out.println(t.mostraDados());
        System.out.println("");
        System.out.println("");
        cdp.registraSaida(t);
    
        
    Secretario s = new Secretario();
    s.setNome("Roberto Cosentino");
    s.setSalario(1000);
    s.setRamal(1);
    s.setCodigo(789);
    
        System.out.println("Secretario");
        cdp.registraEntrada(s);
        Thread.sleep(10000);
        System.out.println("");
        System.out.println(s.mostraDados());
        System.out.println("");
        System.out.println("");
        cdp.registraSaida(s);
    }
    
}

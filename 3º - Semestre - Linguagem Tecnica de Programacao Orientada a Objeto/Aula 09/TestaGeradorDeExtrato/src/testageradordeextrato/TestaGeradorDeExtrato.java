/* 21/09/2023 - Aula 09
Exercícios de Polimorfismo:
• 1) Crie um projeto no Netbeans chamado 
TestaGeradorDeExtrato.
• 2) Defina uma classe genérica para modelar as 
contas do banco, inclua os getters e setters do 
atributo saldo.
• 3) Defina duas classes específicas para dois 
tipos de contas do banco: poupança e corrente.
• 4) Defina uma classe para especificar um 
gerador de extratos.
• 5) Faça um teste para o gerador de extratos.
• Agora é sua vez:
• 6) Defina uma classe para modelar de forma 
genérica os funcionários do banco.
• 7) Implemente duas classes específicas para 
modelar dois tipos particulares de funcionários 
do banco: os gerentes e as telefonistas.
• 8) Implemente o controle de ponto dos 
funcionários. Crie uma classe com dois 
métodos: o primeiro para registrar a entrada dos 
funcionários e o segundo para registrar a saída.
• 9) Teste a lógica do controle de ponto, 
registrando a entrada e a saída de um gerente e 
de uma telefonista.
*/
package testageradordeextrato;


public class TestaGeradorDeExtrato {

    
    public static void main(String[] args) {
        GeradorDeExtrato gerador = new GeradorDeExtrato();
        
        ContaPoupanca cp = new ContaPoupanca();
        cp.setSaldo(1000);
        
        ContaCorrente cc = new ContaCorrente();
        cc.setSaldo(1000);
        
        gerador.imprimeExtratoBasico(cp);
        gerador.imprimeExtratoBasico(cc);
        
        // POLIMORFISMO
       ControleDePonto ponto = new ControleDePonto();
       
        // GERENTE
        Gerente g = new Gerente();
        g.setNome("Arthur Miranda");
        g.setSalario(15000);
        g.setUsuario("arthur.miranda");
        g.setSenha("12345");
        g.setCodigo(10);
        ponto.registraEntrada(g);
        ponto.registraSaida(g);
        System.out.println("GERENTE");
        System.out.println("Nome: " + g.getNome());
        System.out.println("Salário: " + g.getSalario());
        
        System.out.println("Usuário: " + g.getUsuario());
        System.out.println("Senha: " + g.getSenha());
        System.out.println("Codigo: " + g.getCodigo());
        System.out.println("Saldo da conta corrente: " + cc.getSaldo());
        System.out.println("Saldo da conta poupança: " + cp.getSaldo());
        
        // SECRETÁRIA
        Secretaria s = new Secretaria();
        ControleDePonto secretaria = new ControleDePonto();
        s.setNome("Bianca");
        s.setSalario(3000);
        s.setRamal(1030);
        s.setCodigo(20);
        ponto.registraEntrada(s);
        ponto.registraSaida(s);
        
        System.out.println("SECRETÁRIA");
        System.out.println("Nome: " + s.getNome());
        System.out.println("Salário: " + s.getSalario());
        System.out.println("Ramal: " + s.getRamal());
        System.out.println("Saldo da conta corrente: " + cc.getSaldo());
        System.out.println("Saldo da conta poupança: " + cp.getSaldo());
        
        // TELEFONISTA
        Telefonista t = new Telefonista();
        ControleDePonto telefonista = new ControleDePonto();
        t.setNome("Lana");
        t.setSalario(2000);
        t.setCodEstacao(12);
        t.setCodigo(30);
        ponto.registraEntrada(t);
        ponto.registraSaida(t);
        
        System.out.println("TELEFONISTA");
        System.out.println("Nome: " + t.getNome());
        System.out.println("Salário: " + t.getSalario());
        System.out.println("Código da Estação de Trabalho: " + t.getCodEstacao());
        System.out.println("Saldo da conta corrente: " + cc.getSaldo());
        System.out.println("Saldo da conta poupança: " + cp.getSaldo());
    }
    
}

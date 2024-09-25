/* 14/09/2023 Aula 08
Herança – Exercício
• 1) Crie um projeto no Netbeans chamado 
TestaFuncionarios.
• 2) Defina uma classe para modelar os funcionários 
do banco. Sabendo que todo funcionário possui 
nome e salário, inclua os getters e setters dos 
atributos.
• 3) Crie uma classe para cada tipo específico de 
funcionário herdando da classe Funcionario. 
Considere apenas três tipos específicos de 
funcionários: Gerentes, Telefonistas e 
Secretarias. Os Gerentes possuem um nome 
de usuário e uma senha para acessar o 
sistema do banco. As telefonistas possuem um 
código de estação de trabalho. As secretarias 
possuem um número de ramal. 
• 4) Teste o funcionamento dos três tipos de 
funcionários criando um objeto de cada uma das 
classes: Gerente, Telefonista e Secretaria.
• 5) Suponha que todos os funcionários recebam 
uma bonificação de 10% do salário. Acrescente 
um método na classe Funcionario para calcular 
essa bonificação.
• 6) Altere a classe TestaFuncionarios para 
imprimir a bonificação de cada funcionário, além 
dos dados que já foram impressos. Depois, 
execute o teste novamente.
• 7) Suponha que os gerentes recebam uma 
bonificação maior que os outros funcionários 
(2x). Reescreva o método calculaBonificacao() 
na classe Gerente. Depois, compile e execute o 
teste novamente.
• 8) Defina na classe Funcionario um método 
para imprimir na tela o nome, salário e 
bonificação dos funcionários. 
• 9) Reescreva o método que imprime os dados 
dos funcionários nas classes Gerente, 
Telefonista e Secretaria para acrescentar a 
impressão dos dados específicos de cada tipo 
de funcionário.
• 10) Modifique a classe TestaFuncionario para 
utilizar também o método mostraDados().

*/
package testafuncionarios;


public class TestaFuncionarios {

    
    public static void main(String[] args) {
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
        //System.out.println("Nome: " + g.getNome());
        //System.out.println("Salário: " + g.getSalario());
        //System.out.println("Bonificação: " + g.calculaBonificacao());
        g.mostraDados();
        //System.out.println("Usuário: " + g.getUsuario());
        System.out.println("Senha: " + g.getSenha());
        System.out.println("Codigo: " + g.getCodigo());
        
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
        //System.out.println("Nome: " + t.getNome());
        //System.out.println("Salário: " + t.getSalario());
        //System.out.println("Bonificação: " + t.calculaBonificacao());
        t.mostraDados();
        //System.out.println("Código da Estação de Trabalho: " + t.getCodEstacao());
               
        // SECRETARIA
        Secretaria s = new Secretaria();
        ControleDePonto secretaria = new ControleDePonto();
        s.setNome("Bianca");
        s.setSalario(3000);
        s.setRamal(1030);
        s.setCodigo(20);
        ponto.registraEntrada(s);
        ponto.registraSaida(s);
        
        System.out.println("SECRETÁRIA");
        //System.out.println("Nome: " + s.getNome());
        //System.out.println("Salário: " + s.getSalario());
        //System.out.println("Bonificação: " + s.calculaBonificacao());
        s.mostraDados();
        //System.out.println("Ramal: " + s.getRamal());
        
        
    }
}

    
    


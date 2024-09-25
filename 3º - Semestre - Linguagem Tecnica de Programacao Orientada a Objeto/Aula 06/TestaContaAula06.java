/*
 Aula 06 Aula 6 – Apresentação dos conceitos básicos 
da Programação Orientada a Objetos  - 24/08/2023
Exemplo e Exercícios 1, 2, 3, 4 e 5
 */
package testacontaaula06;

public class TestaContaAula06 {
    
    public static void main(String[] args) {
       // CONTA
       Conta referencia = new Conta();
       //referencia.saldo = 1000.00;
       //referencia.limite = 500.00;
       //referencia.numero = 1;        
        System.out.println("Saldo: " + referencia.saldo);
        System.out.println("Limite: " + referencia.limite);
        System.out.println("Numero: " + referencia.numero);
        
        // CLIENTE (Exercício 1 Aula 06 24/08/2023)
        Cliente cliente1 = new Cliente();
        cliente1.setNome("Fernando");
        cliente1.getCodigo(1);
        Cliente cliente2 = new Cliente();
        cliente2.setNome("Arthur");
        cliente2.getCodigo(2);
        //cliente1.nome = "Fernando";
        //cliente1.codigo = 10;
        //cliente2.nome = "Arthur";
        //cliente2.codigo = 20;
        System.out.println("Nome: " + cliente1.getNome);
        System.out.println("Codigo Cliente: " + cliente1.setCodigo);
        System.out.println("Nome: " + cliente2.getNome);
        System.out.println("Codigo Cliente: " + cliente2.setCodigo);
        
        //CARTÃO DE CREDITO (Exercício 2 Aula 06 24/08/2023)
        CartaoDeCredito cartao1 = new CartaoDeCredito();
        
        CartaoDeCredito cartao2 = new CartaoDeCredito();
        //cartao1.dataDeValidade = "09/2028";
        //cartao1.numero = 25303388;
        //cartao2.dataDeValidade = "10/2028";
        //cartao2.numero = 33882530;
        System.out.println("Validade: " + cartao1.dataDeValidade);
        System.out.println("Numero: " + cartao1.numero);
        System.out.println("Validade: " + cartao2.dataDeValidade);
        System.out.println("Numero: " + cartao2.numero);
        
        // AGENCIA E UF (Exercício 3 Aula 06 24/08/2023)
        Agencia agencia1 = new Agencia();
        Agencia agencia2 = new Agencia();
        agencia1.numero = 2510;
        agencia1.uf = "DF";
        agencia2.numero = 1025;
        agencia2.uf = "GO";
        System.out.println("Agencia: " + agencia1.numero);
        System.out.println("UF: " + agencia1.uf);
        System.out.println("Agencia: " + agencia2.numero);
        System.out.println("UF: " + agencia2.uf);
        
        
        //CartaoDeCredito cdc1 = new CartaoDeCredito();
        //cdc1.cliente.nome = "Fernando";
        //System.out.println("Nome do cdc1: " + cdc1.cliente.nome);
        
    }
    
}

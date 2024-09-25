/*
 Exercício 2 - Os bancos oferecem aos clientes a 
possibilidade de obter um cartão de crédito que 
pode ser utilizados para fazer compras. Um cartão 
de crédito possui um número e uma data de 
validade. Crie uma classe (CartaoDeCredito) 
para modelar os objetos que representarão os 
cartões de crédito. Faça um teste criando dois 
objetos da classe CartaoDeCredito (cartao1 e 
cartao2). Altere e imprima os atributos desses 
objetos
 */
package testacontaaula06;

public class CartaoDeCredito {
    private int numero;
    private String dataDeValidade;
    private Cliente cliente;
    
    public void setNumero(int numero){ // set grava/guarda valor
        this.numero = numero;
    }
    public double getNumero(){ // get mostra valor
        return numero;
    }
    public void setDataDeValidade(String dataDeValidade){ // set grava/guarda valor
        this.dataDeValidade = dataDeValidade;
    }
    public String getDataDeValidade(){ // get mostra valor
        return dataDeValidade;
    }
    public void setCliente(Cliente cliente){ // set grava/guarda valor
        this.cliente = cliente;
    }
    public Cliente getCliente(){ // get mostra valor
        return cliente;
    }
}

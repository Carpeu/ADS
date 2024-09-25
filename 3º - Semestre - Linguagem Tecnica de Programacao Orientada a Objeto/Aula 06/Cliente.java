/*
 Exercício 1 
Implemente uma classe para definir os objetos 
que representarão os clientes de um banco (Class 
Cliente). Essa classe deve ter dois atributos: um 
para os nomes e outro para os códigos dos 
clientes. Faça um teste criando dois objetos da 
classe Cliente e carregando os seus atributos 
(Exemplo: cliente1 e cliente2) na Classe 
TestaConta
 */
package testacontaaula06;

public class Cliente {
    private String nome;
    private int codigo;
    
    public void setNome(String nome){ // set grava/guarda valor
        this.nome = nome;
    }
    public String getNome(){ // get mostra valor
        return nome;
    }
    public void steCodigo(int codigo){ // set grava/guarda valor
        this.codigo = codigo;
}
    public int getCodigo(){ // get mostra valor
        return codigo;
    }
    
}

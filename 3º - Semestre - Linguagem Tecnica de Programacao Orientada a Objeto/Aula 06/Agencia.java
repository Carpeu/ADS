/*
 Exercício 3 - As agências do banco possuem número e uf 
(unidade federativa) de localização. Crie uma 
classe para definir os objetos que representarão 
as agências. Faça um teste criando dois objetos 
da classe Agencia. Altere e imprima os atributos 
desses objetos
 */
package testacontaaula06;

public class Agencia {
    int numero;
    String uf;
    
    public void setNumero(int numero){ // set grava/guarda valor
        this.numero = numero;
    }
    public int getNumero(){ // get mostra valor
        return numero;
    }
    public void setUf(String uf){ // set grava/guarda valor
        this.uf = uf;
    }
    public String getUf(){ // get mostra valor
        return uf;
    }
}

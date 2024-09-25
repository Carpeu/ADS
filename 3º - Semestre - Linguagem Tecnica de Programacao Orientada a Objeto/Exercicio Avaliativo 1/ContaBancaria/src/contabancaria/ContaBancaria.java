
package contabancaria;


public class ContaBancaria {

    private String cliente;
    private int num_conta;
    float saldo;

    public String getCliente() {
        return cliente;
    }

    public void setCliente(String cliente) {
        this.cliente = cliente;
    }

    public int getNum_conta() {
        return num_conta;
    }

    public void setNum_conta(int num_conta) {
        this.num_conta = num_conta;
    }

    public float getSaldo() {
        return saldo;
    }

    public void setSaldo(float saldo) {
        this.saldo = saldo;
    }

    public ContaBancaria(String cliente, int num_conta, float saldo) {
        this.cliente = cliente;
        this.num_conta = num_conta;
        this.saldo = saldo;
    }
    public void sacar(float valor) {
        if (valor <= saldo) {
            saldo -= valor;
        } else {
            System.out.println("Saldo insuficiente ");
        }
    }
    public void depositar(float valor) {
        saldo += valor;
        
        public void mostrarDados() {
        System.out.println("Nome do cliente: " + cliente);
        System.out.println("Número da Conta: " + num_conta);
        System.out.println("Saldo Atual: " + saldo);
    }
}
        
/* Exercicio valendo 4 pontos 28/09/2023
Elabore uma classe ContaBancaria, com seguintes membros:
atributo String cliente
atributo int num_conta
atributo float saldo
metodo sacar (o saldo não pode ficar negativo)
metodo depoistar
Agora acrecente ao projeto duas classes herdadas de ContaBancaria: ContaPoupança e
ContaEspecial, com as seguintes caracteristicas a mais:
Classe ContaPoupança:
atributo int dia de rendimento
metodo calcularNovoSaldo, recebe a taxa de rendimento da poupança e atualiza o saldo
Classe ContaEspacial
atributo float limite
redefinição do metodo sacar, permitindo saldo negativo até o valor limite
Apos a implementação das classes acima, você devera implementar uma classe Contas.java,
contendo o metodo main. Nesta classe voce devera implementar:
a) Incluir dados relativos a(s) conta(s) de um cliente
b) Sacar um determinado valor da(s) sua(s) conta(s)
c) Depositar um determinado valor na(s) sua(s) conta(s)
d) Mostrar o novo saldo do cliente, a partir da taxa de rendimento daqueles que 
possuem conta poupança
e) Mostrar os dado(s) da(s) conta(s) de um cliente.*/      
    
    


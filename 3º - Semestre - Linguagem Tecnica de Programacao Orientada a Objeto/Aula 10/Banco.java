
package banco;

import javax.swing.JOptionPane;

public class Banco {

    public static void main(String[] args) {
        Conta c1 = new Conta(0, 0, 1);
        Conta c2 = new Conta(0, 0, 2);
        String valor = 
                JOptionPane.showInputDialog("Digite um valor para deposito");
        double saldo = Double.parseDouble(valor);
        c1.deposita(saldo);
        c1.consultaSaldo();
        
        valor = 
                JOptionPane.showInputDialog("Digite um valor para saque");
        saldo = Double.parseDouble(valor);
        c1.saca(saldo);
        
        
        c1.consultaSaldo();
        
        valor = 
                JOptionPane.showInputDialog("Digite um valor para deposito");
        saldo = Double.parseDouble(valor);
        c2.deposita(saldo);
        c2.consultaSaldo();
        valor = 
                JOptionPane.showInputDialog("Digite um valor para saque");
        saldo = Double.parseDouble(valor);
        
        c2.saca(saldo);
        c2.consultaSaldo();
        
        
//        Cliente pessoa = new Cliente("nome", 1);
//        String nome =
//                JOptionPane.showInputDialog("Digite o nome do Cliente:");
//        pessoa.setNome(nome);
//        String mensagem2 = String.format("Nome: " + pessoa.getNome());
//        JOptionPane.showMessageDialog(null, mensagem2);

boolean tranferenciaRealizada = false;
        do{
            c1.consultaSaldo();
            c2.consultaSaldo();
            String transferencia =
            JOptionPane.showInputDialog("Digite a quantidade a ser tranferida:");
            double qtd = Double.parseDouble(transferencia);
            double temp = c1.getSaldo();
            if(temp>=qtd){
                c1.saca(qtd);
                c2.deposita(qtd);
                tranferenciaRealizada = true;
                c1.consultaSaldo();
                c2.consultaSaldo();
                    }else{
                String mensagem =
                String.format("Voce não pode tranferir esse valor.Saldo disponivel:" + temp);
        JOptionPane.showMessageDialog(null,mensagem);
                    
                    }
        
        }
        while(tranferenciaRealizada == false);

                
    }
    
    
}

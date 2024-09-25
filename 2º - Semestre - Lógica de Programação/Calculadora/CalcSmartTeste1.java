package calcsmartteste1;

import javax.swing.JOptionPane;

public class CalcSmartTeste1 {

    
    public static void main(String[] args) {
        int Ad, Sub, Mult, Div, n1, n2;
        String numero1, numero2;
        
        numero1 = JOptionPane.showInputDialog("Digite o 1º Valor: ");
        numero2 = JOptionPane.showInputDialog("Digite o 2º Valor: ");
        
        n1 = Integer.parseInt(numero1);
        n2 = Integer.parseInt(numero2);
        
        Ad = n1+n2;
        Sub = n1-n2;
        Mult = n1*n2;
        Div = n1/n2;
        
        JOptionPane.showMessageDialog(null, "Resultados" + "\n1 - Adicao = " + Ad + 
                "\n2 - Subtracao = " + Sub + "\n3 - Multiplicacao = " + Mult + "\n4 - Divisao = " + Div);
        System.exit(0);
    }
}

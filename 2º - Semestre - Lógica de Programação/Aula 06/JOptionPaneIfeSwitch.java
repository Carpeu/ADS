
package joptionpaneifeswitch;

import javax.swing.JOptionPane;


public class JOptionPaneIfeSwitch {


    public static void main(String[] args) {
        String num1, num2, operador;
        double n1, n2, total = 0;
       
        num1 = JOptionPane.showInputDialog("Digite o primeiro valor: ");
        operador = JOptionPane.showInputDialog("Escolha o operador: (+, -, /, *)");
        num2 = JOptionPane.showInputDialog("Digite o segundo valor: ");
       
        n1 = Double.parseDouble(num1);
        n2 = Double.parseDouble(num2);
       
        switch(operador)
        {
            case "+": total = n1 + n2; break;
            case "-": total = n1 - n2; break;
            case "*": total = n1 * n2; break;
            case "/": total = n1 / n2; break;
            default: JOptionPane.showMessageDialog(null, "Operador invalido!");
        }
       
        JOptionPane.showMessageDialog(null, n1+" "+operador+" "+n2+" = "+total);
       
    }
   
}

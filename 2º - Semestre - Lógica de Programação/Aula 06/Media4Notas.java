
package media4notas;


import javax.swing.JOptionPane;

public class Media4Notas {

    public static void main(String[] args) {
       int n1 = 0, n2 = 0, n3 = 0, n4 = 0, media = 0;
       String primeiroNumero, segundoNumero, terceiroNumero, quartoNumero;
       
       
       primeiroNumero = JOptionPane.showInputDialog("Informe a 1ª nota");
       segundoNumero = JOptionPane.showInputDialog("Informe a 2ª nota");
       terceiroNumero = JOptionPane.showInputDialog("Informe a 3ª nota");
       quartoNumero = JOptionPane.showInputDialog("Informe a 4ª nota");
           
       n1 = Integer.parseInt(primeiroNumero);
       n2 = Integer.parseInt(segundoNumero);
       n3 = Integer.parseInt(terceiroNumero);
       n4 = Integer.parseInt(quartoNumero);
       
       media = (n1+n2+n3+n4)/4;
        
       
       JOptionPane.showMessageDialog(null,"A media é: " + media, "Resultado da Media: ", JOptionPane.PLAIN_MESSAGE);
       System.exit(0);
       
       
        
        
    }
    
}

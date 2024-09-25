
package operadorderestogparakg;

import java.util.Scanner;

public class OperadorDeRestoGparaKG {

    public static void main(String[] args) {
      Scanner input = new Scanner(System.in);
 
 System.out.println("insira um valor em gramas");
 int gramas = input.nextInt();
 
 int kilos = gramas / 1000;
 gramas = gramas % 1000; /* % nesse caso é o Operador de resto. */
 
 System.out.println("O total de kilos e = "+ kilos);
 System.out.println("O total de gramas e = "+ gramas);
 }
}

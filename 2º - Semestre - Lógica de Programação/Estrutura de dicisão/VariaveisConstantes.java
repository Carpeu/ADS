package variaveisconstantes;
import java.util.*;
public class VariaveisConstantes {

    public static void main(String[] args) {
        final double PI = 3.1459;    /* As variáveis finais é uma variável ou atributo final pode ser inicializada em algum momento após a sua declaração,
        porém uma vez atribuído um valor, este não poderá mais ser alterado.*/
 Scanner input = new Scanner(System.in);
 
 System.out.println("Informe o valor do raio");
 double raio = input.nextDouble();
 
 double area = raio * raio * PI;
 
 System.out.println("O valor da area e = " + area);
 
 
 }
}
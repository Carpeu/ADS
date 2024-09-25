package casting;


public class Casting {

    public static void main(String[] args) {
      int x = 10;
 int y = 6; int z = 3;
 double a = 3; 
 double b = 1.0;
 double c = (double)x / y;  //(double)x é o casting da variavel X.
 int h = (int)c;  //  int h = (int)c é o Casting da variavel C.
 
 System.out.println("x = " + x);
 System.out.println("y = " + y);
 System.out.println("z = " + z);
 
 System.out.println("a = " + a);
 System.out.println("b = " + b);
 System.out.println("c = " + c);
 System.out.println("h = " + h);       
              
 //double c = (double)x / y; 
// Operação matemática entre 2 variaveis inteiros (int x / int y) 
//o resultado é preciso, ou seja a parte decimal é ignorada.             
    //Casting - é possível se atribuir o valor de um tipo de variável a outro tipo de variável, 
    //porém para tal é necessário que esta operação seja apontada ao compilador.          
    }
    
}

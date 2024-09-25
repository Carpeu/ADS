public class OperadorTernario {

    public static void main(String[] args) {
	int meuInt = 2;
	int meuIntB = 3;
	int meuIntC = 4;
		meuInt = meuIntB>meuIntC ? meuIntB : meuIntC;
		System.out.println("meuInt = " + meuInt);
		String retorno;
		int meuPrimeiro = 20;
		int meuSegundo = 23;
		retorno = (meuPrimeiro % 2 == 0) ? "Par" : "Impar";
		System.out.println("meuPrimeiro e " + retorno);
		retorno = (meuSegundo % 2 == 0) ? "Par" : "Impar";
		System.out.println("meuSegundo e " + retorno);
 	
    }
    
}

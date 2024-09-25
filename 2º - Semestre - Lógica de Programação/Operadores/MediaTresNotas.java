public class MediaTresNotas {
	public static void main (String [] args) {
		float nota1, nota2, nota3, media;
		nota1=8; nota2=8.9F; nota3=7;
		media = (nota1+nota2+nota3)/3;
		System.out.println ("Media do Aluno: "+ media);
			if (media >=6) {
				System.out.println ("Aluno aprovado");
			}
			else{
				System.out.println ("Aluno reprovado");
}
}
}
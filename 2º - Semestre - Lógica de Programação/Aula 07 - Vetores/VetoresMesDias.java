
package vetoresmesdias;


public class VetoresMesDias {

    
    public static void main(String[] args) {
        
        String mes[] = {"janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", 
            "Setembro", "Outubro", "Novembro", "Dezembro"};
        int diasMes[] = {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31};
        int i;
        
        for(i = 0; i<12; i++){ 
            System.out.printf("%s tem %d dias. \n", mes[i], diasMes[i]);

    }
        
        }
} 
    /* o especificador de formato %s, é um marcador de lugar para uma String 

Como usar o %d no Java?
Veja no exemplo da Listagem 4, o especificador de formato %s, que é um marcador de lugar para uma String, se for especificado um número no lugar irá gerar um erro.
...
O método printf()
%d	representa números inteiros
%2f	representa números doubles
%b	representa valores booleanos
%c	representa valores char


Sequência de escape	Descrição
\n	Nova linha. Posiciona o cursor de tela no início da próxima linha
\t	Tabulação horizontal. Move o cursor de tela para a próxima parada de tabulação.
\r	Posiciona o cursor da tela no início da linha atual - não avança para a próxima linha. 
        Qualquer saída de caracteres gerada depois de algum retorno já gerado é sobrescrito os caracteres anteriores gerados na linha atual.
\\	Barras invertidas. Utilizada para imprimir um caractere de barra invertida.
\”	Aspas duplas. Utilizada para imprimir um caractere de aspas duplas. Exemplo, System.out.println(“\”aspas\””); exibe “aspas”
*/


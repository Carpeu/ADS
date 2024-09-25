#include <iostream>  // Inclui a biblioteca de entrada e sa�da
using namespace std;  // Permite o uso de nomes sem o prefixo "std::"

struct aluno {// Define uma estrutura chamada "aluno" que cont�m dois campos: matricula e nota
    int matricula;  // Campo para armazenar a matr�cula do aluno (um n�mero inteiro)
    float nota;     // Campo para armazenar a nota do aluno (um n�mero decimal)
} alunos[4];        // Cria um array de 4 estruturas "aluno" chamado "alunos"

int main() { 
    const int QTD_ALUNOS = 4;  // Define uma constante para a quantidade de alunos
    struct aluno alunos[QTD_ALUNOS];  // Cria um array de 4 estruturas "aluno" chamado "alunos"
    int i;  // Vari�vel do tipo inteiro
    float media, soma = 0;  // Vari�veis para armazenar a soma e m�dia das notas

    for(i = 0; i < QTD_ALUNOS; i++) {// Loop para entrada de dados dos alunos
        cout << "Digite os dados do " << i+1 << "o aluno: ";  // Solicita a matr�cula do aluno
        cin >> alunos[i].matricula;  // Recebe a matr�cula do aluno
        cout << "Digite a nota do " << i+1 << "o aluno ";  // Solicita a nota do aluno
        cin >> alunos[i].nota;  // Recebe a nota do aluno
        soma = soma + alunos[i].nota;  // Adiciona a nota do aluno � soma total
    }
    for(i = 0; i < QTD_ALUNOS; i++) { // Loop para exibir os dados dos alunos
        cout << "\nAluno: " << i+1;  // Exibe o n�mero do aluno
        cout << "\nMatricula: " << alunos[i].matricula;  // Exibe a matr�cula do aluno
        cout << "\nNota: " << alunos[i].nota;  // Exibe a nota do aluno
    }
    for(i = 0; i < QTD_ALUNOS; i++) { // Loop para exibir os dados dos alunos
        cout << "\nAluno " << i+1 << ":";  // Exibe o n�mero do aluno
        cout << "\nMatricula: " << alunos[i].matricula;  // Exibe a matr�cula do aluno
        cout << "\nNota: " << alunos[i].nota;  // Exibe a nota do aluno
    }
    media = soma / QTD_ALUNOS;  // Calcula a m�dia das notas dos alunos
    cout << "\nMedia das notas dos alunos: " << media;  // Exibe a m�dia das notas
 
    for(i = 0; i < QTD_ALUNOS; i++) { // Loop para comparar a m�dia com as notas dos alunos
        if (media > alunos[i].nota) {  // Se a m�dia for maior que a nota do aluno
            cout << "\nA media e maior que a nota do aluno " << alunos[i].matricula;  // Informa que a m�dia � maior
        } else if (media < alunos[i].nota) {  // Se a m�dia for menor que a nota do aluno
            cout << "\nAluno " << i+1;
	   		cout << "\nMatricula: " << alunos[i].matricula;
	   		cout << "\nNota: " << alunos[i].nota;
        } else {  // Se a m�dia for igual � nota do aluno
            cout << "\nAluno " << i+1;
	   		cout << "\nMatricula: " << alunos[i].matricula;
	   		cout << "\nNota: " << alunos[i].nota;
        }
    }
}


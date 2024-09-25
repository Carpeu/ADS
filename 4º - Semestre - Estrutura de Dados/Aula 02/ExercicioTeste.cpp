#include <iostream>
using namespace std;

int main() {
    const int MAX_ALUNOS = 100; // Limite máximo de alunos
    int numAlunos, i;
    float nota, soma = 0, media;
    int acimaMedia = 0, abaixoMedia = 0;

    // Solicita o número de alunos matriculados
    cout << "Digite o numero de alunos matriculados (maximo 100): ";
    cin >> numAlunos;

    // Valida a entrada
    while (numAlunos <= 0 || numAlunos > MAX_ALUNOS) {
        cout << "Numero de alunos inválido. Digite um valor entre 1 e 100: ";
        cin >> numAlunos;
    }

    // Leitura das notas e cálculo da soma
    for (i = 0; i < numAlunos; i++) {
        cout << "Digite a nota do aluno " << i + 1 << ": ";
        cin >> nota;
        soma += nota;

        // Contagem de notas acima e abaixo da média
        if (nota >= media) {
            acimaMedia++;
        } else {
            abaixoMedia++;
        }
    }

    // Cálculo da média
    media = soma / numAlunos;

    // Resultados
    cout << "\nMedia das notas: " << media << endl;
    cout << "Numero de notas acima ou igual a media: " << acimaMedia << endl;
    cout << "Numero de notas abaixo da media: " << abaixoMedia << endl;

    return 0;
}

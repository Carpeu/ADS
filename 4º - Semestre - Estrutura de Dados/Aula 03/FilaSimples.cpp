#include <iostream>
#include <string.h>
#define MAX_FILA 5 // Tamanho máximo da fila
using namespace std;

struct DADOS_ALUNO {
    int CodAluno;
    char Nome[100];
    int Turma;
};

bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila);
bool ExibirPrimeiro(DADOS_ALUNO Fila[], int IniFila, int FimFila);
bool Desenfileirar(DADOS_ALUNO Fila[], int &PosicaoFim);

int main() { 
    DADOS_ALUNO FilaAlunos[MAX_FILA];
    int IniFila = 0;
    int FimFila = 0;
    bool Ret; 
    int CodAluno, Turma;
    char Nome[100];
    int opcao;
    
    do {
        cout << "\nMenu de Operacoes:\n";
        cout << "1. Enfileirar aluno\n";
        cout << "2. Exibir primeiro\n";
        cout << "3. Desenfileirar\n";
        cout << "4. Sair\n";
        cout << "Digite uma opcao: ";
        cin >> opcao;

        switch(opcao) {
            case 1:
                cout << "Insercao: " << endl;
                cout << "Digite o codigo do aluno: ";
                cin >> CodAluno;
                cout << "Digite o nome do aluno: ";
                cin >> Nome;
                cout << "Digite a turma: ";
                cin >> Turma;

                Ret = Enfileirar(FilaAlunos, CodAluno, Nome, Turma, FimFila);
                if (Ret == true) {
                    cout << "Insercao efetuada com sucesso!" << endl;
                }
                break;
            case 2:
                Ret = ExibirPrimeiro(FilaAlunos, IniFila, FimFila);
                if (Ret == false) {
                    cout << "Nao foi possivel exibir a fila." << endl;
                }
                break;
            case 3:
                Ret = Desenfileirar(FilaAlunos, FimFila);
                if (Ret == false) {
                    cout << "Nao foi possivel desenfileirar a fila!" << endl;
                } else {
                    cout << "Primeiro da fila desenfileirado com sucesso!" << endl;
                }
                break;
            case 4:
                cout << "Saindo do programa..." << endl;
                break;
            default:
                cout << "Opcao invalida. Tente novamente." << endl;
        }
    } while(opcao != 4);

    return 0;
}

bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila) {
    if (FimFila == MAX_FILA) {
        cout << "ERRO: Fila cheia." << endl;
        return false;
    } else {
        Fila[FimFila].CodAluno = CodAluno;
        strcpy(Fila[FimFila].Nome, Nome);
        Fila[FimFila].Turma = Turma;
        FimFila++;
    }
    return true;
}

bool ExibirPrimeiro(DADOS_ALUNO Fila[], int IniFila, int FimFila) {
    if (FimFila == 0) {
        cout << "ERRO: Fila vazia." << endl;
        return false;
    }
    cout << "\nCodigo do Aluno: " << Fila[IniFila].CodAluno << endl;
    cout << "Nome: " << Fila[IniFila].Nome << endl;
    cout << "Turma: " << Fila[IniFila].Turma << endl;
    return true;
}

bool Desenfileirar(DADOS_ALUNO Fila[], int &PosicaoFim) {
    int i;
    if (PosicaoFim == 0) {
        cout << "ERRO: Fila vazia!" << endl;
        return false;
    }
    for (i = 0; i < PosicaoFim - 1; i++) {
        Fila[i] = Fila[i + 1];
    }
    PosicaoFim--;
    return true;
}


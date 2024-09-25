#include <iostream>
#include <string.h>
#define MAX_FILA 5 // Tamanho máximo da fila circular
using namespace std;

struct DADOS_ALUNO {
    int CodAluno;
    char Nome[100];
    int Turma;
    bool Removido;
};

// Assinaturas das funções
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila);
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila);
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila); 
bool VerificarQuantidade(int TotalFila);

int main() { 
    DADOS_ALUNO FilaAlunos[MAX_FILA];
    int IniFila = 0;
    int FimFila = 0;
    int TotalFila = 0;
    int opcao; 
    bool Ret; 
    int CodAluno, Turma;
    char Nome[100];

    do {
        // Exibe o menu de opções
        cout << "\nMenu de Opcoes:" << endl;
        cout << "1. Enfileirar" << endl;
        cout << "2. Exibir" << endl;
        cout << "3. Desenfileirar" << endl;
        cout << "4. Verificar quantidade de alunos" << endl;
        cout << "5. Sair" << endl;
        cout << "Escolha uma opcao: ";
        cin >> opcao;

        switch (opcao) {
            case 1: // Enfileirar
                cout << "Insercao: " << endl;
                cout << "Digite o codigo do aluno: ";
                cin >> CodAluno;
                cout << "Digite o nome do aluno: ";
                cin >> Nome;
                cout << "Digite a turma: ";
                cin >> Turma;

                Ret = Enfileirar(FilaAlunos, CodAluno, Nome, Turma, FimFila, TotalFila);
                if (Ret == true) {
                    cout << "Insercao efetuada com sucesso!" << endl;
                }
                break;
                
            case 2: // Exibir
                Ret = Exibir(FilaAlunos, IniFila, FimFila, TotalFila);
                if (Ret == false) {
                    cout << "Nao foi possivel exibir a fila." << endl;
                }
                break;

            case 3: // Desenfileirar
                Ret = Desenfileirar(FilaAlunos, IniFila, TotalFila); 
                if (Ret == false) {
                    cout << "Nao foi possivel desenfileirar a fila!" << endl;
                } else {
                    cout << "Primeiro da fila desenfileirado com sucesso!" << endl;
                }
                break;

            case 4: // Verificar quantidade de alunos
                VerificarQuantidade(TotalFila);
                break;

            case 5: // Sair
                cout << "Sair do programa..." << endl;
                break;

            default:
                cout << "Opcao invalida. Tente novamente." << endl;
        }
    } while (opcao != 5); // Repete o menu até que o usuário escolha sair
}

// Função para enfileirar (inserir um aluno na fila)
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila) {
    if (TotalFila == MAX_FILA) {
        cout << "ERRO: Fila cheia." << endl;
        return false;
    } else {
        Fila[FimFila].CodAluno = CodAluno;
        strcpy(Fila[FimFila].Nome, Nome);
        Fila[FimFila].Turma = Turma;
        Fila[FimFila].Removido = false;
        FimFila++;
        if (FimFila == MAX_FILA) 
            FimFila = 0;
        TotalFila++;  
    }
    return true;
}

// Função para exibir todos os alunos na fila
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila) {
    int ind;
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia." << endl;
        return false;
    }
    if (IniFila < FimFila) {
        for(ind = IniFila; ind < FimFila; ind++) {
            cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
            cout << "Nome: " << Fila[ind].Nome << endl;
            cout << "Turma: " << Fila[ind].Turma << endl;
        }
    } else {
        for(ind = IniFila; ind < MAX_FILA; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
        for(ind = 0; ind < FimFila; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
    }
    return true;
}

// Função para desenfileirar (remover o primeiro aluno da fila)
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila) {
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia!" << endl;
        return false;
    }
    Fila[IniFila].Removido = true;
    cout << "\nElemento desenfileirado com sucesso!\n";
    IniFila++;
    if (IniFila == MAX_FILA)
        IniFila = 0;
    TotalFila--;
    return true;
}

// Função para verificar a quantidade de alunos na fila
bool VerificarQuantidade(int TotalFila) {
    cout << "Quantidade de alunos na fila: " << TotalFila << endl;
}



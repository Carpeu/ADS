#include <iostream>   // Inclui a biblioteca padr�o de entrada e sa�da
#include <string.h>   // Inclui a biblioteca para manipula��o de strings (fun��es como strcpy)
#define MAX_FILA 5    // Define o tamanho m�ximo da fila circular como 5
using namespace std;  // Permite usar elementos da biblioteca padr�o sem o prefixo "std::"

// Estrutura para armazenar os dados de um aluno
struct DADOS_ALUNO {
    int CodAluno;       
    char Nome[100];     
    int Turma;          
    bool Removido;      
};

// Declara��o (assinaturas) das fun��es que ser�o usadas no programa
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila);
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila);
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila); 
// O "&" significa que est� passando o valor por refer�ncia

int main() { 
    // Declara��o e inicializa��o das vari�veis
    DADOS_ALUNO FilaAlunos[MAX_FILA];  // Fila de alunos, usando o tamanho m�ximo definido
    int IniFila = 0;                   // �ndice inicial da fila
    int FimFila = 0;                   // �ndice final da fila
    int TotalFila = 0;                 // Quantidade total de elementos na fila
    bool Ret;                          // Vari�vel de retorno para verificar o sucesso das fun��es
    int CodAluno, Turma;               // Vari�veis para armazenar o c�digo e a turma do aluno
    char Nome[100];                    // Vari�vel para armazenar o nome do aluno
    
    // Coletando dados do aluno para inser��o na fila
    cout << "Insercao: " << endl;
    cout << "Digite o codigo do aluno: ";
    cin >> CodAluno;                   // L� o c�digo do aluno
    cout << "Digite o nome do aluno: ";
    cin >> Nome;                       // L� o nome do aluno
    cout << "Digite a turma: ";
    cin >> Turma;                      // L� a turma do aluno

    // Chama a fun��o de enfileirar para inserir o aluno na fila
    Ret = Enfileirar(FilaAlunos, CodAluno, Nome, Turma, FimFila, TotalFila);
    if (Ret == true) {
        cout << "Insercao efetuada com sucesso!" << endl;  // Exibe mensagem de sucesso
    }

    // Chama a fun��o de exibir para mostrar a fila
    Ret = Exibir(FilaAlunos, IniFila, FimFila, TotalFila);
    if (Ret == false) {
        cout << "Nao foi possivel exibir a fila." << endl; // Exibe mensagem de erro, caso n�o consiga exibir a fila
    }

    // Chama a fun��o de desenfileirar para remover o primeiro elemento da fila
    Ret = Desenfileirar(FilaAlunos, IniFila, TotalFila); 
    if (Ret == false) {
        cout << "Nao foi possivel desenfileirar a fila!" << endl;  // Exibe mensagem de erro caso a fila esteja vazia
    } else {
        cout << "Primeiro da fila desenfileirado com sucesso!" << endl;  
		// Exibe mensagem de sucesso ao remover o primeiro da fila
    }
}

// Fun��o para enfileirar (inserir um aluno na fila)
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila) {
    // Verifica se a fila est� cheia
    if (TotalFila == MAX_FILA) {
        cout << "ERRO: Fila cheia." << endl;
        return false;  // Retorna falso caso a fila esteja cheia
    } else {
        // Insere os dados do aluno na posi��o atual de FimFila
        Fila[FimFila].CodAluno = CodAluno;
        strcpy(Fila[FimFila].Nome, Nome); // Copia o nome do aluno
        Fila[FimFila].Turma = Turma;
        Fila[FimFila].Removido = false;   // Marca o aluno como n�o removido
        FimFila++;   // Incrementa o �ndice de FimFila

        // Se FimFila alcan�ar o limite m�ximo, volta para o in�cio (fila circular)
        if (FimFila == MAX_FILA) 
            FimFila = 0;
        TotalFila++;   // Incrementa o n�mero total de alunos na fila
    }
    return true;  // Retorna verdadeiro indicando que a inser��o foi bem-sucedida
}

// Fun��o para exibir todos os alunos na fila
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila) {
    int ind;  // �ndice para percorrer a fila

    // Verifica se a fila est� vazia
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia." << endl;
        return false;  // Retorna falso se a fila estiver vazia
    }

    // Exibe os elementos da fila de acordo com a posi��o dos �ndices
    if (IniFila < FimFila) {
        // Caso o �ndice inicial seja menor que o final, exibe diretamente
        for(ind = IniFila; ind < FimFila; ind++) {
            cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
            cout << "Nome: " << Fila[ind].Nome << endl;
            cout << "Turma: " << Fila[ind].Turma << endl;
        }
    } else {
        // Caso contr�rio, trata a fila circular exibindo primeiro de IniFila at� o fim
        for(ind = IniFila; ind < MAX_FILA; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
        // Depois, exibe de 0 at� FimFila
        for(ind = 0; ind < FimFila; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
    }
    return true;  // Retorna verdadeiro indicando que a exibi��o foi bem-sucedida
}

// Fun��o para desenfileirar (remover o primeiro aluno da fila)
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila) {
    // Verifica se a fila est� vazia
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia!" << endl;
        return false;  // Retorna falso se a fila estiver vazia
    }

    // Marca o primeiro elemento (IniFila) como removido
    Fila[IniFila].Removido = true;
    cout << "\nElemento desenfileirado com sucesso!\n";  // Mensagem de sucesso ao desenfileirar
    IniFila++;  // Incrementa o �ndice de IniFila

    // Se IniFila alcan�ar o limite m�ximo, volta para o in�cio (fila circular)
    if (IniFila == MAX_FILA)
        IniFila = 0;
    TotalFila--;  // Decrementa o n�mero total de alunos na fila
    return true;  // Retorna verdadeiro indicando que a remo��o foi bem-sucedida
}


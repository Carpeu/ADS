#include <iostream>   // Inclui a biblioteca padrão de entrada e saída
#include <string.h>   // Inclui a biblioteca para manipulação de strings (funções como strcpy)
#define MAX_FILA 5    // Define o tamanho máximo da fila circular como 5
using namespace std;  // Permite usar elementos da biblioteca padrão sem o prefixo "std::"

// Estrutura para armazenar os dados de um aluno
struct DADOS_ALUNO {
    int CodAluno;       
    char Nome[100];     
    int Turma;          
    bool Removido;      
};

// Declaração (assinaturas) das funções que serão usadas no programa
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila);
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila);
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila); 
// O "&" significa que está passando o valor por referência

int main() { 
    // Declaração e inicialização das variáveis
    DADOS_ALUNO FilaAlunos[MAX_FILA];  // Fila de alunos, usando o tamanho máximo definido
    int IniFila = 0;                   // Índice inicial da fila
    int FimFila = 0;                   // Índice final da fila
    int TotalFila = 0;                 // Quantidade total de elementos na fila
    bool Ret;                          // Variável de retorno para verificar o sucesso das funções
    int CodAluno, Turma;               // Variáveis para armazenar o código e a turma do aluno
    char Nome[100];                    // Variável para armazenar o nome do aluno
    
    // Coletando dados do aluno para inserção na fila
    cout << "Insercao: " << endl;
    cout << "Digite o codigo do aluno: ";
    cin >> CodAluno;                   // Lê o código do aluno
    cout << "Digite o nome do aluno: ";
    cin >> Nome;                       // Lê o nome do aluno
    cout << "Digite a turma: ";
    cin >> Turma;                      // Lê a turma do aluno

    // Chama a função de enfileirar para inserir o aluno na fila
    Ret = Enfileirar(FilaAlunos, CodAluno, Nome, Turma, FimFila, TotalFila);
    if (Ret == true) {
        cout << "Insercao efetuada com sucesso!" << endl;  // Exibe mensagem de sucesso
    }

    // Chama a função de exibir para mostrar a fila
    Ret = Exibir(FilaAlunos, IniFila, FimFila, TotalFila);
    if (Ret == false) {
        cout << "Nao foi possivel exibir a fila." << endl; // Exibe mensagem de erro, caso não consiga exibir a fila
    }

    // Chama a função de desenfileirar para remover o primeiro elemento da fila
    Ret = Desenfileirar(FilaAlunos, IniFila, TotalFila); 
    if (Ret == false) {
        cout << "Nao foi possivel desenfileirar a fila!" << endl;  // Exibe mensagem de erro caso a fila esteja vazia
    } else {
        cout << "Primeiro da fila desenfileirado com sucesso!" << endl;  
		// Exibe mensagem de sucesso ao remover o primeiro da fila
    }
}

// Função para enfileirar (inserir um aluno na fila)
bool Enfileirar(DADOS_ALUNO Fila[], int CodAluno, char Nome[], int Turma, int &FimFila, int &TotalFila) {
    // Verifica se a fila está cheia
    if (TotalFila == MAX_FILA) {
        cout << "ERRO: Fila cheia." << endl;
        return false;  // Retorna falso caso a fila esteja cheia
    } else {
        // Insere os dados do aluno na posição atual de FimFila
        Fila[FimFila].CodAluno = CodAluno;
        strcpy(Fila[FimFila].Nome, Nome); // Copia o nome do aluno
        Fila[FimFila].Turma = Turma;
        Fila[FimFila].Removido = false;   // Marca o aluno como não removido
        FimFila++;   // Incrementa o índice de FimFila

        // Se FimFila alcançar o limite máximo, volta para o início (fila circular)
        if (FimFila == MAX_FILA) 
            FimFila = 0;
        TotalFila++;   // Incrementa o número total de alunos na fila
    }
    return true;  // Retorna verdadeiro indicando que a inserção foi bem-sucedida
}

// Função para exibir todos os alunos na fila
bool Exibir(DADOS_ALUNO Fila[], int IniFila, int FimFila, int TotalFila) {
    int ind;  // Índice para percorrer a fila

    // Verifica se a fila está vazia
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia." << endl;
        return false;  // Retorna falso se a fila estiver vazia
    }

    // Exibe os elementos da fila de acordo com a posição dos índices
    if (IniFila < FimFila) {
        // Caso o índice inicial seja menor que o final, exibe diretamente
        for(ind = IniFila; ind < FimFila; ind++) {
            cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
            cout << "Nome: " << Fila[ind].Nome << endl;
            cout << "Turma: " << Fila[ind].Turma << endl;
        }
    } else {
        // Caso contrário, trata a fila circular exibindo primeiro de IniFila até o fim
        for(ind = IniFila; ind < MAX_FILA; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
        // Depois, exibe de 0 até FimFila
        for(ind = 0; ind < FimFila; ind++) {
            if (Fila[ind].Removido == false) {
                cout << "\nCodigo do Aluno: " << Fila[ind].CodAluno << endl;
                cout << "Nome: " << Fila[ind].Nome << endl;
                cout << "Turma: " << Fila[ind].Turma << endl;    
            }
        }
    }
    return true;  // Retorna verdadeiro indicando que a exibição foi bem-sucedida
}

// Função para desenfileirar (remover o primeiro aluno da fila)
bool Desenfileirar(DADOS_ALUNO Fila[], int &IniFila, int &TotalFila) {
    // Verifica se a fila está vazia
    if (TotalFila == 0) {
        cout << "ERRO: Fila vazia!" << endl;
        return false;  // Retorna falso se a fila estiver vazia
    }

    // Marca o primeiro elemento (IniFila) como removido
    Fila[IniFila].Removido = true;
    cout << "\nElemento desenfileirado com sucesso!\n";  // Mensagem de sucesso ao desenfileirar
    IniFila++;  // Incrementa o índice de IniFila

    // Se IniFila alcançar o limite máximo, volta para o início (fila circular)
    if (IniFila == MAX_FILA)
        IniFila = 0;
    TotalFila--;  // Decrementa o número total de alunos na fila
    return true;  // Retorna verdadeiro indicando que a remoção foi bem-sucedida
}


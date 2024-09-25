#include <iostream>   // Inclui a biblioteca padr�o de entrada e sa�da
#define TAM 5   // Define uma constante chamada TAM com o valor 5, representando o tamanho da pilha

using namespace std;  // Usa o namespace padr�o std, facilitando o uso de fun��es da biblioteca padr�o C++

// Fun��o para empilhar um valor na pilha
void empilha(int p[], int &t, int v);
// Fun��o para desempilhar um valor da pilha
int desempilha(int p[], int &t, int &v);
// Fun��o para mostrar o valor do topo da pilha
void mostraTopo(int p[], int &t);
// Fun��o para mostrar a situa��o atual da pilha (quantidade de elementos e espa�o dispon�vel)
void situacaoPilha(int p[], int &t);
// Fun��o para mostrar os elementos pares na pilha
void mostrarPares(int p[], int &t);
// Fun��o para mostrar os elementos �mpares na pilha
void mostrarImpares(int p[], int &t);
// Fun��o para mostrar o maior elemento presente na pilha
void mostraMaior(int p[], int &t);

int main() {
    int op, val, topo = -1, pilha[TAM], resp;  // Declara��o de vari�veis: op��o, valor, topo da pilha e pilha

    // Loop principal do programa para intera��o com o usu�rio
    do {         
        // Menu de op��es
        cout << "\n Pilha (LIFO - Last In - First Out) \n\n";  // Exibe o tipo de estrutura de dados: pilha
        cout << "\n 1 - Inserir um valor na pilha";             // Op��o para inserir valor na pilha
        cout << "\n 2 - Remover um valor da pilha";             // Op��o para remover valor da pilha
        cout << "\n 3 - Mostrar o maior elemento do topo da pilha";  // Op��o para mostrar o topo da pilha
        cout << "\n 4 - Mostrar situacao da pilha";             // Op��o para exibir a situa��o da pilha
        cout << "\n 5 - Mostrar maior elemento da pilha";       // Op��o para exibir o maior elemento da pilha
        cout << "\n 6 - Mostrar elementos pares da pilha";      // Op��o para exibir os elementos pares da pilha
        cout << "\n 7 - Mostrar elementos impares da pilha";    // Op��o para exibir os elementos �mpares da pilha
        cout << "\n 8 - Sair: ";                                // Op��o para sair do programa
        cout << "\n opcao: ";                                   // Solicita que o usu�rio escolha uma op��o
        cin >> op;                                              // Armazena a op��o escolhida pelo usu�rio
        
        // Estrutura de controle que executa as fun��es conforme a escolha do usu�rio
        switch (op) {
            case 1:  // Caso o usu�rio escolha inserir valor na pilha
                cout << "Digite o valor a ser empilhado: ";  // Solicita o valor a ser empilhado
                cin >> val;   // Armazena o valor
                empilha(pilha, topo, val); // Chama a fun��o empilha para inserir o valor
                break;
            case 2:  // Caso o usu�rio escolha remover um valor da pilha
                resp = desempilha(pilha, topo, val);  // Chama a fun��o desempilha e armazena o resultado
                if (resp == 0) {  // Verifica se a pilha est� vazia
                    cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de erro caso esteja vazia
                } else {
                    cout << "\n Valor removido: " << val;  // Exibe o valor removido
                }
                break;
            case 3:  // Caso o usu�rio escolha mostrar o valor do topo da pilha
                mostraTopo(pilha, topo);  // Chama a fun��o para mostrar o topo da pilha
                break;
            case 4:  // Caso o usu�rio escolha mostrar a situa��o da pilha
                situacaoPilha(pilha, topo);  // Chama a fun��o para exibir a situa��o da pilha
                break;
            case 5:  // Caso o usu�rio escolha mostrar o maior valor da pilha
                mostraMaior(pilha, topo); // Chama a fun��o para exibir o maior valor da pilha
                break;
            case 6:  // Caso o usu�rio escolha mostrar os valores pares da pilha
                mostrarPares(pilha, topo);  // Chama a fun��o para exibir os n�meros pares
                break;  
            case 7:  // Caso o usu�rio escolha mostrar os valores �mpares da pilha
                mostrarImpares(pilha, topo);  // Chama a fun��o para exibir os n�meros �mpares
                break;
            case 8:  // Caso o usu�rio escolha sair do programa
                cout << "\n Saindo...\n";  // Exibe a mensagem de sa�da
                break;
            default:  // Caso o usu�rio digite uma op��o inv�lida
                cout << "\n OPCAO INVALIDA\n";  // Exibe mensagem de erro
        }
    } while (op != 8);  // Loop continua at� o usu�rio escolher a op��o de sair
}
// Fun��o para empilhar um valor
void empilha(int p[], int &t, int v) {
    if (t == TAM - 1) {   // Verifica se a pilha est� cheia
        cout << "\n ATENCAO! Pilha cheia\n";  // Exibe mensagem se a pilha estiver cheia
    } else {
        t++;  // Incrementa o topo
        p[t] = v;  // Insere o valor no topo da pilha
    }
}
// Fun��o para desempilhar um valor
int desempilha(int p[], int &t, int &v) {
    if (t == -1) {  // Verifica se a pilha est� vazia
        return 0;   // Retorna 0 se a pilha estiver vazia
    } else {
        v = p[t];  // Atribui o valor do topo � vari�vel v
        t--;  // Decrementa o topo
        return 1;  // Retorna 1 indicando sucesso
    }
}
// Fun��o para mostrar o valor do topo da pilha
void mostraTopo(int p[], int &t) {
    if (t == -1) {  // Verifica se a pilha est� vazia
        cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n Elemento do topo da PILHA: " << p[t];  // Mostra o valor do topo da pilha
    }
}
// Fun��o para mostrar a situa��o da pilha
void situacaoPilha(int p[], int &t) {
    int i;  // Vari�vel de controle do loop
    if (t == -1) {  // Verifica se a pilha est� vazia
        cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else if (t == TAM - 1) {  // Verifica se a pilha est� cheia
        cout << "\n ATENCAO! Pilha cheia\n";  // Exibe mensagem de pilha cheia
    } else {
        cout << "\n Total de elementos na pilha: " << t + 1 << "\n";  // Exibe o n�mero de elementos na pilha
        cout << "\n Espaco disponivel na pilha: " << TAM - (t + 1) << "\n";  // Exibe o espa�o restante
        cout << "\n\n Elementos na pilha: ";
        for (i = 0; i <= t; i++) {  // Loop para mostrar todos os elementos da pilha
            cout << " " << p[i];
        }
    }
}
// Fun��o para mostrar o maior elemento da pilha
void mostraMaior(int p[], int &t){
    int i, maior;  // Vari�veis de controle
    if (t == -1){  // Verifica se a pilha est� vazia
        cout << "\n Atencao! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        maior = p[0];  // Inicializa o maior valor com o primeiro elemento da pilha
        cout << "\n\n Elementos na pilha: ";
        for(i = 0; i <= t; i++){  // Loop para percorrer a pilha
            cout << " " << p[i];
            if (p[i] > maior) maior = p[i];  // Atualiza o maior valor se encontrar um maior
        }
        cout << "\n Maior elemento da pilha: " << maior;  // Exibe o maior elemento encontrado
    }
}
// Fun��o para mostrar os elementos pares da pilha
void mostrarPares(int p[], int &t){
    int i;  // Vari�vel de controle do loop
    if (t == -1){  // Verifica se a pilha est� vazia
        cout << "\n Atencao! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n\n Elementos pares na pilha: ";
        for(i = 0; i <= t; i++){  // Loop para percorrer a pilha
            if (p[i] % 2 == 0){  // Verifica se o elemento � par
                cout << " " << p[i];  // Exibe o n�mero par
            }
        }
    }
}
// Fun��o para mostrar os elementos �mpares da pilha
void mostrarImpares(int p[], int &t){
    int i;  // Vari�vel de controle do loop
    if (t == -1){  // Verifica se a pilha est� vazia
        cout << "\n Atencao! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n\n Elementos impares na pilha: ";
        for(i = 0; i <= t; i++){  // Loop para percorrer a pilha
            if (p[i] % 2 == 1){  // Verifica se o elemento � �mpar
                cout << " " << p[i];  // Exibe o n�mero �mpar
            }
        }
    }
}


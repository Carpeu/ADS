#include <iostream>   // Inclui a biblioteca padrão de entrada e saída
#define TAM 5   // Define uma constante chamada TAM com o valor 5, representando o tamanho da pilha

using namespace std;  // Usa o namespace padrão std, facilitando o uso de funções da biblioteca padrão C++

// Função para empilhar um valor na pilha
void empilha(int p[], int &t, int v);
// Função para desempilhar um valor da pilha
int desempilha(int p[], int &t, int &v);
// Função para mostrar o valor do topo da pilha
void mostraTopo(int p[], int &t);
// Função para mostrar a situação atual da pilha (quantidade de elementos e espaço disponível)
void situacaoPilha(int p[], int &t);
// Função para mostrar os elementos pares na pilha
void mostrarPares(int p[], int &t);
// Função para mostrar os elementos ímpares na pilha
void mostrarImpares(int p[], int &t);
// Função para mostrar o maior elemento presente na pilha
void mostraMaior(int p[], int &t);

int main() {
    int op, val, topo = -1, pilha[TAM], resp;  // Declaração de variáveis: opção, valor, topo da pilha e pilha

    // Loop principal do programa para interação com o usuário
    do {         
        // Menu de opções
        cout << "\n Pilha (LIFO - Last In - First Out) \n\n";  // Exibe o tipo de estrutura de dados: pilha
        cout << "\n 1 - Inserir um valor na pilha";             // Opção para inserir valor na pilha
        cout << "\n 2 - Remover um valor da pilha";             // Opção para remover valor da pilha
        cout << "\n 3 - Mostrar o maior elemento do topo da pilha";  // Opção para mostrar o topo da pilha
        cout << "\n 4 - Mostrar situacao da pilha";             // Opção para exibir a situação da pilha
        cout << "\n 5 - Mostrar maior elemento da pilha";       // Opção para exibir o maior elemento da pilha
        cout << "\n 6 - Mostrar elementos pares da pilha";      // Opção para exibir os elementos pares da pilha
        cout << "\n 7 - Mostrar elementos impares da pilha";    // Opção para exibir os elementos ímpares da pilha
        cout << "\n 8 - Sair: ";                                // Opção para sair do programa
        cout << "\n opcao: ";                                   // Solicita que o usuário escolha uma opção
        cin >> op;                                              // Armazena a opção escolhida pelo usuário
        
        // Estrutura de controle que executa as funções conforme a escolha do usuário
        switch (op) {
            case 1:  // Caso o usuário escolha inserir valor na pilha
                cout << "Digite o valor a ser empilhado: ";  // Solicita o valor a ser empilhado
                cin >> val;   // Armazena o valor
                empilha(pilha, topo, val); // Chama a função empilha para inserir o valor
                break;
            case 2:  // Caso o usuário escolha remover um valor da pilha
                resp = desempilha(pilha, topo, val);  // Chama a função desempilha e armazena o resultado
                if (resp == 0) {  // Verifica se a pilha está vazia
                    cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de erro caso esteja vazia
                } else {
                    cout << "\n Valor removido: " << val;  // Exibe o valor removido
                }
                break;
            case 3:  // Caso o usuário escolha mostrar o valor do topo da pilha
                mostraTopo(pilha, topo);  // Chama a função para mostrar o topo da pilha
                break;
            case 4:  // Caso o usuário escolha mostrar a situação da pilha
                situacaoPilha(pilha, topo);  // Chama a função para exibir a situação da pilha
                break;
            case 5:  // Caso o usuário escolha mostrar o maior valor da pilha
                mostraMaior(pilha, topo); // Chama a função para exibir o maior valor da pilha
                break;
            case 6:  // Caso o usuário escolha mostrar os valores pares da pilha
                mostrarPares(pilha, topo);  // Chama a função para exibir os números pares
                break;  
            case 7:  // Caso o usuário escolha mostrar os valores ímpares da pilha
                mostrarImpares(pilha, topo);  // Chama a função para exibir os números ímpares
                break;
            case 8:  // Caso o usuário escolha sair do programa
                cout << "\n Saindo...\n";  // Exibe a mensagem de saída
                break;
            default:  // Caso o usuário digite uma opção inválida
                cout << "\n OPCAO INVALIDA\n";  // Exibe mensagem de erro
        }
    } while (op != 8);  // Loop continua até o usuário escolher a opção de sair
}
// Função para empilhar um valor
void empilha(int p[], int &t, int v) {
    if (t == TAM - 1) {   // Verifica se a pilha está cheia
        cout << "\n ATENCAO! Pilha cheia\n";  // Exibe mensagem se a pilha estiver cheia
    } else {
        t++;  // Incrementa o topo
        p[t] = v;  // Insere o valor no topo da pilha
    }
}
// Função para desempilhar um valor
int desempilha(int p[], int &t, int &v) {
    if (t == -1) {  // Verifica se a pilha está vazia
        return 0;   // Retorna 0 se a pilha estiver vazia
    } else {
        v = p[t];  // Atribui o valor do topo à variável v
        t--;  // Decrementa o topo
        return 1;  // Retorna 1 indicando sucesso
    }
}
// Função para mostrar o valor do topo da pilha
void mostraTopo(int p[], int &t) {
    if (t == -1) {  // Verifica se a pilha está vazia
        cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n Elemento do topo da PILHA: " << p[t];  // Mostra o valor do topo da pilha
    }
}
// Função para mostrar a situação da pilha
void situacaoPilha(int p[], int &t) {
    int i;  // Variável de controle do loop
    if (t == -1) {  // Verifica se a pilha está vazia
        cout << "\n ATENCAO! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else if (t == TAM - 1) {  // Verifica se a pilha está cheia
        cout << "\n ATENCAO! Pilha cheia\n";  // Exibe mensagem de pilha cheia
    } else {
        cout << "\n Total de elementos na pilha: " << t + 1 << "\n";  // Exibe o número de elementos na pilha
        cout << "\n Espaco disponivel na pilha: " << TAM - (t + 1) << "\n";  // Exibe o espaço restante
        cout << "\n\n Elementos na pilha: ";
        for (i = 0; i <= t; i++) {  // Loop para mostrar todos os elementos da pilha
            cout << " " << p[i];
        }
    }
}
// Função para mostrar o maior elemento da pilha
void mostraMaior(int p[], int &t){
    int i, maior;  // Variáveis de controle
    if (t == -1){  // Verifica se a pilha está vazia
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
// Função para mostrar os elementos pares da pilha
void mostrarPares(int p[], int &t){
    int i;  // Variável de controle do loop
    if (t == -1){  // Verifica se a pilha está vazia
        cout << "\n Atencao! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n\n Elementos pares na pilha: ";
        for(i = 0; i <= t; i++){  // Loop para percorrer a pilha
            if (p[i] % 2 == 0){  // Verifica se o elemento é par
                cout << " " << p[i];  // Exibe o número par
            }
        }
    }
}
// Função para mostrar os elementos ímpares da pilha
void mostrarImpares(int p[], int &t){
    int i;  // Variável de controle do loop
    if (t == -1){  // Verifica se a pilha está vazia
        cout << "\n Atencao! Pilha vazia\n";  // Exibe mensagem de pilha vazia
    } else {
        cout << "\n\n Elementos impares na pilha: ";
        for(i = 0; i <= t; i++){  // Loop para percorrer a pilha
            if (p[i] % 2 == 1){  // Verifica se o elemento é ímpar
                cout << " " << p[i];  // Exibe o número ímpar
            }
        }
    }
}


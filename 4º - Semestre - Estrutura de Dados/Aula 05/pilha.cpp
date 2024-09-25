#include <iostream>
#define TAM 5

using namespace std;

void empilha(int p[], int &t, int v);
int desempilha(int p[], int &t, int &v);
void mostraTopo(int p[], int &t);
void situacaoPilha(int p[], int &t);

int main() {
    int op, val, topo = -1, pilha[TAM], resp;

    do {
        system("cls");  
        system("color f0");
        cout << "\n Pilha (LIFO - Last In - First Out) \n\n";
        cout << "\n 1 - Inserir um valor na pilha";
        cout << "\n 2 - Remover um valor da pilha";
        cout << "\n 3 - Mostrar o elemento do topo da pilha";
        cout << "\n 4 - Mostrar situacao da pilha";
        cout << "\n 5 - Sair";
        cout << "\n Opcao: ";
        cin >> op;
        system("cls");

        switch (op) {
            case 1:
                cout << "Digite o valor a ser empilhado: ";
                cin >> val;
                empilha(pilha, topo, val);
                break;
            case 2:
                resp = desempilha(pilha, topo, val);
                if (resp == 0) {
                    cout << "\n ATENCAO! Pilha vazia\n";
                } else {
                    cout << "\n Valor removido: " << val;
                }
                break;
            case 3:
                mostraTopo(pilha, topo);
                break;
            case 4:
                situacaoPilha(pilha, topo);
                break;
            case 5:
                cout << "\n Programa basico da PILHA\n";
                break;
            default:
                cout << "\n OPCAO INVALIDA\n";
        }
    } while (op != 5);

    return 0;
}

void empilha(int p[], int &t, int v) {
    if (t == TAM - 1) {
        cout << "\n ATENCAO! Pilha cheia\n";
    } else {
        t++;  // atualiza o topo
        p[t] = v;  // pilha recebe valor
    }
}

int desempilha(int p[], int &t, int &v) {
    if (t == -1) {
        return 0;
    } else {
        v = p[t];  // guarda o valor do topo
        t--;  // atualiza o topo
        return 1;
    }
}

void mostraTopo(int p[], int &t) {
    if (t == -1) {
        cout << "\n ATENCAO! Pilha vazia\n";
    } else {
        cout << "\n Elemento do topo da PILHA: " << p[t];
    }
}

void situacaoPilha(int p[], int &t) {
    int i;
    if (t == -1) {
        cout << "\n ATENCAO! Pilha vazia\n";
    } else if (t == TAM - 1) {
        cout << "\n ATENCAO! Pilha cheia\n";
    } else {
        cout << "\n Total de elementos na pilha: " << t + 1 << "\n";
        cout << "\n Espaco disponivel na pilha: " << TAM - (t + 1) << "\n";
        cout << "\n\n Elementos na pilha: ";
        for (i = 0; i <= t; i++) {
            cout << " " << p[i];
        }
        cout << "\n";
    }
}


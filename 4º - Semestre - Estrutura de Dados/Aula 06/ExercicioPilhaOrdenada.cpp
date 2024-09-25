#include <iostream>
#define TAM 5

using namespace std;

void empilha(int p[], int &t, int v);
int desempilha(int p[], int &t, int &v);
void mostraTopo(int p[], int &t);
void situacaoPilha(int p[], int &t);
void mostrarPares(int p[], int &t);
void mostrarImpares(int p[], int &t);
void mostraMaior(int p[], int &t);
void ordenarPilha(int p[], int &t);

int main() {
    int op, val, topo = -1, pilha[TAM], resp;

    do {         
        cout << "\n Pilha (LIFO - Last In - First Out) \n\n";
        cout << "\n 1 - Inserir um valor na pilha";
        cout << "\n 2 - Remover um valor da pilha";
        cout << "\n 3 - Mostrar o valor do topo da pilha";
        cout << "\n 4 - Mostrar situacao da pilha";
        cout << "\n 5 - Mostrar maior elemento da pilha";
        cout << "\n 6 - Mostrar elementos pares da pilha";
        cout << "\n 7 - Mostrar elementos impares da pilha";
        cout << "\n 8 - Ordenar os elementos da pilha"; 
        cout << "\n 9 - Sair: ";
        cout << "\n opcao: ";
        cin >> op;
        
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
                mostraMaior(pilha, topo);
                break;
            case 6:
                mostrarPares(pilha, topo);
                break;
            case 7:
                mostrarImpares(pilha, topo);
                break;
            case 8: 
                ordenarPilha(pilha, topo);
                break;
            case 9:
                cout << "\n Saindo...\n";
                break;
            default:
                cout << "\n OPCAO INVALIDA\n";
        }
    } while (op != 9);
}

void empilha(int p[], int &t, int v) {
    if (t == TAM - 1) {
        cout << "\n ATENCAO! Pilha cheia\n";
    } else {
        t++;
        p[t] = v;
    }
}

int desempilha(int p[], int &t, int &v) {
    if (t == -1) {
        return 0;
    } else {
        v = p[t];
        t--;
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
    }
}

void mostraMaior(int p[], int &t){
    int i, maior;
    if (t == -1){
        cout << "\n Atencao! Pilha vazia\n";
    } else {
        maior = p[0];
        cout << "\n\n Elementos na pilha: ";
        for(i = 0; i <= t; i++){
            cout << " " << p[i];
            if (p[i] > maior) maior = p[i];
        }
        cout << "\n Maior elemento da pilha: " << maior;
    }
}

void mostrarPares(int p[], int &t){
    int i;
    if (t == -1){
        cout << "\n Atencao! Pilha vazia\n";
    } else {
        cout << "\n\n Elementos pares na pilha: ";
        for(i = 0; i <= t; i++){
            if (p[i] % 2 == 0){
                cout << " " << p[i];
            }
        }
    }
}

void mostrarImpares(int p[], int &t){
    int i;
    if (t == -1){
        cout << "\n Atencao! Pilha vazia\n";
    } else {
        cout << "\n\n Elementos impares na pilha: ";
        for(i = 0; i <= t; i++){
            if (p[i] % 2 == 1){
                cout << " " << p[i];
            }
        }
    }
}

void ordenarPilha(int p[], int &t) {
    if (t == -1) {
        cout << "\n ATENCAO! Pilha vazia\n";
    } else {
        for (int i = 0; i <= t; i++) {
            for (int j = 0; j < t - i; j++) {
                if (p[j] > p[j + 1]) {
                    // Troca os elementos se eles estiverem fora de ordem
                    int temp = p[j];
                    p[j] = p[j + 1];
                    p[j + 1] = temp;
                }
            }
        }
        cout << "\n Pilha ordenada com sucesso!\n";
        cout << "Elementos na pilha: ";
        for (int i = 0; i <= t; i++) {
            cout << p[i] << " ";
        }
        cout << endl;
    }
}


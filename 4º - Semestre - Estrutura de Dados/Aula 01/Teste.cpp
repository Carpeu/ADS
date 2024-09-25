#include <iostream>
#include <string>
using namespace std;
// Defini��o da struct
struct Pessoa {
    string nome;
    int idade;
    float altura;
};

int main() {
    // Cria��o de uma vari�vel do tipo struct Pessoa
    Pessoa pessoa1;

    // Atribuindo valores aos membros da struct
    pessoa1.nome = "Fernando";
    pessoa1.idade = 30;
    pessoa1.altura = 1.75;

    // Acesso e impress�o dos membros da struct
    cout << "Nome: " << pessoa1.nome << std::endl;
    cout << "Idade: " << pessoa1.idade << std::endl;
    cout << "Altura: " << pessoa1.altura << "m" << std::endl;

    return 0;
}

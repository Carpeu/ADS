#include <iostream>
using namespace std;
main(){
	char nome[21];
	cout << "Digite seu nome completo: ";
	// cin << nome;
	gets(nome); // GETS - ler uma string
	// cout << "Nome Completo: " <<nome;
	cout << "\nNome Completo: ";    // \n para pular uma linha
	puts(nome);  // PUTS - imprime uma string na tela
	cout << "Primeira letra do nome: " << nome[0];
		
}


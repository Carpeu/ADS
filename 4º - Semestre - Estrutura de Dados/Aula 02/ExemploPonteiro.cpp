#include <iostream>
using namespace std;
main (){
	int num,valor;
	int *p;
	num=55;
	p=&num; /* Pega o endereco de num */
	valor=*p; /* Valor e igualado a num de uma maneira indireta */
		cout << "Valor: " << valor;
		cout << "\nEndereco para onde o ponteiro aponta: " << p;
		cout << "\nValor da variavel apontada: " << *p;
	
}

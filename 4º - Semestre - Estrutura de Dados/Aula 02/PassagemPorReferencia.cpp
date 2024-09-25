#include<iostream>
using namespace std;

	void troca(int &a, int &b){
 	int temp;
 	temp = a;
 	a = b;
 	b = temp;
}
main(){
 	int a = 2, b = 3;
 		cout << "\nAntes de chamar a funcao : \na =" << a << "\tb = " << b << endl;
 	troca(a,b);
 		cout << "\nDepois de chamar a funcao : \na =" << a << "\tb = " << b << endl;
 		cout << "\nVALORES TROCADOS POR REFERENCIA";
}


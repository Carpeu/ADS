#include <iostream>
using namespace std;
main(){
  int i, maioridade;
  int idade[4];
  for(i=0; i<4; i++){
  	cout<<"Digite a "<<i+1<<"a idade:";
  	cin>>idade[i];
  }	
  maioridade = idade[0];
  cout << "Idades digitadas: ";
  for(i=0; i<4; i++){
  	cout << idade[i]<< "-";
  	   if (idade[i]>maioridade){
  	   	maioridade = idade[i];
	   }
  }	
  cout << "\nA maior idade digitada foi: "<<maioridade;
}


//Construir um programa em C++ que leia as notas para os alunos de um curso de extens�o fornecido pelo UniProje��o. 
//Sabe-se que para este curso s�o fornecidas 100 vagas 
//anualmente, mas o usu�rio do programa ir� digitar a quantidade de alunos matriculados. 
//Calcular a m�dia das notas dos alunos matriculados, mostrar a m�dia e escrever a 
//quantidade de notas maiores ou iguais a m�dia e a quantidade de notas inferiores a m�dia.


#include <iostream>
using namespace std;

struct aluno{
	int matricula;
	float nota;
};
main(){
	int QTD_ALUNOS;
	cout << "Digite a quantidade de alunos: ";
	cin >> QTD_ALUNOS;
	struct aluno alunos[QTD_ALUNOS];
	int i; float media, soma = 0;
	for(i=0; i<QTD_ALUNOS; i++){
		cout<<"Digite matricula do "<< i+1<<"o aluno: ";
		cin>>alunos[i].matricula;
		cout<<"Digite nota do " << i+1<<"o aluno: ";
		cin>>alunos[i].nota;
		soma = soma + alunos[i].nota;
	}
    for(i=0; i<QTD_ALUNOS; i++){
    cout << "\nAluno " << i+1;
	cout << "\nMatricula: " << alunos[i].matricula;
	cout << "\nNota: " << alunos[i].nota;
	}
	media = soma/QTD_ALUNOS;
	int contMaior = 0, contMenor = 0;
	cout<<"\nMedia das notas dos alunos: " << media;
    for(i=0; i<QTD_ALUNOS; i++){
     if (alunos[i].nota>media){
     	contMaior++;
     }
     else{
     	contMenor++;
	 }
	 }
       cout << "\n Qtd de Alunos com nota maior ou igual que a media: " << contMaior;
	   cout << "\n Qtd de Alunos com nota menor que a media: " << contMenor;
	   
}
	



#include <iostream>
using namespace std;

struct aluno{
	int matricula;
	float nota;
};
main(){
	const int QTD_ALUNOS = 4;
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
	cout<<"\nMedia das notas dos alunos: " << media;
    for(i=0; i<QTD_ALUNOS; i++){
     if (alunos[i].nota>media){
       cout << "\nAluno " << i+1;
	   cout << "\nMatricula: " << alunos[i].matricula;
	   cout << "\nNota: " << alunos[i].nota;
     }
	}
}

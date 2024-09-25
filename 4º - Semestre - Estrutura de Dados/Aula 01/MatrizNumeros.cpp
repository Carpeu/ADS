#include <iostream>
using namespace std;
main(){
	int Matriz [3][3], i, j;
		for (i=0; i<3; i++){
 		for (j=0; j<3; j++){
 		cout << "\nDigite o elemento (" << i << " - " << j << ") da matriz: ";
 		cin >> Matriz[i][j];
 }
}
 	//impressão da matriz carregada:
 		cout << "\nMatriz digitada: ";
		for (i=0; i<3; i++){
			// cout << "\n";
			cout << endl;
 		for (j=0; j<3; j++){
 		cout << Matriz[i][j] << "\t";
 }
}		
	// Impressão dos elementos da diagonal principal
    	cout << "\nElementos da Diagonal Principal: ";
    	for (i = 0; i < 3; i++) {
    	for (j=0; j<3; j++){
    		if (i==j){
        cout << Matriz[i][i] << "\t";
    }
}
}
    // Impressão dos elementos da diagonal secundária
    	cout << "\nElementos da Diagonal Secundaria: ";
    	for (i = 0; i < 3; i++) {
    	for (j=0; j<3; j++){
    		 if (i+j==2){
        cout << Matriz[i][2 - i] << "\t";
    }
}
}
    	cout << endl;		
}



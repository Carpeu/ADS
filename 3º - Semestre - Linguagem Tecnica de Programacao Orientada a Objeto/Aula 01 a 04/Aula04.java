package aula04;
import java.util.Scanner;

public class Aula04 {
    
    private float valorCarro;
    private float valorDesconto;
    private int anoCarro;
    
    public void setValorCarro(float v){
        valorCarro = v;
    }
    
    public float getValorCarro(){
        return valorCarro;
    }
    
    /*public void setValorDesconto(float d){
    valorDesconto = d;
    }*/
    
    public void calculaDesconto(float v, int a){
    float d;
        if(a<=2000){
        d = v * 12/100;        
        }else{
        d = v * 7/100;
        }
    valorDesconto = d;
    }
    
    
    
    public float getValorDesconto(){
        return valorDesconto;
    }
    
    public void setAnoCarro(int a){
        anoCarro = a;
    }
    
    public int getAnoCarro(){
        return anoCarro;
    }
    

    public static void main(String[] args) {
    
        Scanner ler = new Scanner(System.in);
        Aula04 carro1 = new Aula04();
        float v;
        System.out.println("\nDigite o valor do carro: ");
        v = ler.nextFloat();
        carro1.setValorCarro(v);
        int a;
        System.out.println("\nDigite o Ano do carro: ");
        a = ler.nextInt();
        carro1.setAnoCarro(a);
        System.out.println("\nValor do Carro: " + carro1.getValorCarro());
        System.out.println("\nAno do Carro: " + carro1.getAnoCarro());
        carro1.calculaDesconto(v,a);
        System.out.println("\nDesconto do Carro: " + carro1.getValorDesconto());
        System.out.println("\nValor Final: " +  (carro1.getValorCarro() - carro1.getValorDesconto()));
        
        
    }
    
}

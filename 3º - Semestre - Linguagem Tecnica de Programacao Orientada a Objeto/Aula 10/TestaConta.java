package testaconta;

public class TestaConta {

    public static void main(String[] args) {
        Conta referencia = new Conta();
        Cliente cliente1 = new Cliente();
        Cliente cliente2 = new Cliente();
        CartaoDeCredito cdc1 = new CartaoDeCredito();
        
        
        double s = 1000.0;
        double l = 500.0;
        int n = 1;
        String n1 = "Fulano";
        String n2= "Ciclano";
        int c1 = 1;
        int c2 = 2;
        int ncdc1 = 1;
        String dcdc1 = "11/31";
        
        
        referencia.setSaldo(s);
        referencia.setLimite(l);
        referencia.setNumero(n);
        
        //cliente1.setNome(n1);
        cliente1.defineNome();
        cliente1.setCodigo(c1); 
        
        //cliente2.setNome(n2);
        cliente2.defineNome();
        cliente2.setCodigo(c2);
        
        cdc1.setCliente(cliente1);
        cdc1.setNumero(ncdc1);
        cdc1.setData(dcdc1);              
        
        
        System.out.println(referencia.getSaldo());
        System.out.println(referencia.getLimite());
        System.out.println(referencia.getNumero());

        System.out.println(cliente1.getNome());
        System.out.println(cliente1.getCodigo());
        
        System.out.println(cliente2.getNome());
        System.out.println(cliente2.getCodigo());
        
        System.out.println(cdc1.getNumero());
        System.out.println(cdc1.getData());
        System.out.println(cdc1.getCliente());
        
    }
    
}
 
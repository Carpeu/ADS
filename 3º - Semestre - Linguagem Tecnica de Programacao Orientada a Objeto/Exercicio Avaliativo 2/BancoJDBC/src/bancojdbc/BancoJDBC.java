

package bancojdbc;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.Scanner;
import javax.swing.JOptionPane;

    public class BancoJDBC {    
    private Connection con;
    private Statement stmt;

  
    public BancoJDBC() {
        try{
            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("Driver Encontrado");
        } catch (ClassNotFoundException e) {
            System.out.println("Driver não encontrado" + e);
            System.out.println("Error: " + e.getMessage());
        }
        String url = "jdbc:mysql://localhost:3306/Banco";
        String user = "root";
        String password = "";
            try{
                con=DriverManager.getConnection(url,user,password); 
                stmt = con.createStatement();
 
            }catch(SQLException e){
        System.out.println("Error: "+ e.getMessage());
        }
        inserirRegistros();
        listarRegistros();
        executarMenu();
}
    
    private void executarMenu() {
        Scanner leia = new Scanner(System.in);
        int matricula, matriculaExcluida, matriculaAlterar, opcao;
        String nome, telefone, salario, alterarSal;

        do {
            System.out.println("");
            System.out.println("1 - INSERIR");
            System.out.println("2 - ALTERAR");
            System.out.println("3 - CONSULTAR");
            System.out.println("4 - EXCLUIR");
            System.out.println("5 - MOSTRAR MEDIA SALARIAL");
            System.out.println("6 - SAIR");
            System.out.print("Escolha uma opção: ");

            opcao = leia.nextInt();

            switch (opcao) {
                case 1:
                    inserirRegistros();
                    break;
                case 2:
                    System.out.print("Digite a matrícula: ");
                    
                    System.out.print("Digite o novo salário: ");
                    
                    break;
                case 3:
                    listarRegistros();
                    break;
                case 4:
                    System.out.print("Digite a matrícula para excluir: ");
                    int matExcluir = leia.nextInt();
                    apagarRegistros(matExcluir);
                    break;
                case 5:
                    mostrarMediaSalarial();
                    break;
                case 6:
                    System.out.println("Saindo do programa.");
                    break;
                default:
                    System.out.println("Opção inválida. Tente novamente.");
            }

        } while (opcao != 6);

        leia.close();
    }
    
    private void inserirRegistros(){
    try{
     stmt.executeUpdate("INSERT INTO Empregado VALUES (5,'Fabrício','6191387754','16780.00')");
    }catch(SQLException e){
    System.out.println("Error: "+ e.getMessage());
 }
 } 
    private void inserirRegistros2(int mat, String n, String tel, String sal){
    try{
 stmt.executeUpdate("INSERT INTO Empregado VALUES ("+mat+",'"+n+"','"+tel+"','"+sal+"')");
    }catch(SQLException e){
    System.out.println("Erro: "+ e.getMessage());
 }
 }   
    private void listarRegistros(){
 
    try{
        ResultSet rs;
        rs = stmt.executeQuery("SELECT * FROM Empregado");
    while ( rs.next() ) {
        int matricula = rs.getInt("matricula");
        String nome = rs.getString("nome");
        String telefone = rs.getString("telefone");
        float salario = rs.getFloat("salario");
        System.out.println(matricula + "\t" + nome + "\t" + 
        telefone + "\t" + salario);
}
    }catch(SQLException e){
        System.out.println("Erro: "+ e.getMessage());
 }
 }
    
    private void alterarRegistros(String sal, int mat){
 try{
 stmt.executeUpdate("UPDATE Empregado SET salario = '"+sal+"' WHERE matricula="+mat+"");
    }catch(SQLException e){
    System.out.println("Erro: "+ e.getMessage());
 }
}
    private void apagarRegistros(int mat){
    try{
    stmt.executeUpdate("DELETE FROM Empregado WHERE matricula="+mat+"");
 }catch(SQLException e){
 System.out.println("Erro: "+ e.getMessage());
 } 
}

   private void mostrarMediaSalarial() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT AVG(salario) AS media FROM Empregado");
            if (rs.next()) {
                float mediaSalarial = rs.getFloat("media");
                System.out.println("Média Salarial: " + mediaSalarial);
            }
        } catch (SQLException e) {
            System.out.println("Erro ao calcular média salarial: " + e.getMessage());
        }
    }
   
    public static void main(String[] args) {
        BancoJDBC bancoJDBC = new BancoJDBC();
 }
}

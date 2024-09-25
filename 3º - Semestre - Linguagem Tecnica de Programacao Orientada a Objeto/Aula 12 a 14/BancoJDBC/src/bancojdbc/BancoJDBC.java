// Aula 14

package bancojdbc;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

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
}
 private void inserirRegistros(){
 try{
     stmt.executeUpdate("INSERT INTO Empregado VALUES (4,'Evandro','6291376654','6780.00')");
    }catch(SQLException e){
    System.out.println("Error: "+ e.getMessage());
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
public static void main(String[] args) {
        BancoJDBC bancoJDBC = new BancoJDBC();
 }
}



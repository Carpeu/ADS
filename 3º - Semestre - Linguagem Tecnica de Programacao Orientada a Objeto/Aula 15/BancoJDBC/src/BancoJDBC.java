import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.Scanner;

public class BancoJDBC {
    private Connection con;
    private Statement stmt;
    private Scanner scanner;

    public BancoJDBC() {
        scanner = new Scanner(System.in);

        try {
            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("Driver Encontrado");
        } catch (ClassNotFoundException e) {
            System.out.println("Driver não encontrado" + e);
            System.out.println("Error: " + e.getMessage());
        }

        String url = "jdbc:mysql://localhost:3306/Banco";
        String user = "root";
        String password = "";

        try {
            con = DriverManager.getConnection(url, user, password);
            stmt = con.createStatement();
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }

        inserirRegistros();
        listarRegistros();
        executarMenu();
        mostrarMediaSalarial();
    }

    private void executarMenu() {
        int opcao;

        do {
            System.out.println(
                    "============ MENU ============\n" +
                    "1 - INSERIR\n" +
                    "2 - ALTERAR\n" +
                    "3 - CONSULTAR\n" +
                    "4 - EXCLUIR\n" +
                    "5 - MOSTRAR MÈDIA SALARIAL\n" +
                    "6 - SAIR");

            System.out.println("Digite a opção desejada: ");
            opcao = scanner.nextInt();
            scanner.nextLine(); 

            switch (opcao) {
                case 1:
                    inserirRegistros();
                    break;
                case 2:
                    System.out.println("Digite a matrícula: ");
                    int matricula = scanner.nextInt();
                    scanner.nextLine(); 

                    System.out.println("Digite o novo salário: ");
                    String novoSalario = scanner.nextLine();
                    alterarRegistros(novoSalario, matricula);
                    break;
                case 3:
                    listarRegistros();
                    break;
                case 4:
                    System.out.println("Digite a matrícula para excluir: ");
                    int matExcluir = scanner.nextInt();
                    apagarRegistros(matExcluir);
                    break;
                case 5:
                    mostrarMediaSalarial();
                    break;
                case 6:
                int confirmacao = 0;
                while (confirmacao != 1 && confirmacao != 2) {
                    System.out.println("Deseja realmente sair? ( Digite 1 para Sim ou 2 para Não): ");
                    confirmacao = scanner.nextInt();
                    if (confirmacao == 1) {
                        System.out.println("Fim da operação");
                        System.exit(0);
                    } else if (confirmacao != 2) {
                        System.out.println("Opção inválida !!!");
                    }
                }
                break;
                default:
                    System.out.println("Opção inválida !!!");
            }

        } while (opcao != 6);
    }

    private void inserirRegistros() {
        try {
            stmt.executeUpdate("INSERT INTO Empregado VALUES (567,'Paulo','6195583324','8900.00')");
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    private void listarRegistros() {
        try {
            ResultSet rs;
            rs = stmt.executeQuery("SELECT * FROM Empregado");
            while (rs.next()) {
                int matricula = rs.getInt("matricula");
                String nome = rs.getString("nome");
                String telefone = rs.getString("telefone");
                float salario = rs.getFloat("salario");
                System.out.println(matricula + "\t" + nome + "\t" + telefone + "\t" + salario);
            }
        } catch (SQLException e) {
            System.out.println("Erro: " + e.getMessage());
        }
    }

    private void alterarRegistros(String sal, int mat) {
        try {
            stmt.executeUpdate("UPDATE Empregado SET salario = '" + sal + "' WHERE matricula=" + mat + "");
        } catch (SQLException e) {
            System.out.println("Erro: " + e.getMessage());
        }
    }

    private void apagarRegistros(int mat) {
        try {
            stmt.executeUpdate("DELETE FROM Empregado WHERE matricula=" + mat + "");
        } catch (SQLException e) {
            System.out.println("Erro: " + e.getMessage());
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

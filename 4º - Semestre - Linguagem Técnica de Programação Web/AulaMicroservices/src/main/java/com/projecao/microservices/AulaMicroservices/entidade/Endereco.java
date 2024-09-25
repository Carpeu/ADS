package com.projecao.microservices.AulaMicroservices.entidade; // Define o pacote onde a classe de entidade está localizada

import jakarta.persistence.Column; // Importa a anotação Column para mapear atributos da classe para colunas da tabela no banco de dados
import jakarta.persistence.Entity; // Importa a anotação Entity para marcar a classe como uma entidade JPA
import jakarta.persistence.GeneratedValue; // Importa a anotação GeneratedValue para especificar a estratégia de geração de valores para a chave primária
import jakarta.persistence.GenerationType; // Importa a enumeração GenerationType para especificar a estratégia de geração de valores
import jakarta.persistence.Id; // Importa a anotação Id para marcar o atributo como a chave primária da entidade
import jakarta.persistence.Table; // Importa a anotação Table para especificar a tabela no banco de dados à qual a entidade está mapeada

@Entity // Anotação que indica que a classe é uma entidade JPA
@Table(name = "endereco") // Especifica o nome da tabela no banco de dados à qual a entidade está mapeada
public class Endereco { // Declaração da classe Endereco

    @Id // Anotação que indica que o atributo é a chave primária da entidade
    @GeneratedValue(strategy = GenerationType.IDENTITY) // Especifica a estratégia de geração de valores para a chave primária, neste caso, identidade (auto-incremento no banco de dados)
    @Column(name = "id") // Mapeia o atributo 'id' para a coluna 'id' na tabela 'endereco'
    private int id; // Declaração do atributo 'id' que representa a chave primária

    @Column(name = "cidade") // Mapeia o atributo 'cidade' para a coluna 'cidade' na tabela 'endereco'
    private String cidade; // Declaração do atributo 'cidade' que representa a cidade do endereço

    @Column(name = "estado") // Mapeia o atributo 'estado' para a coluna 'estado' na tabela 'endereco'
    private String estado; // Declaração do atributo 'estado' que representa o estado do endereço
    
    @Column(name = "clienteid") // Mapeia o atributo 'clienteid' para a coluna 'clienteid' na tabela 'endereco'
    private String clienteid; // Declaração do atributo 'clienteid' que representa o ID do cliente associado ao endereço

    // Métodos getters e setters para acessar e modificar os atributos da entidade
    
    public int getId() {
        return id; // Retorna o valor do atributo 'id'
    }

    public void setId(int id) {
        this.id = id; // Define o valor do atributo 'id'
    }

    public String getCidade() {
        return cidade; // Retorna o valor do atributo 'cidade'
    }

    public void setCidade(String cidade) {
        this.cidade = cidade; // Define o valor do atributo 'cidade'
    }

    public String getEstado() {
        return estado; // Retorna o valor do atributo 'estado'
    }

    public void setEstado(String estado) {
        this.estado = estado; // Define o valor do atributo 'estado'
    }

    public String getClienteid() {
        return clienteid; // Retorna o valor do atributo 'clienteid'
    }

    public void setClienteid(String clienteid) {
        this.clienteid = clienteid; // Define o valor do atributo 'clienteid'
    }
}

// @Entity: Indica que a classe é uma entidade JPA e será mapeada para uma tabela no banco de dados.
// @Table(name = "endereco"): Especifica o nome da tabela no banco de dados que esta entidade representa.
// @Id: Marca o atributo id como a chave primária da entidade.
// @GeneratedValue(strategy = GenerationType.IDENTITY): Define a estratégia de geração da chave primária como identidade, ou seja, o banco de dados será responsável por gerar os valores únicos para essa coluna.
// @Column(name = "cidade"), @Column(name = "estado"), @Column(name = "clienteid"): Mapeiam os atributos da entidade para as colunas correspondentes na tabela do banco de dados.

// Os métodos getId(), setId(int id), getCidade(), setCidade(String cidade), getEstado(), setEstado(String estado), getClienteid(), setClienteid(String clienteid) 
// são getters e setters que permitem acessar e modificar os valores dos atributos da entidade Endereco.


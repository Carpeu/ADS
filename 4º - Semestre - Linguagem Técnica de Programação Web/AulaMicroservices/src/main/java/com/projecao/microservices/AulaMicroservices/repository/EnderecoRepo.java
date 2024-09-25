package com.projecao.microservices.AulaMicroservices.repository; // Define o pacote onde a interface do repositório está localizada

import java.util.Optional; // Importa a classe Optional, que é usada para representar um valor que pode estar presente ou não

import org.springframework.data.jpa.repository.JpaRepository; // Importa a interface JpaRepository para fornecer métodos CRUD para a entidade
import org.springframework.data.jpa.repository.Query; // Importa a anotação Query para definir consultas personalizadas
import org.springframework.data.repository.query.Param; // Importa a anotação Param para nomear parâmetros em consultas
import org.springframework.stereotype.Repository; // Importa a anotação Repository para indicar que a interface é um repositório Spring

import com.projecao.microservices.AulaMicroservices.entidade.Endereco; // Importa a entidade Endereco

@Repository // Anotação que indica que a interface é um repositório Spring
public interface EnderecoRepo extends JpaRepository<Endereco, Integer> { // Declaração da interface EnderecoRepo que estende JpaRepository para a entidade Endereco com chave primária do tipo Integer
 
    @Query( // Anotação que define uma consulta personalizada
        nativeQuery = true, // Indica que a consulta será uma consulta SQL nativa
        value
        = "SELECT ea.id, ea.cidade, ea.estado, ea.clienteid FROM aulamicroservice.endereco ea join aulamicroservice.cliente e on e.id = ea.clienteid where ea.clienteid=:clienteId") 
    // Consulta SQL para selecionar um endereço com base no ID do cliente
    Optional<Endereco> findEnderecoDoClienteID(@Param("clienteId") int clienteId); // Método para encontrar um endereço pelo ID do cliente, usando a anotação Param para mapear o parâmetro da consulta
}

// @Repository: Indica que a interface é um repositório Spring, que será gerenciado pelo Spring Data JPA.
// JpaRepository<Endereco, Integer>: Extende a interface JpaRepository, fornecendo métodos CRUD para a entidade Endereco. 
// O primeiro parâmetro (Endereco) é o tipo da entidade e o segundo (Integer) é o tipo da chave primária.
// @Query: Usada para definir uma consulta personalizada. Aqui, define uma consulta SQL nativa para buscar um endereço pelo ID do cliente.
// nativeQuery = true: Indica que a consulta é uma consulta SQL nativa.
// @Param("clienteId"): Mapeia o parâmetro clienteId da consulta SQL para o parâmetro do método findEnderecoDoClienteID.
// Optional<Endereco> findEnderecoDoClienteID(@Param("clienteId") int clienteId): Declara um método que executa a consulta SQL definida na anotação @Query para encontrar um endereço com base no ID do cliente. 
// Retorna um Optional<Endereco> que pode ou não conter um Endereco correspondente ao ID do cliente fornecido.

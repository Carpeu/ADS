package com.projecao.microservices.AulaMicroservices.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.projecao.microservices.AulaMicroservices.entidade.Endereco;



@Repository
public interface EnderecoRepo extends JpaRepository<Endereco, Integer> {
 
    @Query(
        nativeQuery = true,
        value
        = "SELECT ea.id, ea.cidade, ea.estado, ea.clienteid FROM aulamicroservice.endereco ea join aulamicroservice.cliente e on e.id = ea.clienteid where ea.clienteid=:clienteId")
       Optional<Endereco> findEnderecoDoClienteID(@Param("clienteId") int clienteId);
}
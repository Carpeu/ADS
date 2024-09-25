package com.projecao.microservice.repository;

import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.projecao.microservice.entidade.Endereco;



public interface EnderecoRepo extends JpaRepository<Endereco, Integer> {
	
	@Query(nativeQuery = true, value = "SELECT ea.id FROM aulamicroservice.endereco ea join" 
	+ "aulamicroservice.cliente e on e.id = ea.clienteid" + "where ea.clienteid=:clienteId")
	Optional<Endereco> findEnderecoDOClienteID(@Param("clienteId") int clienteId);
}

package com.projecao.microservices.AulaMicroservices.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import com.projecao.microservices.AulaMicroservices.entidade.Cliente;

@Repository
public interface ClienteRepo extends JpaRepository<Cliente, Integer> {
 
}
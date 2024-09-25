package com.projecao.microservices.AulaMicroservices.service;

import java.util.Optional;

import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

import com.projecao.microservices.AulaMicroservices.entidade.Cliente;
import com.projecao.microservices.AulaMicroservices.repository.ClienteRepo;
import com.projecao.microservices.AulaMicroservices.response.ClienteResponse;
import com.projecao.microservices.AulaMicroservices.response.EnderecoResponse;

@Service
public class ClienteService {
 
 

	  @Autowired
	    private ClienteRepo clienteRepo;
	 
	    @Autowired
	    private ModelMapper mapper;
	 
	    @Autowired
	    private RestTemplate restTemplate;
	 
	    public ClienteResponse getClienteById(int id) {
	 
	        Optional<Cliente> cliente = clienteRepo.findById(id);
	        ClienteResponse clienteResponse = mapper.map(cliente, ClienteResponse.class);
	 
	        EnderecoResponse enderecoResponse = restTemplate.getForObject("http://localhost:8081/endereco-service/endereco/{id}", EnderecoResponse.class, id);
	        clienteResponse.setEnderecoResponse(enderecoResponse);
	 
	        return clienteResponse;
	    }
}
    
    
    



package com.projecao.microservices.AulaMicroservices.service;

import java.util.Optional;

import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

import com.projecao.microservices.AulaMicroservices.entidade.Endereco;
import com.projecao.microservices.AulaMicroservices.repository.EnderecoRepo;
import com.projecao.microservices.AulaMicroservices.response.EnderecoResponse;

@Service
public class EnderecoService {
 
    @Autowired
    private EnderecoRepo enderecoRepo;
 
    @Autowired
    private ModelMapper mapper;
 
    public EnderecoResponse findEnderecoDoClienteID(int clienteId) {
        Optional<Endereco> enderecoDoCliente = enderecoRepo.findEnderecoDoClienteID(clienteId);
        EnderecoResponse enderecoResponse = mapper.map(enderecoDoCliente, EnderecoResponse.class);
        return enderecoResponse;
    }
 
}
    
    
    



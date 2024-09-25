package com.projecao.microservice.service;

import org.modelmapper.ModelMapper;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.projecao.microservice.entidade.Endereco;
import com.projecao.microservice.repository.EnderecoRepo;
import com.projecao.microservice.response.EnderecoResponse;

@Service
public class EnderecoService{
	
	@Autowired
	private EnderecoRepo enderecoRepo;
	
	@Autowired
	private ModelMapper mapper;
	
	public EnderecoResponse findEnderecoDoClienteID(int clienteId) {
		Optional<Endereco> enderecoDoCliente = enderecoRepo.findEnderecoDOClienteID(clienteId);
		EnderecoResponse enderecoResponse 
		= mapper.map(enderecoDoCliente, EnderecoResponse.class);
				return enderecoResponse;
	}
}
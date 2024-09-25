package com.projecao.microservice.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

import com.projecao.microservice.response.EnderecoResponse;
import com.projecao.microservice.service.EnderecoService;

@RestController
public class EnderecoController {
	
	@Autowired
	private EnderecoService enderecoService;
	
	@GetMapping("/endereco/{clienteId}")
	public ResponseEntity<EnderecoResponse>getEnderecoByClienteId(@PathVariable("clienteId") int clienteId)
	{
		EnderecoResponse enderecoResponse = enderecoService.findEnderecoDoClienteID(clienteId);
			return ResponseEntity.status(HttpStatus.OK).body(enderecoResponse);
	}
}
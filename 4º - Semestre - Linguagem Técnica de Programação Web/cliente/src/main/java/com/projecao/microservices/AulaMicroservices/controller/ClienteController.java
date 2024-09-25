package com.projecao.microservices.AulaMicroservices.controller;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;
import com.projecao.microservices.AulaMicroservices.response.ClienteResponse;
import com.projecao.microservices.AulaMicroservices.service.ClienteService;

@RestController
public class ClienteController {
 
    @Autowired
    private ClienteService clienteService;
 
    @GetMapping("/cliente/{id}")
    private ResponseEntity<ClienteResponse> getClienteDetails(@PathVariable("id") int id) {
    	ClienteResponse cliente = clienteService.getClienteById(id);
        return ResponseEntity.status(HttpStatus.OK).body(cliente);
    }
 
}
	



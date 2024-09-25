package com.projecao.microservices.AulaMicroservices.controller; // Define o pacote onde a classe do controlador está localizada

import org.springframework.beans.factory.annotation.Autowired; // Importa a anotação Autowired para injeção de dependência
import org.springframework.http.HttpStatus; // Importa a enumeração HttpStatus para representar os códigos de status HTTP
import org.springframework.http.ResponseEntity; // Importa a classe ResponseEntity para representar a resposta HTTP
import org.springframework.web.bind.annotation.GetMapping; // Importa a anotação GetMapping para mapear solicitações HTTP GET
import org.springframework.web.bind.annotation.PathVariable; // Importa a anotação PathVariable para extrair valores da URL
import org.springframework.web.bind.annotation.RestController; // Importa a anotação RestController para definir a classe como um controlador REST
import com.projecao.microservices.AulaMicroservices.response.EnderecoResponse; // Importa a classe EnderecoResponse que representa a resposta de endereço
import com.projecao.microservices.AulaMicroservices.service.EnderecoService; // Importa a classe EnderecoService que contém a lógica de negócio para endereços

@RestController // Anotação que indica que a classe é um controlador REST, processando solicitações HTTP e retornando dados em formato JSON ou XML
public class EnderecoController { // Declaração da classe do controlador

    @Autowired // Anotação que permite a injeção automática da dependência pelo Spring
    private EnderecoService enderecoService; // Declaração do serviço de endereço que será injetado pelo Spring

    @GetMapping("/endereco/{clienteId}") // Mapeia solicitações HTTP GET para o endpoint /endereco/{clienteId}
    public ResponseEntity<EnderecoResponse> getEnderecoDoClienteId(@PathVariable("clienteId") int clienteId) { // Método que trata a solicitação GET e recebe o ID do cliente como variável de caminho
        EnderecoResponse enderecoResponse = enderecoService.findEnderecoDoClienteID(clienteId); // Chama o serviço para obter o endereço do cliente pelo ID
        return ResponseEntity.status(HttpStatus.OK).body(enderecoResponse); // Retorna a resposta HTTP com status 200 OK e o corpo contendo a resposta do endereço
    }

}

// @RestController: Indica que a classe é um controlador REST. Todas as respostas dos métodos dessa classe serão convertidas em JSON ou XML automaticamente.
// @Autowired: Permite que o Spring injete automaticamente a dependência do EnderecoService nesta classe.
// @GetMapping("/endereco/{clienteId}"): Mapeia solicitações HTTP GET para o endpoint /endereco/{clienteId}. O {clienteId} é uma variável de caminho que será extraída da URL.
// O método getEnderecoDoClienteId recebe um ID de cliente como variável de caminho.
// Chama o método findEnderecoDoClienteID do EnderecoService para obter o endereço correspondente ao ID do cliente.
// Retorna uma ResponseEntity com status HTTP 200 (OK) e o corpo contendo o EnderecoResponse.
// Este controlador é responsável por lidar com solicitações HTTP para obter informações de endereço com base no ID do cliente, utilizando a camada de serviço EnderecoService para realizar a lógica de negócio.
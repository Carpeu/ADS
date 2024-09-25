package com.projecao.microservices.AulaMicroservices.service; // Define o pacote onde a classe está localizada

import java.util.Optional; // Importa a classe Optional para trabalhar com valores que podem estar ausentes

import org.modelmapper.ModelMapper; // Importa a classe ModelMapper para mapeamento de objetos
import org.springframework.beans.factory.annotation.Autowired; // Importa a anotação Autowired para injeção de dependências
import org.springframework.stereotype.Service; // Importa a anotação Service para definir um serviço
import org.springframework.web.client.RestTemplate; // Importa a classe RestTemplate para fazer chamadas REST (não está sendo usada aqui)

import com.projecao.microservices.AulaMicroservices.entidade.Endereco; // Importa a entidade Endereco
import com.projecao.microservices.AulaMicroservices.repository.EnderecoRepo; // Importa o repositório EnderecoRepo
import com.projecao.microservices.AulaMicroservices.response.EnderecoResponse; // Importa a classe EnderecoResponse

@Service // Indica que essa classe é um serviço, um componente Spring que contém a lógica de negócios
public class EnderecoService {
 
    @Autowired // Injeta a dependência do repositório EnderecoRepo
    private EnderecoRepo enderecoRepo;
 
    @Autowired // Injeta a dependência do ModelMapper
    private ModelMapper mapper;
 
    // Método que encontra o endereço de um cliente pelo seu ID
    public EnderecoResponse findEnderecoDoClienteID(int clienteId) {
        // Chama o método do repositório para encontrar o endereço pelo ID do cliente, retornando um Optional<Endereco>
        Optional<Endereco> enderecoDoCliente = enderecoRepo.findEnderecoDoClienteID(clienteId);
        
        // Usa o ModelMapper para mapear o objeto Endereco para EnderecoResponse
        EnderecoResponse enderecoResponse = mapper.map(enderecoDoCliente.orElse(null), EnderecoResponse.class);
        
        // Retorna o objeto EnderecoResponse
        return enderecoResponse;
    }
 
}

// @Service: Anotação que marca a classe como um serviço Spring, indicando que ela contém a lógica de negócios da aplicação.
// @Autowired private EnderecoRepo enderecoRepo;: Injeta a dependência do repositório EnderecoRepo, permitindo o acesso aos métodos de persistência de dados.
// @Autowired private ModelMapper mapper;: Injeta a dependência do ModelMapper, que é usado para converter objetos de uma classe para outra.
// public EnderecoResponse findEnderecoDoClienteID(int clienteId) { ... }: Método público que encontra o endereço de um cliente pelo seu ID.
// Optional<Endereco> enderecoDoCliente = enderecoRepo.findEnderecoDoClienteID(clienteId);: Chama o método do repositório para encontrar o endereço pelo ID do cliente, retornando um Optional<Endereco>.
// EnderecoResponse enderecoResponse = mapper.map(enderecoDoCliente.orElse(null), EnderecoResponse.class);: Usa o ModelMapper para mapear o objeto Endereco para EnderecoResponse. 
// O método orElse(null) é usado para obter o objeto Endereco ou null se ele não estiver presente.
// return enderecoResponse;: Retorna o objeto EnderecoResponse







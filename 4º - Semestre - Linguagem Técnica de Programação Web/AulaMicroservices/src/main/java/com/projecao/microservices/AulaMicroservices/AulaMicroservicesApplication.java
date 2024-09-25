package com.projecao.microservices.AulaMicroservices; // Define o pacote onde a classe está localizada

import org.springframework.boot.SpringApplication; // Importa a classe SpringApplication para inicializar a aplicação Spring Boot
import org.springframework.boot.autoconfigure.SpringBootApplication; // Importa a anotação SpringBootApplication para configurar a aplicação Spring Boot

@SpringBootApplication // Anotação que marca esta classe como uma aplicação Spring Boot
public class AulaMicroservicesApplication { // Declaração da classe principal da aplicação

    public static void main(String[] args) { // Método principal que serve como ponto de entrada da aplicação
        SpringApplication.run(AulaMicroservicesApplication.class, args); // Inicializa a aplicação Spring Boot
    }

}

// @EnableAutoConfiguration: Habilita a configuração automática do Spring Boot, configurando automaticamente a aplicação com base nas dependências adicionadas no projeto.
// @ComponentScan: Habilita a varredura de componentes no pacote base, permitindo que o Spring encontre e registre automaticamente componentes, serviços e outros beans na aplicação.
// @Configuration: Marca a classe como uma fonte de definições de beans para o contexto da aplicação.

// @SpringApplication.run(AulaMicroservicesApplication.class, args): Este método inicializa o contexto da aplicação Spring, configurando-a e preparando-a para receber solicitações. 
// Ele também inicia um servidor embutido (como Tomcat, por exemplo) se a aplicação for uma aplicação web.
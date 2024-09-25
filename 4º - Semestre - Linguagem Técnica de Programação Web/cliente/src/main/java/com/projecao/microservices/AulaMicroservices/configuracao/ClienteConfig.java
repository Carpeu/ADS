package com.projecao.microservices.AulaMicroservices.configuracao;

import org.modelmapper.ModelMapper;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.client.RestTemplate;



/* Qual lógica de criação desse arquivo?
 * No geral, definimos os nossos beans  em um arquivo chamado beans.xml. Bom! Em certos momentos desejamos remover a dependência a esse arquivo e faremos isso utilizando o arquivo de configuração.
 * Então vamos definir uma classe para ser a resposnsável pela nossa configuração, faremos isso utilizando  @Configuration
 * O @Configuration indica que a classe possui métodos de definição @Bean 
 * 
 * temos dois métodos definidos como Bean, logo, o seu retorno é uma criação da instância da classe
 * 
 */

@Configuration
public class ClienteConfig {
	
		
	 @Bean
	    public ModelMapper modelMapperBean() {
	        return new ModelMapper();
	    }
	 
	 @Bean
	    public RestTemplate restTemplateBean() {
	        return new RestTemplate();
	    }
	

}

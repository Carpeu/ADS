package com.projecao.microservice.configuracao;

import org.modelmapper.ModelMapper;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;


@Configuration
public class EnderecoConfig {
	
	@Bean
	public ModelMapper modelMapperBean() {
		return new ModelMapper();
	}
}
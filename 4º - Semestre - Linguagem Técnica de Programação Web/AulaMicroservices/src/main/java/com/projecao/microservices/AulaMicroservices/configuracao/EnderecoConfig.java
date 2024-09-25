package com.projecao.microservices.AulaMicroservices.configuracao; // Define o pacote onde a classe de configuração está localizada

import org.modelmapper.ModelMapper; // Importa a classe ModelMapper, usada para mapeamento de objetos
import org.springframework.context.annotation.Bean; // Importa a anotação Bean para definição de beans no contexto Spring
import org.springframework.context.annotation.Configuration; // Importa a anotação Configuration para indicar que a classe possui configurações de beans
import org.springframework.web.client.RestTemplate; // Importa a classe RestTemplate, usada para fazer chamadas REST (embora não utilizada no código atual)

/* Qual a lógica de criação desse arquivo?
 * No geral, definimos os nossos beans em um arquivo chamado beans.xml. Bom! Em certos momentos desejamos remover a dependência a esse arquivo e faremos isso utilizando o arquivo de configuração.
 * Então vamos definir uma classe para ser a responsável pela nossa configuração, faremos isso utilizando @Configuration.
 * A anotação @Configuration indica que a classe possui métodos de definição @Bean.
 * 
 * Temos dois métodos definidos como Bean, logo, o seu retorno é uma criação da instância da classe.
 * 
 */

@Configuration // Anotação que indica que a classe é uma fonte de definições de beans e configurações Spring
public class EnderecoConfig { // Declaração da classe de configuração

    @Bean // Anotação que indica que o método retorna um bean gerenciado pelo Spring
    public ModelMapper modelMapperBean() { // Método que cria e configura uma instância de ModelMapper
        return new ModelMapper(); // Retorna uma nova instância de ModelMapper
    }
}

// @Configuration: Indica que a classe é uma classe de configuração, que pode conter definições de beans que serão gerenciados pelo contêiner Spring.
// @Bean: Marca um método que produz um bean gerenciado pelo contêiner Spring. O método é executado e seu retorno é registrado como um bean no contexto da aplicação.
// O método modelMapperBean é anotado com @Bean, indicando que o Spring deve gerenciar a instância retornada como um bean. 
// Nesse caso, ele retorna uma nova instância de ModelMapper, que é uma biblioteca popular para mapeamento de objetos.
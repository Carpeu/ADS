package com.projecao.microservices.AulaMicroservices.response; // Define o pacote onde a classe está localizada

public class EnderecoResponse { // Declaração da classe pública EnderecoResponse

    // Declaração dos atributos privados da classe
    private int id; // Atributo que armazena o ID do endereço
    private String cidade; // Atributo que armazena o nome da cidade
    private String estado; // Atributo que armazena o nome do estado

    // Método getter para o atributo id
    public int getId() {
        return id; // Retorna o valor do atributo id
    }

    // Método setter para o atributo id
    public void setId(int id) {
        this.id = id; // Define o valor do atributo id
    }

    // Método getter para o atributo cidade
    public String getCidade() {
        return cidade; // Retorna o valor do atributo cidade
    }

    // Método setter para o atributo cidade
    public void setCidade(String cidade) {
        this.cidade = cidade; // Define o valor do atributo cidade
    }

    // Método getter para o atributo estado
    public String getEstado() {
        return estado; // Retorna o valor do atributo estado
    }

    // Método setter para o atributo estado
    public void setEstado(String estado) {
        this.estado = estado; // Define o valor do atributo estado
    }

}

// public class EnderecoResponse {: Declaração da classe EnderecoResponse. public significa que a classe pode ser acessada de qualquer outro código.
//private int id;: Declara um atributo privado chamado id do tipo int. A palavra-chave private significa que este atributo só pode ser acessado dentro da própria classe.
// private String cidade;: Declara um atributo privado chamado cidade do tipo String. A palavra-chave private significa que este atributo só pode ser acessado dentro da própria classe.
// private String estado;: Declara um atributo privado chamado estado do tipo String. A palavra-chave private significa que este atributo só pode ser acessado dentro da própria classe.
// Esses métodos getters e setters são usados para encapsular os dados, fornecendo uma maneira de acessar e modificar os atributos privados da classe de uma forma controlada.

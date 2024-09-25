package com.projecao.microservices.AulaMicroservices.response;

public class ClienteResponse {
	 
    private int id;
    private String nome;
    private String email;
    private String idade;
    
    //EnderecoResponse aqui 
    private EnderecoResponse enderecoResponse;
    
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getIdade() {
		return idade;
	}
	public void setIdade(String idade) {
		this.idade = idade;
	}
	public EnderecoResponse getEnderecoResponse() {
		return enderecoResponse;
	}
	public void setEnderecoResponse(EnderecoResponse enderecoResponse) {
		this.enderecoResponse = enderecoResponse;
	}
 
    
}
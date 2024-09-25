package com.projecao.microservices.AulaMicroservices.entidade;

import jakarta.persistence.*;
 
@Entity
@Table(name = "cliente")
public class Cliente {
 
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private int id;
 
    @Column(name = "nome")
    private String nome;
 
    @Column(name = "email")
    private String email;
 
    @Column(name = "idade")
    private String idade;

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
 
}

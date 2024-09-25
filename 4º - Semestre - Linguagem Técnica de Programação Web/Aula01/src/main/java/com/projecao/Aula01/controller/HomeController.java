package com.projecao.Aula01.controller;

import java.util.Arrays;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class HomeController {
	
	//@GetMapping()
	public String showHomePage() {
		return "index";
	}
	
	@GetMapping("/index")
	public String showHomePage(Model model) {
		model.addAttribute("nome", "Caio Orsano");
		return "index";
	}

	@RequestMapping(value ="/", method = RequestMethod.GET)
	private String index(Model model) {
		Boolean validation = false;
		
		List<String> lista = 
				Arrays.asList("José Vieira", "Carlos Henrique", "Pedro Afonso");
		
		model.addAttribute("validation", false);
		
		model.addAttribute("List", lista);
		
		return "index";
	}
}

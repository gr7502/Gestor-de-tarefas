<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home');
	}

		public function __construct() {
			parent::__construct();
			$this->load->model('Project_model'); // Carrega o modelo de projetos
		}
	
		public function projects() {
			// Busca todos os projetos no banco de dados
			$data['projects'] = $this->Project_model->get_projects();
	
			// Carrega a view e passa os projetos
			$this->load->view('projects/index', $data);
		}
	}


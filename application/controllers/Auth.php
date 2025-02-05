<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function index() {
        if ($this->session->userdata('usuario_id')) {
            redirect('projects/index'); // Ou outra página do sistema
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $cpf = $this->input->post('cpf');
        $senha = $this->input->post('senha');

        $usuario = $this->Usuario_model->verificar_login($cpf, $senha);

        if ($usuario) {
            $this->session->set_userdata('usuario_id', $usuario['id']);
            redirect('projects/index');
        } else {
            $this->session->set_flashdata('erro', 'CPF ou senha inválidos.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata('usuario_id');
        $this->session->sess_destroy();
        redirect('auth');
    }
    
}

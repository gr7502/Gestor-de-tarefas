<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function index() {
        $data['usuarios'] = $this->Usuario_model->get_usuarios();
        $this->load->view('usuarios', $data);

        if (!$this->session->userdata('usuario_id')) {
            redirect('auth');
        }
        
    }

    public function create() {
        $this->load->view('create_user');
    }

    public function store() {
        if ($this->input->post()) {
            $data = [
                'nome' => $this->input->post('nome'),
                'endereco' => $this->input->post('endereco'),
                'cpf' => preg_replace('/\D/', '', $this->input->post('cpf')), // Remove pontos e traços
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha'),
            ];
    
            $this->db->trans_start(); 
            $this->Usuario_model->insert_usuario($data);
            $this->db->trans_complete(); // Finaliza a transação corretamente
    
            if ($this->db->trans_status() === FALSE) {
                echo "Erro ao criar usuário!";
            } else {
                redirect('usuario/index');
            }
        }
    
        $this->load->view('create_user');
    }
    
    public function edit($id) {
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        $this->load->view('edit_user', $data);
    }

    public function update($id) {
        $this->Usuario_model->update_usuario($id, $this->input->post());
        redirect('usuario/index');
    }

    public function delete($id) {
        $this->Usuario_model->delete_usuario($id);
        redirect('usuarios');
    }
}


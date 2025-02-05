<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_usuarios() {
        $query = $this->db->get('usuarios');
        
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Retorna um array associativo
        } else {
            return []; // Retorna um array vazio caso não tenha registros
        }
    }

    public function get_usuario($id) {
        return $this->db->get_where('usuarios', ['id' => $id])->row_array();
    }

    public function insert_usuario($data) {
        $this->db->insert('usuarios', [
            'nome' => $data['nome'],
            'endereco' => $data['endereco'],
            'cpf' => preg_replace('/\D/', '', $data['cpf']), // Remove pontos e traços
            'email' => $data['email'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT)
        ]);
    
        return $this->db->insert_id(); // Retorna o ID do usuário inserido
    }
    

    public function update_usuario($id, $data) {
        return $this->db->where('id', $id)->update('usuarios', [
            'nome' => $data['nome'],
            'endereco' => $data['endereco'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT)
        ]);
    }

    public function delete_usuario($id) {
        return $this->db->delete('usuarios', ['id' => $id]);
    }

    public function verificar_login($cpf, $senha) {
        $this->db->where('cpf', $cpf);
        $query = $this->db->get('usuarios');
        $usuario = $query->row_array();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}


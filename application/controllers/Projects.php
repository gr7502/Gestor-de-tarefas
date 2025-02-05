<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario_id')) {
            redirect('auth');
        }
        $this->load->model('Project_model');
    }

    public function get_projects() {
        $this->db->order_by('id', 'ASC'); 
        $query = $this->db->get('tarefas');
        return $query->result_array();
    }

    public function index() {
        // Pegando filtros
        $id = $this->input->get('id');
        $data_vencimento = $this->input->get('data_vencimento');
        $status = $this->input->get('status');
        
        // Aplicando filtros
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($data_vencimento) {
            $this->db->where('data_vencimento', $data_vencimento);
        }
        if ($status) {
            $this->db->where('status', $status);
        }
    
        // Ordenando por ID (crescente)
        $this->db->order_by('id', 'ASC');
        
        // Consultando tarefas
        $data['tarefas'] = $this->Project_model->get_projects(); 
        $this->load->view('home', $data);

        if (!$this->session->userdata('usuario_id')) {
            redirect('auth');
        }
        
    }
    
    

    public function create(){
        $this->load->view('create');
    }

    public function store() {
        if ($this->input->post()) {
            $data = [
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'data_vencimento' => $this->input->post('data_vencimento'),
                'status' => $this->input->post('status'),
            ];
    
            $this->db->trans_start(); // Inicia a transação
            $this->Project_model->create_project($data);
            $tarefa_id = $this->db->insert_id();
    
            if ($tarefa_id == 0) {
                echo "Erro ao criar tarefa!";
                exit;
            }
            
            // Upload de arquivos
            $this->upload_files($tarefa_id);
            
            $this->db->trans_complete();
            redirect('projects/index');
        }
    
        $this->load->view('create');
    }

    public function edit($id) {
        $data['project'] = $this->Project_model->get_project($id);

        if ($this->input->post()) {
            $update_data = [
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'data_vencimento' => $this->input->post('data_vencimento'),
                'status' => $this->input->post('status'),
            ];
            $this->Project_model->update_project($id, $update_data);
            
            // Upload de novos arquivos
            $this->upload_files($id);
            
            redirect('projects/index');
        }

        $data['arquivos'] = $this->Project_model->get_task_files($id);
        $this->load->view('edit_tarefa', $data);
    }

    public function delete($id) {
        $this->Project_model->delete_project($id);
        redirect('projects');
    }

    public function view($id) {
        $data['project'] = $this->Project_model->get_project($id);
        $this->load->view('view', $data);
    }
   
    public function delete_file($id) {
        $arquivo = $this->Project_model->get_file($id);
        if ($arquivo) {
            if (file_exists($arquivo['caminho_arquivo'])) {
                unlink($arquivo['caminho_arquivo']);
            }
            $this->Project_model->delete_file($id);
        }
        redirect('projects/edit/' . $arquivo['tarefa_id']);
    }

    private function upload_files($tarefa_id) {
        if (!empty($_FILES['anexo']['name'][0])) {
            $this->load->library('upload');
        
            foreach ($_FILES['anexo']['name'] as $key => $file) {
                $_FILES['anexo_individual']['name'] = $_FILES['anexo']['name'][$key];
                $_FILES['anexo_individual']['type'] = $_FILES['anexo']['type'][$key];
                $_FILES['anexo_individual']['tmp_name'] = $_FILES['anexo']['tmp_name'][$key];
                $_FILES['anexo_individual']['error'] = $_FILES['anexo']['error'][$key];
                $_FILES['anexo_individual']['size'] = $_FILES['anexo']['size'][$key];
        
                $config['upload_path'] = FCPATH . 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|txt';
                $config['max_size'] = 2048; // 2MB
                $config['file_name'] = uniqid() . '_' . $_FILES['anexo_individual']['name'];
        
                $this->upload->initialize($config);
        
                if (!$this->upload->do_upload('anexo_individual')) {
                    log_message('error', 'Erro no upload: ' . $this->upload->display_errors());
                    echo "Erro ao fazer upload: " . $this->upload->display_errors();
                    exit;
                }
        
                $upload_data = $this->upload->data();
        
                $arquivo_data = [
                    'tarefa_id' => $tarefa_id,
                    'nome_arquivo' => $upload_data['client_name'],
                    'caminho_arquivo' => 'uploads/' . $upload_data['file_name'],
                    'criado_em' => date('Y-m-d H:i:s')
                ];
                $this->Project_model->insert_file($arquivo_data);
            }
        }
    }
}

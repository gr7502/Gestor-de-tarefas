<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function get_projects() {
        return $this->db->get('tarefas')->result_array();
    }

    public function get_project($id) {
        return $this->db->get_where('tarefas', ['id' => $id])->row_array();
    }

    public function create_project($data) {
        return $this->db->insert('tarefas', $data);
    }

    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tarefas', $data);
    }

    public function delete_project($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tarefas');
    }

    public function get_task_files($tarefa_id) {
        return $this->db->get_where('arquivos_tarefas', ['tarefa_id' => $tarefa_id])->result_array();
    }

    public function insert_file($data) {
        return $this->db->insert('arquivos_tarefas', $data);
    }
    
    public function update_file($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('arquivos_tarefas', $data);
    }
    
}
?>

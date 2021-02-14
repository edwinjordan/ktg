<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Level extends MY_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_level');
        $this->load->library('session');
    }

    public function index()
    {
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $data['level'] = $this->M_level->get_data();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Level/vw_level', $data);
        $this->template->render();
    }

    public function create()
    {


        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Level/lainlain/create');
        $this->template->render();
    }

    public function save()
    {
        // $this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaLevel', 'namaLevel', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Level/create'); 
        }else{
            $data = array(
                'fv_nmlevel' => $this->input->post('namaLevel')
            );

            $this->M_level->inputData($data);
            return redirect('Level/index');
        }
    }

    public function delete($fn_idlevel)
    {
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $where = array('fn_idlevel' => $fn_idlevel);
        $this->M_level->deleteData($where);
       // print_r($this->db->last_query());
        redirect('Level/index');
    }

    public function edit($id)
    {

        $where['fn_idlevel'] = $id;
        $data['level'] = $this->M_level->getWhere($where)->result_array();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Level/lainlain/edit', $data);
        $this->template->render();
    }

    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaLevel', 'namaLevel', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Update Data Salah</div>');
            redirect('Departemen/edit/'.$id); 
        }else{ 
          
            $data['fv_nmlevel'] = $this->input->post('namaLevel');

            $where = $id;
            $this->M_level->updateData($data, $where);
            redirect('Level/index');
        }    
    }
}

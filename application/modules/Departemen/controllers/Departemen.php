<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Departemen extends MY_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_departemen');
        $this->load->library('session');
    }

    public function index()
    {
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $data['departemen'] = $this->M_departemen->get_data();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Departemen/vw_departemen', $data);
        $this->template->render();
    }

    public function create()
    {
     


        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Departemen/lainlain/create');
        $this->template->render();
    }

    public function save()
    {
        // $this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaDepartemen', 'namaDepartemen', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Departemen/create'); 
        }else{ 
            $data = array(
                'fv_nmdepartment' => $this->input->post('namaDepartemen')
            );

            $this->M_departemen->inputData($data);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Tambah Data</div>');
            return redirect('Departemen/index');

        }    

       
    }

    public function delete($fn_iddepartment)
    {
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $where['fn_iddepartment'] = $fn_iddepartment;
        $this->M_departemen->deleteData($where);
        redirect('Departemen/index');
    }

    public function edit($id)
    {
        $where['fn_iddepartment'] = $id;
        $data['departemen'] = $this->M_departemen->getWhere($where)->result_array();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Departemen/lainlain/edit', $data);
        $this->template->render();
    }

    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaDepartement', 'namaDepartement', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Update Data Salah</div>');
            redirect('Departemen/edit/'.$id); 
        }else{ 
            // $where['fn_iddepartment'] = $id;
            $data['fv_nmdepartment'] = $this->input->post('namaDepartement');
            
            $where = $id;
            $this->M_departemen->updateData($data, $where);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Update Data</div>');
            redirect('Departemen/index');
        }    
    }
}

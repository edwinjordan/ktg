<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class kriteria extends MY_Admin
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('KriteriaModel');
        $data['kriteria'] = $this->KriteriaModel->get_data();
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Kriteria/index_kriteria', $data);
        $this->template->render();
    }

    public function create()
    {
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('Kriteria/aksi/tambah');
        $this->template->render();
    }
    public function save()
    {
        $data = [
            'fv_nmkriteria' => $this->input->post('nmKriteria'),
            'fc_param' => $this->input->post('param'),
        ];
        $this->KriteriaModel->inputData($data);
        redirect('kriteria/index');
    }
    public function delete($fn_idkriteria)
    {
        $where = array('fn_idkriteria ' => $fn_idkriteria);
        $this->KriteriaModel->hapusData($where);
        redirect('kriteria/index');
    }
    public function ubah($id)
    {
        $where = array('fn_idkriteria' => $id);
        $data['kriteria'] = $this->KriteriaModel->ubahData($where, 'tm_kriteria')->result_array();
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('kriteria/aksi/ubah', $data);
        $this->template->render();
    }
    public function update($id)
    {
        $where['fn_idkriteria'] = $id;
        $data = [
            'fv_nmkriteria' => $this->input->post('nmKriteria'),
            'fc_param' => $this->input->post('param'),
        ];
        $this->KriteriaModel->updateData($where, $data, 'tm_kriteria');
        redirect('kriteria/index');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth', 'refresh');
    }
}

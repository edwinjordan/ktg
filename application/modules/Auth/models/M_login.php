<?php

class M_login extends CI_Model {

    function login_checking($table, $where){
		return $this->db->get_where($table, $where);
    }
}
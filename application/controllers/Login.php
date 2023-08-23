<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : Joyonto Roy
 * 	30th July, 2014
 * 	Creative Item
 * 	www.creativeitem.com
 * 	http://codecanyon.net/user/joyontaroy
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');
        
        else if ($this->session->userdata('doctor_login') == 1)
            redirect(base_url() . 'doctor', 'refresh');
        
        else if ($this->session->userdata('patient_login') == 1)
            redirect(base_url() . 'patient', 'refresh');
        
        else if ($this->session->userdata('nurse_login') == 1)
            redirect(base_url() . 'nurse', 'refresh');
        
        else if ($this->session->userdata('pharmacist_login') == 1)
            redirect(base_url() . 'pharmacist', 'refresh');
        
        else if ($this->session->userdata('laboratorist_login') == 1)
            redirect(base_url() . 'laboratorist', 'refresh');
        
        else if ($this->session->userdata('accountant_login') == 1)
            redirect(base_url() . 'accountant', 'refresh');
        
        else if ($this->session->userdata('receptionist_login') == 1)
            redirect(base_url() . 'receptionist', 'refresh');

        $this->load->view('backend/login');
    }

    //Ajax login function 
    function ajax_login() {
    //Recieving post input of email, password from ajax request
    $name = $this->input->post('name');
    $password =  $this->input->post('password');

    //Validating login
    $login_status = $this->validate_login($name, $password);
    if ($login_status == 'success') {
        redirect(base_url() . 'login', 'refresh');
    } else {
        $this->session->set_flashdata('error_msg', "Nom d'utilisateur ou mot de passe incorrect");
        redirect(base_url() . 'login', 'refresh');
    }
}


    //Validating login from ajax request
    function validate_login($name = '', $password = '') {
        $credential = array('name' => $name, 'password' => sha1($password));


        
        
        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }
        
        
        $query = $this->db->get_where('doctor', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('doctor_login', '1');
            $this->session->set_userdata('login_user_id', $row->doctor_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'doctor');
            return 'success';
        }
        
        $query = $this->db->get_where('patient', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('patient_login', '1');
            $this->session->set_userdata('login_user_id', $row->patient_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'patient');
            return 'success';
        }
        
        $query = $this->db->get_where('nurse', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('nurse_login', '1');
            $this->session->set_userdata('login_user_id', $row->nurse_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'nurse');
            return 'success';
        }
        
        $query = $this->db->get_where('pharmacist', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('pharmacist_login', '1');
            $this->session->set_userdata('login_user_id', $row->pharmacist_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'pharmacist');
            return 'success';
        }
        
        $query = $this->db->get_where('laboratorist', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('laboratorist_login', '1');
            $this->session->set_userdata('login_user_id', $row->laboratorist_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'laboratorist');
            return 'success';
        }
        
        $query = $this->db->get_where('accountant', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('accountant_login', '1');
            $this->session->set_userdata('login_user_id', $row->accountant_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'accountant');
            return 'success';
        }
        
        $query = $this->db->get_where('receptionist', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('receptionist_login', '1');
            $this->session->set_userdata('login_user_id', $row->receptionist_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'receptionist');
            return 'success';
        }

        return 'invalid';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    /*     * *RESET AND SEND PASSWORD TO REQUESTED EMAIL*** */

    function reset_password() {
        $account_type = $this->input->post('account_type');
        if ($account_type == "") {
            redirect(base_url(), 'refresh');
        }
        $name = $this->input->post('name');
        $result = $this->name_model->password_reset_name($account_type, $name); //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($result == true) {
            $this->session->set_flashdata('flash_message', get_phrase('password_sent'));
        } else if ($result == false) {
            $this->session->set_flashdata('flash_message', get_phrase('Compte non trouvé'));
        }

        redirect(base_url(), 'refresh');
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url() . 'login', 'refresh');
    }

}

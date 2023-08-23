<?php
/* 	
 * 	Class Admin
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default function, redirects to login page if no admin logged in yet** */

    public function index() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');
    }
    function department_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_department';
            $page_data['page_title'] = get_phrase('department');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_department';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('department');
            $this->load->view('backend/index', $page_data);
        }
    }
    function doctor_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_doctor';
            $page_data['page_title'] = get_phrase('doctor');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_doctor';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('doctor');
            $this->load->view('backend/index', $page_data);
        }
    }
      function patient_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_patient';
            $page_data['page_title'] = get_phrase('patient');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_patient';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('patient');
            $this->load->view('backend/index', $page_data);
        }
    }
    function openig_hours_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_openig_hours';
            $page_data['page_title'] = get_phrase('openig_hours');
            $this->load->view('backend/index', $page_data);
        }
    }
    function slider_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_slider';
            $page_data['page_title'] = get_phrase('slider');
            $this->load->view('backend/index', $page_data);
        }
    }
    function services_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_services';
            $page_data['page_title'] = get_phrase('services');
            $this->load->view('backend/index', $page_data);
        }
    }
    function designation_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_designation';
            $page_data['page_title'] = get_phrase('nouvelle-désignation');
            $this->load->view('backend/index', $page_data);
        }
    }
    function actes_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_actes';
            $page_data['page_title'] = get_phrase('nouvel-acte-médical');
            $this->load->view('backend/index', $page_data);
        }
    }
      function nurse_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_nurse';
            $page_data['page_title'] = get_phrase('nurse');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_nurse';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('nurse');
            $this->load->view('backend/index', $page_data);
        }
    }
     function accountant_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_accountant';
            $page_data['page_title'] = get_phrase('accountant');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_accountant';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('accountant');
            $this->load->view('backend/index', $page_data);
        }
    }
     function receptionist_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_receptionist';
            $page_data['page_title'] = get_phrase('receptionist');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_receptionist';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('receptionist');
            $this->load->view('backend/index', $page_data);
        }
    }
     function laboratorist_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_laboratorist';
            $page_data['page_title'] = get_phrase('laboratorist');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_laboratorist';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('laboratorist');
            $this->load->view('backend/index', $page_data);
        }
    }
      function pharmacist_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_pharmacist';
            $page_data['page_title'] = get_phrase('pharmacist');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_pharmacist';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('pharmacist');
            $this->load->view('backend/index', $page_data);
        }
    }
    function motice_crud($task = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($task == 'add') {
            $page_data['page_name'] = 'add_notice';
            $page_data['page_title'] = get_phrase('notice');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_notice';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('notice');
            $this->load->view('backend/index', $page_data);
        }
    }
    /*     * *ADMIN DASHBOARD** */

    function dashboard() {
        if ($this->session->userdata('admin_login') != 1) {
           // $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    /*     * ***LANGUAGE SETTINGS******** */

    function manage_language($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }
        if ($param1 == 'update_phrase') {
            $language = $param2;
            $total_phrase = $this->input->post('total_phrase');
            for ($i = 1; $i < $total_phrase; $i++) {
                //$data[$language]	=	$this->input->post('phrase').$i;
                $this->db->where('phrase_id', $i);
                $this->db->update('language', array($language => $this->input->post('phrase' . $i)));
            }
            redirect(base_url() . 'admin/manage_language/edit_phrase/' . $language, 'refresh');
        }
        if ($param1 == 'do_update') {
            $language = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);

            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('message', get_phrase('settings_updated'));

            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        $page_data['page_name'] = 'manage_language';
        $page_data['page_title'] = get_phrase('manage_language');
        //$page_data['language_phrases'] = $this->db->get('language')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*     * ***SITE/SYSTEM SETTINGS******** */

    function system_settings($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'do_update') {
            $this->crud_model->update_system_settings();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
             move_uploaded_file($_FILES['welcome_message_image']['tmp_name'], 'uploads/fronted/welcome.png');
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/system_settings/', 'refresh');
        }
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    // SMS settings.
    function sms_settings($param1 = '') {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'do_update') {
            $this->crud_model->update_sms_settings();
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        $page_data['page_name'] = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_settings');
        $this->load->view('backend/index', $page_data);
    }

    /*     * ****MANAGE OWN PROFILE AND CHANGE PASSWORD** */

    function manage_profile($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'update_profile_info') {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $this->db->where('admin_id', $this->session->userdata('login_user_id'));
            $this->db->update('admin', $data);

            $this->session->set_flashdata('message', get_phrase('profile_info_updated_successfuly'));
            redirect(base_url() . 'admin/manage_profile');
        }
        if ($param1 == 'change_password') {
            $current_password_input = sha1($this->input->post('password'));
            $new_password = sha1($this->input->post('new_password'));
            $confirm_new_password = sha1($this->input->post('confirm_new_password'));

            $current_password_db = $this->db->get_where('admin', array('admin_id' =>
                        $this->session->userdata('login_user_id')))->row()->password;

            if ($current_password_db == $current_password_input && $new_password == $confirm_new_password) {
                $this->db->where('admin_id', $this->session->userdata('login_user_id'));
                $this->db->update('admin', array('password' => $new_password));

                $this->session->set_flashdata('message', get_phrase('password_info_updated_successfuly'));
                redirect(base_url() . 'admin/manage_profile');
            } else {
                $this->session->set_flashdata('message', get_phrase('password_update_failed'));
                redirect(base_url() . 'admin/manage_profile');
            }
        }
        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    function department($task = "", $department_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_department_info();
            $this->session->set_flashdata('message', get_phrase('department_info_saved_successfuly'));
            redirect(base_url() . 'admin/department');
        }

        if ($task == "update") {
            $this->crud_model->update_department_info($department_id);
            $this->session->set_flashdata('message', get_phrase('department_info_updated_successfuly'));
            redirect(base_url() . 'admin/department');
        }

        if ($task == "delete") {
            $this->crud_model->delete_department_info($department_id);
            redirect(base_url() . 'admin/department');
        }

        $data['department_info'] = $this->crud_model->select_department_info();
        $data['page_name'] = 'manage_department';
        $data['page_title'] = get_phrase('department');
        $this->load->view('backend/index', $data);
    }
    function slider($task = "", $slider_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_slider_info();
            $this->session->set_flashdata('message', get_phrase('slider_info_saved_successfuly'));
            redirect(base_url() . 'admin/slider');
        }

        if ($task == "update") {
            $this->crud_model->update_slider_info($slider_id);
            $this->session->set_flashdata('message', get_phrase('slider_info_updated_successfuly'));
            redirect(base_url() . 'admin/slider');
        }

        if ($task == "delete") {
            $this->crud_model->delete_slider_info($slider_id);
            redirect(base_url() . 'admin/slider');
        }

        $data['slider_info'] = $this->crud_model->select_slider_info();
        $data['page_name'] = 'manage_slider';
        $data['page_title'] = get_phrase('slider');
        $this->load->view('backend/index', $data);
    }
    function openig_hours($task = "", $openig_hours_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_openig_hours_info();
            $this->session->set_flashdata('message', get_phrase('info_saved_successfuly'));
            redirect(base_url() . 'admin/openig_hours');
        }

        if ($task == "delete") {
            $this->crud_model->delete_openig_hours_info($openig_hours_id);
            redirect(base_url() . 'admin/openig_hours');
        }

        $data['openig_hours_info'] = $this->crud_model->select_openig_hours_info();
        $data['page_name'] = 'manage_openig_hours';
        $data['page_title'] = get_phrase('openig_hours');
        $this->load->view('backend/index', $data);
    }
    function services($task = "", $services_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_services_info();
            $this->session->set_flashdata('message', get_phrase('info_saved_successfuly'));
            redirect(base_url() . 'admin/services');
        }

        if ($task == "delete") {
            $this->crud_model->delete_services_info($services_id);
            redirect(base_url() . 'admin/services');
        }

        $data['services_info'] = $this->crud_model->select_services_info();
        $data['page_name'] = 'manage_services';
        $data['page_title'] = get_phrase('services');
        $this->load->view('backend/index', $data);
    }
    function designation($task = "", $id_designation = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_designation_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'admin/designation');
        }

        if ($task == "delete") {
            $this->crud_model->delete_designation_info($id_designation);
            redirect(base_url() . 'admin/designation');
        }

        $data['designation_info'] = $this->crud_model->select_designation_info();
        $data['page_name'] = 'manage_designation';
        $data['page_title'] = get_phrase('designation');
        $this->load->view('backend/index', $data);
    }
    function actes($task = "", $actes_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_services_info();
            $this->session->set_flashdata('message', get_phrase('info_saved_successfuly'));
            redirect(base_url() . 'admin/actes');
        }

        if ($task == "update") {
          
                $this->crud_model->update_doctor_info($doctor_id);
                $this->session->set_flashdata('message', get_phrase('doctor_info_updated_successfuly'));
            
                redirect(base_url() . 'admin/actes');
        }

        if ($task == "delete") {
            $this->crud_model->delete_services_info($services_id);
            redirect(base_url() . 'admin/actes');
        }

        $data['services_info'] = $this->crud_model->select_services_info();
        $data['page_name'] = 'manage_actes';
        $data['page_title'] = get_phrase('actes-médicaux');
        $this->load->view('backend/index', $data);
    }
    function doctor($task = "", $doctor_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $doctor = $this->db->get_where('doctor', array('email' => $email))->row()->name;

            if ($doctor == null) {
                $this->crud_model->save_doctor_info();
                $this->session->set_flashdata('message', get_phrase('doctor_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/doctor');
        }

        if ($task == "update") {
          
                $this->crud_model->update_doctor_info($doctor_id);
                $this->session->set_flashdata('message', get_phrase('doctor_info_updated_successfuly'));
            
                redirect(base_url() . 'admin/doctor');
        }

        if ($task == "delete") {
            $this->crud_model->delete_doctor_info($doctor_id);
            redirect(base_url() . 'admin/doctor');
        }
        $data['doctor_info'] = $this->crud_model->select_doctor_info();
        $data['page_name'] = 'manage_doctor';
        $data['page_title'] = get_phrase('doctor');
        $this->load->view('backend/index', $data);
    }

    function patient($task = "", $patient_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $patient = $this->db->get_where('patient', array('email' => $email))->row()->name;
            if ($patient == null) {
                $this->crud_model->save_patient_info();
                $this->session->set_flashdata('message', get_phrase('patient_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/patient');
        }

        if ($task == "update") {
                $this->crud_model->update_patient_info($patient_id);
                $this->session->set_flashdata('message', get_phrase('patient_info_updated_successfuly'));
                redirect(base_url() . 'admin/patient');
        }

        if ($task == "delete") {
            $this->crud_model->delete_patient_info($patient_id);
            redirect(base_url() . 'admin/patient');
        }

        $data['patient_info'] = $this->crud_model->select_patient_info();
        $data['page_name'] = 'manage_patient';
        $data['page_title'] = get_phrase('patient');
        $this->load->view('backend/index', $data);
    }

    function nurse($task = "", $nurse_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $nurse = $this->db->get_where('nurse', array('email' => $email))->row()->name;
            if ($nurse == null) {
                $this->crud_model->save_nurse_info();
                $this->session->set_flashdata('message', get_phrase('nurse_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/nurse');
        }

        if ($task == "update") {
                $this->crud_model->update_nurse_info($nurse_id);
                $this->session->set_flashdata('message', get_phrase('nurse_info_updated_successfuly'));
                redirect(base_url() . 'admin/nurse');
        }

        if ($task == "delete") {
            $this->crud_model->delete_nurse_info($nurse_id);
            redirect(base_url() . 'admin/nurse');
        }

        $data['nurse_info'] = $this->crud_model->select_nurse_info();
        $data['page_name'] = 'manage_nurse';
        $data['page_title'] = get_phrase('nurse');
        $this->load->view('backend/index', $data);
    }

    function pharmacist($task = "", $pharmacist_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $pharmacist = $this->db->get_where('pharmacist', array('email' => $email))->row()->name;
            if ($pharmacist == null) {
                $this->crud_model->save_pharmacist_info();
                $this->session->set_flashdata('message', get_phrase('pharmacist_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/pharmacist');
        }

        if ($task == "update") {
                $this->crud_model->update_pharmacist_info($pharmacist_id);
                $this->session->set_flashdata('message', get_phrase('pharmacist_info_updated_successfuly'));
                redirect(base_url() . 'admin/pharmacist');
        }

        if ($task == "delete") {
            $this->crud_model->delete_pharmacist_info($pharmacist_id);
            redirect(base_url() . 'admin/pharmacist');
        }

        $data['pharmacist_info'] = $this->crud_model->select_pharmacist_info();
        $data['page_name'] = 'manage_pharmacist';
        $data['page_title'] = get_phrase('pharmacist');
        $this->load->view('backend/index', $data);
    }

    function laboratorist($task = "", $laboratorist_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $laboratorist = $this->db->get_where('laboratorist', array('email' => $email))->row()->name;
            if ($laboratorist == null) {
                $this->crud_model->save_laboratorist_info();
                $this->session->set_flashdata('message', get_phrase('laboratorist_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/laboratorist');
        }

        if ($task == "update") {
                $this->crud_model->update_laboratorist_info($laboratorist_id);
                $this->session->set_flashdata('message', get_phrase('laboratorist_info_updated_successfuly'));
                redirect(base_url() . 'admin/laboratorist');
        }

        if ($task == "delete") {
            $this->crud_model->delete_laboratorist_info($laboratorist_id);
            redirect(base_url() . 'admin/laboratorist');
        }

        $data['laboratorist_info'] = $this->crud_model->select_laboratorist_info();
        $data['page_name'] = 'manage_laboratorist';
        $data['page_title'] = get_phrase('laboratorist');
        $this->load->view('backend/index', $data);
    }

    function accountant($task = "", $accountant_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $accountant = $this->db->get_where('accountant', array('email' => $email))->row()->name;
            if ($accountant == null) {
                $this->crud_model->save_accountant_info();
                $this->session->set_flashdata('message', get_phrase('accountant_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/accountant');
        }

        if ($task == "update") {
                $this->crud_model->update_accountant_info($accountant_id);
                $this->session->set_flashdata('message', get_phrase('accountant_info_updated_successfuly'));
                redirect(base_url() . 'admin/accountant');
        }

        if ($task == "delete") {
            $this->crud_model->delete_accountant_info($accountant_id);
            redirect(base_url() . 'admin/accountant');
        }

        $data['accountant_info'] = $this->crud_model->select_accountant_info();
        $data['page_name'] = 'manage_accountant';
        $data['page_title'] = get_phrase('accountant');
        $this->load->view('backend/index', $data);
    }

    function receptionist($task = "", $receptionist_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $name = $_POST['name'];
            $receptionist = $this->db->get_where('receptionist', array('name' => $name))->row()->name;
            if ($receptionist == null) {
                $this->crud_model->save_receptionist_info();
                $this->session->set_flashdata('message', get_phrase('receptionist_info_saved_successfuly'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'admin/receptionist');
        }

        if ($task == "update") {
                $this->crud_model->update_receptionist_info($receptionist_id);
                $this->session->set_flashdata('message', get_phrase('receptionist_info_updated_successfuly'));
                redirect(base_url() . 'admin/receptionist');
        }

        if ($task == "delete") {
            $this->crud_model->delete_receptionist_info($receptionist_id);
            redirect(base_url() . 'admin/receptionist');
        }

        $data['receptionist_info'] = $this->crud_model->select_receptionist_info();
        $data['page_name'] = 'manage_receptionist';
        $data['page_title'] = get_phrase('receptionniste');
        $this->load->view('backend/index', $data);
    }

    function payment_history($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['invoice_info'] = $this->crud_model->select_invoice_info();
        $data['page_name'] = 'show_payment_history';
        $data['page_title'] = get_phrase('historique-de-paiement');
        $this->load->view('backend/index', $data);
    }


    function invoice_manage($task = "", $invoice_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_invoice($invoice_id);
            redirect('admin/invoice_manage');
        }

        $data['invoice_info'] = $this->crud_model->select_invoice_info();
        $data['page_name'] = 'manage_invoice';
        $data['page_title'] = get_phrase('reçu');
        $this->load->view('backend/index', $data);
    }

    function bed_allotment($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['bed_allotment_info'] = $this->crud_model->select_bed_allotment_info();
        $data['page_name'] = 'show_bed_allotment';
        $data['page_title'] = get_phrase('bed_allotment');
        $this->load->view('backend/index', $data);
    }

    function blood_bank($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['blood_bank_info'] = $this->crud_model->select_blood_bank_info();
        $data['page_name'] = 'show_blood_bank';
        $data['page_title'] = get_phrase('blood_bank');
        $this->load->view('backend/index', $data);
    }

    function blood_donor($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['blood_donor_info'] = $this->crud_model->select_blood_donor_info();
        $data['page_name'] = 'show_blood_donor';
        $data['page_title'] = get_phrase('blood_donor');
        $this->load->view('backend/index', $data);
    }

    function medicine($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['medicine_info'] = $this->crud_model->select_medicine_info();
        $data['page_name'] = 'show_medicine';
        $data['page_title'] = get_phrase('medicine');
        $this->load->view('backend/index', $data);
    }

    function operation_report($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'show_operation_report';
        $data['page_title'] = get_phrase('operation_report');
        $this->load->view('backend/index', $data);
    }

    function birth_report($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'show_birth_report';
        $data['page_title'] = get_phrase('birth_report');
        $this->load->view('backend/index', $data);
    }

    function death_report($task = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'show_death_report';
        $data['page_title'] = get_phrase('death_report');
        $this->load->view('backend/index', $data);
    }

    function notice($task = "", $notice_id = "") {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_notice_info();
            $this->session->set_flashdata('message', get_phrase('notice_info_saved_successfuly'));
            redirect(base_url() . 'admin/notice');
        }

        if ($task == "update") {
            $this->crud_model->update_notice_info($notice_id);
            $this->session->set_flashdata('message', get_phrase('notice_info_updated_successfuly'));
            redirect(base_url() . 'admin/notice');
        }

        if ($task == "delete") {
            $this->crud_model->delete_notice_info($notice_id);
            redirect(base_url() . 'admin/notice');
        }

        $data['notice_info'] = $this->crud_model->select_notice_info();
        $data['page_name'] = 'manage_notice';
        $data['page_title'] = get_phrase('noticeboard');
        $this->load->view('backend/index', $data);
    }

}

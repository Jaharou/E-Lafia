<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receptionist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function index() {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'dashboard';
        $data['page_title'] = get_phrase('receptionist_dashboard');
        $this->load->view('backend/index', $data);
    }

    function doctor_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('receptionist_login') != 1)
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

    function doctor($task = "", $doctor_id = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $email = $_POST['email'];
            $doctor = $this->db->get_where('doctor', array('email' => $email))->row()->name;

            if ($doctor == null) {
                $this->crud_model->save_doctor_info();
                $this->session->set_flashdata('message', get_phrase('informations a été enregistrées avec succès'));
            } else {
                $this->session->set_flashdata('message', get_phrase('email dupliqué'));
            }
            redirect(base_url() . 'receptionist/doctor');
        }

        if ($task == "update") {
          
                $this->crud_model->update_doctor_info($doctor_id);
                $this->session->set_flashdata('message', get_phrase('mise à jour a été éffectué avec succès'));
            
                redirect(base_url() . 'receptionist/doctor');
        }

        if ($task == "delete") {
            $this->crud_model->delete_doctor_info($doctor_id);
            redirect(base_url() . 'receptionist/doctor');
        }
        $data['doctor_info'] = $this->crud_model->select_doctor_info();
        $data['page_name'] = 'manage_doctor';
        $data['page_title'] = get_phrase('doctor');
        $this->load->view('backend/index', $data);
    }

   /*function prescription_crud($task = "", $param2 = "", $param3 = ""){
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($task == 'add') {
            $page_data['page_name'] = 'add_prescription';
            $page_data['page_title'] = get_phrase('prescription');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_prescription';
           $page_data['param2'] = $param2;
            $page_data['param3'] = $param3;
            $page_data['page_title'] = get_phrase('prescription');
            $this->load->view('backend/index', $page_data);
        }
    }

    function prescription($task = "", $prescription_id = "", $menu_check = '', $patient_id = '') {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_prescription_info();
            $this->session->set_flashdata('message', get_phrase('les informations a été enregistrées avec succès'));
            redirect(base_url() . 'receptionist/prescription');
        }

        if ($task == "update") {
            $this->crud_model->update_prescription_info($prescription_id);
            $this->session->set_flashdata('message', get_phrase('mise à jour a été éffectué avec succès'));
            if ($menu_check == 'from_prescription')
                redirect(base_url() . 'receptionist/prescription');
            else
                redirect(base_url() . 'receptionist/medication_history/' . $patient_id);
        }

        if ($task == "delete") {
            $this->crud_model->delete_prescription_info($prescription_id);
            if ($menu_check == 'from_prescription')
                redirect(base_url() . 'receptionist/prescription');
            else
                redirect(base_url() . 'receptionist/medication_history/' . $patient_id);
        }

        $data['prescription_info'] = $this->crud_model->select_prescription_info_by_doctor_id();
        $data['menu_check'] = 'from_prescription';
        $data['page_name'] = 'manage_prescription';
        $data['page_title'] = get_phrase('prescription');
        $this->load->view('backend/index', $data);
    }*/

     function patient_crud($task = "" , $param2 = ""){
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
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
    function patient($task = "", $patient_id = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $name = $_POST['name'];
            $patient = $this->db->get_where('patient', array('name' => $name))->row()->name;
            if ($patient == null) {
                $this->crud_model->save_patient_info();
                $this->session->set_flashdata('message', get_phrase("l'informations a été enregistrées avec succès"));
            } else {
                $this->session->set_flashdata('message', get_phrase('nom en doublant'));
            }
            redirect(base_url() . 'receptionist/patient');
        }

        if ($task == "update") {
                $this->crud_model->update_patient_info($patient_id);
                $this->session->set_flashdata('message', get_phrase("l'informations a été mises à jour avec succès"));
                redirect(base_url() . 'receptionist/patient');
        }

        if ($task == "delete") {
            $this->crud_model->delete_patient_info($patient_id);
            redirect(base_url() . 'receptionist/patient');
        }

        $data['patient_info'] = $this->crud_model->select_patient_info();
        $data['page_name'] = 'manage_patient';
        $data['page_title'] = get_phrase('patient');
        $this->load->view('backend/index', $data);
    }

    function appointment($task = "", $doctor_id = 'all', $start_timestamp = "", $end_timestamp = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == 'filter') {
            $doctor_id = $this->input->post('doctor_id');
            $start_timestamp = strtotime($this->input->post('start_timestamp'));
            $end_timestamp = strtotime($this->input->post('end_timestamp'));
            redirect(base_url() . 'receptionist/appointment/search/' . $doctor_id . '/' . $start_timestamp . '/' . $end_timestamp);
        }

        if ($task == "create") {
            $this->crud_model->save_appointment_info();
            $this->session->set_flashdata('message', get_phrase('appointment_info_saved_successfuly'));
            redirect(base_url() . 'receptionist/appointment');
        }

        $data['doctor_id'] = $doctor_id;
        if ($start_timestamp == '')
            $data['start_timestamp'] = strtotime('today - 30 days');
        else
            $data['start_timestamp'] = $start_timestamp;
        if ($end_timestamp == '')
            $data['end_timestamp'] = strtotime('today');
        else
            $data['end_timestamp'] = $end_timestamp;

        $data['appointment_info'] = $this->crud_model->select_appointment_info($doctor_id, $data['start_timestamp'], $data['end_timestamp']);
        $data['page_name'] = 'show_appointment';
        $data['page_title'] = get_phrase('appointment');
        $this->load->view('backend/index', $data);
    }

    function appointment_requested($task = "", $appointment_id = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "approve") {
            $this->crud_model->approve_appointment_info($appointment_id);
            $this->session->set_flashdata('message', get_phrase('appointment_info_approved'));
            redirect(base_url() . 'receptionist/appointment_requested');
        }

        $data['requested_appointment_info'] = $this->crud_model->select_requested_appointment_info();
        $data['page_name'] = 'manage_requested_appointment';
        $data['page_title'] = get_phrase('requested_appointment');
        $this->load->view('backend/index', $data);
    }

    function remise_add($task = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->create_remise();
            $this->session->set_flashdata('message', get_phrase("l'informations a été enregistrées avec succès"));
            redirect(base_url() . 'receptionist/remise_manage');
        }

        $data['page_name'] = 'add_remise';
        $data['page_title'] = get_phrase('remise');
        $this->load->view('backend/index', $data);
    }

    function invoice_add($task = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->create_invoice();
            $this->session->set_flashdata('message', get_phrase("l'informations a été enregistrées avec succès"));
            redirect(base_url() . 'receptionist/invoice_manage');
        }

        $data['page_name'] = 'add_invoice';
        $data['page_title'] = get_phrase('reçu');
        $this->load->view('backend/index', $data);
    }

    function invoice_manage($task = "", $invoice_id = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->create_invoice();
            $this->session->set_flashdata('message', get_phrase("l'informations a été enregistrées avec succès"));
            redirect(base_url() . 'receptionist/invoice_manage');
        }

        if ($task == "update") {
            $this->crud_model->update_invoice($invoice_id);
            $this->session->set_flashdata('message', get_phrase("mises à jour des informations a été éffectué avec succès"));
            redirect(base_url() . 'receptionist/invoice_manage');
        }

        if ($task == "delete") {
            $this->crud_model->delete_invoice($invoice_id);
            redirect(base_url() . 'receptionist/invoice_manage');
        }

        $data['invoice_info'] = $this->crud_model->select_invoice_info();
        $data['page_name'] = 'manage_invoice';
        $data['page_title'] = get_phrase('reçu');
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

    function profile($task = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $receptionist_id = $this->session->userdata('login_user_id');
        if ($task == "update") {
                $this->crud_model->update_receptionist_info($receptionist_id);
                $this->session->set_flashdata('message', get_phrase('informations de profil a été mises à jour avec succès'));
                redirect(base_url() . 'receptionist/profile');
        }

        if ($task == "change_password") {
            $password = $this->db->get_where('receptionist', array('receptionist_id' => $receptionist_id))->row()->password;
            $old_password = sha1($this->input->post('old_password'));
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

            if ($password == $old_password && $new_password == $confirm_new_password) {
                $data['password'] = sha1($new_password);
                $this->db->where('receptionist_id', $receptionist_id);
                $this->db->update('receptionist', $data);

                $this->session->set_flashdata('message', get_phrase('password_info_updated_successfuly'));
                redirect(base_url() . 'receptionist/profile');
            } else {
                $this->session->set_flashdata('message', get_phrase('password_update_failed'));
                redirect(base_url() . 'receptionist/profile');
            }
        }

        $data['page_name'] = 'edit_profile';
        $data['page_title'] = get_phrase('profil');
        $this->load->view('backend/index', $data);
    }

    function form($task = "") {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'form_create';
        $data['page_title'] = get_phrase('create_form');
        $this->load->view('backend/index', $data);
    }

    function get_form_element($element_type) {
        if ($this->session->userdata('receptionist_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        echo $html = $this->db->get_where('form_element', array('type' => $element_type))->row()->html;
        //$this->load->view('backend/accountant/form_create_body', $html);
        //echo $element_type;
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function index() {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['page_name'] = 'dashboard';
        $data['page_title'] = get_phrase('doctor_dashboard');
        $this->load->view('backend/index', $data);
    }
     function appointment_crud($task = "", $param2 = ""){
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($task == 'add') {
            $page_data['page_name'] = 'add_appointment';
            $page_data['page_title'] = get_phrase('appointment');
            $this->load->view('backend/index', $page_data);
        }elseif ($task == 'edit') {
           $page_data['page_name'] = 'edit_appointment';
           $page_data['param2'] = $param2;
            $page_data['page_title'] = get_phrase('appointment');
            $this->load->view('backend/index', $page_data);
        }
    }
    function prescription_crud($task = "", $param2 = "", $param3 = ""){
        if ($this->session->userdata('doctor_login') != 1) {
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
    function patient($task = "", $patient_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $name = $_POST['name'];
            $patient = $this->db->get_where('patient', array('name' => $name))->row()->name;
            if ($patient == null) {
                $this->crud_model->save_patient_info();
                $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            } else {
                $this->session->set_flashdata('message', get_phrase('nom en doublant'));
            }
            redirect(base_url() . 'doctor/patient');
        }

        if ($task == "update") {
                $this->crud_model->update_patient_info($patient_id);
                $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
                redirect(base_url() . 'doctor/patient');
        }

        if ($task == "delete") {
            $this->crud_model->delete_patient_info($patient_id);
            redirect(base_url() . 'doctor/patient');
        }

        $data['patients'] = $this->crud_model->select_patient_info_by_doctor_id();
        $data['page_name'] = 'manage_patient';
        $data['page_title'] = get_phrase('patient');
        $this->load->view('backend/index', $data);
    }

    

    function medication_history($param1 = "", $prescription_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $patient_name = $this->db->get_where('patient', array('patient_id' => $param1))->row()->name;
         // $param1 = $patient_id
        $data['prescription_info'] = $this->crud_model->select_medication_history($param1); // $param1 = $patient_id

        $data['menu_check'] = 'from_patient';
        $data['page_name'] = 'manage_prescription';
        $data['page_title'] = get_phrase('medication_history_of_:_') . $patient_name;
        $this->load->view('backend/index', $data);
    }

    function bed_allotment($task = "", $bed_allotment_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_bed_allotment_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'doctor/bed_allotment');
        }

        if ($task == "update") {
            $this->crud_model->update_bed_allotment_info($bed_allotment_id);
            $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
            redirect(base_url() . 'doctor/bed_allotment');
        }

        if ($task == "delete") {
            $this->crud_model->delete_bed_allotment_info($bed_allotment_id);
            redirect(base_url() . 'doctor/bed_allotment');
        }

        $data['bed_allotment_info'] = $this->crud_model->select_bed_allotment_info();
        $data['page_name'] = 'manage_bed_allotment';
        $data['page_title'] = get_phrase('bed_allotment');
        $this->load->view('backend/index', $data);
    }

    function blood_bank($task = "", $blood_bank_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $data['blood_bank_info'] = $this->crud_model->select_blood_bank_info();
        $data['blood_donor_info'] = $this->crud_model->select_blood_donor_info();
        $data['page_name'] = 'show_blood_bank';
        $data['page_title'] = get_phrase('blood_bank');
        $this->load->view('backend/index', $data);
    }

    function report($task = "", $report_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_report_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'doctor/report');
        }

        if ($task == "update") {
            $this->crud_model->update_report_info($report_id);
            $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
            redirect(base_url() . 'doctor/report');
        }

        if ($task == "delete") {
            $this->crud_model->delete_report_info($report_id);
            redirect(base_url() . 'doctor/report');
        }

        $data['page_name'] = 'manage_report';
        $data['page_title'] = get_phrase('report');
        $this->load->view('backend/index', $data);
    }

    function profile($task = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $doctor_id = $this->session->userdata('login_user_id');
        if ($task == "update") {
                $this->crud_model->update_doctor_info($doctor_id);
                redirect(base_url() . 'doctor/profile');
        }

        if ($task == "change_password") {
            $password = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->row()->password;
            $old_password = sha1($this->input->post('old_password'));
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

            if ($password == $old_password && $new_password == $confirm_new_password) {
                $data['password'] = sha1($new_password);

                $this->db->where('doctor_id', $doctor_id);
                $this->db->update('doctor', $data);

                $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
                redirect(base_url() . 'doctor/profile');
            } else {
                $this->session->set_flashdata('message', get_phrase('password_update_failed'));
                redirect(base_url() . 'doctor/profile');
            }
        }

        $data['page_name'] = 'edit_profile';
        $data['page_title'] = get_phrase('profile');
        $this->load->view('backend/index', $data);
    }

    function appointment($task = "", $appointment_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_appointment_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'doctor/appointment');
        }

        if ($task == "update") {
            $this->crud_model->update_appointment_info($appointment_id);
            $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
            redirect(base_url() . 'doctor/appointment');
        }

        if ($task == "delete") {
            $this->crud_model->delete_appointment_info($appointment_id);
            redirect(base_url() . 'doctor/appointment');
        }

        $data['appointment_info'] = $this->crud_model->select_appointment_info_by_doctor_id();
        $data['page_name'] = 'manage_appointment';
        $data['page_title'] = get_phrase('appointment');
        $this->load->view('backend/index', $data);
    }

    function appointment_requested($task = "", $appointment_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "approve") {
            $this->crud_model->approve_appointment_info($appointment_id);
            $this->session->set_flashdata('message', get_phrase('appointment_info_approved'));
            redirect(base_url() . 'doctor/appointment_requested');
        }

        if ($task == "delete") {
            $this->crud_model->delete_appointment_info($appointment_id);
            redirect(base_url() . 'doctor/appointment_requested');
        }

        $data['requested_appointment_info'] = $this->crud_model->select_requested_appointment_info_by_doctor_id();
        $data['page_name'] = 'manage_requested_appointment';
        $data['page_title'] = get_phrase('requested_appointment');
        $this->load->view('backend/index', $data);
    }

    function prescription($task = "", $prescription_id = "", $menu_check = '', $patient_id = '') {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_prescription_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'doctor/prescription');
        }

        if ($task == "update") {
            $this->crud_model->update_prescription_info($prescription_id);
            $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
            if ($menu_check == 'from_prescription')
                redirect(base_url() . 'doctor/prescription');
            else
                redirect(base_url() . 'doctor/medication_history/' . $patient_id);
        }

        if ($task == "delete") {
            $this->crud_model->delete_prescription_info($prescription_id);
            if ($menu_check == 'from_prescription')
                redirect(base_url() . 'doctor/prescription');
            else
                redirect(base_url() . 'doctor/medication_history/' . $patient_id);
        }

        $data['prescription_info'] = $this->crud_model->select_prescription_info_by_doctor_id();
        $data['menu_check'] = 'from_prescription';
        $data['page_name'] = 'manage_prescription';
        $data['page_title'] = get_phrase('prescription');
        $this->load->view('backend/index', $data);
    }

    function diagnosis_report($task = "", $diagnosis_report_id = "") {
        if ($this->session->userdata('doctor_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_diagnosis_report_info();
            $this->session->set_flashdata('message', get_phrase('informations a-été-enregistrées-avec-succès'));
            redirect(base_url() . 'doctor/prescription');
        }

        if ($task == "delete") {
            $this->crud_model->delete_diagnosis_report_info($diagnosis_report_id);
            $this->session->set_flashdata('message', get_phrase('informations a-été-mise-à-jour-avec-succès'));
            redirect(base_url() . 'doctor/prescription');
        }
    }

    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('message', get_phrase('message_envoyé!'));
            redirect(base_url() . 'doctor/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('message', get_phrase('message_envoyé!'));
            redirect(base_url() . 'doctor/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name'] = 'message';
        $page_data['page_title'] = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

}

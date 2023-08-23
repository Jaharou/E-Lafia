<?php
/* 	
 * 	Class Home
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // CHECK CUSTOM SESSION DATA
        //$this->session_data();
    }

    /*     * *default function, redirects to login page if no admin logged in yet** */

    public function index() {
        $this->home();
    }
     public function home()
    {
        $page_data['slider'] =  $this->crud_model->select_slider_info(); 
        $page_data['department'] =  $this->crud_model->select_department_info(); 
        $page_data['phone'] =  $this->crud_model->system_info('phone'); 
        $page_data['system_name'] =  $this->crud_model->system_info('system_name'); 
        $page_data['system_title'] =  $this->crud_model->system_info('system_title'); 
        $page_data['doctor'] =  $this->crud_model->select_doctor_info();
        $page_data['nurse'] =  $this->crud_model->select_nurse_info();
        $page_data['openig_hours'] = $this->crud_model->select_openig_hours_info();
        $page_data['services'] = $this->crud_model->select_services_info();
        $page_data['facebook'] =  $this->crud_model->system_info('facebook'); 
        $page_data['twitter'] =  $this->crud_model->system_info('twitter'); 
        $page_data['instagram'] =  $this->crud_model->system_info('instagram'); 
        $page_data['youtube'] =  $this->crud_model->system_info('youtube'); 
        $page_data['page_name'] = "home";
        $page_data['page_title'] = get_phrase('home');
        $this->load->view('frontend/index', $page_data);
    }
    function appointment($task = "", $appointment_id = "") {
         if ($task == "create") {

         if($this->crud_model->check_recaptcha() == false && get_frontend_settings('recaptcha_status') == '1'){
            $this->session->set_flashdata('error',get_phrase('recaptcha_verification_failed'));
            redirect(site_url('home/appointment'), 'refresh');
        }

            $email = $_POST['email'];
            $patient = $this->db->get_where('patient', array('email' => $email))->row()->name;
            if ($patient == null) {
                $this->crud_model->save_patient_info_home();
                $this->session->set_flashdata('message', get_phrase('patient_info_saved_successfuly'));                
                $this->session->set_flashdata('message', get_phrase('request_for_appointment_sent'));
            } else {
                $this->session->set_flashdata('message', get_phrase('duplicate_email'));
            }
            redirect(base_url() . 'home/appointment');
        }
         $page_data['department'] =  $this->crud_model->select_department_info();
        $page_data['system_name'] =  $this->crud_model->system_info('system_name'); 
        $page_data['system_title'] =  $this->crud_model->system_info('system_title'); 
         $page_data['facebook'] =  $this->crud_model->system_info('facebook'); 
        $page_data['twitter'] =  $this->crud_model->system_info('twitter'); 
        $page_data['instagram'] =  $this->crud_model->system_info('instagram'); 
        $page_data['youtube'] =  $this->crud_model->system_info('youtube'); 
        $page_data['page_name'] = 'appointment_form';
        $page_data['page_title'] = get_phrase('appointment');
        $this->load->view('frontend/index', $page_data);
    }

    public function check_recaptcha()
    {
        if (isset($_POST["g-recaptcha-response"])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => get_frontend_settings('recaptcha_secretkey'),
                'response' => $_POST["g-recaptcha-response"]
            );
            $query = http_build_query($data);
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                        "Content-Length: " . strlen($query) . "\r\n" .
                        "User-Agent:MyAgent/1.0\r\n",
                    'method' => 'POST',
                    'content' => $query
                )
            );
            $context  = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == false) {
                return false;
            } else if ($captcha_success->success == true) {
                return true;
            }
        } else {
            return false;
        }
    }
     function contact_us($task = "") {
         if ($task == "create") {
            if ($this->input->post('email') != "") {
                $msg = $this->input->post('message');
                $sub = $this->input->post('subject');
                $from = $this->input->post('email');
                $this->email_model->contact_us_email($msg, $sub,$from);
                $this->session->set_flashdata('message', get_phrase('massage_send'));
            } else {
                $this->session->set_flashdata('message', get_phrase('fill_up_info'));
            }
            redirect(base_url() . 'home/contact_us');
        }
        $page_data['system_title'] =  $this->crud_model->system_info('system_title'); 
         $page_data['facebook'] =  $this->crud_model->system_info('facebook'); 
        $page_data['twitter'] =  $this->crud_model->system_info('twitter'); 
        $page_data['instagram'] =  $this->crud_model->system_info('instagram'); 
        $page_data['youtube'] =  $this->crud_model->system_info('youtube'); 
        $page_data['page_name'] = 'contact_form';
        $page_data['page_title'] = get_phrase('contact');
        $this->load->view('frontend/index', $page_data);
    }
    function doctor($doctor_id = "") {
       
        $page_data['system_title'] =  $this->crud_model->system_info('system_title'); 
         $page_data['facebook'] =  $this->crud_model->system_info('facebook'); 
        $page_data['twitter'] =  $this->crud_model->system_info('twitter'); 
        $page_data['instagram'] =  $this->crud_model->system_info('instagram'); 
        $page_data['youtube'] =  $this->crud_model->system_info('youtube'); 
        $page_data['page_name'] = 'view_doctor';
        $page_data['doctor_id'] = $doctor_id;
        $page_data['page_title'] = get_phrase('view_doctor');
        $this->load->view('frontend/index', $page_data);
    }
     function nurse($nurse_id = "") {
       
        $page_data['system_title'] =  $this->crud_model->system_info('system_title'); 
         $page_data['facebook'] =  $this->crud_model->system_info('facebook'); 
        $page_data['twitter'] =  $this->crud_model->system_info('twitter'); 
        $page_data['instagram'] =  $this->crud_model->system_info('instagram'); 
        $page_data['youtube'] =  $this->crud_model->system_info('youtube'); 
        $page_data['page_name'] = 'view_nurse';
        $page_data['nurse_id'] = $nurse_id;
        $page_data['page_title'] = get_phrase('view_nurse');
        $this->load->view('frontend/index', $page_data);
    }

}

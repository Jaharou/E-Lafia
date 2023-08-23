<?php
/* 	
 * 	Class for PatientPrint
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
class PatientPrint extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('fpdf');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index() {
        
    }

    public function patient_fpdf($param1 = '') {
			if ($this->session->userdata('admin_login') == '1' ||
			$this->session->userdata('nurse_login') == '1' ||
			$this->session->userdata('receptionist_login') == '1'
			) {
			
		$patient_info = $this->crud_model->select_patient_info_by_patient_id($param1);
		foreach ( $patient_info as $val ):		

			$system_title = $this->db->get_where( 'settings', array( 'type' => 'system_title' ))->row()->description;              
			$contact = $this->db->get_where( 'settings', array( 'type' => 'phone' ))->row()->description;
			$address = $this->db->get_where( 'settings', array( 'type' => 'address' ))->row()->description;
			
				$this->fpdf->SetMargins( '15', '10', '20');
				$this->fpdf->AliasNbPages();
				$this->fpdf->AddPage();
				$this->fpdf->Ln(4);	
				
                $this->header_info( '', $val['patient_id'], $system_title, 'logo', $contact, $address );

                $this->fpdf->Ln(1);
                $this->header_design( 'Name', ': ' . $val['name'], 'Patient ID', ': ' . $val['patient_id'] );
                $this->header_design( 'Birth Day', ': ' .date('d/m/Y', $val['birth_date']), 'Mobile', ': ' . $val['phone'] );
                $this->fpdf->Ln(5);

                $this->body_design( "Address", $val['address'] );
                $this->body_design( "Sex", $val['sex'] );
                $this->body_design( "Email", $val['email'] );
                $this->body_design( "Age", $val['age'] );
                $this->body_design( "Blood Group", $val['blood_group'] );
          
				$this->fpdf->Ln();  
		endforeach;				
				$this->fpdf->Output( 'Patients.pdf', 'D');					
		}
    }

    public function qr($code, $x, $y, $size = 20) {
        // QR        
        $this->qrcode->disableBorder();
        // X pos, Y pos, Size of the QR code
        $this->qrcode->displayFPDF($this->ivoicebarcodetest->man(), $x, $y, $size);
    }

    public function header_info($barcode_text = '', $sid = '', $title_tab = '', $logo = '', $contact = '', $address = '') {
        //________________   Logo ____________________________
        $this->fpdf->Image('uploads/' . $logo . '.jpeg', 25, 10, 20, 16);
		$string = read_file('uploads/patient_image/'.$sid.'.jpg');
        if ($string) {
             $this->fpdf->Image('uploads/patient_image/'.$sid.'.jpg', 179, 28, 16, 16);
        }
        // $this->qr($barcode_text, 179, 10, 16);
        //________________ School Name ____________________________
        $this->fpdf->SetFont('times', 'B', 13);
        // $title_tab="North West International School, Rangpur  ";
        $this->fpdf->Cell(180, 10, $title_tab, 0, 0, 'C');
        $this->fpdf->Ln(5);
        //________________ Header Text ____________________________				 

        $this->fpdf->setFillColor(230, 230, 230);
        $this->fpdf->SetFont('times', '', 7);
        $this->fpdf->Cell(180, 10, 'Contact: ' . $contact . ',' . $address, 0, 0, 'C');

        $this->fpdf->Ln(2);
        $this->fpdf->SetTextColor(2, 182, 0);
        $this->fpdf->SetX(0);
        $this->fpdf->Cell(180, 10, '______________________________________________________________________________________________________________________________________________________________________________________________________________________', 0, 0, 'C');
        $this->fpdf->Ln(6);
    }

    public function top_header_data($invoice_id = '', $date = '', $sl = '', $sname = '', $class = '', $roll = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 11);
        $this->fpdf->Cell(60, 10, 'Invoice ID : ' . $invoice_id, 0, 0, 'L');
        $this->fpdf->Cell(60, 10, 'Date: ' . $date, 0, 0, 'C');
        $this->fpdf->Cell(60, 10, 'S.ID. ' . $sl, 0, 0, 'R');
        $this->fpdf->Ln(6);
        $this->fpdf->Cell(60, 10, 'Student Name : ' . $sname, 0, 0, 'L');
        $this->fpdf->Cell(60, 10, 'Class: ' . $class, 0, 0, 'C');
        $this->fpdf->Cell(60, 10, 'Roll: ' . $roll, 0, 0, 'R');
        $this->fpdf->Ln();
    }

    public function voucher_top_header_data($invoice_id = '', $date = '', $sl = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 11);
        $this->fpdf->Cell(60, 10, 'Voucher ID : ' . $invoice_id, 0, 0, 'L');
        $this->fpdf->Cell(60, 10, 'Date: ' . $date, 0, 0, 'C');
        $this->fpdf->Cell(60, 10, 'Printed by. ' . $sl, 0, 0, 'R');
        $this->fpdf->Ln();
    }

    public function header_design($param1 = '', $param2 = '', $param3 = '', $param4 = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 11);
        $this->fpdf->Cell(30, 10, $param1, 0, 0, 'L');
        $this->fpdf->Cell(60, 10, $param2, 0, 0, 'L');
        $this->fpdf->Cell(30, 10, $param3, 0, 0, 'L');
        $this->fpdf->Cell(60, 10, $param4, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }

    public function body_design($param1 = '', $param2 = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 11);
        $this->fpdf->Cell(90, 6, $param1, 1, 0, 'L');
        $this->fpdf->Cell(90, 6, $param2, 1, 0, 'L');
        $this->fpdf->Ln();
    }

    public function invioce_footer($gtotal = '', $currency = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $this->fpdf->Cell(90, 6, "Grand Total(" . $currency . ") :", 1, 0, 'L', true);
        $this->fpdf->Cell(90, 6, $gtotal . "/=", 1, 0, 'R', true);
        $this->fpdf->Ln(11);
        $this->fpdf->Cell(90, 6, "Guardian's signature:.........................................................", 0, 0, 'L');
        $this->fpdf->Cell(90, 6, "Authorised by:...................................Date:............/.........../...........", 0, 0, 'R');
        $this->fpdf->Ln();
        $this->fpdf->Cell(180, 6, "......................................................................................................................................................................................................................................................................................................", 0, 0, 'C');
    }

    public function voucher_footer($gtotal = '', $currency = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $this->fpdf->Cell(90, 6, "Grand Total(" . $currency . ") :", 1, 0, 'L', true);
        $this->fpdf->Cell(90, 6, $gtotal . "/=", 1, 0, 'R', true);
        $this->fpdf->Ln(11);
        $this->fpdf->Cell(180, 6, "Authorised by:...........................................................................Date:............/.........../...........", 0, 0, 'L');
        $this->fpdf->Ln();
        $this->fpdf->Cell(180, 6, "......................................................................................................................................................................................................................................................................................................", 0, 0, 'C');
    }

    public function CreateTable_header($currency = '') {
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->setFillColor(184, 207, 229);
        $this->fpdf->Cell(5, 6, "Q", 0, 0, 'L', true);
        $this->fpdf->Cell(70, 6, "Titre", 0, 0, 'C', true);
        $this->fpdf->Cell(90, 6, "Description", 0, 0, 'L', true);
        $this->fpdf->Cell(15, 6, "Total(" . $currency . ")", 0, 0, 'R', true);
        $this->fpdf->Ln();
    }

    public function CreateTable_row($sl = '', $var1 = '', $var2 = '', $var3 = '') {
        $this->fpdf->SetFillColor(255);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(5, 10, $sl, 0, 0, 'L', true);
        $this->fpdf->Cell(70, 10, $var1, 0, 0, 'C', true);
        $this->fpdf->Cell(90, 10, $var2, 0, 0, 'L', true);
        $this->fpdf->Cell(15, 10, $var3, 0, 0, 'R', true);
        $this->fpdf->Ln();
    }

}
<?php
/* 	
 * 	Class for INVOICE
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2017
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}

class Invoice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('fpdf');
        // $this->fpdf->load->library('invoicelibray');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {
        
    }

    /*     * ****PRINT INVOICE**** */
    public function invoice_print($param1 = ''){ 
        if ( $this->session->userdata('receptionist_login') == 1 || $this->session->userdata('admin_login') == 1 ):
			$user_id = $this->session->userdata('login_user_id');
			if( $this->session->userdata('receptionist_login') == 1 ){
				$athorised_email = $this->db->get_where('receptionist', array('receptionist_id' => $user_id))->row()->name;
			}else{				
				$athorised_email = $this->db->get_where('admin', array('admin_id' => $user_id))->row()->name;
			}
			$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
            $contact = $this->db->get_where('settings', array('type' => 'phone'))->row()->description;
            $address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;
            $system_email = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
			$currency = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
			$currency_symbol    = $currency;//$this->db->get_where('currency', array('currency_id' => $currency))->row()->currency_symbol;
			
            $invoice_number = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->invoice_number;
            $invoice_id = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->invoice_id;
            $creation_timestamp = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->creation_timestamp;
            
            $patient_id = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->patient_id;
            
            $invoice_entry = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->invoice_entries;
            $entry_description_id = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->invoice_entries;
            $discount_amount = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->discount_amount; 
            $mode_paiement = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->mode_paiement;      
            $prise_en_charge = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->prise_en_charge;
            $pourcentage_prise = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->pourcentage_prise;
            $note = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->note;
            //$net_amount = $this->db->get_where('invoice', array('invoice_id' => $param1))->row()->net_amount;
			
			
			$name = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->name;
            $prenom = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->prenom;
            $age = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->age;
            $profession = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->profession;
            $personne_contacter = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->personne_contacter;
            $tel_contacter = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->tel_contacter;
			$address_patient = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->address_patient;
			$phone = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->phone;
			$email = $this->db->get_where('patient', array('patient_id' => $patient_id))->row()->email;	
			
            //s$qrcode = $param1 . $student_id['student_id'] . $class_id['name'] . $student_name['roll'];
            $time = $creation_timestamp;
			
            
			$total_amount       = 0;
            $invoice_entries    = json_decode($invoice_entry);	
				$i = 1;
			 foreach ($invoice_entries as $invoiceentry){
				 $i++;
				$total_amount += $invoiceentry->amount;
				$invoice_entries = $invoiceentry->description;
				$currency_symbol . $invoiceentry->amount;
			}
            $total_amount  = $this->crud_model->calculate_total_amount($invoice_number);
            $remise_amount = $this->crud_model->calculate_invoice_total_remise_amount($invoice_number);
            $prise_charge = $this->crud_model->calculate_total_prise($invoice_number); 
			$grand_total = $this->crud_model->calculate_invoice_total_amount($invoice_number);

            
            $this->fpdf = new FPDF();
            $this->fpdf->setMargins('7', '5', '0');
            $this->fpdf->aliasNbPages();
            $this->fpdf->addPage('P', 'A5');
            $this->fpdf->SetFont('times', 'B', 12);
            $this->header_value('', $system_name, 'logo', $contact, $address, utf8_decode('Reçu de paiement N°'). $invoice_id, $system_email);

			$this->invoice_numero( utf8_decode('Reçu de paiement N°'). $invoice_id) ;
            $this->invoice_info_three( utf8_decode(' Nom et prénom: ') . $name . ' '. $prenom);
            $this->invoice_date('Date et heure: '. $time);
            $this->invoice_tel( utf8_decode('Téléphone: '). $phone) ;
            $this->invoice_info( utf8_decode('Age: '). $age. (' ans')  );
            $this->invoice_profession( 'Profession: '. utf8_decode($profession) );
            $this->invoice_personne( utf8_decode('Personne à contacter: '). $personne_contacter );
            $this->invoice_tel_personne( utf8_decode('Tél de personne à contacter: '). $tel_contacter );
			 $this->invoice_address( 'Adresse: '. $address_patient );
             $this->fpdf->Ln(6);
             $this->invoice_mode( 'Mode de paiement: '. utf8_decode($mode_paiement ));
             $this->invoice_prise_en_charge( 'Prise en charge: '. utf8_decode($prise_en_charge ));
             //$this->invoice_note( 'NB: '. utf8_decode($note ));
             
			  $this->fpdf->Ln(6);
            $this->CreateTable_header($currency_symbol);
			
            
            $invoice_entries    = json_decode($invoice_entry);
            foreach ($invoice_entries as $invoiceentry) {
            $this->CreateTable_row('1', $pourcentage_prise, $discount_amount, utf8_decode($invoiceentry->description), $invoiceentry->amount);
        }


        $this->invioce_footer_amount($total_amount .'  FCFA   ');
        
            $this->invioce_footer_discount($remise_amount .'  FCFA   ');
            $this->invioce_footer_prise($prise_charge .'  FCFA   ');
            //$this->fpdf->Ln();

            $this->invioce_footer($grand_total .'  FCFA   ', $currency_symbol,$athorised_email,utf8_decode($note));
            $this->fpdf->Ln();
            $this->fpdf->Output();
            //$this->fpdf->Output($param1 . '.pdf', 'D');
        endif;
        //redirect(base_url(), 'refresh');
        $this->fpdf->Ln(10);
    }
          
    public function header_value($barcode_text = '', $title_tab = '', $logo = '', $contact = '', $address = '', $mail_title = '',$system_email) {

        //________________   Logo ____________________________
        $this->fpdf->SetFont('times', '', 12);
        $this->fpdf->Image('uploads/' . $logo . '.jpeg', 5, 5, 40, 30);
        // $this->fpdf->QR($barcode_text, 170, 10, 16);
        //________________ School Name ____________________________
        $this->fpdf->SetFont('times', 'B', 13);
        // $title_tab="North West International School, Rangpur  ";
        $this->fpdf->Cell(140, 10, $title_tab, 0, 0, 'C');
        $this->fpdf->Ln(6);

        //________________ Header Text ____________________________				 

        $this->fpdf->setFillColor(230, 230, 230);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(140, 10, 'Contact: ' . $contact, 0, 0, 'C');
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(140, 10, $address, 0, 0, 'C');

        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(140, 10, $system_email, 0, 0, 'C');
        $this->fpdf->Ln(6);
        $this->fpdf->SetTextColor(2, 182, 0);
        $this->fpdf->SetX(0);
        $this->fpdf->Cell(18, 10, '______________________________________________________________________________________________________________________________________________________________________________________________________________________', 0, 0, 'C');
        $this->fpdf->Ln(6);
    }

    public function invoice_numero($invoice_id = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', 'B', 12);
        $this->fpdf->Cell(95, 10,$invoice_id, 0, 0, 'R');
        $this->fpdf->Ln(10);
    }

    public function invoice_info($data1 = '',$data2 = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(100, 10,$data1, 0, 0, 'L');
        $this->fpdf->Cell(80, 10,$data2, 0, 0, 'R');
        $this->fpdf->Ln(6);

    }
	  public function invoice_info_three($data1 = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(50, 10,$data1, 0, 0, 'L');
        //$this->fpdf->Cell(100, 10,$data2, 0, 0, 'C');
        //$this->fpdf->Ln(6);
    }

    public function invoice_date($data2 = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(110, 10,$data2, 0, 0, 'C');
        $this->fpdf->Ln(6);
    }



    public function invoice_tel($phone = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$phone, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }

    public function invoice_profession($profession = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$profession, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }
    public function invoice_personne($personne_contacter = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$personne_contacter, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }
    public function invoice_tel_personne($tel_contacter = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$tel_contacter, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }
	 public function invoice_address($data1 = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$data1, 0, 0, 'L');
        //$this->fpdf->Ln(6);
    }

    public function invoice_prise_en_charge($prise_en_charge = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(140, 10,$prise_en_charge, 0, 0, 'C');
        $this->fpdf->Ln(6);
    }
    public function invoice_mode($mode_paiement = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(140, 10,$mode_paiement, 0, 0, 'C');
        $this->fpdf->Ln(6);
    }
    public function invoice_note($note = '') {
        $this->fpdf->setFillColor(255,201,120);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$note, 0, 0, 'L');
        $this->fpdf->Ln(6);
    }
    
    

    public function student_information_pdf_design($param1 = '', $param2 = '') {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(90, 6, $param1, 1, 0, 'L');
        $this->fpdf->Cell(90, 6, $param2, 1, 0, 'L');
        $this->fpdf->Ln();
    }

    public function invioce_footer_amount($total_amount = '') {
        //$this->fpdf->setFillColor(255,201,120);

        $this->fpdf->Cell(55, 5, utf8_decode("Montant total"), 1, 0, 'L', true);
        $this->fpdf->Cell(80, 5, $total_amount . "", 1, 0, 'R', true); 
        $this->fpdf->Ln();    
    }

    public function invioce_footer_discount($remise_amount = '') {
        //$this->fpdf->setFillColor(255,201,120);

        $this->fpdf->Cell(55, 5, utf8_decode("Montant total des remises"), 1, 0, 'L', true);
        $this->fpdf->Cell(80, 5, $remise_amount . "", 1, 0, 'R', true); 
        $this->fpdf->Ln();    
    }

    public function invioce_footer_prise($prise_charge = '') {
        $this->fpdf->Cell(55, 5, utf8_decode("Montant total des prises en charges"), 1, 0, 'L', true);
        $this->fpdf->Cell(80, 5, $prise_charge . "", 1, 0, 'R', true); 
        $this->fpdf->Ln();    
    }

    public function invioce_footer($gtotal = '', $currency = '',$atho = '', $note = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $this->fpdf->Cell(55, 5, utf8_decode("Montant net à la charge du patient"), 1, 0, 'L', true);
       $this->fpdf->Cell(80, 5, $gtotal . "", 1, 0, 'R', true);
       $this->fpdf->Ln(10);
       $this->fpdf->SetFont('times', 'B', 10);
       $this->fpdf->Cell(125, 6,"NB: ".$note, 0, 0, 'L', true);
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('times', 'B', 10);
        strlen($this->fpdf->Cell(135, 6, utf8_decode("Le caissier: ").$atho."", 0, 0, 'R'));
        $this->fpdf->Ln(6);
        //$this->fpdf->Cell(141, 6, "Signature ", 0, 0, 'R');
        $this->fpdf->Ln();
        //$this->fpdf->Cell(90, 6, "Date:............/.........../...........", 0, 0, 'L');
        $this->fpdf->Ln();
        //$this->fpdf->Cell(180, 6, "......................................................................................................................................................................................................................................................................................................", 0, 0, 'C');
    }

    public function voucher_footer($gtotal = '', $currency = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $this->fpdf->Cell(90, 6, "Total(" . $currency . ") :", 1, 0, 'L', true);
        $this->fpdf->Cell(90, 6, $gtotal . "", 1, 0, 'R', true);
        $this->fpdf->Ln(11);
        $this->fpdf->Cell(180, 6, "Autoriser par:..............................................................................Date:............/.........../...........", 0, 0, 'L');
        $this->fpdf->Ln();
        $this->fpdf->Cell(180, 6, "......................................................................................................................................................................................................................................................................................................", 0, 0, 'C');
    }

    public function CreateTable_header($currency = '') {
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->setFillColor(184, 207, 229);
        $this->fpdf->Cell(55, 5, "Prestation"."", 1, 0, 'L', true);
        $this->fpdf->Cell(10, 5, utf8_decode("Qté")."", 1, 0, 'L', true);
        $this->fpdf->Cell(20, 5, ("Prix unitaire")."", 1, 0, 'C', true);
        $this->fpdf->Cell(30, 5, "%Prise en charge"."", 1, 0, 'C', true);
        $this->fpdf->Cell(20, 5, "%Remise"."", 1, 0, 'C', true);
        //$this->fpdf->Cell(30, 6, utf8_decode("Net à payer")."", 1, 0, 'R', true);
        $this->fpdf->Ln();
    }

    public function CreateTable_row($qte = '', $pourcentage_prise = '', $discount_amount = '', $invoice_entries = '', $amount = '') {
        $this->fpdf->SetFillColor(255);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(55, 5, $invoice_entries, 1, 0, 'L', true);
        $this->fpdf->Cell(10, 5, $qte, 1, 0, 'C', true);
        $this->fpdf->Cell(20, 5, $amount, 1, 0, 'C', true);
        $this->fpdf->Cell(30, 5, $pourcentage_prise, 1, 0, 'C', true);
        $this->fpdf->Cell(20, 5, $discount_amount, 1, 0, 'C', true);
        //$this->fpdf->Cell(30, 6, $amount ."", 1, 0, 'C', true);
        $this->fpdf->Ln();
    }



    //$this->CreateTable_row( $invoiceentry->amount);

}
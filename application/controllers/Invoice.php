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
            $this->fpdf->setMargins('7', '20', '0');
            $this->fpdf->aliasNbPages();
            $this->fpdf->addPage('P', 'A5');
            $this->fpdf->SetFont('times', 'B', 12);

            $this->invoice_numero( utf8_decode('Reçu de paiement N°'). $invoice_id);
            $this->fpdf->Ln(6);

            $this->value_info(utf8_decode('Patient: '). $name . ' '. $prenom, utf8_decode('Age: '). $age. (' ans'), 'Adresse: '. $address_patient, utf8_decode('Téléphone: '). $phone);
            $this->fpdf->Ln(30);

            $this->invoice_date('Date: '. $time);
            $this->fpdf->Ln();

            $this->CreateTable_header($currency_symbol);
            $invoice_entries    = json_decode($invoice_entry);
            foreach ($invoice_entries as $invoiceentry) {
            $this->CreateTable_row($invoiceentry->amount, '', $invoiceentry->amount, utf8_decode($invoiceentry->description), '1');
             }
             $this->invioce_footer_amount($total_amount .'  FCFA   ');
             $this->fpdf->Ln(6);

            $this->invioce_footer($grand_total .'  FCFA', $currency_symbol, $remise_amount .'  FCFA', $prise_charge .'  FCFA');
            //$this->fpdf->Ln(10);
            //$this->invioce_footer_note(utf8_decode($note));
            $this->fpdf->Ln(6);
            $this->invioce_footer_atho($athorised_email, $currency_symbol);
            $this->fpdf->Ln(6);
            //$this->invioce_footer_amount_net($grand_total .'  FCFA   ');
            $this->fpdf->Ln();

            $this->header_value('', $system_name, 'logo', $contact, $address, utf8_decode('Reçu de paiement N°'). $invoice_id, $system_email);

            $this->invoice_prise_en_charge_mode( 'Prise en charge  ..............................................................................: '.''. utf8_decode($prise_en_charge ).'  '.'..............................', 'Pourcentage de prise en charge  .....................................................:'.' '.$pourcentage_prise .'%'.'  '.'...............................', 'Pourcentage de remise  ...................................................................:'.' '.$discount_amount .'%'.'  '.'...............................', 'Mode de paiement  .........................................................................: '.''. utf8_decode($mode_paiement ).'  '. '.........................');

            $this->fpdf->Output();
            //$this->fpdf->Output($param1 . '.pdf', 'D');
             endif;
             //redirect(base_url(), 'refresh');
    }
          
    public function header_value($barcode_text = '', $title_tab = '', $logo = '', $contact = '', $address = '', $mail_title = '',$system_email) {

        //________________   Logo ____________________________
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Image('uploads/' . $logo . '.jpeg', 68, -5, 83, 47);
        
        // $this->fpdf->QR($barcode_text, 170, 10, 16);
    
        //________________ Header Text ____________________________
        /*$this->fpdf->SetFont('times', 'B', 13);
        $this->fpdf->Cell(130, -70, $title_tab, 0, 0, 'R');*/
        
        $x = 70; // Coordonnée X de départ
        $y = 30; // Coordonnée Y de départ
        $width = 72; // Largeur de chaque cellule
        $height = 6; // Hauteur de chaque cellule

        $this->fpdf->Rect($x, $y, $width * 1, $height * 4);
        $this->fpdf->SetXY($x, $y); 
				 
        //$this->fpdf->Ln(6);
        $this->fpdf->setFillColor(230, 230, 230);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(68, $height, 'Contact: ' . $contact, 0, 0, 'R');
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(128, $height, $address, 0, 0, 'R');
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(128, $height, $system_email, 0, 1, 'R');
        $this->fpdf->Ln(6);
    }

    public function value_info($data1 = '', $age = '', $address_patient = '', $phone = '') {
    $this->fpdf->SetFont('times', '', 10);

    // Définir les coordonnées de départ pour le cadrage
    $x = 7; // Coordonnée X de départ
    $y = 23; // Coordonnée Y de départ
    $width = 15; // Largeur de chaque cellule
    $height = 6; // Hauteur de chaque cellule

    // Regrouper toutes les données dans un seul cadrage
    $this->fpdf->Rect($x, $y, $width * 4, $height * 4); // Cadrage pour tout le contenu

    // Remplir les cellules avec les données
    $this->fpdf->SetXY($x, $y); // Définir la position pour le texte
    $this->fpdf->Cell($width, $height, $data1, 0, 0, 'L');
    $this->fpdf->Ln(6);
    $this->fpdf->Cell($width, $height, $age, 0, 0, 'L');
    $this->fpdf->Ln(6);
    $this->fpdf->SetFont('times', 'B', 10);
    $this->fpdf->Cell($width, $height, $address_patient, 0, 0, 'L');
    $this->fpdf->Ln(6);
    $this->fpdf->SetFont('times', '', 10);
    $this->fpdf->Cell($width, $height, $phone, 0, 1, 'L'); // Aller à la ligne après la dernière cellule
    $this->fpdf->Ln(10);
}

    public function invoice_numero($invoice_id = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', 'B', 12);
        $this->fpdf->Cell(60, -12,$invoice_id, 1, 0, 'L');
    }

    public function invoice_date($data2 = '' ) {
        $x = 7; 
        $y = 54;
        $width = 5;
        $height = 0; 
        $this->fpdf->Rect($x, $y, $width * 1, $height * 2);
        $this->fpdf->SetXY($x, $y);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->Cell(60, -5,$data2, 1, 1, 'L');
        $this->fpdf->Ln(6);
    }

    public function invoice_prise_en_charge_mode($prise_en_charge = '', $pourcentage_prise = '', $discount_amount = '', $mode_paiement = '') {
        $x = 7; 
        $y = 60;
        $width = 135;
        $height = 15; 
        $this->fpdf->Rect($x, $y, $width * 1, $height * 2);
        $this->fpdf->SetXY($x, $y);

        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(50, $height,$prise_en_charge, 0, 0, 'L');
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(50, $height, $pourcentage_prise, 0, 0, 'L');
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(50, $height, $discount_amount, 0, 0, 'L'); 
        $this->fpdf->Ln(6);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(50, $height,$mode_paiement, 0, 1, 'L');
        $this->fpdf->Ln();
    }
    
    /*public function invoice_note($note = '') {
        $this->fpdf->setFillColor(255,201,120);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(180, 10,$note, 1, 1, 'L');
        $this->fpdf->Ln();
    }*/

    

    public function invioce_footer($gtotal = '', $currency = '', $remise_amount ='', $prise_charge = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $x = 7; 
        $y = 122;
        $width = 135;
        $height = 5; 
        $this->fpdf->Rect($x, $y, $width * 1, $height * 2);
        $this->fpdf->SetXY($x, $y);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(100, 5, utf8_decode("Montant prise en charge"), 1, 0, 'L', true);
        $this->fpdf->Cell(35, 5, $prise_charge . "", 1, 0, 'C', true);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(100, 5, utf8_decode("Montant réduction"), 1, 0, 'L', true);
        $this->fpdf->Cell(35, 5, $remise_amount . "", 1, 0, 'C', true);
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('times', 'B', 13);
        $this->fpdf->Cell(100, 9, utf8_decode("Montant total net à la charge du patient"), 1, 0, 'L', true);
       $this->fpdf->Cell(35, 9, $gtotal . "", 1, 0, 'C', true);
        $this->fpdf->Ln(6);
    }

    public function CreateTable_header($currency = '') {
        $x = 7; 
        $y = 96;
        $width = 135;
        $height = 5; 
        $this->fpdf->Rect($x, $y, $width * 1, $height * 2);
        $this->fpdf->SetXY($x, $y);

        $this->fpdf->SetFont('times', 'B', 10);
        $this->fpdf->setFillColor(184, 207, 229);
        $this->fpdf->Cell(65, 5, "Prestation"."", 1, 0, 'L', true);
        $this->fpdf->Cell(25, 5, ("PU")."", 1, 0, 'C', true);
        $this->fpdf->Cell(10, 5, utf8_decode("Qté")."", 1, 0, 'C', true);
        //$this->fpdf->Cell(30, 5, "%Prise en charge"."", 1, 0, 'C', true);
        $this->fpdf->Cell(35, 5, "Total"."", 1, 0, 'C', true);
        //$this->fpdf->Cell(30, 6, utf8_decode("Net à payer")."", 1, 0, 'R', true);
        $this->fpdf->Ln();
    }

    public function CreateTable_row($qte = '', $pourcentage_prise = '', $discount_amount = '', $invoice_entries = '', $amount = '') {
        $this->fpdf->SetFillColor(255);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', '', 10);
        $this->fpdf->Cell(65, 5, $invoice_entries, 1, 0, 'L', true);
        $this->fpdf->Cell(25, 5, $qte, 1, 0, 'C', true);
        $this->fpdf->Cell(10, 5, $amount, 1, 0, 'C', true);
        $this->fpdf->Cell(35, 5, $discount_amount, 1, 0, 'C', true);
        //$this->fpdf->Cell(30, 6, $amount ."", 1, 0, 'C', true);
        $this->fpdf->Ln();
    }

    public function invioce_footer_amount($total_amount = '') {
        //$this->fpdf->setFillColor(255,201,120);
        $this->fpdf->SetFont('times', 'B', 11);
        $this->fpdf->Cell(100, 5, utf8_decode("Montant total"), 1, 0, 'L', true);
        $this->fpdf->Cell(35, 5, $total_amount . "", 1, 0, 'R', true); 
        $this->fpdf->Ln(6);  
    }

    public function invioce_footer_atho($atho = '' ) {
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('times', 'B', 10);
        strlen($this->fpdf->Cell(135, 6, utf8_decode("Le caissier: ").$atho."", 0, 0, 'R'));
    }

}



    
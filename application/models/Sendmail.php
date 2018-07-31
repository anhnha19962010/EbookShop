<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/**
 *
 */
class Sendmail extends CI_Model {
	
	function __construct() {
		parent::__construct();

	}

	public function sendmail($form, $to, $cc, $bcc, $sub, $msg) {
		
		$this->load->library('email');
		$this->email->from($form, 'Admin');
		$this->email->to($to);
		if ($cc != null) {
			$this->email->cc($cc);
		}
		if ($bcc != null) {
			$this->email->bcc($bcc);
		}
		$this->email->subject($sub);
		$this->email->message($msg);
		$this->email->send();
	}
}
?>
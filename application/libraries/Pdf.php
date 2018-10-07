<?php defined('BASEPATH') OR exit('No direct script access
	allowed');
/**
* CodeIgniter PDF Library
*
* Generate PDF's in your CodeIgniter applications.
*
* @package CodeIgniter
* @subpackage Libraries
* @category Libraries
* @author Chris Harvey
* @license MIT License
* @link
https://github.com/chrisnharvey/CodeIgniter-PDF-GeneratorLibrary
*/
require_once(dirname(__FILE__) .
	'/dompdf/dompdf_config.inc.php');
class Pdf extends DOMPDF{
	
protected function ci(){
	return get_instance();
}

public function load_view($view, $data = array()){
	$html = $this->ci()->load->view($view, $data, TRUE);
	$this->load_html($html);
}
}
?>
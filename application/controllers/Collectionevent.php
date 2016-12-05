<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('collectionevent_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['title'] = 'Collection Event Analysis';

		$this->load->view('templates/header', $data);
		$this->load->view('collectionevent_analysis', $data);
		$this->load->view('templates/footer');
	}

	public function calcTemporalDist(){
		

		
	}



}
?>
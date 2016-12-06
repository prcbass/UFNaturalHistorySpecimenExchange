<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Tupcounts extends CI_Controller{

			public function __construct(){
				parent::__construct();

			}

			public function index(){
	  
	            $data['title'] = 'CountsView';

	           	$this->load->view('templates/header', $data);
	            //$this->load->view('templates/footer');
			}

			public function counts(){
				$this->load->model('countsmodel');

				$data['collecEvent'] = $this->countsmodel->getCollectionEvent();
				$data['locality'] = $this->countsmodel->getLocality();
				$data['paleo'] = $this->countsmodel->getPaleoContext();
				$data['specimen'] = $this->countsmodel->getSpecimen();
				$data['taxonD'] = $this->countsmodel->getTaxonDetermination();

				$this->load->view('templates/header', $data);
				$this->load->view('Countsview', $data);
				//$this->load->view('templates/footer');
			}
	}
?>
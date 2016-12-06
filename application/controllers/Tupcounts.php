<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Tupcounts extends CI_Controller{

			public function __construct(){
				parent::__construct();

			}

			public function counts(){
				$data['title'] = 'Tuple Count View';
				$this->load->model('countsmodel');

				$ceCount = $this->countsmodel->getCollectionEvent();
				$localityCount = $this->countsmodel->getLocality();
				$paleoCount = $this->countsmodel->getPaleoContext();
				$specimenCount = $this->countsmodel->getSpecimen();
				$taxonCount = $this->countsmodel->getTaxonDetermination();

				$data['collecEvent'] = $ceCount;
				$data['locality']  = $localityCount;
				$data['paleo'] = $paleoCount;
				$data['specimen'] = $specimenCount;
				$data['taxonD']  = $taxonCount;

				$data['totalCount'] = $ceCount + $localityCount + $paleoCount + $specimenCount + $taxonCount;

				$this->load->view('templates/header', $data);
				$this->load->view('countsview', $data);
				$this->load->view('templates/footer');
			}
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('collectionevent_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['title'] = 'Collection Event Analysis';

		$this->load->view('templates/header', $data);
		$this->load->view('collectionevent_analysis', $data);
		$this->load->view('templates/footer');
	}

	public function calcTemporalDist(){
		$data['title'] = 'Collection Event Analysis';

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('year-step-size', 'StepSize', 'required');
		$this->form_validation->set_rules('dateRange1', 'Date Range Beginning', 'required');
		$this->form_validation->set_rules('dateRange2', 'Date Range End', 'required');

		if($this->input->post('submit') && $this->form_validation->run()){
			$stepSize = (int)$this->input->post('year-step-size');
			$dateRange1 = (int)$this->input->post('dateRange1');
			$dateRange2 = (int)$this->input->post('dateRange2');

			if($dateRange1 < $dateRange2){
				$data['stepSize'] = $stepSize;
				$data['dateRng1'] = $dateRange1;
				$data['dateRng2'] = $dateRange2;

				$data['stepInputType'] = gettype($stepSize);
				$data['date1InputType'] = gettype($dateRange1);
				$data['date2InputType'] = gettype($dateRange2);

				$data['sql1Query'] = $this->collectionevent_model->ce_by_state($dateRange1, $dateRange2, FALSE);
				$data['sql2Query'] = $this->collectionevent_model->lat_lon_by_year($dateRange1, $dateRange2, FALSE);
				$query1Results = $this->collectionevent_model->ce_by_state($dateRange1, $dateRange2, TRUE);
				$data['query1Results'] = $query1Results;

				$masterLatLon = array();

				for($i = $dateRange1; $i <= $dateRange2; $i+= $stepSize){
					$query2Results = $this->collectionevent_model->lat_lon_by_year($dateRange1, $dateRange2, TRUE);
					array_push($masterLatLon, $query2Results);
				}

				$data['query2Results0'] = json_decode($masterLatLon[0][2]['LONGITUDE']);
				$data['query2Results1'] = $masterLatLon[0][1];
				$data['query2Results2'] = $masterLatLon[0][2];

				if(count($query1Results) === 0){
					$data['noResults'] = 'The entered query did not return any results, please try another query';
				}
			}
			else{
				$data['formLogicError'] = 'The beginning of the date range must be before the end of the date range';
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('collectionevent_analysis', $data);
		$this->load->view('templates/heatmapfooter');
	}



}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('collectionevent_model');
		$this->load->helper('url_helper');
	}

	public function calcTemporalDist(){
		$data['title'] = 'Collection Event Analysis';

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('dateRange1', 'Date Range Beginning', 'required');
		$this->form_validation->set_rules('dateRange2', 'Date Range End', 'required');

		if($this->input->post('submit') && $this->form_validation->run()){
			$stepSize = (int)$this->input->post('year-step-size');
			$dateRange1 = (int)$this->input->post('dateRange1');
			$dateRange2 = (int)$this->input->post('dateRange2');

			if($dateRange1 < $dateRange2){

				if($dateRange2 - $dateRange1 < 10){
					$data['formLogicError'] = 'The beginning and end dates must be at least a decade apart';

					$this->load->view('templates/heatmapheader', $data);
					$this->load->view('collectionevent_analysis', $data);
					$this->load->view('templates/heatmapfooter');
					return;
				}


				$data['sql1Query'] = $this->collectionevent_model->ce_by_state($dateRange1, $dateRange2, FALSE);
				$data['sql2Query'] = $this->collectionevent_model->lat_lon_by_year($dateRange1, $dateRange1+9, FALSE);
				$data['sql3Query'] = $this->collectionevent_model->lat_lon_by_year($dateRange2, $dateRange2+9, FALSE);
				$query1Results = $this->collectionevent_model->ce_by_state($dateRange1, $dateRange2, TRUE);
				$data['query1Results'] = $query1Results;

				$data['latLon1'] = $this->collectionevent_model->lat_lon_by_year($dateRange1, $dateRange1+9, TRUE);
				$data['latLon2'] = $this->collectionevent_model->lat_lon_by_year($dateRange2, $dateRange2+9, TRUE);

				$data['latLongDateRange1'] = $dateRange1 . ' - ' . ($dateRange1+9);
				$data['latLongDateRange2'] = $dateRange2 . ' - ' . ($dateRange2+9);

				if(count($query1Results) === 0){
					$data['noResults'] = 'The entered query did not return any results, please try another query';
				}
			}
			else{
				$data['formLogicError'] = 'The beginning of the date range must be before the end';
			}
		}

		$this->load->view('templates/heatmapheader', $data);
		$this->load->view('collectionevent_analysis', $data);
		$this->load->view('templates/heatmapfooter');
	}



}
?>
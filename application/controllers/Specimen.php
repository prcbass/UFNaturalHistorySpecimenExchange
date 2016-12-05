<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specimen extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('specimen_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
        }

        public function index()
        {
            $data['title'] = 'Specimen Search';

            $this->load->view('templates/header', $data);
            $this->load->view('specimen_search', $data);
            $this->load->view('templates/footer');
        }

        public function search()
        {
            if ($this->input->post('reset_search'))
            {
                unset($_SESSION['filterArray']);
            }
            $data['title'] = 'Specimen Search';
            $data['filter_fields'] = $this->specimen_model->get_filter_fields();
            $this->load->helper('form');
            if (isset($_SESSION['filterArray']) && !empty($_SESSION['filterArray']))
            {
                $data['filterArray'] = $_SESSION['filterArray'];
                //echo "<h1>\$_SESSION['filterArray'] is set</h1>";
                //print_r($_SESSION['filterArray']);
            }
            else 
            {
                $data['filterArray'] = array();
                //echo "</h1>\$_SESSION['filterArray'] is not set";
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('operator', 'Operator', 'required');
            $this->form_validation->set_rules('specimenTerm', 'Term', 'required');
            $this->form_validation->set_rules('filterCriteria', 'Filter Criteria', 'required');
            if ($this->input->post('submit') && $this->form_validation->run() === TRUE)
            {
                if ($this->input->post('operator') != '' && $this->input->post('specimenTerm') != '' && $this->input->post('filterCriteria') != '')
                {
                    array_push($data['filterArray'], array("operator" => $this->input->post('operator'), "specimenTerm" => $this->input->post('specimenTerm'),"criteria" => $this->input->post('filterCriteria')));
                }
            }
            if ($this->input->post('run_search'))
            {
                $data['sql'] = $this->specimen_model->search_specimen($data['filterArray'],FALSE);
                $data['searchresult'] = $this->specimen_model->search_specimen($data['filterArray'],TRUE);
            }
            $this->load->view('templates/header', $data);
            $this->load->view('specimen_search', $data);
            $this->load->view('templates/footer');
        }

}
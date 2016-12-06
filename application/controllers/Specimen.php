<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specimen extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('specimen_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->library('pagination');
        }

        public function index()
        {
            $data['title'] = 'Specimen Search';

            $this->load->view('templates/header', $data);
            $this->load->view('specimen_search', $data);
            $this->load->view('templates/specimensearchfooter');
        }

        public function search($page = 0)
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
            if ($this->input->post('run_search') || $this->uri->segment(3))
            {
                $data['sql'] = $this->specimen_model->search_specimen($data['filterArray'],FALSE,FALSE);
                $data['resultcount'] = $this->specimen_model->search_specimen($data['filterArray'],FALSE,TRUE);
                $config = array();
                $config["base_url"] = base_url() . "index.php/specimen/search";
                $config["total_rows"] = $data['resultcount'];
                $config["per_page"] = 20;
                $config["uri_segment"] = 3;
                //config for bootstrap pagination class integration
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["links"] = $this->pagination->create_links();
                $data['searchresult'] = $this->specimen_model->search_specimen($data['filterArray'],TRUE,FALSE,$config['per_page'],$page);
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('specimen_search', $data);
            $this->load->view('templates/specimensearchfooter');
        }

}
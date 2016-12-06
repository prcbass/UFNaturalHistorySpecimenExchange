<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PaleoContext extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('specimen_model');
            $this->load->helper('url_helper');
        }

        public function index()
        {
            $data['sql'] = $this->specimen_model->search_pc(TRUE);
            $data['pc'] = $this->specimen_model->get_pc();
            $data['title'] = 'Paleo Context Example';

            $this->load->view('templates/header', $data);
            $this->load->view('paleocontext/index', $data);
            $this->load->view('templates/footer');
        }

        public function search()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Search Paleocontext';

            $this->form_validation->set_rules('latestperiod', 'LATESTPERIOD', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('paleocontext/search');
                $this->load->view('templates/footer');

            }
            else
            {
                $data['sql'] = $this->specimen_model->search_pc(TRUE);
                $data['pc'] = $this->specimen_model->search_pc();
                $this->load->view('templates/header', $data);
                $this->load->view('paleocontext/index');
                $this->load->view('templates/footer');
            }
        }

}
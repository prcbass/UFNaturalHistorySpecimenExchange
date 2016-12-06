<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Googlemap extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('googlemap_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
        }

        public function index()
        {
            $data['title'] = 'Google Map';
            if (isset($_SESSION['filterArray']) && !empty($_SESSION['filterArray']))
            {
                $data['filterArray'] = $_SESSION['filterArray'];
            }
            $data['geopoints'] = $this->googlemap_model->get_geopoints($data['filterArray']);
            $this->load->view('templates/header', $data);
            $this->load->view('google_map', $data);
            $this->load->view('templates/googlemapfooter');
        }


}
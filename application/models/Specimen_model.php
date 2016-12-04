<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specimen_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_pc()
        {
            $query = $this->db->get('PALEOCONTEXT');
            return $query->result_array();
        }

        public function search_pc()
        {
                $this->load->helper('url');

                if ($this->input->post('latestepoch') != '')
                {
                        $this->db->like('LATESTEPOCH', $this->input->post('latestepoch'));
                }
                if ($this->input->post('latestperiod') != '')
                {
                        $this->db->like('LATESTPERIOD', $this->input->post('latestperiod'));
                } 
                if ($this->input->post('geologicalcontextgroup') != '')
                {
                        $this->db->like('GEOLOGICALCONTEXTGROUP', $this->input->post('latestperiod'));
                } 

                $query = $this->db->get('PALEOCONTEXT');
                return $query->result_array();
        }
}

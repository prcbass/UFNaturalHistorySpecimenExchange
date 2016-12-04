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

        public function search_specimen($filterArray,$execute_query = TRUE)
        {
                $this->load->helper('url');
                $this->db->limit(50);
                foreach ($filterArray as $f):
                        if ($f['operator'] == 'equal')
                                $this->db->where($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == 'tuple')
                                $this->db->where_in($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == 'nottuple')
                                $this->db->where_not_in($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == 'like')
                                $this->db->where_like($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == 'likeafter')
                                $this->db->where_like($f['specimenTerm'],$f['criteria'],'after');
                        if ($f['operator'] == 'likebefore')
                                $this->db->where_like($f['specimenTerm'],$f['criteria'],'before');
                endforeach;
                $this->db->from('SPECIMEN');
                if ($execute_query === TRUE)
                {
                        $query = $this->db->get_compiled_select();
                        return $query;
                }
                $query = $this->db->get();
                return $query->result_array();
                
        }

        public function search_pc($query_output_only = FALSE)
        {
                $this->load->helper('url');

                if ($this->input->post('latestperiod') != '')
                {
                        $this->db->like('LATESTPERIOD', $this->input->post('latestperiod'));
                } 
                if ($this->input->post('latestepoch') != '')
                {
                        $this->db->like('LATESTEPOCH', $this->input->post('latestepoch'));
                }
                if ($this->input->post('geologicalcontextgroup') != '')
                {
                        $this->db->like('GEOLOGICALCONTEXTGROUP', $this->input->post('geologicalcontextgroup'));
                } 
                if ($query_output_only === TRUE) 
                {
                        $query = $this->db->get_compiled_select('PALEOCONTEXT');
                        return $query;
                }
                $query = $this->db->get('PALEOCONTEXT');
                return $query->result_array();
        }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Googlemap_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_geopoints($filterArray)
        {
                $this->load->helper('url');
                $this->db->select('I_GEOPOINT');
                foreach ($filterArray as $f):
                        if ($f['operator'] == 'equal')
                                $this->db->where($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == "not")
                        {
                                $t = $f['specimenTerm'] . "!=";
                                $this->db->where($t,$f['criteria']);
                        }
                        if ($f['operator'] == 'tuple')
                                $this->db->where_in($f['specimenTerm'],explode(",",$f['criteria']));
                        if ($f['operator'] == 'nottuple')
                                $this->db->where_not_in($f['specimenTerm'],explode(",",$f['criteria']));
                        if ($f['operator'] == 'like')
                                $this->db->like($f['specimenTerm'],$f['criteria']);
                        if ($f['operator'] == 'likeafter')
                                $this->db->like($f['specimenTerm'],$f['criteria'],'after');
                        if ($f['operator'] == 'likebefore')
                                $this->db->like($f['specimenTerm'],$f['criteria'],'before');
                endforeach;
                $this->db->from('SPECIMEN');
                $this->db->join('TAXONDETERMINATION','SPECIMEN.DETERMINATIONID = TAXONDETERMINATION.DETERMINATIONID', 'left');
                $this->db->join('COLLECTIONEVENT','SPECIMEN.COLLECTIONEVENTID = COLLECTIONEVENT.COLLECTIONEVENTID', 'left');
                $this->db->join('LOCALITY','COLLECTIONEVENT.LOCALITYID = LOCALITY.LOCALITYID', 'left');
                $this->db->join('PALEOCONTEXT','LOCALITY.PALEOCONTEXTID = PALEOCONTEXT.PALEOCONTEXTID','left');
                $query = $this->db->get();
                return $query->result_array();
                
        }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function search_ce($stepSize, $startDate, $endDate, $execute_query = TRUE){
		$this->db->limit(25);

		$this->db->select('COLLECTIONEVENT.YEARCOLLECTED, LOCALITY.LATITUDE, LOCALITY.LONGITUDE');
		$this->db->from('COLLECTIONEVENT');
		$this->db->join('LOCALITY', 'COLLECTIONEVENT.LOCALITYID = LOCALITY.LOCALITYID');

		for($i = $startDate; $i <= $endDate; $i += $stepSize){
			$this->db->or_where('COLLECTIONEVENT.YEARCOLLECTED', $i);
		}

		if(!$execute_query){
			$query = $this->db->get_compiled_select();
      return $query;
		}
    $query = $this->db->get();
    return $query->result_array();
	}




}
?>
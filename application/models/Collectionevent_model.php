<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function search_ce($stepSize, $startDate, $endDate, $execute_query = TRUE){
		$this->db->limit(25);

		$this->db->select('COUNT(COLLECTIONEVENT.YEARCOLLECTED) AS CE_YEAR_COUNT, COLLECTIONEVENT.YEARCOLLECTED, LOCALITY.LATITUDE, LOCALITY.LONGITUDE')
            ->from('COLLECTIONEVENT')
            ->join('LOCALITY', 'COLLECTIONEVENT.LOCALITYID = LOCALITY.LOCALITYID')
            ->group_by('COLLECTIONEVENT.YEARCOLLECTED, LOCALITY.LATITUDE, LOCALITY.LONGITUDE');

		for($i = $startDate; $i <= $endDate; $i += $stepSize){
			$this->db->or_where('COLLECTIONEVENT.YEARCOLLECTED', $i);
		}

    $this->db->group_start()
            ->where('LOCALITY.LATITUDE IS NOT NULL')
            ->where('LOCALITY.LONGITUDE IS NOT NULL')
            ->where('COLLECTIONEVENT.YEARCOLLECTED IS NOT NULL')
            ->group_end()
            ->order_by('COLLECTIONEVENT.YEARCOLLECTED', 'ASC');

		if(!$execute_query){
			$query = $this->db->get_compiled_select();
      return $query;
		}

    $query = $this->db->get();
    return $query->result_array();
	}
}
?>
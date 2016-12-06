<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionevent_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function ce_by_state($startDate, $endDate, $execute_query = TRUE){
		$this->db->limit(25);

		$this->db->select('\''.$startDate . '-' . $endDate . '\'' . ' as DateRange, LOCALITY.STATE, COUNT(*) as CollectionEventCount')
            ->from('COLLECTIONEVENT')
            ->join('LOCALITY', 'COLLECTIONEVENT.LOCALITYID = LOCALITY.LOCALITYID')
            ->group_by('LOCALITY.STATE');

    $this->db->where('COLLECTIONEVENT.YEARCOLLECTED >= ' . $startDate)
            ->where('COLLECTIONEVENT.YEARCOLLECTED <= ' . $endDate);
  //   $this->db->group_start();
		// for($i = $startDate; $i <= $endDate; $i += $stepSize){
		// 	$this->db->or_where('COLLECTIONEVENT.YEARCOLLECTED', $i);
		// }
  //   $this->db->group_end();

    $this->db->group_start()
            ->where('LOCALITY.LATITUDE IS NOT NULL')
            ->where('LOCALITY.LONGITUDE IS NOT NULL')
            ->group_end()
            ->order_by('COUNT(*)', 'DESC');

		if(!$execute_query){
			$query = $this->db->get_compiled_select();
      return $query;
		}

    $query = $this->db->get();
    return $query->result_array();
	}

  public function lat_lon_by_year($stepSize, $startDate, $endDate, $execute_query = TRUE){
    //$this->db->limit(25);


    
  }
}
?>
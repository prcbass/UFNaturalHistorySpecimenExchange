<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Countsmodel extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function getCollectionEvent(){
			return $this->db->count_all('COLLECTIONEVENT');
		}
		public function getLocality(){
			return $this->db->count_all('LOCALITY');
		}
		public function getPaleoContext(){
			return $this->db->count_all('PALEOCONTEXT');
		}
		public function getSpecimen(){
			return $this->db->count_all('SPECIMEN');
		}
		public function getTaxonDetermination(){
			return $this->db->count_all('TAXONDETERMINATION');
		}
	}
?>
<?php 

	class Service_model extends CI_Model
	{
		public function add($service)
		{
			$this->db->insert('services', $service);
		}

		public function service_list()
		{
			$query = $this->db->select('*')->from('services')->get();
			return $query->result();
		}

		public function add_additonal($service)
		{
			$this->db->insert('additional_services', $service);
		}

		public function additional_service_list()
		{
			$query = $this->db->select('*')->from('additional_services')->get();
			return $query->result();
		}

		public function add_charge($charge)
		{
			$this->db->insert('delivery_charges', $charge);
		}

		public function charge_list()
		{
			$query = $this->db->select('*')->from('delivery_charges')->get();
			return $query->result();
		}
	}

 ?>
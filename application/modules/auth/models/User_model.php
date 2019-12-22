<?php

	class User_model extends CI_Model
	{
		public function register($data)
		{
			if($this->db->insert('user_info', $data))
			{
				return TRUE;
			} 
			else
			{
				return FALSE;
			}
		}

		public function check($email, $password)
		{
			$this->db->select('*');
			$this->db->from('user_info');
			$this->db->where('email', $email);
			$this->db->where('password', md5($password));
			$query = $this->db->get();

			if($query->num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}

		public function saveData($data)
		{
			$this->db->insert('user_info', $data);
		}

		
	}

?>
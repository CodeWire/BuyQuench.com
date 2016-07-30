<?php
Class Quiz_model extends CI_Model
{
	
	function save($save)
	{
	$this->load->database();
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('products', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('quiz', $save);
			$id	= $this->db->insert_id();
		}
	}
}
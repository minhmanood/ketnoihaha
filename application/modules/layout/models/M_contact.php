<?php
class M_contact extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }
}

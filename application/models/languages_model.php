<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Languages_model extends CI_Model
{
    private $table = '';
    private $column_order = '';
    private $column_search = '';
    private $order = '';
    function __construct()
    {
       
        $this->table = 'tbl_languages';
    
        $this->column_order = array('id', 'name', 'status', 'is_delete', 'created_by', 'updated_by', 'created_date', 'updated_date', 'deleted_date');
        
        $this->column_search = array('id', 'name', 'status', 'is_delete', 'created_by', 'updated_by', 'created_date', 'updated_date', 'deleted_date');
    
        $this->order = array('name' => 'asc');
    }

    public function store($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    public function deletelanguage($languageId, $languageInfo)
    {
        $this->db->where('id', $languageId);
        $this->db->update('tbl_languages', $languageInfo);
        
        return $this->db->affected_rows();
    }

}


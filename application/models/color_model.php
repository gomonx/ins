<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends CI_Model
{

    public function get_list($start, $limit)
    {
        $result = $this->db->limit($limit, $start)->order_by('name')->get('product_brands')->result();
        return $result;
    }

    public function get_list_total(){
    	$rs = $this->db->count_all_results('product_brands');
    	return $rs;
    }

    public function save($name){
        $result = $this->db->set('name', $name)->insert('product_brands');
        return $result;
    }

    public function check_duplicate($name){
        $result = $this->db->where('name', $name)->count_all_results('product_brands');

        return $result > 0 ? TRUE : FALSE;
    }

    public function update($data){
        $result = $this->db->where('id', $data['id'])
            ->set('name', $data['name'])
            ->update('product_brands');
        return $result;
    }

    public function remove($id){
        $result = $this->db->where('id', $id)->delete('product_brands');
        return $result;
    }

    public function search($query){
        $result = $this->db->like('name', $query, 'both')->limit(20)->get('product_brands')->result();
        return $result;
    }
}

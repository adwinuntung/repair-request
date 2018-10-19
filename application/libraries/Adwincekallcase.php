<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adwincekallcase {

    private $_ci;

    function __construct()
    {
            $this->_ci = &get_instance();
    }

    function get_setting_by_id($id)
    {
        $this->_ci->db->where('setting_id', $id);
        $value = $this->_ci->db->get('setting');
        $values = $value->row();
        return $values->setting_description;
    }

    function get_setting_array_by_id($id)
    {
        $this->_ci->db->where('setting_id', $id);
        $value = $this->_ci->db->get('setting');
        $values = $value->result();
        return $values;
    }

    function updatesetting($id,$data)
    {
        $this->_ci->db->where('setting_id', $id);
        $this->_ci->db->update('setting',$data);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function get_active_3union_by_order($table1,$table2,$table3,$order_value,$order_name)
    {
        $this->_ci->db->order_by($order_name, $order_value);
        $query1 = $this->_ci->db->get($table1)->result();

        $this->_ci->db->order_by($order_name, $order_value);
        $query2 = $this->_ci->db->get($table2)->result();

        $this->_ci->db->order_by($order_name, $order_value);
        $query3 = $this->_ci->db->get($table3)->result();

        return array_merge($query1, $query2, $query3);
    }

    function get_all($table)
    {
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_all_not_in($table,$where)
    {
        $this->_ci->db->where_not_in('status', $where);
        $value = $this->_ci->db->get($table);
        $values = $value;
        return $values;
    }

    function get_all_active($table)
    {
        $this->_ci->db->where('status', 2);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_all_by_id($table,$id,$table_idname)
    {
        $this->_ci->db->where($table_idname, $id);
        $value = $this->_ci->db->get($table);
        $values = $value;
        return $values;
    }

    function get_all_by_order($table,$order_value,$order_name)
    {
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_all_by_order_active($table,$order_value,$order_name)
    {
        $this->_ci->db->where('status', 2);
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_all_by_order_active_limit($table,$order_value,$order_name,$limit=NULL, $where_value=NULL, $where_field=NULL)
    {
        if($limit){
        $this->_ci->db->limit($limit, 0);
        }
        $this->_ci->db->where('status', 2);
        if($where_value){
        $this->_ci->db->where($where_field, $where_value);
        }
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_by_order_active_limit_where($table,$order_value,$order_name,$limit,$where_name,$where_value)
    {
        $this->_ci->db->limit($limit, 0);
        $this->_ci->db->where($where_name, $where_value);
        $this->_ci->db->where('status', 2);
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        return $value;
    }

    function get_by_order_active_limit_where_where($table,$order_value,$order_name,$limit,$where_name,$where_value,$where_name2,$where_value2)
    {
        $this->_ci->db->limit($limit, 0);
        $this->_ci->db->where($where_name2, $where_value2);
        $this->_ci->db->where($where_name, $where_value);
        $this->_ci->db->where('status', 2);
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        return $value;
    }

    function get_by_order_active_limit_where_array($table,$order_value,$order_name,$limit,$where_array=array())
    {
        $this->_ci->db->limit($limit, 0);
        if($where_array){
            foreach ($where_array as $row => $row_value) {
                $this->_ci->db->where($row, $row_value);
            }
        }

        //$this->_ci->db->where($where_name, $where_value);
        $this->_ci->db->where('status', 2);
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        return $value;
    }

    function get_detail_by_id($table,$id,$table_idname)
    {
        $this->_ci->db->where($table_idname, $id);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_detail_by_id_active($table,$id,$table_idname)
    {
        $this->_ci->db->where('status', 2);
        $this->_ci->db->where($table_idname, $id);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_where_by_x_active_order($table,$where_value,$where_field,$order_value,$order_name, $limit=NULL)
    {

        $this->_ci->db->where('status', 2);
        $this->_ci->db->where($where_field, $where_value);
        $this->_ci->db->order_by($order_name, $order_value);
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_last1($table,$sort_order)
    {
        $this->_ci->db->where('status', 2);
        $this->_ci->db->order_by($sort_order,'desc');
        $value = $this->_ci->db->get($table,1,0);
        $values = $value->result();
        return $values;
    }

    function insert_all($table,$data)
    {
        $this->_ci->db->insert($table,$data);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function insert_all_return_id($table,$data)
    {
        $this->_ci->db->insert($table,$data);

        if($this->_ci->db->affected_rows() > 0){
            $id = $this->_ci->db->insert_id();
            return $id;
        }else{
            return false;
        }
    }

    function update_all($table,$id,$tabel_idname,$data)
    {
        $this->_ci->db->where($tabel_idname, $id);
        $this->_ci->db->update($table,$data);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function delete_all_by_id($table,$id,$table_idname)
    {
        $this->_ci->db->where($table_idname, $id);
        $this->_ci->db->delete($table);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function active_all_by_id($table,$id,$table_idname,$lastStatus)
    {
        if($lastStatus==1){
            $lastStatus=2;
        }else{
            $lastStatus=1;
        }
        $data = array(
            "status"=> $lastStatus
        );

        $this->_ci->db->where($table_idname, $id);
        $this->_ci->db->update($table,$data);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function custom_search($table,$value,$table_field,$order_value=null,$order_name=null)
    {
        if (isset($order_value) OR isset($order_name) ){
            $this->_ci->db->order_by($order_name, $order_value);
        }
        $this->_ci->db->like($table_field, $value, 'both');
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function search_list($searchData=array(), $per_page=null, $current_page=null,$search_nametable=null,$search_order=null)
    {
        if (isset($per_page) && isset($current_page) ){
            $this->_ci->db->limit($per_page, $current_page);
        }

        if (isset($searchData['search_log_activity'])){
            $this->_ci->db->like($search_nametable, $searchData['search_log_activity']);
        }

        if (isset($search_order)){
            $this->_ci->db->order_by($search_order,'desc');
        }

        return $this;
    }

    function search_list_where($searchData=array(), $per_page=null, $current_page=null,$search_nametable=null,$search_order=null,$where_field=null,$where_value=null)
    {
        if (isset($per_page) && isset($current_page) ){
            $this->_ci->db->limit($per_page, $current_page);
        }

        if (isset($searchData['search_log_activity'])){
            $this->_ci->db->like($search_nametable, $searchData['search_log_activity']);
        }

        if (isset($where_field) && isset($where_value) ){
            $this->_ci->db->where($where_field, $where_value);
        }

        if (isset($search_order)){
            $this->_ci->db->order_by($search_order,'desc');
        }

        return $this;
    }

    /* ================================= CUSTOM ======================================*/

    function get_result_by_custom($table_name,$result_name, $where_name, $where_value)
    {
        $this->_ci->db->where($where_name, $where_value);
        $value = $this->_ci->db->get($table_name);
        $values = $value->row();
        return $values->$result_name;
    }

    function get_sum_by_custom($table, $where_name, $where_value)
    {
        $this->_ci->db->where($where_name, $where_value);
        $value = $this->_ci->db->get($table);

        return $value->num_rows();
    }

    function get_active_like($table,$like_field,$like_value,$order_field,$order_value)
    {
        $this->_ci->db->order_by($order_field, $order_value);
        $this->_ci->db->where('status', 2);
        $this->_ci->db->like($like_field, $like_value, 'both');
        $value = $this->_ci->db->get($table);
        $values = $value->result();
        return $values;
    }

    function get_gallery_limit()
    {
        $this->_ci->db->limit(5, 0);
        $this->_ci->db->where('gallery.status', 2);
        $this->_ci->db->order_by('gallery.gallery_id', 'desc');
        $this->_ci->db->join('gallery_image', 'gallery_image.gallery_id = gallery.gallery_id');
        $value = $this->_ci->db->get('gallery');
        $values = $value->result();
        return $values;
    }

    function get_gallery_by_id($id)
    {
        $this->_ci->db->where('gallery.gallery_id', $id);
        $this->_ci->db->where('gallery.status', 2);
        $this->_ci->db->join('gallery_image', 'gallery_image.gallery_id = gallery.gallery_id');
        $value = $this->_ci->db->get('gallery');
        $values = $value->result();
        return $values;
    }

    function get_gallery_active_like($like_value)
    {
        $this->_ci->db->order_by('gallery.gallery_id', 'desc');
        $this->_ci->db->where('gallery.status', 2);
        $this->_ci->db->like('gallery_title', $like_value, 'both');
        $this->_ci->db->join('gallery_image', 'gallery_image.gallery_id = gallery.gallery_id');
        $value = $this->_ci->db->get('gallery');
        $values = $value->result();
        return $values;
    }

    function update_log($data)
    {
        $this->_ci->db->insert('log',$data);
        if($this->_ci->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function get_log_dashboard()
    {
        $this->_ci->db->limit(15, 0);
        $this->_ci->db->order_by('log_id', 'desc');
        $value = $this->_ci->db->get('log');
        $values = $value->result();
        return $values;
    }


    function search_list_produk($searchData=array(), $per_page=null, $current_page=null,$search_nametable=null,$search_order=null,$order_val=null,$search_order2=null,$order_val2=null,$where_field=null,$where_value=null)
    {
        $this->_ci->db->select('produk.*,produk_cat.produk_cat_title');
        if (isset($per_page) && isset($current_page) ){
            $this->_ci->db->limit($per_page, $current_page);
        }
        if (isset($searchData['search_log_activity'])){
            $this->_ci->db->like($search_nametable, $searchData['search_log_activity']);
        }
        if (isset($search_order) && isset($order_val) ){
            $this->_ci->db->order_by($search_order,$order_val);
        }
        if (isset($where_field) && isset($where_value) ){
            $this->_ci->db->where($where_field, $where_value);
        }
        if (isset($search_order2) && isset($order_val2) ){
            $this->_ci->db->order_by($search_order2,$order_val2);
        }
        $this->_ci->db->join('produk_cat', 'produk_cat.produk_cat_id=produk.produk_cat_id');
        $value = $this->_ci->db->get('produk');
        $values = $value->result();
        return $values;

    }
}

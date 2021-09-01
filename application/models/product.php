<?php
Class Product extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select id,product_id,category_id,name,description,price,discount,unit from products ';
        $sql.= ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getsbycategory($params){
        $sql = 'select id,product_id,category_id,name,description,price,discount,unit,producttype_id,clientcategory_id from products ';
        $sql.= 'where category_id in ('.$params['category_id'].') ';
        $sql.= 'and producttype_id in ('.$params['producttypes'].') ';
        $sql.= 'and clientcategory_id in ('.$params['clientcategories'].') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'que'=>$sql
        );
    }
    function save($params,$tablename){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into '.$tablename.' ('.implode(',',$keys).') ';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'") ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}
<?php
Class Device extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select b.name category,a.id,a.kddevice,a.name,a.description,a.price,a.shownprice,a.unit,a.brand ';
        $sql.= 'from devices a ';
        $sql.= 'left outer join devicecategories b on b.id=a.category_id ';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getDeviceCategories(){
        $sql = 'select * from devicecategories ';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getsbycategory($categories){
        $sql = 'select b.name category,a.id,a.kddevice,a.name,a.description,a.price,a.shownprice,a.unit,a.brand from devices a ';
        $sql.= 'left outer join devicecategories b on b.id=a.category_id ';
        $sql.= 'where category_id in ('.$categories.') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function get($id){
        $sql = 'select b.name category,a.id,a.category_id,a.kddevice,a.name,a.description,a.price,a.unit,a.shownprice,a.brand ';
        $sql.= 'from devices a ';
        $sql.= 'left outer join devicecategories b on b.id=a.category_id ';
        $sql.= 'where a.id='.$id.' ';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res[0];
    }
    function update($params){
        $sql = 'update devices set ';
        $sql.= 'shownprice="'.$params['shownprice'].'",unit="'.$params['unit'].'",brand="'.$params['brand'].'",description="'.$params['description'].'" ';
        $sql.= 'where id='.$params['id']. '';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
}
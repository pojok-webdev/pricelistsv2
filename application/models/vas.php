<?php
Class Vas extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select b.name category,a.kdvas,a.name,a.description, ';
        $sql.= 'a.padinettemp,a.nonpadinettemp,';
        $sql.= 'a.pricepadinet,a.pricepadinetattr,';
        $sql.= 'a.pricenonpadinet,a.pricenonpadinetattr,a.unit ';
        $sql.= 'from vases a ';
        $sql.= 'left outer join vascategories b on b.id=a.category_id ';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getbyid($id){
        $sql = 'select b.name category,a.kdvas,a.name,a.description, ';
        $sql.= 'a.padinettemp,a.nonpadinettemp,';
        $sql.= 'a.pricepadinet,a.pricepadinetattr,';
        $sql.= 'a.pricenonpadinet,a.pricenonpadinetattr,a.unit ';
        $sql.= 'from vases a ';
        $sql.= 'left outer join vascategories b on b.id=a.category_id ';
        $sql.= 'where a.id='.$id.'';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function update($params){
        $sql = 'update vases ';
        $sql.= 'set descriptionblob="'.$params['descriptionblob'].'"';
        $sql.= 'where id='.$params['id'].'';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
    function setDescriptionBlob(){
        for($x=2;$x<=100;$x++){
            $sql = 'update vases ';
            $sql.= 'set descriptionblob="'.base64_encode('description').'"';
            $sql.= 'where id='.$x.'';
            $ci= & get_instance();
            $que = $ci->db->query($sql);
            return $sql;
        }
    }
    function getdescription($id){
        $sql = 'select descriptionblob from vases ';
        $sql.= 'where id='.$id.' ';
        $ci= & get_instance();
        $que = $ci->db->query($sql);
        return $sql;//$que->result();
    }
    function getsbycategory($categories){
        $sql = 'select b.name category,a.category_id,a.kdvas,a.name,a.description, ';
        $sql.= 'a.padinettemp,a.nonpadinettemp,';
        $sql.= 'a.pricepadinet,a.pricepadinetattr,';
        $sql.= 'a.pricenonpadinet,a.pricenonpadinetattr,a.unit ';
        $sql.= 'from vases a ';
        $sql.= 'left outer join vascategories b on b.id=a.category_id ';
        $sql.= 'where a.category_id in ('.$categories.') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
}
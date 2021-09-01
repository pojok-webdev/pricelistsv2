<?php
Class Service extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getCategories(){
        $sql = 'select category_id from categories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getVasCategories(){
        $sql = 'select id,name from vascategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getProductTypes(){
        $sql = 'select id,name,description from producttypes ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getClientCategories(){
        $sql = 'select id,name,description from clientcategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
}
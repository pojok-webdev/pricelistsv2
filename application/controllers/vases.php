<?php
Class Vases extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('vas');
    }
    function index(){
        $data = array(
            'objs'=>$this->vas->gets(),
            'categories' => $this->service->getVasCategories(),
            'menuactive'=>array(
                'productlist'=>'','productnote'=>'',
                'devicelist'=>'','devicenote'=>'',
                'vaslist'=>'active','vasnote'=>'',
                'philoslist'=>'','philosnote'=>''
            ),
            'breadline'=>array(
                0=>array('url'=>'/','label'=>'vass'),
                1=>array('url'=>'/','label'=>'List'),
            ),
        );
        $this->load->view('vases/index',$data);
    }
    function getajaxsource($objs){
        $arr = array();
        foreach($objs['res'] as $obj){
            array_push($arr,'[
                "'.$obj->category.'",
                "'.$obj->kdvas.'",
                '.json_encode($obj->name).',
                '.json_encode($obj->description).',
                "'.$obj->pricepadinetattr.'",
                "'.$obj->padinettemp.'",
                "'.$obj->pricenonpadinetattr.'",
                "'.$obj->nonpadinettemp.'",
                "'.$obj->unit.'"
              ]');
        }
        return '{"aaData": ['. implode(",",$arr).']}';
    }
    function ajaxsource(){
        $objs = $this->vas->gets();
        //echo json_encode($objs);
        echo $this->getajaxsource($objs);
    }
    function ajaxsourcebycategories(){
        $params = $this->input->post();
        $objs = $this->vas->getsbycategory($params['category_id']);
//        $objs = $this->vas->getsbycategory($this->uri->segment(3));
        echo $this->getajaxsource($objs);
    }
    function edit(){
        $obj = $this->vas->getbyid($this->uri->segment(3));
        $data = array(
            'objs'=>$this->vas->gets(),
            'categories' => $this->service->getCategories(),
            'vas' => $obj['res'][0],
            'breadline'=>array(
                0=>array('url'=>'/','label'=>'vases'),
                1=>array('url'=>'/','label'=>'List'),
            )
        );
        $this->load->view('vases/edit',$data);
    }
    function update(){
        $params = $this->input->post();
        echo $this->vas->update($params);
    }
    function setdescriptionblob(){
        $this->vas->setDescriptionBlob();
    }
    function getdescription(){
        $id = $this->uri->segment(3);
        $obj = $this->vas->getdescription($id);
        echo $obj[0]->descriptionblob;
    }
}
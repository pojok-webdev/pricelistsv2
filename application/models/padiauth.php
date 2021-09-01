<?php
Class Padiauth extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function authenticate($params){
        return $this->validatepassword($params['email'],$params['password']);
        //return json_encode($params);
    }
    function validatepassword($email,$password){
        $user = $this->getuser($email);
        echo "User->password ".$user->password;
        echo "<br />";
        echo "sha1($password.$user->salt) ".sha1($password.$user->salt);
        echo "<br />";
        if($user!=false){
            if (sha1($password.$user->salt)==$user->password){
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    function getuser($email){
        $sql = "select id,password,salt from users where email='".$email."' ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        if($que->num_rows>0){
            $res = $que->result();
            return $res[0];
        }else{
            return false;
        }
    }
}
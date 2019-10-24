<?php
class Sugerir extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    public function Sugerir($id,$nombre,$nombreP,$desc){
        $sql = "INSERT INTO proyectos_sugeridos VALUES ('$id','$nombre','$nombreP','$desc')";
        $insert = $this->db->query($sql);
        if(!$insert)
    {
        return $log = 0;
    }
    else
    {
        return $log = 1;
    }
    }
}
<?php
class GroupCreate extends CI_Model{

    private $cadena;
    private $longitud;
    private $cod;
    private $length;
    private $rows;
    function __construct(){
        $this->load->database();
        $this->cadena = '0123456789';
        $this->cod = '';
        $this->length = 4;
        $this->rows=1;
    }
    public function crear($id,$proyecto,$clave,$comentarios,$semestre,$jornada,$programa,$periodo){
        $sql5 = "SELECT * FROM estudiante WHERE ID='$id'";
        $consult5 = $this->db->query($sql5);
        $rows5 = $consult5->num_rows();

        $sql6 = "SELECT estudiante_ID FROM integrantes_pi WHERE estudiante_ID='$id'";
        $consult6 = $this->db->query($sql6);
        $rows6 = $consult6->num_rows();
        $encrypted_pass = password_hash($clave, PASSWORD_DEFAULT);
        if($rows5 == 0){
        return $log = 3; //Estudiante no registrado
        }else{
        if($rows6 != 0){
            return $log = 4; //Ya está en un grupo
        }else{
            while($this->rows == 1){
                $charactersLength = strlen($this->cadena);
                $this->cod = '';
                for ($i = 0; $i < $this->length; $i++) {
                   $this->cod .= $this->cadena[rand(0, $charactersLength - 1)];
                }
                   $sql = "SELECT * FROM grupo WHERE cod_grupo='$this->cod'";
                   $consult = $this->db->query($sql);
                   $this->rows = $consult->num_rows();
             }
             $sql = "INSERT INTO proyecto VALUES ('$this->cod','$proyecto','','','','')";
             $insert = $this->db->query($sql);
             $sql2 = "INSERT INTO grupo VALUES ('$this->cod','$this->cod','$semestre','$jornada','$programa','$comentarios','0000','3','$encrypted_pass','$encrypted_pass','$periodo')";
             $insert2 = $this->db->query($sql2);
             $sql4 = "INSERT INTO integrantes_pi VALUES ('','$id','$this->cod')";
             $insert4 = $this->db->query($sql4);
             return $this->cod; //Correcto
      }
    }
     
    }
    public function unirse_grupo($id,$grupo,$clave){
        $sql = "SELECT estudiante_ID FROM integrantes_pi WHERE estudiante_ID='$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();

        $sql2 = "SELECT * FROM grupo WHERE cod_grupo='$grupo'";
        $consult2 = $this->db->query($sql2);
        $rows2 = $consult2->num_rows();
        foreach($consult2->result_array() as $f2);

        $sql3 = "SELECT * FROM estudiante WHERE ID='$id'";
        $consult3 = $this->db->query($sql3);
        $rows3 = $consult3->num_rows();

        $sql4= "SELECT cod_inscripcion FROM integrantes_pi WHERE grupo_cod_grupo = '$grupo'";
        $consult4 = $this->db->query($sql4);
        $rows4 = $consult4->num_rows();
        // echo '<script language="javascript">alert("'.$id.' '.$grupo.' '.$clave.' '.$rows4.' '.$uba.'");</script>'; 

        if($rows != 0){
            return $log = 0; // ya tiene grupo
        }else if($rows2 == 0){
            return $log = 1; // no existe el grupo
        }else if($rows3 == 0){
            return $log =2; // estudiante no registrado
        }else if(password_verify ( $clave,$f2['password'])==0){
            return $log = 3; // contraseña incorrecta
        }else if($f2['cant'] <= $rows4){
            return $log = 5; // el grupo está lleno
        }else{
            $sql2 = "INSERT INTO integrantes_pi VALUES ('','$id','$grupo')";
            $consult2 = $this->db->query($sql2);
            return $log = 4;
        }
    }

    public function cargarSemestres(){
        $sql = "SELECT cod_semestre FROM semestre ORDER BY cod_semestre ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarProgramas(){
        $sql = "SELECT cod_programa, nombre FROM programa";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function buscarCorreo($id){
        $sql = "SELECT * FROM estudiante WHERE ID = '$id'";
        $consult = $this->db->query($sql);
        foreach($consult->result_array() as $f);
        $correo = $f['email'];
        return $correo;
    }

    // public function cantIntegrantes(){

    // }
}
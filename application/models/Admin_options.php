<?php
class Admin_options extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function cargarGrupos(){
        $sql = "SELECT * FROM grupo";
    
        $consult = $this->db->query($sql);

        $sql1 = "SELECT g.cod_grupo,g.semestre_id,g.jornada,g.programa_id,g.periodo, p.nombre, CONCAT(if(u.primer_nombre is null,'',u.primer_nombre),
         ' ', if(u.segundo_nombre is null,'',u.segundo_nombre), ' ', if(u.primer_apellido is null,'',u.primer_apellido), ' ', 
         if(u.segundo_apellido is null,'',u.segundo_apellido)) AS nombre_asesor FROM usuario u, grupo g, programa p 
         WHERE u.id_usuario= g.usuario_id_asesor and p.cod_programa = g.programa_id";
        $consult = $this->db->query($sql1); 

        $rows = $consult->num_rows();
        if($rows == 0){
        return $log = 0; // No hay grupos
        }else{
        return $consult->result();
        }
    }

    public function correos($check){
        $j = 0;
        $i = 0;
        $grupos = "";
        $or = "OR";

        foreach($check as $row){
            $i += 1;
        }

        foreach($check as $row){
            if($i-1 == $j){
                $or = "";
            }
             $grupos .= "g.cod_grupo = '$row' $or ";
             $j += 1;   
        }
        $sql = "SELECT e.email AS email FROM estudiante e, grupo g, integrantes_pi i WHERE e.ID = i.estudiante_ID AND g.cod_grupo = i.grupo_cod_grupo AND ($grupos)";
        $consult = $this->db->query($sql);
        return $consult->result();

    }

}


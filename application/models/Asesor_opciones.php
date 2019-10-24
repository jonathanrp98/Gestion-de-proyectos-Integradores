<?php
class Asesor_opciones extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function cargarGrupos($id,$entrega){
        $sql = "SELECT * FROM grupo WHERE usuario_id_asesor = '$id'";
        // if($entrega == ""){
        //     $sql = "SELECT * FROM grupo WHERE usuario_id_asesor = '$id'";   
        // }
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
        return $log = 0; //no tiene grupos para asesorar
        }else{
        return $consult->result();
        }
    }

    public function cargarEstado($id,$entrega){
        if($entrega == "primer_entrega"){
            $col = "c.N_primerEntrega";
        }else{
            $col = "c.N_finalEntrega";
        }
        $sql = "SELECT i.estudiante_ID AS cod_estudiante, c.N_primerEntrega AS N_primerEntrega, c.N_finalEntrega AS N_finalEntrega FROM integrantes_pi i, grupo g, calificacion_entregas c WHERE c.estudiante_cod_estudiante = i.estudiante_ID AND $col <> 'null' AND g.cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarEstadoGrupo($id,$entrega){
        $sql = "SELECT g.cod_grupo AS cod_grupo, g.cant AS cantidad, (SELECT COUNT(g.cod_grupo) FROM integrantes_pi i, grupo g, calificacion_entregas c WHERE g.cod_grupo = i.grupo_cod_grupo AND c.estudiante_cod_estudiante = i.estudiante_ID AND c.N_primerEntrega <> 'null' AND c.N_finalEntrega <> 'null' AND c.docente_id_asesor = '$id') AS filas FROM integrantes_pi i, grupo g, calificacion_entregas c WHERE g.cod_grupo = i.grupo_cod_grupo AND c.estudiante_cod_estudiante = i.estudiante_ID AND c.N_primerEntrega <> 'null' AND c.N_finalEntrega <> 'null' AND c.docente_id_asesor = '$id'";
        $consult = $this->db->query($sql);
        return $consult->result();
    } 
    
    public function cargarIntegrantes($id){
        $sql = "SELECT CONCAT(if(e.primer_nombre is null,'',e.primer_nombre), ' ', if(e.segundo_nombre is null,'',e.segundo_nombre), ' ', if(e.primer_apellido is null,'',e.primer_apellido), ' ', if(e.segundo_apellido is null,'',e.segundo_apellido)) AS nombre,
        e.ID as id_estudiante, g.cod_grupo AS grupo FROM estudiante e, integrantes_pi i, grupo g WHERE e.ID = i.estudiante_ID AND i.grupo_cod_grupo = g.cod_grupo AND g.cod_grupo = '$id' ORDER BY e.ID ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function subirNota($id_estudiante,$nota,$entrega,$asesor){
        if($entrega == "primer_entrega"){
            $col = "N_primerEntrega";
            $col2 = "'$nota',''";
        }else{
            $col = "N_finalEntrega";
            $col2 = "'','$nota'";
        }
        $sql = "SELECT * FROM calificacion_entregas WHERE estudiante_cod_estudiante = '$id_estudiante'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows != 0){
            $sql2 = "UPDATE calificacion_entregas SET $col = '$nota' WHERE estudiante_cod_estudiante = '$id_estudiante'";
        }else{
            $sql2 = "INSERT INTO calificacion_entregas VALUES ('','$id_estudiante','$asesor',$col2)";
        }
        $consult = $this->db->query($sql2);
        return $log = 1; //Correcto
    }

}
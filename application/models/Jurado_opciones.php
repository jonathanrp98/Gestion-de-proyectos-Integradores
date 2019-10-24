<?php
class Jurado_opciones extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function mensaje_contacto($id){
        $sql = "SELECT email FROM usuario WHERE id_usuario = '$id'";
        $consult = $this->db->query($sql);
        foreach($consult->result_array() as $f);
        $email = $f['email'];
        return $email;
    }

    public function cargarGrupos($id){
        $sql = "SELECT s.grupo_cod_grupo AS grupo, s.fecha_hora AS fecha_hora, s.lugar AS lugar, st.estado AS estado, s.id_sustentacion AS sustentacion FROM sustentacion s, staff_jurado st WHERE st.usuario_id_jurado1 = '$id' OR st.usuario_id_jurado2 = '$id' OR st.usuario_id_jurado2 = '$id' 
        AND s.staff_id_staff = st.id_staff ORDER BY s.fecha_hora ASC";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
        return $log = 0; //no tiene grupo asignado para sustentación
        }else{
        return $consult->result();
        }
    }

    public function form_download($id){
        $sql = "SELECT f.ArchivoFormulario AS formulario FROM formulario f, sustentacion s WHERE s.form_id_form = f.ID_form AND
        s.id_sustentacion = '$id'";
        $consult = $this->db->query($sql);
        foreach($consult->result_array() as $f);
        header("Content-type: application/xlsx");
        header("Content-Disposition: attachment; filename=calificacion-$id.xlsx");
        $url = "assets/uploads/files/".$f['formulario'];
        @readfile("$url");
    }

    public function subir_calificacion($id,$datos){
        $url = $datos['full_path'];
        $u = explode('pi/',$url);
        $archivo = $u[1];
        $sql2 = "UPDATE sustentacion SET archivoDocumento = '".$archivo."' WHERE id_sustentacion = '$id'";
        $insert = $this->db->query($sql2);
        unlink($datos['full_path']);
        return $log = 1; //Correcto
    }

    public function subir_nota($id_grupo,$id_sustentacion,$nota,$estudiante,$jurado){
        // $sql = "SELECT * FROM calificacion_sus WHERE estudiante_cod_estudiante = '$estudiante'";
        // $consult = $this->db->query($sql);
        // $rows = $consult->num_rows();
        $sql3 = "SELECT staff_id_staff FROM sustentacion WHERE id_sustentacion = '$id_sustentacion'";
        $consult3 = $this->db->query($sql3);
        foreach($consult3->result_array() as $f);
        $id_staff = $f['staff_id_staff'];
        $sql2 = "INSERT INTO calificacion_sus VALUES('$estudiante','$estudiante','$id_staff','$jurado',$nota)";
        // if($rows != 0){
        // $sql2 = "UPDATE calificacion_sus SET staff_id_staff = '$id_staff', id_jurado = '$jurado', N_sustentacion = '$nota'";
        // }
        $consult2 = $this->db->query($sql2);
        return $log = 1; //correcto
    }

    public function promedio_sustentacion($id, $nota){
        $sql = "SELECT * FROM promedio_sus WHERE id_estudiante = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        $suma = 0;
        $sql2 = "SELECT * FROM calificacion_sus WHERE estudiante_cod_estudiante = '$id'";
        $consult2 = $this->db->query($sql2);
        $rows2 = $consult2->num_rows();
        foreach($consult2->result_array() as $f){
            $suma = $suma + $f['N_sustentacion'];
        }

        if($rows == 0){
            $sql3 = "INSERT INTO promedio_sus VALUES ('$id','$nota')";
        }else{
            $promedio = $suma/$rows2;
            $sql3= "UPDATE promedio_sus SET promedio = '$promedio' WHERE id_estudiante = '$id'";
        }
        $consult3 = $this->db->query($sql3);
    }

    public function cargarIntegrantes($id){
        $sql = "SELECT CONCAT(if(e.primer_nombre is null,'',e.primer_nombre), ' ', if(e.segundo_nombre is null,'',e.segundo_nombre), ' ', if(e.primer_apellido is null,'',e.primer_apellido), ' ', if(e.segundo_apellido is null,'',e.segundo_apellido)) AS nombre,
        e.ID as id_estudiante, g.cod_grupo AS grupo FROM estudiante e, integrantes_pi i, grupo g WHERE e.ID = i.estudiante_ID AND i.grupo_cod_grupo = g.cod_grupo AND g.cod_grupo = '$id' ORDER BY e.ID ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarFormulario($id){
        $sql = "SELECT f.ArchivoFormulario AS formulario, f.nombre_formulario AS nombre_formulario FROM formulario f, 
        sustentacion s WHERE s.form_id_form = f.ID_Form AND s.id_sustentacion = '$id'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarEstado($grupo,$jurado){
        $sql = "SELECT i.estudiante_ID AS cod_estudiante FROM integrantes_pi i, grupo g, calificacion_sus c, sustentacion s WHERE i.grupo_cod_grupo = s.grupo_cod_grupo AND c.estudiante_cod_estudiante = i.estudiante_ID AND c.id_jurado = '$jurado' AND g.cod_grupo = '$grupo'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }  

    public function cargar_descripcion(){
        $sql = "SELECT cod_semestre FROM semestre ORDER BY cod_semestre ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }   

}
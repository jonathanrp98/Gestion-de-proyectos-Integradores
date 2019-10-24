<?php
class Group_options extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function enviarEntrega($grupo,$asesor,$entrega,$datos,$fecha){
     if($entrega == 'primera'){
        $sql3 = "SELECT * FROM primerentrega WHERE grupo_cod_grupo = '$grupo'";
        $consult3 = $this->db->query($sql3);
        $rows3 = $consult3->num_rows();
        foreach($consult3->result_array() as $f);

        $sql = "SELECT fecha as plazo FROM fecha_entregas WHERE fecha >= '$fecha' and id_fecha = '00001'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();

        if($rows == 1){
        $url = $datos['full_path'];
        $u = explode('pi/',$url);
        $archivo = $u[1];
        $sql2 = "INSERT INTO primerentrega VALUES ('$grupo','$archivo','$asesor','$grupo','00001','$fecha')";
        if($rows3 != 0){
        $sql2 = "UPDATE primerentrega SET archivoDocumento = '".$archivo."' WHERE grupo_cod_grupo = '$grupo'"; 
        $delete = $f['archivoDocumento'];
        unlink($delete);
        }
        $insert = $this->db->query($sql2);
        $_SESSION['estado_primer'] ="<td class='text-success'>Enviado</td>";
        $_SESSION['primer_boton'] = "";
        if($rows3 != 0){
        return $log = 2;
        }else{
        return $log = 1;
        }

        }else{
        unlink($datos['full_path']);
        return $log = 0; //la fecha para la entrega ya pasó
        }
     }else{
        $sql3 = "SELECT * FROM entregafinal WHERE grupo_cod_grupo = '$grupo'";
        $consult3 = $this->db->query($sql3);
        $rows3 = $consult3->num_rows();
        foreach($consult3->result_array() as $f);

        $sql = "SELECT fecha as plazo FROM fecha_entregas WHERE fecha >= '$fecha' and id_fecha = '00002'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        
        if($rows == 1){
        $url = $datos['full_path'];
        $u = explode('pi/',$url);
        $archivo = $u[1];
        $sql2 = "INSERT INTO entregafinal VALUES ('$grupo','$archivo','$asesor','$grupo','00002','$fecha')";
        if($rows3 != 0){
            $sql2 = "UPDATE entregafinal SET archivoDocumento = '$archivo' WHERE grupo_cod_grupo = '$grupo'"; 
            $delete = $f['archivoDocumento'];
            unlink($delete);
            }
        $insert = $this->db->query($sql2);
        $_SESSION['estado_final']= "<td class='text-success'>Enviado</td>";
        $_SESSION['final_boton'] = "";
        if($rows3 != 0){
            return $log = 2;
            }else{
            return $log = 1;
            }
        }else{
        unlink($datos['full_path']);
        return $log = 0; //la fecha para la entrega ya pasó
        }
     }
    }

    public function ver($grupo,$entrega){
        if($entrega == "primer"){
        $tabla = "primerentrega";
        }else{
        $tabla = "entregafinal";
        }
        $sql = "SELECT * FROM $tabla WHERE grupo_cod_grupo='$grupo'";
        $select = $this->db->query($sql);
        foreach($select->result_array() as $f);
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename='$tabla.pdf'");
        $url = $f['archivoDocumento'];
        @readfile("$url");
    }

    public function asesoria($programa,$semestre,$titulo,$asesor_principal,
    $fecha,$hora,$horaF,$objetivos,$recomendaciones,$actividades,$proxReunion,$asesor,$grupo,$estado,$consecutivo){
    $sql = "INSERT INTO asesoria VALUES ('','$programa','$semestre','$titulo','$fecha','$asesor','$asesor_principal','$grupo','$hora','$horaF','$objetivos','$recomendaciones','$actividades',
    '$proxReunion','$estado')";
    
    $sql2 = "SELECT * FROM asesoria WHERE consecutivo = '$consecutivo'";
    $consult2 = $this->db->query($sql2);
    $rows = $consult2->num_rows();
    
    if($rows != 0){
    $sql = "UPDATE asesoria SET programa_cod_programa = '$programa', semestre = '$semestre', proyecto = '$titulo',
     fecha = '$fecha', usuario_id_asesor = '$asesor', usuario_asesor_principal = '$asesor_principal', horaInicio = '$hora',
      horaFin = '$horaF', objetivoAsesoria = '$objetivos', recomendaciones = '$recomendaciones', actividadesPendietes = '$actividades',
      fecha_proxima_reunion = '$proxReunion', estado = '$estado' WHERE consecutivo = '$consecutivo'";
    }
    $insert = $this->db->query($sql);
    if(!$insert){
    return $log = 0; // no se envió
    }else{
    return $log = 1; // se envió
    }
    }

    public function mensaje_contacto($id){
        $sql = "SELECT e.email AS email, CONCAT(if(e.primer_nombre is null,'',e.primer_nombre), ' ', if(e.segundo_nombre is null,'',e.segundo_nombre), ' ', if(e.primer_apellido is null,'',e.primer_apellido), ' ', if(e.segundo_apellido is null,'',e.segundo_apellido)) AS nombre FROM estudiante e, grupo g, integrantes_pi i WHERE e.ID = i.estudiante_ID AND g.cod_grupo = i.grupo_cod_grupo AND g.cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        $correos = "";
        foreach($consult->result_array() as $f){
            $correos = $correos.$f['nombre']." - ".$f['email']."\n";
        }
        return $correos;
    }

    public function cargarAsesores(){
        $sql = "SELECT CONCAT(if(u.primer_nombre is null,'',u.primer_nombre), ' ', if(u.segundo_nombre is null,'',u.segundo_nombre), ' ', if(u.primer_apellido is null,'',u.primer_apellido), ' ', if(u.segundo_apellido is null,'',u.segundo_apellido)) AS nombre,
        u.id_usuario as id_usuario FROM usuario u, tipo t WHERE u.tipo_cod_tipo = t.cod_tipo AND t.titulo = 'Asesor'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarProgramas(){
        $sql = "SELECT cod_programa, nombre FROM programa";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarSemestres(){
        $sql = "SELECT cod_semestre FROM semestre ORDER BY cod_semestre ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarInformacion($grupo){
        $sql = "SELECT * FROM asesoria WHERE estado = 'guardado' AND grupo_cod_grupo = '$grupo'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarAsesoria($consecutivo){
        $sql = "SELECT * FROM asesoria WHERE consecutivo = '$consecutivo'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cargarSedes(){
        $sql = "SELECT cod_sede, nombre FROM sede";
        $consult = $this->db->query($sql);
        return $consult->result();
    }
    
    public function cargarEstado($grupo){
        $sql3 = "SELECT * FROM primerentrega WHERE grupo_cod_grupo='$grupo'";
        $consult3 = $this->db->query($sql3);
        $rows3 = $consult3->num_rows();

        $sql4 = "SELECT * FROM entregafinal WHERE grupo_cod_grupo='$grupo'";
        $consult4 = $this->db->query($sql4);
        $rows4 = $consult4->num_rows();

        if($rows3 == 0){
            $estado['estado_primer']= "<td class='text-danger'>Pendiente</td>";
            $estado['primer_boton'] = "disabled"; 
            }else{
            $estado['estado_primer']= "<td class='text-success'>Enviado</td>";
            $estado['primer_boton'] = "";
            }
            if($rows4 == 0){
                $estado['estado_final']= "<td class='text-danger'>Pendiente</td>";
                $estado['final_boton'] = "disabled";
                }else{
                $estado['estado_final']= "<td class='text-success'>Enviado</td>";
                $estado['final_boton'] = "";
                }
    return $estado;
    }

    public function cargarIntegrantes($id){
        $sql = "SELECT CONCAT(if(e.primer_nombre is null,'',e.primer_nombre), ' ', if(e.segundo_nombre is null,'',e.segundo_nombre), ' ', if(e.primer_apellido is null,'',e.primer_apellido), ' ', if(e.segundo_apellido is null,'',e.segundo_apellido)) AS nombre,
        e.ID as id_estudiante, g.cod_grupo AS grupo FROM estudiante e, integrantes_pi i, grupo g WHERE e.ID = i.estudiante_ID AND i.grupo_cod_grupo = g.cod_grupo AND g.cod_grupo = '$id' ORDER BY e.ID ASC";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function notas($id){
        $sql = "SELECT i.estudiante_ID AS cod_estudiante, c.N_primerEntrega AS N_primerEntrega, c.N_finalEntrega AS N_finalEntrega, p.promedio AS sustentacion, n.nota_final FROM integrantes_pi i, grupo g, calificacion_entregas c, promedio_sus p, nota_proyecto n WHERE c.estudiante_cod_estudiante = i.estudiante_ID AND p.id_estudiante = i.estudiante_ID AND n.cod_estudiante = i.estudiante_ID AND g.cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
            $sql2 = "SELECT i.estudiante_ID AS cod_estudiante, c.N_primerEntrega AS N_primerEntrega, c.N_finalEntrega AS N_finalEntrega, n.nota_final FROM integrantes_pi i, grupo g, calificacion_entregas c, nota_proyecto n WHERE c.estudiante_cod_estudiante = i.estudiante_ID AND n.cod_estudiante = i.estudiante_ID AND g.cod_grupo = '$id'";
            $consult2 = $this->db->query($sql2);
            return $consult2->result();
        }else{
            return $consult->result();
        }
    }

    public function nota_final($id,$semestre){
        $sql = "SELECT i.estudiante_ID AS cod_estudiante, c.N_primerEntrega AS N_primerEntrega, c.N_finalEntrega AS N_finalEntrega, p.promedio AS sustentacion_nota, c.cod_cal AS cod_cal, po.* FROM integrantes_pi i, grupo g, calificacion_entregas c, promedio_sus p, porcentaje_calificacion po WHERE c.estudiante_cod_estudiante = i.estudiante_ID AND p.id_estudiante = i.estudiante_ID AND po.cod_semestre = '$semestre' AND g.cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
            $sql2 = "SELECT i.estudiante_ID AS cod_estudiante, c.N_primerEntrega AS N_primerEntrega, c.N_finalEntrega AS N_finalEntrega, c.cod_cal AS cod_cal, po.* FROM integrantes_pi i, grupo g, calificacion_entregas c, porcentaje_calificacion po WHERE c.estudiante_cod_estudiante = i.estudiante_ID AND po.cod_semestre = '$semestre' AND g.cod_grupo = '$id'";
            $consult2 = $this->db->query($sql2);
            foreach($consult2->result_array() as $f){
            $entrega1 = $f['primer_entrega']; 
            $entrega2 = $f['entrega_final'];
            $entrega3 = $f['sustentacion'];
            if($f['primer_entrega'] >= 1){
                $entrega1 = $f['primer_entrega']/100;
            }else if($f['entrega_final'] >= 1){
                $entrega2 = $f['entrega_final']/100;
            }else if($f['sustentacion'] >= 1){
                $entrega3 = $f['sustentacion']/100;
            }
            $porcentaje = $f['cod_porcentaje'];
            $entregas = $f['cod_cal'];
            $estudiante = $f['cod_estudiante'];
            $nota_final = ($f['N_primerEntrega']*$entrega1)+($f['N_finalEntrega']*$entrega2);
            $sql = "SELECT * FROM nota_proyecto WHERE cod_estudiante = '$estudiante'";
            $consult = $this->db->query($sql);
            $rows = $consult->num_rows();
            $sql = "INSERT INTO nota_proyecto VALUES ('','$porcentaje','$entregas','0','$estudiante','$nota_final')";
            if($rows != 0){
                $sql = "UPDATE nota_proyecto SET nota_final = $nota_final WHERE cod_estudiante = '$estudiante'";
            }
            $consult = $this->db->query($sql);
        }
        }else{
            foreach($consult->result_array() as $f){
                $entrega1 = $f['primer_entrega']; 
                $entrega2 = $f['entrega_final'];
                $entrega3 = $f['sustentacion'];
                if($f['primer_entrega'] >= 1){
                    $entrega1 = $f['primer_entrega']/100;
                }if($f['entrega_final'] >= 1){
                    $entrega2 = $f['entrega_final']/100;
                }if($f['sustentacion'] >= 1){
                    $entrega3 = $f['sustentacion']/100;
                }
                $porcentaje = $f['cod_porcentaje'];
                $entregas = $f['cod_cal'];
                $estudiante = $f['cod_estudiante'];
                $nota_final = ($f['N_primerEntrega']*$entrega1)+($f['N_finalEntrega']*$entrega2)+($f['sustentacion_nota']*$entrega3);
                $sql = "SELECT * FROM nota_proyecto WHERE cod_estudiante = '$estudiante'";
                $consult = $this->db->query($sql);
                $rows = $consult->num_rows();
                $sql = "INSERT INTO nota_proyecto VALUES ('','$porcentaje','$entregas','$estudiante','$estudiante','$nota_final')";
                if($rows != 0){
                    $sql = "UPDATE nota_proyecto SET nota_final = $nota_final WHERE cod_estudiante = '$estudiante'";
                }
                $consult = $this->db->query($sql);
            }
        }
    }

    public function cargarGrupos(){
        $sql = "SELECT * FROM grupo_semestre";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function cantidadAsesorias($id){
        $sql = "SELECT grupo_cod_grupo FROM asesoria WHERE estado = 'Aceptado' AND grupo_cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        return $rows = $consult->num_rows();
    }

    public function cargarJornadas(){
        $sql = "SELECT * FROM jornada";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function fechaSustentacion($id){
        $sql = "SELECT fecha_hora, lugar FROM sustentacion WHERE grupo_cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        return $consult->result();
    }

    public function fechaEntregas($id){
        $sql = "SELECT fecha, descripcion FROM fecha_entregas";
        $consult = $this->db->query($sql);
        foreach($consult->result() as $f){
        if($f->descripcion == "primera entrega"){
        $fechas['primer_entrega'] = $f->fecha;
        }else{
        $fechas['segunda_entrega'] = $f->fecha;
        }
        }
        return $fechas;
    }

    public function cargarPeriodos(){
        $sql = "SELECT * FROM periodo";
        $consult = $this->db->query($sql);
        return $consult->result(); 
    }
}





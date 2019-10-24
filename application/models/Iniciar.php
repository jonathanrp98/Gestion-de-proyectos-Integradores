<?php
class Iniciar extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    public function iniciar($user,$pass,$rol){
       switch($rol){
    case "1":
        $sql = "SELECT * FROM grupo WHERE cod_grupo='$user'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        foreach($consult->result_array() as $f);
        if($rows == 0){
        return $log = 0; //el grupo no existe o código incorrecto
        }else if(password_verify ( $pass,$f['password'])==0){
        return $log = 1; //contraseña incorrecta    
        }else{
        //}else if(password_verify ( $pass,$f['password'])){
        $sql2 = "SELECT e.primer_nombre as primer_nombre, e.segundo_nombre as segundo_nombre, e.primer_apellido as primer_apellido,
        e.segundo_apellido as segundo_apellido, p.titulo as titulo, i.estudiante_ID, g.proyecto_id_proyecto as id_proyecto, g.semestre_id as semestre, pr.nombre as programa, g.programa_id as programa_id FROM estudiante e, proyecto p, integrantes_pi i, grupo g, programa pr 
        WHERE p.id_proyecto = g.proyecto_id_proyecto and pr.cod_programa = programa_id and e.ID = i.estudiante_ID and g.cod_grupo = i.grupo_cod_grupo and i.grupo_cod_grupo ='$user'";
        $consult2 = $this->db->query($sql2);
        foreach($consult2->result_array() as $f2){
            $_SESSION['integrantes'] = $_SESSION['integrantes']."<div class='row'>".$f2['primer_nombre']." ".$f2['segundo_nombre']." ".$f2['primer_apellido']." ".$f2['segundo_apellido']."</div><br>";
        }

        $sql5 = "SELECT u.primer_nombre as nombre, u.segundo_nombre as nombre_, u.primer_apellido as apellido, u.segundo_apellido as apellido_, g.usuario_id_asesor as id_asesor FROM usuario u, grupo g WHERE u.id_usuario = g.usuario_id_asesor AND
        g.cod_grupo='$user'";
        $consult5 = $this->db->query($sql5);
        $rows5 = $consult5->num_rows();
        foreach($consult5->result_array() as $f5);
        $_SESSION['asesor'] = $f5['nombre']." ".$f5['nombre_']." ".$f5['apellido']." ".$f5['apellido_'];
        $_SESSION['id_asesor'] = $f5['id_asesor'];
        session_start();
        $_SESSION['rol'] = 5;
        $_SESSION['id_grupo'] = $f['cod_grupo'];
        $_SESSION['proyecto'] = $f2['titulo'];
        $_SESSION['programa'] = $f2['programa'];
        $_SESSION['programa_id'] = $f2['programa_id'];
        $_SESSION['semestre'] = $f2['semestre'];
        redirect(base_url().'index.php/grupo');
        }
        break;
    case "2":
        $sql = "SELECT * FROM usuario WHERE username='$user'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        foreach($consult->result_array() as $f);
        if($rows == 0){
        return $log = 0; //el asesor no existe o código incorrecto
        }else if(password_verify ( $pass,$f['password'])==0){
        return $log = 1; //contraseña incorrecta    
        }else{
        session_start();
        $_SESSION['rol'] = $f['tipo_cod_tipo'];
        $_SESSION['id_usuario'] = $f['id_usuario'];
        redirect(base_url().'index.php/asesor/crud_grupo');
        }
        break;
        case "3":
        $sql = "SELECT * FROM usuario WHERE username='$user'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        foreach($consult->result_array() as $f);
        if($rows == 0){
        return $log = 0; //el jurado no existe o código incorrecto
        }else if(password_verify ( $pass,$f['password'])==0){
        return $log = 1; //contraseña incorrecta    
        }else{
        session_start();
        $_SESSION['rol'] = $f['tipo_cod_tipo'];
        $_SESSION['id_usuario'] = $f['id_usuario'];
        $_SESSION['nombre_user'] = $f['primer_nombre']." ".$f['segundo_nombre']." ".$f['primer_apellido']." ".$f['segundo_apellido'];
        redirect(base_url().'index.php/jurado');
        }
        break;
        case "4":
        $sql = "SELECT * FROM usuario WHERE username='$user'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        foreach($consult->result_array() as $f);
        if($rows == 0){
        return $log = 0; //el admin no existe o código incorrecto
        }else if(password_verify ( $pass,$f['password'])==0){
        return $log = 1; //contraseña incorrecta    
        }else{
        session_start();
        $_SESSION['rol'] = $f['tipo_cod_tipo'];
        $_SESSION['id_usuario'] = $f['id_usuario'];
        redirect(base_url().'index.php/admin/crud_estudiante');
        }
        break;
       }
    }
    
    public function registrar($id,$nombre,$nombre2,$apellido,$apellido2,$genero,$email,$telefono,$semestre,$sede,$programa,$grupo,$jornada,$periodo){
        $sql = "SELECT * FROM estudiante WHERE ID='$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows != 0){
            return $log = 0; //Ya estaba registrado
        }else{
            $sql = "INSERT INTO estudiante VALUES ('$id','$nombre','$nombre2','$apellido','$apellido2','$genero','$email','$telefono','$semestre','$sede','$programa','$grupo','$jornada','$periodo')";
            $insert = $this->db->query($sql);
            return $log = 1; //Registrado
        }
    }

    public function recuperar_pass($id,$email,$rol){
        switch($rol){
        case "1":
        $sql = "SELECT e.email AS email FROM estudiante e, grupo g, integrantes_pi i WHERE e.ID = i.estudiante_ID AND g.cod_grupo = i.grupo_cod_grupo AND g.cod_grupo = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
            return $log = 0; //Datos erróneos
        }else{
            return $consult->result();
        }
        break;
        case "2":
        $sql = "SELECT email FROM usuario WHERE username = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows == 0){
            return $log = 0; //Datos erróneos
        }else{
            return $consult->result();
        }
        break;
        }
    }

    public function token_gen($length,$id,$fecha) {
        $cadena = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($cadena);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $cadena[rand(0, $charactersLength - 1)];
        }
        $sql = "SELECT * FROM token WHERE id_token = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        if($rows != 0){
            $sql2 = "UPDATE token SET token = '$token' WHERE id_token = '$id'";
        }else{
            $sql2 = "INSERT INTO token VALUES ('$id','$token','$fecha')";
        }
        $consult2 = $this->db->query($sql2);
        return $token;
    }

    public function token_verify($token,$id){
        $sql = "SELECT * FROM token WHERE id_token = '$id'";
        $consult = $this->db->query($sql);
        $rows = $consult->num_rows();
        foreach($consult->result_array() as $f);
        if($rows == 0){
            return $log = 0; //token expirado
        }else if($f['token'] != $token){
            return $log = 1; //token erróneo
        }else{
            return $log = 2; //correcto
        }
    }

    public function change_pass($id,$rol,$pass){
        $encrypted_pass = password_hash($pass, PASSWORD_DEFAULT);
        if($rol == '1'){
            $sql = "UPDATE grupo SET password = '$encrypted_pass'";
            $consult = $this->db->query($sql);
            $sql2 = "DELETE FROM token WHERE id_token = '$id'";
            $consult2 = $this->db->query($sql2);
            return $log = 1; //clave cambiada
        }else{
            $sql = "UPDATE usuario SET password = '$encrypted_pass'";
            $consult = $this->db->query($sql);
            $sql2 = "DELETE FROM token WHERE id_token = '$id'";
            $consult2 = $this->db->query($sql2);
            return $log = 1; //clave cambiada
        }
    }
}
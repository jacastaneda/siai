<?php

    $codigo = $_POST['codigo'];
    require_once '../../Franjas/Datatables/funciones/conexiones.php';
    $con = Conectar();
    $sql = "SELECT * FROM usuarios WHERE CODIGO = '$codigo'";
    $q = mysql_query($sql, $con);
    $info = array();
    while($datos = mysql_fetch_array($q))
    {
//        print_r($datos);
        $codigo = $datos['CODIGO'];
        $id_catedratico = $datos['idCatedratico'];
        $nombre = utf8_encode($datos['NOMBRE']);
        $tipo_usuar= $datos['TIPO_USUAR'];
        $estado = $datos['Estado'];
    }
    desconectar();
    $info['codigo'] = $codigo;
    $info['id_catedratico'] = $id_catedratico;
    $info['nombre'] = $nombre;  
    $info['tipo_usuar'] = $tipo_usuar;    
    $info['estado'] = $estado;  
    echo json_encode($info);
?>

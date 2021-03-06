<?php
    require_once 'funciones/conexiones.php';
    $ruta_assets='../../Equivalencias/DataTables/';
    include_once('../../clases/ClassControl.php');
    
    $control = new ClassControl();
    $ciclo_anio_actual=$control->CicloAnioActual2();  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset= UTF-8" />		
                <title>Ciclo</title>
                <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">       
                <link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />                
		<style type="text/css" title="currentStyle">
			@import "<?php echo $ruta_assets;?>media/css/demo_page.css";
			@import "<?php echo $ruta_assets;?>media/css/demo_table.css";
			@import "<?php echo $ruta_assets;?>funciones/formatoInput.css";
		</style>
		<script type="text/javascript" src="<?php echo $ruta_assets;?>media/js/jquery.js"></script>
		<script type="text/javascript"  src="<?php echo $ruta_assets;?>media/js/jquery.dataTables.js"></script>
                <script src="<?php echo $ruta_assets;?>media/js/jquery-ui-1.9.2.custom.js"></script>
		<script type="text/javascript" charset="utf-8">
                  var procedimiento = "nuevo";            
                  $(document).ready(function() {
                    $(window).resize(function(){
                        $('#formularioRegistrar').css({
                            position:'absolute',
                            left: ($(window).width() - $('#formularioRegistrar').outerWidth())/2,
                            top: ($(window).height() - $('#formularioRegistrar').outerHeight())/2
                        });	  
                    });
                    $(window).resize();  
                    $(".arrastable").draggable();  
                    var num = 1;
                    $("#loader").hide();
                    $("#formularioRegistrar").hide();
		    var oTable = $('#example').dataTable({"oLanguage":{"sUrl": "<?php echo $ruta_assets;?>media/language/es_ES.txt"}} );               
                    $("#btnNuevo").click(function(){
                        $("#leyenda").html("Registrar Nuevo Ciclo");
                        procedimiento = "nuevo";
                        num = num + 1;

                        if ($("#btnNuevo").val()=="Agregar Ciclo"){
                            $("#txtidCiclo").attr("value",'');
                            $("#txtAnio").attr("value",'');
                            $("#sltNumCiclo").attr("value",'');
                            $("#sltActivo").attr("value",'');
                            $("#formularioRegistrar").show();
                            $("#btnNuevo").val("Cancelar");
                        }
                        else if ($("#btnNuevo").val()=="Cancelar"){
                            $("#formularioRegistrar").hide();
                            $("#btnNuevo").val("Agregar Ciclo");
                        }
                        else{
                            alert("otro")
                        }
                        
                })
                
                $("#btnProcesar").click(function(){
                    $("#loader").show();
                    var datos = $("#frmRegistrar").serialize();
                    
                    if(procedimiento == "nuevo")
                    {
                        $.ajax({
                        url: "guardarCiclo.php",
                        type: "POST",
                        data: datos,
                        success:
                            function(r)
                            {
                                alert(r);
                                $("#loader").hide();
                                location.reload(true);
                            }
                        })
                    }
                    else if(procedimiento == "editar")
                    {
//                        alert(datos)
                        $.ajax({
                        url: "editarCiclo.php",
                        type: "POST",
                        data: datos,
                        success:
                            function(r)
                            {
                                alert(r);
                                $("#loader").hide();
                                location.reload(true);
                            }
                    })
                    }
                  })
               });
            
            function eliminar(idUniversidad)
            {
                if(confirm("Esta seguro que desea eliminar este ciclo?"))
                {
                    //cedula=85150447
                    var v_idUniversidad = "idUniversidad="+idUniversidad;                    
                    $.ajax({
                        url:"eliminarCiclo.php",
                        data: v_idUniversidad,
                        type: "POST",
                        success:
                            function(respuesta)
                            {
                                alert(respuesta);
                                location.reload(true);
                            }                        
                    })
                }
            }
            
            function editar(idCiclo)
            {
                $("#leyenda").html("Actualizar Ciclo");
                procedimiento = "editar";
                var v_idCiclo = "idCiclo="+idCiclo;                    
                    $.ajax({
                        url:"buscarCiclo.php",
                        data: v_idCiclo,
                        type: "POST",
                        dataType: "json",
                        success:
                            function(respuesta)
                            {
                                $("#formularioRegistrar").show();
                                $("#btnNuevo").val("Cancelar");
                                $("#txtidCiclo").val(respuesta.id_ciclo);
                                $("#txtAnio").val(respuesta.anio);
                                $("#sltNumCiclo").val(respuesta.num_ciclo);
                                $("#sltActivo").val(respuesta.activo);                             
                            }                        
                    })
            }
         function Franja(idCiclo)
            {
                //$("#leyenda").html("Actualizar Universidad");
                //procedimiento = "editar";
                var idCiclo = "idCiclo="+idCiclo;                    
                    $.ajax({
                        url:"Franja.php",
                        data: idCiclo,
                        type: "POST",
                        dataType: "json"                        
                    })
            }   
		</script>
	</head>
	<body id="dt_example" class="ex_highlight_row">
		<div id="container" style="width:80%">
<h1>Informaci&oacute;n</h1>
			
<div class="demo_jui">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">    
            <thead>
                    <tr>
                            <th>A&ntilde;o actual</th>
                            <th>Ciclo actual</th>
                            <th>Franjas Horarias</th>
                    </tr>
            </thead>
            <tbody> 
                <tr>
                    <td><?php echo $ciclo_anio_actual['anio']; ?></td>
                    <td><?php echo ($ciclo_anio_actual['ciclo'] == 1) ? 'Impar' : 'Par' ; ?></td>
                    <th>
                        <form action="Franja2.php" method="post">
                            <input name="ciclo" id="ciclo" type="hidden" value="<?php echo $ciclo_anio_actual['ciclo']; ?>">
                            <input name="anio" id=anio type="hidden" value="<?php echo $ciclo_anio_actual['anio']; ?>">
                            <input value="Franjas horarias para inscripci&oacute;n" type="submit">
                        </form>
                    </th>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
    </table>
</div>
			<div class="spacer"></div>			
		</div>
</body>
</html>
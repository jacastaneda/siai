<?php 
include_once("../clases/ClassAlumnoExpediente.php");//clase incluida
include_once("../clases/ClassConexion.php");//clase a a conexion de base de datos

if(($_SESSION["user"][0]["TIPO_USUAR"])==""){
	
	header ("Location: ../index.php");
	}

$expediente=new ClassAlumnoExpediente();

$carrare=$expediente->getCatCarrera();
$tipIingreso=$expediente->getTipoIingreso();
$tipobeca=$expediente->getTipoBeca();
$ultimo_plan=$expediente->getUltimo_plan();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script src="../bootstrap/js/jquery-1.8.3.js"></script>
<script src="../bootstrap/js/bootstrap-collapse.js"></script> 
<script src="../bootstrap/js/bootstrap-dropdown.js"></script> 
<script src="../bootstrap/js/bootstrap-modal.js"></script> 
<style>
body {
	padding-top: 150px;
}
</style>
<!-- InstanceBeginEditable name="doctitle" -->
<title>SIAI</title>
<script src="js/ExpedienteAlumno.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
</head>

<body>

<!--Inicio de MENU este clase deja fijo el menu no importa el tamaño-->
    <div class="navbar navbar-inverse navbar-fixed-top">
   <!--DIV -->
<div style="height:100px; background-color: #006; background-image:url(../img/baner2.png); background-repeat:inherit">
  
   </div>
    
<!-- COloca de colore nego el fonde donde reisidra el MENU-->
        <div class="navbar-inner">
        	<div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
             <span class="icon-bar"></span> <span class="icon-bar"></span>
             <span class="icon-bar"></span> 
            </a>
            
            
            <div class="nav-collapse collapse">
            
           
            <ul class="nav">
            
              
                 <!--inicio de validacion -->

               <?php if($_SESSION["user"][0]["TIPO_USUAR"]==3 or $_SESSION["user"][0]["TIPO_USUAR"]==1 ){?> 
                
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Expediente Alumno<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                     <li><a href="ExpedienteAlumno.php"><i class="icon-file"></i> Crear Carnet</a></li>
                      <li><a href="EditExpedienteAlumno.php"><i class="icon-edit"></i> Editar Expediente</a></li>
                    </ul> <!--FIn de dropdown-menu -->   
               </li> <!--fin del dropdown-->
               
               <?php }?>
               
               
               
               
                 <!--inicio de validacion  Coordinadores-->

               <?php if($_SESSION["user"][0]["TIPO_USUAR"]==2 or $_SESSION["user"][0]["TIPO_USUAR"]==1 ){?> 
               
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Equivalencias<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                     <li><a href="../Equivalencias/CrearSolicitud.php"><i class="icon-file"></i> Crear Solicitud Equivalencia</a></li>
                      <li><a href="../Equivalencias/CrearMatrizEquivalencia.php"><i class="icon-edit"></i> Mtto matriz equivalencia</a></li>
                      <li><a href="../Equivalencias/VistaMatrizWeb.php"><i class="icon-eye-open"></i> Vista matriz equivalencia</a></li>
                    </ul> <!--FIn de dropdown-menu -->   
               </li> <!--fin del dropdown-->
               
               
               
               <?php }?>
               
               
                <!--inicio de validacion  Coordinadores-->

               <?php if($_SESSION["user"][0]["TIPO_USUAR"]==2  or $_SESSION["user"][0]["TIPO_USUAR"]==1){?> 
               
               
               <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Mantenimientos<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                     <li><a href="../Equivalencias/MttoEsatdoEquivalencias.php"><i class="icon-file">
                     </i> Mtto estado equivalencia</a></li>
                      <li><a href="../Equivalencias/MttoEstadoMateria.php"><i class="icon-edit"></i> Mtto estado materias</a></li>
                       <li><a href="../Equivalencias/MttoUniversidades.php"><i class="icon-edit"></i> Mtto institución educación superior</a></li>
                        <li><a href="../Horarios/index.php"><i class="icon-edit"></i> Mtto Horarios</a></li>
                    </ul> <!--FIn de dropdown-menu -->   
               </li> <!--fin del dropdown-->
               
               <?php }?>
               
               
               <!--inicio de validacion  para contabilidad -->

               <?php if($_SESSION["user"][0]["TIPO_USUAR"]==1 or $_SESSION["user"][0]["TIPO_USUAR"]==4){?>
               <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Pagos<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                   	  <li><a href="../ventanilla/index.php"><i class="icon-arrow-up"></i> Cargar Archivo</a></li>  
                    </ul> <!--FIn de dropdown-menu -->               
               </li> <!--fin del dropdown-->
               <?php }?>


				<!--inicio de validacion  para contabilidad -->

               <?php if($_SESSION["user"][0]["TIPO_USUAR"]==1 or $_SESSION["user"][0]["TIPO_USUAR"]==2){?>
               <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Validación inscripción<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                   	  <li><a href="../siai_validacion/index.php"><i class="icon-arrow-up"></i> Validar</a></li>  
                    </ul> <!--FIn de dropdown-menu -->               
               </li> <!--fin del dropdown-->
               <?php }?>

			 <?php if($_SESSION["user"][0]["TIPO_USUAR"]==1 ){?>
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-briefcase icon-white"></i> Sincronizar Datos<b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                    	 <li><a href="../ventanilla/index.php"><i class="icon-tasks"></i> Spago BI</a></li>        
                    </ul> <!--FIn de dropdown-menu -->                    
               </li> <!--fin del dropdown-->
             <?php }?>  
               
            </ul> <!--fin del NAV -->
              
              
              <p class="navbar-text pull-right"> Conectado como: 
              <a href="#" class="navbar-link"><strong><?php echo $_SESSION["user"][0]["usuario"]; ?></strong> </a>
              <i class="icon-user icon-white"></i> 
              <a href="../login/salir.php" class="icon-off icon-white"></a> </p>
            </div> 
            <!--FIN de nav-collapse collapse -->
            
          
            
            </div> <!--container -->
        </div> <!-- FIN de navbar-inner-->
        
    
    </div> <!--fin de  navbar navbar-inverse navbar-fixed-top-->


<div class="container">
	<div class=" well well-small"><!-- InstanceBeginEditable name="EditRegion3" -->
	  <h4><strong>Generación de Carnet</strong></h4>
	
	
	<!-- InstanceEndEditable --></div>

<div class="well"><!-- InstanceBeginEditable name="EditRegion4" -->
<div id="alerta">

</div>

  <form id="form1" name="form1" method="post" action="javascript:void(null)" class="form-horizontal">
    <div class="control-group">
      <label class="control-label" for ="PAss"> Carnet</label>
      <div class="controls">
        <input name="txtCarnet" type="text" id="txtCarnet" readonly="readonly" placeholder="Carnet"/> <div id="msn"></div>
        </div>
      
      
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Nombres</label>
      <div class="controls"><span id="sprytextfield3">
      <input type="text" name="txtNombres" id="txtNombres" placeholder="Nombres"/>
      <span class="textfieldRequiredMsg">Dato Requerido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></div>
      
      
      </div>
    
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Apellido 1</label>
      <div class="controls"><span id="sprytextfield2">
      <input type="text" name="txtApellido1" id="txtApellido1"  placeholder="Apllido 1" onkeyup="GeneraCarnet();"/>
      <span class="textfieldRequiredMsg">Dato Requerido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></div>
      
      
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Apellido 2</label>
      <div class="controls">
        <input type="text" name="txtApellido2" id="txtApellido2" placeholder="Apellido 2" onkeyup="GeneraCarnet();" />
        </div>
      
      
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Apellido de casada</label>
      <div class="controls">
        <input type="text" name="txtApellidoCas" id="txtApellidoCas" placeholder="Apllido de casada" onkeyup="GeneraCarnet();"/>
        </div>
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Carrera</label>
      <div class="controls"><span id="spryselect2">
       
        <select name="lstCarrera" id="lstCarrera" onchange="planCArrera();">
          <option value="">Sleccione</option>
          <?php for($a=0;$a<count($carrare);$a++){?>
          <option value="<?php echo $carrare[$a]["CODIGO_CAR"]; ?>"><?php echo $carrare[$a]["NOMBRE"]; ?></option>
          <?php }?>
        </select>
        <span class="selectInvalidMsg">Seleccione un elemento válido.</span><span class="selectRequiredMsg">Seleccione Carrera.</span></span></div>
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Tipo de ingreso</label>
      <div class="controls">
        <select name="lstTipoIngreso" id="lstTipoIngreso" >
          <?php for($a=0;$a<count($tipIingreso);$a++){?>
          
          <option value="<?php echo $tipIingreso[$a]["CODIGO"]; ?>"><?php echo $tipIingreso[$a]["NOMBRE"]; ?></option>
          <?php }?>
          </select>
        </div>
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Tipo de beca</label>
      <div class="controls"><span id="spryselect1">
        <label for="lstTipoBeca"></label>
        <select name="lstTipoBeca" id="lstTipoBeca">
        <option value=""></option>
          <?php for($a=0;$a<count($tipobeca);$a++){?>
          
          <option value="<?php echo $tipobeca[$a]["CODIGO"]; ?>"><?php echo $tipobeca[$a]["NOMBRE"]; ?></option>
          <?php }?>
        </select>
        <span class="selectRequiredMsg">Dato Requerido.</span></span></div>
      
      </div>
    
    <div class="control-group">
      <label class="control-label" for ="PAss"> Codigo Plan</label>
      <div class="controls"><span id="sprytextfield1">
        <label for="txtCodigoPlan"></label>
        <input type="text" name="txtCodigoPlan" id="txtCodigoPlan"  placeholder="Codigo Plan"/>
        <span class="textfieldRequiredMsg">Dato Requerido.</span></span></div>
      </div>
    
    <div class="control-group"> <!--COn este div hacemos grupos de ontroles -->
      <div class="controls">
        <button type="submit" class="btn btn-success btn-large" onclick="GuadarAlumno();">Guardar  <span class="icon-ok-sign icon-white"></span></button>
        <button type="reset" class="btn btn-primary btn-large">Limpiar <span class="icon-trash icon-white"></span></button>
        </div>
      </div>
      
      
  </form>
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["change", "blur"], invalidValue:"-1"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"], minChars:3});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"], minChars:3});
  </script>
  <script src="../bootstrap/js/bootstrap-alert.js"></script>
<!-- InstanceEndEditable --></div>
<footer> <strong>Universidad Politécnica de El Salvador <?php echo date('Y');?> </strong></footer>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
<!-- InstanceEnd --></html>

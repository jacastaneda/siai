<?php session_start(); 
require_once 'funciones/conexiones.php';
    if(isset($_POST["idUniversidad"])) { 
        $_SESSION['idUniversidad'] = serialize($_POST["idUniversidad"]); 
    } 
    if(isset($_SESSION['idUniversidad'])) { 
        $g_IdUniversidad = unserialize($_SESSION['idUniversidad']); 
    }
?>   
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">    
	<thead>
		<tr>
			<th>Id Universidad</th>
                        <th>Id Facultad</th>
			<th>Facultad</th>
                        <th>Facultad UPES</th>
                        <th></th>
                        <th></th>
                        <th></th>
		</tr>
	</thead>
	<tbody> 
            <?php
            $con = Conectar();
            $sql = "SELECT u.nombreUniversidad as Universidad , f.nombreFacultadEqui, f.idFacultadEqui, f.idUniversidad , f.idFacultadUPES FROM proc_universidades u, proc_facultades f
                    where f.idFacultadEqui = u.idUniversidad AND f.idUniversidad= $g_IdUniversidad";
            $q = mysql_query($sql, $con) or die ("Problemas al ejecutar la consulta");                
            while($datos = mysql_fetch_array($q)){
            ?>
		<tr>
			<td><?php echo $datos['Universidad']; ?></td>
                        <td><?php echo $datos['idFacultadEqui']; ?></td>
			<td><?php echo $datos['nombreFacultadEqui']; ?></td>
                        <td><?php echo $datos['idFacultadUPES']; ?></td>
                        <td>
                            <img src="images/refresh.png" style="cursor: pointer;" onclick="editar('<?php echo $datos['idUniversidad']; ?>','<?php echo $datos['idFacultadEqui']; ?>')" />
                        </td>
                        <td>                          
                            <img src="images/delete.png" style="cursor: pointer;" onclick="eliminar('<?php echo $datos['idUniversidad']; ?>','<?php echo $datos['idFacultadEqui']; ?>')" />
                        </td>
                        <th>
                            <form action="Carrera.php" method="post">
                                <input name="idUniversidad" id="idUniversidad" type="hidden" value="<?php echo $datos['idUniversidad']; ?>">
                                <input name="idFacultadEqui" id="idFacultadEqui" type="hidden" value="<?php echo $datos['idFacultadEqui']; ?>">
                                <input value="Carreras" type="submit">
                            </form>
                        </th>
		</tr>
                <?php
            }
            ?>
	</tbody>
	<tfoot>
		<tr>
			<th></th>
                        <th></th>
                        <th></th>
			<th></th>
                        <th></th>
                        <th></th>
                        <th></th>
		</tr>
	</tfoot>
</table>

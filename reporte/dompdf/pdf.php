<?php ob_start(); ?>
<style type="text/css">
body,td,th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: xx-small;
}
</style>
<?php
include ("../../../conexion1.php");

/*session_cache_limiter('private');
if (!isset($_SESSION)) {
  session_start();
}*/

//$cve_user = $_SESSION['MM_Username'];
$cve_user = 'digitalizacion_tramites20*1148';
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="imagenes/logo_cultura.png" width="120px"></td>
    <td width="410" rowspan="4">&nbsp;</td>
    <td width="230"align="right">CRONOGRAMA, PRESUPUESTO Y PROGRAMACIÓN</td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA</td>
  </tr>
  <tr>
    <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
  </tr>
  <tr>
    <td align="right">PROFEST 2020</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <?php
    $query1 = "SELECT * FROM solicitud WHERE clave_usuario='".$cve_user."';";                          
        $exe_query1 =  mysqli_query($con, $query1);
        $fila1=mysqli_fetch_array($exe_query1, MYSQLI_ASSOC);
    ?>
    <td width="85">&nbsp;</td>
    <td>Nombre del Festival:</td>
    <td><u><?=$fila1['nombre_festival']?></u></td>
  </tr>
</table>
<br> 
<table border="1" cellpadding="0" cellspacing="0">
    <tr bgcolor="#CCCCCC">
        <td width="3" align="center">No</td>
        <td width="15" align="center">Confirmado /Tentativo</td>
        <td align="center">Disciplina</td>
        <td width="70" align="center">Nombre de la o el Artista o Grupo</td>
        <td width="90" align="center">Municipio y Estado de origen del artista o grupo</td>
        <td width="70" align="center">Nombre de la presentación</td>
        <td width="90" align="center">Lugar de presentación (Nombre del Foro, localidad, Municipio o Alcaldía, Estado)</td>
        <td width="20" align="center">Fecha presentación dd/mm/aaaa</td>
        <td align="center">Horario</td>
        <td align="center">#Participantes por grupo</td>
        <td width="70" align="center">Nombre de la o el representante de la o el artista o grupo</td>
        <td width="30" align="center">Links a material videográfico de la propuesta</td>
        <td align="center">Duración del espectáculo propuesto</td>
        <td width="53" align="center">Monto de honorarios con impuestos incluidos (M.N.)</td>
    </tr>
    <?php
        $query_conf = "SELECT id FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."' 
        and confirmado_tentativo='Confirmado';";                          
        $exe_query_conf =  mysqli_query($con, $query_conf);
        $cuantos_conf = mysqli_num_rows($exe_query_conf);

        $query = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."';";                          
        $exe_query =  mysqli_query($con, $query);
        $cuantos = mysqli_num_rows($exe_query);

        $i = 0;
        $total_general = 0;
        $prog_confirmada = 0;
        while($fila=mysqli_fetch_array($exe_query, MYSQLI_ASSOC)){
            $i=$i+1;
            $monto_honorarios = $fila['monto_honorarios_con_impuestos_incluidos_mn'];
            $total_general = $total_general + $monto_honorarios;
            $confirmado_tentativo = $fila['confirmado_tentativo'];
            $links = $fila['links_material_videografico_propuesta'];
            
            $pedazo_link = substr($links, 0, 10);

            $prog_confirmada = 100*($cuantos_conf/$cuantos);
    ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$confirmado_tentativo?></td>
        <td><?=$fila['disciplina']?></td>
        <td><?=$fila['nombre_artista_grupo']?></td>
        <td><?=$fila['estado_origen_artista_grupo']?>, <?=$fila['municipio_origen_artista_grupo']?></td>
        <td><?=$fila['nombre_presentacion']?></td>
        <td><?=$fila['nombre_foro']?>, <?=$fila['localidad_foro']?>, <?=$fila['municipio_alcaldia_foro']?>, <?=$fila['estado_foro']?></td>
        <td><?=$fila['fecha_presentacion']?></td>
        <td><?=$fila['horario']?></td>
        <td><?=$fila['num_participantes_por_grupo']?></td>
        <td><?=$fila['nombre_representante_fiscal_artista_grupo']?></td>
        <td><a href="links"><?=$pedazo_link?>...</a></td>
        <td><?=$fila['duracion_espectaculo_propuesto']?></td>
        <td align="right">$<?=number_format($monto_honorarios,2)?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="13" align="right">Total General</td>
        <td align="right">$<?=number_format($total_general,2)?></td>
    </tr>
    <tr>
        <td colspan="13" align="right">Progrmación confirmada</td>
        <td align="right"><?=number_format($prog_confirmada)?>%</td>
    </tr>
</table>
<?php 
        $query2 = "SELECT nombre_instancia_postulante FROM usuarios WHERE clave_usuario='".$cve_user."';";                          
        $exe_query2 =  mysqli_query($con, $query2);
        $fila2=mysqli_fetch_array($exe_query2, MYSQLI_ASSOC);
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="80" rowspan="2">&nbsp;</td>
    <td width="367" height="40" align="center" valign="bottom"><u><?=$fila2['nombre_instancia_postulante']?></u></td>
    <td width="180" height="80" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="top">Nombre y firma de la o el Titular de la Instancia Postulante</td>
  </tr>
</table>

<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->set_paper('letter', 'landscape');
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

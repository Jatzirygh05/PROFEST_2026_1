<?php ob_start(); ?>
<style type="text/css">
body,td,th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: xx-small;
}
</style>
<?php
require_once('../../Connections/conexion.php');

session_cache_limiter('private');
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
//$cve_user = 'digitalizacion_tramites20*1148';

 $query = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."';";                          
 $exe_query =  mysqli_query($con, $query);

    while($fila=mysqli_fetch_array($exe_query, MYSQLI_ASSOC)){
          $monto_honorarios = $fila['monto_honorarios_con_impuestos_incluidos_mn'];
          
          $links = utf8_encode($fila['links_material_videografico_propuesta']);

          $paginaweb = utf8_encode($fila['paginaweb_redessociales_artista_grupo']);

          $sinopsis_imp = utf8_encode($fila['sinopsis']);
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura.png" width="210px"></td>
    <td width="150" rowspan="4">&nbsp;</td>
    <td width="230"align="right">SEMBLANZA Y COTIZACIÓN DE LOS ARTISTAS Y GRUPOS</td>
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
    <td>Nombre del Festival:</td>
    <td><u><?=utf8_encode($fila1['nombre_festival'])?></u>
    </td>
  </tr>
</table>
<br> 
<table width="80%" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td colspan="4" align="center" height="25">Datos de contacto</td>
  </tr>
  <tr>
    <td colspan="2" height="25" align="center">Artista o Grupo</td>
    <td colspan="2" height="25" align="center">Representante</td>
  </tr>
  <tr>
    <td width="70" height="15">Nombre:</td>
    <td><?=utf8_encode($fila['nombre_artista_grupo'])?></td>
    <td width="70" height="15">Nombre:</td>
    <td><?=utf8_encode($fila['nombre_representante_fiscal_artista_grupo'])?></td>
  </tr>
  <tr>
    <td height="15">Correo electrónico:</td>
    <td><?=utf8_encode($fila['correo_electronico_artista_grupo'])?></td>
    <td height="15">Correo electrónico:</td>
    <td><?=utf8_encode($fila['correo_electronico_representante_fiscal_artista_grupo'])?></td>
  </tr>
  <tr>
    <td height="15">Teléfono fijo/móvil:</td>
    <td><?=utf8_encode($fila['num_telefonico_artista_grupo'])?></td>
    <td height="15">Teléfono fijo/móvil:</td>
    <td><?=utf8_encode($fila['num_telefonico_representante_fiscal_artista_grupo'])?></td>
  </tr>
  <tr>
    <td height="15">Cuenta con CFDI:</td>
    <td><?=$fila['artista_cuenta_con_CFDI']?></td>
    <td height="15">Cuenta con CFDI:</td>
    <td><?=$fila['representante_fiscal_cuenta_con_CFDI']?></td>
  </tr>
  <tr>
    <td colspan="4" align="center" height="25">Datos generales del artista y/o grupo</td>
  </tr>
  <tr>
    <td height="15">Municipio o Alcaldía origen:</td>
    <td><?=utf8_encode($fila['municipio_origen_artista_grupo'])?></td>
    <td height="15">Estado origen:</td>
    <td><?=utf8_encode($fila['estado_origen_artista_grupo'])?></td>
  </tr>
  <tr>
    <td height="15">Disciplina:</td>
    <td><?=utf8_encode($fila['disciplina'])?></td>
    <td height="15">Años de experiencia comprobables:</td>
    <td><?=utf8_encode($fila['anio_experiencia_comprobables'])?></td>
  </tr>
  <tr>
    <td height="15">Alcance del Artista:</td>
    <td><?=utf8_encode($fila['alcance_Artista'])?></td>
    <td height="15">Categoría:</td>
    <td><?=$fila['categoria']?></td>
  </tr>
  <tr>
    <td height="15">Reconocimientos importantes:</td>
    <td><?=utf8_encode($fila['reconocimientos_importantes_artista_grupo'])?></td>
    <td height="15">Cuenta actualmente con apoyo FONCA:</td>
    <td><?=$fila['cuenta_actualmente_con_apoyo_FONCA']?></td>
  </tr>
  <tr>
    <td height="15">Página web/Redes sociales:</td>
    <td><?php echo "<a href=\"$paginaweb\" target=\"_blank\">link</a>"; ?></td>
    <td height="15">Links a material videográfico de la propuesta:</td>
    <td><?php echo "<a href=\"$links\" target=\"_blank\">link</a>"; ?></td>
  </tr>
  <tr>
    <td colspan="4" align="center" height="25">Información de la presentación artistica propuesta</td>
  </tr>
  <tr>
    <td height="15">Nombre de la presentación:</td>
    <td><?=utf8_encode($fila['nombre_presentacion'])?></td>
    <td height="15">Público al que va dirigida la propuesta artística:</td>
    <td><?=utf8_encode($fila['publico_va_dirigida_propuesta_artistica'])?></td>
  </tr>
  <tr>
    <td height="15">Duración del espectáculo propuesto:</td>
    <td><?=utf8_encode($fila['duracion_espectaculo_propuesto'])?></td>
    <td height="15">Espacio requerido:</td>
    <td><?=utf8_encode($fila['espacio_requerido'])?></td>
  </tr>
  <tr>
    <td height="15">#Participantes por grupo:</td>
    <td><?=utf8_encode($fila['num_participantes_por_grupo'])?></td>
    <td height="15">Impacto socio/cultural del espectáculo:</td>
    <td><?=utf8_encode($fila['impacto_socio_cultural_espectaculo'])?></td>
  </tr>
  <tr>
    <td height="15">#Mujeres:</td>
    <td><?=$fila['num_Mujeres']?></td>
    <td height="15">Links a material videográfico de la propuesta:</td>
    <td><?php echo "<a href=\"$links\" target=\"_blank\">link</a>"; ?></td>
  </tr>
  <tr>
    <td height="15">#Hombres:</td>
    <td><?=$fila['num_Hombres']?></td>
    <td height="15">Monto de honorarios con impuestos incluidos (M.N.):</td>
    <td>$<?=number_format($monto_honorarios,2,'.',',')?></td>
  </tr>
  <tr>
    <td height="15">Sinopsis de la presentación artística propuesta:</td>
    <td colspan="3"><?php echo $sinopsis_imp; ?></td>
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="150" height="80" rowspan="2">&nbsp;</td>
    <td width="240" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila['nombre_representante_fiscal_artista_grupo'])?></u></td>
    <td width="150" height="80" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="top">Nombre y firma de la o el artista o representante del grupo artístico</td>
  </tr>
</table>
<table style='page-break-after:always;'></br></table>
<?php } ?>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Semblanza_cotizacion_artistas_grupos.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

<?php ob_start(); ?>
<style type="text/css">
body,td,th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: xx-small;
}
</style>
<?php
require_once('../../Connections/conexion.php');

/*session_cache_limiter('private');
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];*/
//$cve_user = 'anallaveros20*1745';
$cve_user = "jghernandez20*1709";

 $query = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."';";                          
 $exe_query =  mysqli_query($con, $query);

    while($fila=mysqli_fetch_array($exe_query, MYSQLI_ASSOC)){
          $monto_honorarios = $fila['monto_honorarios_con_impuestos_incluidos_mn'];
          
          $links = $fila['links_material_videografico_propuesta'];

          $paginaweb = utf8_encode($fila['paginaweb_redessociales_artista_grupo']);

          $sinopsis_imp = $fila['sinopsis'];
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura_2022.png" width="195px" height="65"></td>
    <td width="150" rowspan="4">&nbsp;</td>
    <td width="230"align="right">SEMBLANZA Y/O COTIZACIÓN </td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA APOYO A FESTIVALES CULTURALES</td>
  </tr>
  <tr>
    <td align="right">Y ARTÍSTICOS PROFEST 2022</td>
  </tr>
</table>

<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <?php
    $query1 = "SELECT * FROM solicitud WHERE clave_usuario='".$cve_user."';";                          
        $exe_query1 =  mysqli_query($con, $query1);
        $fila1=mysqli_fetch_array($exe_query1, MYSQLI_ASSOC);
    ?>
    <td width="15%" height="10">Nombre del Festival:</td>
    <td width="83%" height="10"><u><?php echo utf8_encode($fila1['nombre_festival']); ?></u></td>
  </tr>
</table>
<br>
<table width="98%" border="1" cellpadding="0" cellspacing="0" align="center">
  <col />
  <col />
  <tr>
    <td colspan="2" height="20" align="center" bgcolor="#EBEBEB">Datos de contacto</td>
  </tr> 
 

Número telefónico del(la) participante  

  <tr>
    <td bgcolor="#EBEBEB" height="20">Nombre del(la) participante</td>
    <td width="350" height="20">&nbsp;<?php echo $fila['nombre_artista_grupo']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#EBEBEB" height="20">Nombre del(la) representante artístico</td>
    <td width="350" height="20">&nbsp;<?php echo utf8_encode($fila['nombre_representante_fiscal_artista_grupo']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#EBEBEB" height="20">Correo electrónico del(la) participante o representante </td>
    <td width="350" height="20">&nbsp;<?php echo $fila['correo_electronico_representante_fiscal_artista_grupo']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#EBEBEB" height="20">Número telefónico del(la) participante</td>
    <td width="350" height="20">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#EBEBEB" height="20">Número de telefónico del(la) representante</td>
    <td width="350" height="20">&nbsp;<?php echo $fila['num_telefonico_representante_fiscal_artista_grupo']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#EBEBEB" height="20">Cuenta con CFDI</td>
    <td width="350" height="20">&nbsp;<?php echo $fila['representante_fiscal_cuenta_con_CFDI']; ?></td>
  </tr>
</table>
<br>
<table width="98%" border="1" cellpadding="0" cellspacing="0" align="center">
  <col />
  <col />
  <tr>
    <td colspan="4" height="20" align="center" bgcolor="#EBEBEB">Datos generales del artista y/o grupo</td>
  </tr>
  <?php /*<tr>
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
    <td height="15"></td>
    <td></td>
    <td height="15">Cuenta con CFDI:</td>
    <td><?=$fila['representante_fiscal_cuenta_con_CFDI']?></td>
  </tr>*/?>
  <tr>
    <td height="15" width="180" bgcolor="#EBEBEB">Años de experiencia comprobables:</td>
    <td width="20" width="80"><?php echo $fila['anio_experiencia_comprobables']; ?></td>
    <td height="15" bgcolor="#EBEBEB">Estado de origen de la o el participante:</td>
    <td><?php echo $fila['estado_origen_artista_grupo']; ?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Disciplina:</td>
    <td width="80"><?php switch($fila['disciplina']){
                case 'Musica':
                      echo "Música";
                break;
                case 'Diseno':
                      echo "Diseño";
                break;
                case 'Cinematografia':
                      echo "Cinematografía";
                break;
                default:
                  echo $fila['disciplina'];
              }
      ?>
    </td>
    <td height="15" bgcolor="#EBEBEB">Recibe apoyo del FONCA actualmente y qué tipo de apoyo es:</td>
    <td><?=$fila['cuenta_actualmente_con_apoyo_FONCA']?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Reconocimientos y/o participaciones importantes:</td>
    <td colspan="3"><?php echo utf8_encode($fila['reconocimientos_importantes_artista_grupo']); ?></td>
  </tr>
  <?php /*tr>
    <td height="15">Página web/Redes sociales:</td>
    <td><?php echo "<a href=\"$paginaweb\" target=\"_blank\">link</a>"; ?></td>
    <td height="15">Links a material videográfico de la propuesta:</td>
    <td><?php echo "<a href=\"$links\" target=\"_blank\">link</a>"; ?></td>
  </tr*/?>
</table>
<br>
<center>Información de la presentación artistica propuesta</center>
<br>
<table width="98%" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td height="15" width="130" bgcolor="#EBEBEB">Nombre de la actividad artística-cultural o servicio :</td>
    <td><?php echo $fila['nombre_present_o_servicio']; ?></td>
    <td height="15" bgcolor="#EBEBEB" bgcolor="#EBEBEB">Público al que va dirigida, en su caso:</td>
    <td><?=utf8_encode($fila['publico_va_dirigida_propuesta_artistica'])?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Duración de la actividad artística-cultural o servicio:</td>
    <td><?=utf8_encode($fila['duracion_espectaculo_propuesto'])?></td>
    <td height="15" bgcolor="#EBEBEB">Número de integrantes que realizan la actividad artística-cultural o servicio:</td>
    <td><?=utf8_encode($fila['num_participantes_por_grupo'])?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Número de mujeres que realizan la actividad artística-cultural o servicio:</td>
    <td><?=$fila['num_Mujeres']?></td>
    <td height="15" bgcolor="#EBEBEB">Links a material videográfico de la propuesta (obligatorio):</td>
    <td><?php echo "$links"; ?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Número de hombres que realizan la actividad artística-cultural o servicio:</td>
    <td><?=$fila['num_Hombres']?></td>
    <td height="15" bgcolor="#EBEBEB">Monto de honorarios solicitado de la actividad artística-cultural o servicio con impuestos incluidos:</td>
    <td>$<?=number_format($monto_honorarios,2,'.',',')?></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#EBEBEB">Sinopsis de la actividad artística-cultural o servicio prestado: 
    </td>
    <td colspan="3"><?php echo utf8_encode($sinopsis_imp); ?></td>
  </tr>
</table>

<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="150" height="100" rowspan="2">&nbsp;</td>
    <td width="240" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila['nombre_representante_fiscal_artista_grupo'])?></u></td>
    <td width="150" height="80" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="10" align="center" valign="top">Nombre y firma de la o el artista o representante del grupo artístico</td>
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

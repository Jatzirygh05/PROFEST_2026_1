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
$solicitante = $_GET['solicitante'];
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
    <td align="right">PROFEST 2023</td>
  </tr>
</table>

<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <?php
        $query1 = "SELECT * FROM solicitud WHERE clave_usuario='".$solicitante."';";                       
        $exe_query1 =  mysqli_query($con, $query1);
        $fila1=mysqli_fetch_array($exe_query1, MYSQLI_ASSOC);
    ?>
    <td width="10%" height="15"></td>
    <td width="30%" height="15" colspan="2" align="right">Nombre del Festival:</td>
    <td width="60%" height="15" colspan="3"><u><?php echo utf8_encode($fila1['nombre_festival']); ?></u></td>
  </tr>
  <tr>
    <?php 
   $query_usu="select * from usuarios where clave_usuario='".$solicitante."';";
    $exe_query_usu= mysqli_query($con, $query_usu);
    $row=mysqli_fetch_array($exe_query_usu, MYSQLI_ASSOC);
    ?>
    <td width="10%" height="15"></td>
    <td width="30%" height="15" colspan="2" align="right">Tipo de instancia:</td>
    <td width="60%" height="15" colspan="3"><u><?php echo utf8_encode($row["tipo_instancia"]); ?></u></td>
  </tr>
  <tr>
    <td width="10%" height="15"></td>
    <td width="30%" height="15" colspan="2" align="right">ID proyecto:</td>
    <td width="60%" height="15"><u><?php echo $fila1['id_solicitud']; ?></u></td>
    <?php
   
   $query2 = "SELECT * FROM anexos WHERE clave_usuario='".$solicitante."';";                          
        $exe_query2 =  mysqli_query($con, $query2);
        $fila2=mysqli_fetch_array($exe_query2, MYSQLI_ASSOC);
    ?>
    <td width="20%" height="25" align="right">Estatus de revisión:</td>
    <td width="40%" height="15"><u><?php echo $fila2["estatus"]; ?></u></td>
  </tr>
   <tr>
<?php 
  switch($fila1["Info_financiera_categoria"]){
    case "A":
      $cate="A) Festivales de segunda y tercera emisión, hasta $500,000.00 (quinientos mil pesos 00/100 M.N.).";
    break;
    case "B":
      $cate="B) Festivales de cuarta a septima emisión, hasta $1,000,000.00 (un millón de pesos M.N.).";
    break;
    case "C":
      $cate="C) Festivales de octava a décima emisión, hasta $1,700,000.00 (un millón setecientos mil pesos M.N.).";
    break;
    case "D":
      $cate="D) Festivales de decimoprimera emisión en adelante, hasta $2,800,000.00 (dos millones ochocientos mil pesos M.N.).";
    break;     
        }
    ?>           

    <td width="10%" height="15"></td>
    <td width="10%" height="15" colspan="2" align="right">Categoría:</td>
    <td width="60%" height="15"><u><?php echo $cate; ?></u></td>
    <td width="40%" height="15" align="right">Apoyo financiero solicitado a la Secretaría de Cultura:</td>
    <td width="40%" height="15"><u>$<?php echo number_format($fila1["Infor_finan_apoyo_monto"], 2, '.', ','); ?></u></td>
  </tr> 
</table>
<br>
<table width="98%" border="1" cellpadding="0" cellspacing="0" align="center">
<tr>
    <td colspan="5" height="22" align="center">Listado de documentación entregada</td>
</tr>
<tr>
    <td width="5%" height="18" align="center">No.</td>
    <td width="50%" height="18" align="center">Archivo</td>
    <td width="5%" height="18" align="center">Sí</td>
    <td width="5%" height="18" align="center">No</td>
    <td width="35%" height="18" align="center">Observaciones</td>
</tr>
<?php
     $conteo=1;
     $query_user="SELECT * FROM anexos
        where clave_usuario='".$solicitante."'";
    $res_user =  mysqli_query($con,$query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $nombre_formato=$fila['nombre_formato'];
        $cumple=$fila['cumple'];
        $observaciones=$fila['observaciones'];
        $reviso=$fila['reviso'];
    
   $query_doc="SELECT * FROM nombre_formatos where id_docto = $nombre_formato";
      $res_doc =  mysqli_query($con,$query_doc);
      $fila_doc=mysqli_fetch_array($res_doc, MYSQLI_ASSOC);
      $nombre_formato_convert=$fila_doc['nombre_documento'];
    ?>
<tr>
    <td width="5%" height="18" align="center"><?php echo $conteo; ?></td>
    <td width="50%" height="18" align="center"><?php echo $nombre_formato_convert; ?></td>
    <td width="5%" height="18" align="center"><?php if($cumple=='Si'){ ?>1<?php } ?></td>
    <td width="5%" height="18" align="center"><?php if($cumple=='No'){ ?>1<?php } ?></td>
    <td width="35%" height="18" align="center"><?php echo $observaciones; ?></td>
    <?php $conteo++;
        }
    ?>
</tr>
</table>
<br>
<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
    <td width="48%" height="18" align="right">Revisó: </td>
    <td width="2%" height="18"></td>
    <td width="50%" height="18"><u><?php echo $reviso; ?></u></td>
</tr>
</table>

<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Formato_checklist_descargable.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

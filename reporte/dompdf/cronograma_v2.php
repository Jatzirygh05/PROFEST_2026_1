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
//$cve_user = 'arqalejandrogamez20*1806';

$query1 = "SELECT * FROM solicitud WHERE clave_usuario='".$cve_user."';";                          
$exe_query1 =  mysqli_query($con, $query1);
$fila1=mysqli_fetch_array($exe_query1, MYSQLI_ASSOC);
$nombre_festival = utf8_encode($fila1['nombre_festival']);

    /* $sql_sum_cant = "SELECT reque_v2_1_2.total_esp_mue_inmue, v2_requerimientos_elegidos.* 
          FROM `reque_v2_1_2`, `v2_requerimientos_elegidos` WHERE reque_v2_1_2.clave_usuario='".$cve_user."'
          and v2_requerimientos_elegidos.clave_usuario='".$cve_user."' and reque_v2_1_2.tipo = v2_requerimientos_elegidos.tipo 
          group by reque_v2_1_2.tipo"; 
          $resultado_sql_sum_cant = mysqli_query($con, $sql_sum_cant);
          $num_sql_sum_cant = mysqli_num_rows($resultado_sql_sum_cant);
            for ($z=0; $z <$num_sql_sum_cant; $z++)
            {
              $row_sql_sum_cant = mysqli_fetch_array($resultado_sql_sum_cant);
              $suma_pestanas = $suma_pestanas + $row_sql_sum_cant["total_esp_mue_inmue"];
              $tipo_elegidos = $row_sql_sum_cant["tipo"];
              
             $variable_guarda= $variable_guarda.','.$tipo_elegidos;
            }
            
            $separa = explode(",",$variable_guarda);

           $clave1 = array_search('1', $separa);
           $clave2 = array_search('2', $separa);
           //$clave8 = array_search('8', $separa);
           $clave3 = array_search('3', $separa);
           $clave4 = array_search('4', $separa);
           $clave5 = array_search('5', $separa);
           $clave6 = array_search('6', $separa);
           $clave7 = array_search('7', $separa);
           
           $clave9 = array_search('9', $separa);

           /*$muestra_suma = $total_general + $suma_pestanas;*/ 
 $query_conf = "SELECT id FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."' and confirmado_tentativo='Confirmado';";                          
        $exe_query_conf =  mysqli_query($con, $query_conf);
        $cuantos_conf = mysqli_num_rows($exe_query_conf);
//if($cuantos_conf>0){
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><center><strong>ANEXO 6 PROFEST</strong><br>Formato de cronograma, presupuesto y programación PROFEST</center>
    </td>
  </tr>
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura_2021_pequenio.png" width="210px"></td>
    <td width="350" rowspan="4">&nbsp;</td>
    <td width="230"align="right">CRONOGRAMA, PRESUPUESTO Y PROGRAMACIÓN</td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA</td>
  </tr>
  <tr>
    <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
  </tr>
  <tr>
    <td align="right">PROFEST 2021</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="85">&nbsp;</td>
    <td>Nombre del Festival:</td>
    <td><u><?=$nombre_festival?></u></td>
  </tr>
</table>
<br> 
<table border="1" cellpadding="0" cellspacing="0" align="center">
    <tr bgcolor="#CCCCCC">
        <td width="3" align="center">No</td>
        <td width="15" align="center">Confirmado /Tentativo</td>
        <td align="center">Disciplina</td>
        <td width="70" align="center">Nombre del participante</td>
        <td width="70" align="center">Estado de origen</td>
        <td width="70" align="center">Nombre de la presentación o servicio</td>
        <!--Lugar de presentación
(Nombre del Foro,
localidad, Municipio o
Alcaldía, Estado)-->
        <td width="90" align="center">Lugar de la presentación o medio de transmisión</td>
        <td width="20" align="center">Fecha presentación del servicio dd/mm/aaaa</td>
        <td align="center">Horario</td>
        <td align="center">#Participantes por grupo</td>
        <td width="70" align="center">Nombre de la o el representante</td>
        <td width="50" align="center">Links a material videográfico de la propuesta</td>
        <td align="center">Duración del espectáculo propuesto o servicio</td>
        <td width="53" align="center">Monto de honorarios con impuestos incluidos (M.N.)</td>
    </tr>
    <?php
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

            $links = utf8_encode($fila['links_material_videografico_propuesta']);

            $prog_confirmada = 100*($cuantos_conf/$cuantos);

            //$cortar_cadena=substr($fila['lugar_sel'], 0, 25);
    ?>
    <tr>
        <td align="center"><?=$i?></td>
        <td align="center"><?=$confirmado_tentativo?></td>
        <td align="center">
          <?php switch($fila['disciplina']){
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
        ?></td>        
        <td align="center"><?php echo utf8_encode($fila['nombre_artista_grupo']); ?></td>
        <td align="center"><?php echo utf8_encode($fila['estado_origen_artista_grupo']); ?></td>
        <td align="center">
         <?php /* , <?=utf8_encode($fila['localidad_foro'])?>, <?=utf8_encode($fila['municipio_alcaldia_foro'])?>, <?=utf8_encode($fila['estado_foro'])*/?>          <?php echo utf8_encode($fila['nombre_present_o_servicio']); ?></td>
        <td align="center"><?php //utf8_encode($cortar_cadena)
        $lugar_sel=$fila['lugar_sel'];
               //(INICIO) muestre las opciones si quiere elegir otra
               $query="SELECT id_lugares, Nombreforo FROM `mas_lugares` where clave_usuario='".$cve_user."'";
               $result = mysqli_query($con, $query);
                     while($renglon = mysqli_fetch_array($result))
                     { 
                           $valor=$renglon['id_lugares'];
                           $imp_texto=$renglon['Nombreforo'];
                        if($lugar_sel==$valor){ echo utf8_encode($imp_texto); }
                    }
                 //(INICIO) imprime los valoes de la tabla de 'proyecto'
                      //A (INICIO) 
                        $query_lug="SELECT Nombreforo_a 
                        FROM `proyecto` where clave_usuario='".$cve_user."'";
                        $result_lug = mysqli_query($con, $query_lug);
                        $renglon_luga = mysqli_fetch_array($result_lug);
                               $Nombreforo_a=utf8_encode($renglon_luga["Nombreforo_a"]);
                          
                           if (!empty($Nombreforo_a)){
                             if ($lugar_sel==100){ echo $Nombreforo_a;  }
                          }
                          //A (FIN)
                          
                          //B (INICIO)
                          $query_lugb="SELECT Nombreforo_b
                          FROM `proyecto` where clave_usuario='".$cve_user."'";
                          $result_lugb = mysqli_query($con, $query_lugb);
                          $renglon_lugb = mysqli_fetch_array($result_lugb);
                               $Nombreforo_b=utf8_encode($renglon_lugb["Nombreforo_b"]);
                           if (!empty($Nombreforo_b)){
                               
                                if ($lugar_sel==200){ echo $Nombreforo_b; } 
                          }
                          //B (FIN)

                          //C (INICIO)
                          $query_lugc="SELECT Nombreforo_c
                          FROM `proyecto` where clave_usuario='".$cve_user."'";
                          $result_lugc = mysqli_query($con, $query_lugc);
                          $renglon_lugc = mysqli_fetch_array($result_lugc);
                               $Nombreforo_c=utf8_encode($renglon_lugc["Nombreforo_c"]);
                        
                         if (!empty($Nombreforo_c)){
                          if ($lugar_sel==300){ echo $Nombreforo_c;  }
                                }
                          //C (FIN)
              //(FIN) muestre las opciones si quiere elegir otra               
              //(FIN) imprime los valoes de la tabla de 'proyecto'
                if ($lugar_sel==500){ echo "En todas las anteriores"; }
        ?>
        </td>
        <td align="center"><?=$fila['fecha_presentacion']?></td>
        <td align="center"><?=$fila['horario']?></td>
        <td align="center"><?=$fila['num_participantes_por_grupo']?></td>
        <td align="center"><?=utf8_encode($fila['nombre_representante_fiscal_artista_grupo'])?></td>
        <td align="center"><?php echo "<a href=\"$links\" target=\"_blank\">link</a>"; ?></td>
        <td align="center"><?php
        if ($fila['duracion_espectaculo_propuesto']=='mas 2 semanas'){
          echo '+ 2 semanas';
        } else {
          echo utf8_encode($fila['duracion_espectaculo_propuesto']);
        }
        ?></td>
        <td align="right">$<?=number_format($monto_honorarios,2,'.',',')?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="13" align="right">Total General</td>
        <td align="right">$<?=number_format($total_general,2,'.',',')?></td>
    </tr>
    <tr>
        <td colspan="13" align="right">Progrmación confirmada</td>
        <td align="right"><?=number_format($prog_confirmada,0,'','')?>%</td>
    </tr>
</table>
<?php 
        $query2 = "SELECT nombre_titular FROM usuarios WHERE clave_usuario='".$cve_user."';";                          
        $exe_query2 =  mysqli_query($con, $query2);
        $fila2=mysqli_fetch_array($exe_query2, MYSQLI_ASSOC);
?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="40">&nbsp;</td>
    <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
        <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
  </tr>
</table>
<?php //}
/*<li class="active"><a href="#tab-01">Datos de los participantes</a></li>
              <li><a href="#tab-02">Servicios de traducción y subtitulaje</a></li>
              <li><a href="#tab-03">Plataformas digitales</a></li>
              <li><a href="#tab-04">Pago de derechos y seguros</a></li>
              <?php if($sel_disciplina_artes_visuales_v2==",5"){?>
              <li><a href="#tab-05">Reque. de montaje de obra</a></li>
              <?php } ?>
              <?php if($sel_disciplina_gastronomia_v2==",6"){?>
              <li><a href="#tab-06">Insumos gastronómicos</a></li>
              <?php } ?>
              <?php if($sel_disciplina_cinematografia_v3==",7"){?>
              <li><a href="#tab-07">Paquetería</a></li>
              <?php } ?>
*/
/*if($clave1!='' or $clave2!=''){ //INICIO 1, 2  Arrendamiento espacios, arrendamientos escenarios
?>
<div style="page-break-after:always;"></div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura.png" width="210px"></td>
    <td width="350" rowspan="4">&nbsp;</td>
    <td width="230"align="right">PRESUPUESTO</td>
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
    <td width="85">&nbsp;</td>
    <td>Nombre del Festival:</td>
    <td><u><?=$nombre_festival?></u></td>
  </tr>
</table>
<br>
<table border="0" width="100%">
    <tr>
    <td valign="top">
    <table border="1" cellpadding="0" cellspacing="0" align="center">
      <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="5" align="center">Arrendamiento de espacios, muebles e inmuebles</td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Días a utilizar</td>
        <td align="center">Costo con impuestos incluidos(M.N.)</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
      </tr>
      <?php
        $query_user_1="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 1;";                          
        $res_user_1 =  mysqli_query($con, $query_user_1);
        $seleccionado_1 = mysqli_num_rows($res_user_1);
        $h=0;
        if($seleccionado_1>0){
        while($fila_1=mysqli_fetch_array($res_user_1, MYSQLI_ASSOC)){
              $h=$h+1; 
              $total_esp_1=$fila_1['total_esp_mue_inmue'];
       ?>
       <tr>
        <td align="center"><?php echo $h; ?></td>
        <td align="center"><?php echo $fila_1['concepto']; ?></td>
        <td align="center"><?php echo $fila_1['unidad']; ?></td>
        <td align="center"><?php echo $fila_1['dias_a_utilizar']; ?></td>
        <td align="right">$<?php echo number_format($fila_1['costo_unitario_imp_incluidos'],2,'.',','); ?></td>
        <td align="right">$<?php echo number_format($fila_1['monto_tot_imp_incluidos'],2,'.',','); ?></td>
      <?php } ?>
      <tr>
        <td colspan="4" rowspan="2">&nbsp;</td>
        <td align="center">Total</td>
        <td align="right">$<?php echo number_format($total_esp_1,2,'.',','); ?></td>
      </tr>
      <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
    </table>
    </td>
    <td>&nbsp;</td>
    <td valign="top">
    <table border="1" cellpadding="0" cellspacing="0" align="center">
      <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="5" align="center">Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general</td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Días a utilizar</td>
        <td align="center">Costo con impuestos incluidos(M.N.)</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
      </tr>
      <?php
        $query_user2 ="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 2;";                          
        $res_user_2 =  mysqli_query($con, $query_user2);
        $seleccionado_2 = mysqli_num_rows($res_user_2);
        $h=0;
        echo 'seleccionado_2='.$seleccionado_2;
        if($seleccionado_2>0){
        while($fila_2=mysqli_fetch_array($res_user_2, MYSQLI_ASSOC)){
              $h=$h+1; 
              $total_esp_2=$fila_2['total_esp_mue_inmue'];                                  
      ?>
      <tr>
        <td align="center"><?php echo $h; ?></td>
        <td align="center"><?php echo $fila_2['concepto']; ?></td>
        <td align="center"><?php echo $fila_2['unidad']; ?></td>
        <td align="center"><?php echo $fila_2['dias_a_utilizar']; ?></td>
        <td align="right">$<?php echo number_format($fila_2['costo_unitario_imp_incluidos'],2,'.',','); ?></td>
        <td align="right">$<?php echo number_format($fila_2['monto_tot_imp_incluidos'],2,'.',','); ?></td>
      <?php } ?>
      </tr>
      <tr>
        <td colspan="4" rowspan="2">&nbsp;</td>
        <td align="center">Total</td>
        <td align="right">$<?php echo number_format($total_esp_2,2,'.',','); ?></td>
      </tr>
      <tr>
        <td align="center">Total General</td>
        <td align="right">$<?php echo number_format($muestra_suma,2,'.',','); ?></td>
      </tr>
      <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
    </table></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="180" height="40" rowspan="2">&nbsp;</td>
        <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
            <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
        <td width="180" height="40" rowspan="2">&nbsp;</td>
    </tr>
</table>
<?php } //FIN 1, 2  Arrendamiento espacios, arrendamientos escenarios*/
//if($clave3!='' or $clave4!=''){ //INICIO 3, 4 Derechos en general, Seguridad 
?>
    <div style="page-break-after:always;"></div>
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="4"><img src="../../imagenes/logo_cultura_2022.png" width="210px"></td>
        <td width="350" rowspan="4">&nbsp;</td>
        <td width="230"align="right">PRESUPUESTO</td>
      </tr>
      <tr>
        <td align="right">CONVOCATORIA</td>
      </tr>
      <tr>
        <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
      </tr>
      <tr>
        <td align="right">PROFEST 2022</td>
      </tr>
    </table>
    <table border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="85">&nbsp;</td>
        <td>Nombre del Festival:</td>
        <td><u><?=$nombre_festival?></u></td>
      </tr>
    </table>
    <br>
    <table border="0" width="100%">
        <tr>
        <td valign="top">
        <table border="1" cellpadding="0" cellspacing="0" align="center">
          <tr bgcolor="#CCCCCC">
            <td rowspan="2" align="center">No.</td>
            <td colspan="4" align="center">Derechos en general y seguridad</td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="center">Concepto</td>
            <td align="center">Unidad</td>
            <td align="center">Costo</td>
            <td align="center">Monto total impuestos incluidos(M.N.)</td>
          </tr>
          <?php
            $query_user3 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 4;";                          
            $res_user_3 =  mysqli_query($con, $query_user3);
            $seleccionado_3 = mysqli_num_rows($res_user_3);
            $h=0;
            echo 'seleccionado_3='.$seleccionado_2;
            if($seleccionado_3>0){
            while($fila_3=mysqli_fetch_array($res_user_3, MYSQLI_ASSOC)){
                  $h=$h+1; 
                  $costo_unitario_imp_incluidos = $fila_3['costo_unitario_imp_incluidos'];

                  $monto = $fila_3['unidad']*$costo_unitario_imp_incluidos; 

                  $total_esp_3 = $monto+$total_esp_3;                                 
          ?>
          <tr>
            <td align="center"><?php echo $h; ?></td>
            <td align="center"><?php echo utf8_encode($fila_3['concepto']); ?></td>
            <td align="center"><?php echo $fila_3['unidad']; ?></td>
            <td align="center"><?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
            <td align="right">$<?php echo number_format($monto,2,'.',','); ?></td>
          <?php } ?>
          <tr>
            <td colspan="3">&nbsp;</td>
            <td align="center">Total</td>
            <td align="right">$<?php echo number_format($total_esp_3,2,'.',','); ?></td>
          </tr>
          <?php } else { ?>
          <tr>
            <td colspan="6" align="center">No aplica</td>
          </tr>
        <?php } ?>
        </table></td>
        <td>&nbsp;</td>
        <td valign="top">
        <table border="1" cellpadding="0" cellspacing="0" align="center">
          <tr bgcolor="#CCCCCC">
            <td rowspan="2" align="center">No.</td>
            <td colspan="4" align="center">Diseño y/o mantenimiento de plataformas digitales para la transmisión de actividades programadas</td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="center">Concepto</td>
            <td align="center">Unidad</td>
            <td align="center">Costo con impuestos incluidos(M.N.)</td>
            <td align="center">Monto total impuestos incluidos(M.N.)</td>
          </tr>
          <?php
            $query_user4 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 3;";                          
            $res_user_4 =  mysqli_query($con, $query_user4);
            $seleccionado_4 = mysqli_num_rows($res_user_4);
            $h=0;
            echo 'seleccionado_4='.$seleccionado_4;
            if($seleccionado_4>0){
            while($fila_4=mysqli_fetch_array($res_user_4, MYSQLI_ASSOC)){
                  $h=$h+1; 
                  $costo_unitario_imp_incluidos = $fila_4['costo_unitario_imp_incluidos'];
                  $monto = $fila_4['unidad']*$costo_unitario_imp_incluidos; 
                  $total_esp_4 = $monto+$total_esp_4;   
          ?>
          <tr>
            <td align="center"><?php echo $h; ?></td>
            <td align="center"><?php echo utf8_encode($fila_4['concepto']); ?></td>
            <td align="center"><?php echo $fila_4['unidad']; ?></td>
            <td align="right">$<?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
            <td align="right">$<?php echo number_format($monto,2,'.',','); ?></td>
          <?php } ?>
          <tr>
            <td colspan="3">&nbsp;</td>
            <td align="center">Total</td>
            <td align="right">$<?php echo number_format($total_esp_4,2,'.',','); ?></td>
          </tr>
          <?php } else { ?>
          <tr>
            <td colspan="6" align="center">No aplica</td>
          </tr>
        <?php } ?>
        </table></td>
      </tr>
    </table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180" height="40" rowspan="2">&nbsp;</td>
        <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
            <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
        <td width="180" height="40" rowspan="2">&nbsp;</td>
      </tr>
    </table>
<?php 
 //} FIN 3, 4 Derechos en general, Seguridad
/*if($clave5!='' or $clave6!=''){ //INICIO 5,6 Transportación, Servicios de subtitulaje*/ ?>
<div style="page-break-after:always;"></div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura_2022.png" width="210px"></td>
    <td width="350" rowspan="4">&nbsp;</td>
    <td width="230"align="right">PRESUPUESTO</td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA</td>
  </tr>
  <tr>
    <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
  </tr>
  <tr>
    <td align="right">PROFEST 2022</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="85">&nbsp;</td>
    <td>Nombre del Festival:</td>
    <td><u><?=$nombre_festival?></u></td>
  </tr>
</table>
<br>
<table border="0" width="100%">
  <tr>
    <td valign="top">
    <table border="1" cellpadding="0" cellspacing="0" align="center">
      <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="4" align="center">Requerimientos de montaje de obra</td>
        </tr>
      <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Costo unitario con IVA incluido</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
      </tr>
      <?php
        $query_user5="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 5;";                          
        $res_user_5 =  mysqli_query($con, $query_user5);
        $seleccionado_5 = mysqli_num_rows($res_user_5);
        $h=0;
        echo 'seleccionado_5='.$seleccionado_5;
        if($seleccionado_5>0){
        while($fila_5=mysqli_fetch_array($res_user_5, MYSQLI_ASSOC)){
              $h=$h+1; 
              $costo_unitario_imp_incluidos = $fila_5['costo_unitario_imp_incluidos'];
              $monto = $fila_5['unidad']*$costo_unitario_imp_incluidos; 
              $total_esp_5 = $monto+$total_esp_5;                                
      ?>
      <tr>
        <td><?php echo $h; ?></td>
        <td align="center"><?php echo $fila_5['concepto']; ?></td>
        <td align="center"><?php echo $fila_5['unidad']; ?></td>
        <td align="right">$<?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
        <td align="right">$<?php echo number_format($monto,2,'.',','); ?></td>
      <?php } ?>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
        <td align="right">Total General</td>
        <td align="right">$<?php echo number_format($total_esp_5,2,'.',','); ?></td>
      </tr>
      <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
    </table></td>
    <td>&nbsp;</td>
    <td valign="top">
    <table border="1" cellpadding="0" cellspacing="0" align="center">
      <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="4" align="center">Servicios de subtitulaje y traducción</td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Costo unitario con IVA incluidos(M.N.)</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
      </tr>
      <?php
            $query_user6 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 2;";                          
            $res_user_6 =  mysqli_query($con, $query_user6);
            $seleccionado_6 = mysqli_num_rows($res_user_6);
            $h=0;
            //echo 'seleccionado_6='.$seleccionado_6;
            if($seleccionado_6>0){
            while($fila_6=mysqli_fetch_array($res_user_6, MYSQLI_ASSOC)){
                  $h=$h+1; 
                  $total_esp_6=$fila_6['total_esp_mue_inmue']; 
                  $costo_unitario_imp_incluidos = $fila_6['costo_unitario_imp_incluidos'];
                  $unidad6 = $fila_6['unidad'];
                  $monto_servicio = $unidad6*$costo_unitario_imp_incluidos; 
                  $total_esp_6_nuevo = $monto_servicio+$total_esp_6_nuevo;
          ?>
          <tr>
            <td align="center"><?php echo $h; ?></td>
            <td align="center"><?php echo utf8_encode($fila_6['concepto']); ?></td>
            <td align="center"><?php echo $fila_6['unidad']; ?></td>
            <td align="right">$<?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
            <td align="right">$<?php echo number_format($monto_servicio,2,'.',','); ?></td>
          <?php } ?>
          <tr>
            <td colspan="3">&nbsp;</td>
            <td align="right">Total General</td>
            <td align="right">$<?php echo number_format($total_esp_6_nuevo,2,'.',','); ?></td>
      </tr>
    </table>
    <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
    </td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
    <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
        <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
  </tr>
</table>
<?php 
/*} //FIN 5,6 Transportación, Servicios de subtitulaje
if($clave7!=''){ //INICIO 7 Insumos para actividades gastronómicas */?>
<div style="page-break-after:always;"></div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura_2021_pequenio.png" width="210px"></td>
    <td width="350" rowspan="4">&nbsp;</td>
    <td width="230"align="right">PRESUPUESTO</td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA</td>
  </tr>
  <tr>
    <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
  </tr>
  <tr>
    <td align="right">PROFEST 2021</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="85">&nbsp;</td>
    <td width="70">Nombre del Festival:</td>
    <td width="563"><u><?=$nombre_festival?></u></td>
  </tr>
</table>
<br>
<table border="1" cellpadding="0" cellspacing="0" align="center">
    <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="4" align="center">Insumos para actividades gastronómicas(Se sugiere el uso de artículos biodegradables)</td>
    </tr>
    <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Costo con impuestos incluidos(M.N.)</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
    </tr>
    <?php
            $query_user7 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 6;";                          
            $res_user_7 =  mysqli_query($con, $query_user7);
            $seleccionado_7 = mysqli_num_rows($res_user_7);
            $h=0;
            echo 'seleccionado_7='.$seleccionado_7;
            if($seleccionado_7>0){
            while($fila_7=mysqli_fetch_array($res_user_7, MYSQLI_ASSOC)){
                  $h=$h+1; 
                  $costo_unitario_imp_incluidos = $fila_7['costo_unitario_imp_incluidos'];
                  $monto = $fila_7['unidad']*$costo_unitario_imp_incluidos; 
                  $total_esp_7 = $monto+$total_esp_7;
          ?>
          <tr>
            <td align="center"><?php echo $h; ?></td>
            <td align="center"><?php echo $fila_7['concepto']; ?></td>
            <td align="center"><?php echo $fila_7['unidad']; ?></td>
            <td align="right">$<?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
            <td align="right">$<?php echo number_format($monto,2,'.',','); ?></td>
          <?php } ?>
          <tr>
            <td colspan="3">&nbsp;</td>
            <td align="right">Total General</td>
            <td align="right">$<?php echo number_format($total_esp_7,2,'.',','); ?></td>
      </tr>
    <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
    <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
        <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
  </tr>
</table>
<?php 
/*}  //FIN 7 Insumos para actividades gastronómicas
if($clave9!=''){  //INICIO 9 Corte vinil */ ?>
<div style="page-break-after:always;"></div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4"><img src="../../imagenes/logo_cultura_2021_pequenio.png" width="210px"></td>
    <td width="350" rowspan="4">&nbsp;</td>
    <td width="230"align="right">PRESUPUESTO</td>
  </tr>
  <tr>
    <td align="right">CONVOCATORIA</td>
  </tr>
  <tr>
    <td align="right">APOYO A FESTIVALES CULTURALES Y ARTÍSTICOS</td>
  </tr>
  <tr>
    <td align="right">PROFEST 2022</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="85">&nbsp;</td>
    <td width="70">Nombre del Festival:</td>
    <td width="563"><u><?=$nombre_festival?></u></td>
  </tr>
</table>
<br>
<table border="1" cellpadding="0" cellspacing="0" align="center">
    <tr bgcolor="#CCCCCC">
        <td rowspan="2" align="center">No.</td>
        <td colspan="4" align="center">Requerimientos de paquetería</td>
    </tr>
    <tr bgcolor="#CCCCCC">
        <td align="center">Concepto</td>
        <td align="center">Unidad</td>
        <td align="center">Costo con impuestos incluidos(M.N.)</td>
        <td align="center">Monto total impuestos incluidos(M.N.)</td>
    </tr>
    <?php
            $query_user9 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 7;";                          
            $res_user_9 =  mysqli_query($con, $query_user9);
            $seleccionado_9 = mysqli_num_rows($res_user_9);
            $h=0;
            echo 'seleccionado_9='.$seleccionado_9;
            if($seleccionado_9>0){
            while($fila_9=mysqli_fetch_array($res_user_9, MYSQLI_ASSOC)){
                  $h=$h+1; 
                  $costo_unitario_imp_incluidos = $fila_9['costo_unitario_imp_incluidos'];
                  $monto = $fila_9['unidad']*$costo_unitario_imp_incluidos; 
                  $total_esp_9 = $monto+$total_esp_9;                                  
          ?>
          <tr>
            <td align="center"><?php echo $h; ?></td>
            <td align="center"><?php echo $fila_9['concepto']; ?></td>
            <td align="center"><?php echo $fila_9['unidad']; ?></td>
            <td align="right">$<?php echo number_format($costo_unitario_imp_incluidos,2,'.',','); ?></td>
            <td align="right">$<?php echo number_format($monto,2,'.',','); ?></td>
          <?php } ?>
          <tr>
            <td colspan="3">&nbsp;</td>
            <td align="right">Total General</td>
            <td align="right">$<?php echo number_format($total_esp_9,2,'.',','); ?></td>
      </tr>
      <?php } else { ?>
      <tr>
        <td colspan="6" align="center">No aplica</td>
      </tr>
    <?php } ?>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="30">&nbsp;</td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
    <td width="367" height="40" align="center" valign="bottom"><u><?=utf8_encode($fila2['nombre_titular'])?></u>
        <br>Nombre y firma de la o el Titular de la Instancia Postulante</td>
    <td width="180" height="40" rowspan="2">&nbsp;</td>
  </tr>
</table>
<?php //} //FIN 9 Corte vinil*/
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->set_paper('letter', 'landscape');
$dompdf->load_html(ob_get_clean());
$dompdf->render();

$pdf = $dompdf->output();
$filename = "Presupuesto_programacion.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

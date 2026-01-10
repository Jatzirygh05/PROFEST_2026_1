<div class="row">
                          <div class="col-md-12"> 
                            <div id="formulario">
                              <!--form method="post" id="formdata"-->
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group clearfix">   
                                    <div class="pull-left text-muted text-vertical-align-button"></div>
                                      <div class="pull-right">
                                        <input class="btn btn-default" type="button" id="botonenviar" value="Guardar">
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                      <div class="table table-responsive">

                       <table class="table-responsive">
                       <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>#</td>
                        <!-- 20122024 td>Tipo de gasto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td-->
                        <td>Concepto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                        <!-- 20122024 td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td-->
                        <td>Monto total con impuestos incluidos (M.N.)<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
                      </tr>
                      <tr>
                      <?php
                        $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' order by consec;";                          
                        $res_user2 = mysqli_query($con, $query_user2);
                        $cuantos=mysqli_num_rows($res_user2);
                        $h=0;
                        $Concepto_gasto=0;
                        while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                            $h=$h+1;
                            $id     = $fila2['id'];
                            //$tipogasto = $fila2['tipogasto'];
                            $concepto = $fila2['concepto'];
                            //$unidad   = $fila2['unidad'];
                            $monto_tot_imp_incluidos = $fila2['monto_tot_imp_incluidos'];
                            $monto_tot_imp_incluidos1  =  number_format($monto_tot_imp_incluidos, 2, '.', '');

                            $total_esp_mue_inmue1  =  $monto_tot_imp_incluidos + $total_esp_mue_inmue1;
                            $total_esp_tra_1  =  number_format($total_esp_mue_inmue1, 2, '.', '');
                      ?>
                        <td><?php echo $h; ?><input type="hidden" name="id" id="id" value="<?=$id?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        </td>
                        <td>
                            <input class='form-control' name='conceptos' id='conceptos' value="<?php echo $concepto; ?>" onkeypress="return soloLetras(event)" >
                        </td>
                        <td>
      <input class="form-control" id="monto_tot" name="monto_tot" value="<?php echo $monto_tot_imp_incluidos1; ?>" placeholder="0.00" type="number" onblur="suma_vertical(<?php echo $h; ?>, <?php echo $id; ?>);">
                        </td>
                         <td></td>
                      </tr>
                    <?php
                           }
                    $cuantos = $cuantos+1;
                     /*for($i=$cuantos;$i<=50;$i++){*/

                for($i=$cuantos;$i<=50;$i++){ 
                    $rs = "SELECT MAX(consec) AS id FROM reque_v2_1_2 where clave_usuario='".$cve_user."' order by consec";
                         $rs1= mysqli_query($con, $rs);
                          if ($row = mysqli_fetch_row($rs1)) {
                          $id_OBTENIDO = trim($row[12]);
                          }
                          $seguido = $id_OBTENIDO+$i;
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <input class='form-control' name='conceptos__<?php echo $seguido; ?>' id='conceptos__<?php echo $seguido; ?>' onkeypress="return soloLetras(event)">
                        </td>
                        <td>
                        <input class="form-control" id="monto_tot__<?php echo $i; ?>" name="monto_tot__<?php echo $i?>" placeholder="0.00" type="text"  onblur="suma_vertical(<?php echo $i; ?>);">
                        </td>
                      </tr>
                      <?php } ?>
                      <tr>
                          <?php include_once('funciones_obtener_valores_2022.php'); ?>
                       
                        <td colspan="2" align="right">Subtotal:</td>
                        <td><input type="text" class="form-control" name="total_esp_tra" id="total_esp_tra" value="<?php echo $total_esp_tra_1; ?>" placeholder="0.00" readonly>
                        </td>
                      </tr>
                   
                    </table>
                    </div>
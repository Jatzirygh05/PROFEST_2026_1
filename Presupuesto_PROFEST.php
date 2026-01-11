<script type="text/javascript" src="js/suma_montos_pestanas_traduccion_v3.js"></script>
<script type="text/javascript" src="js/soloLetras.js"></script>
<div class="row">
    <div class="col-md-12"> 
        <div id="formulariop">
            <div class="row">
                <div class="col-md-12"> 
                            <h3>Presupuesto PROFEST</h3>
                                         
                            
                            <div class="row">
                                <div class="col-sm-4">
                                <strong>Monto solicitado a la Secretaría de Cultura:</strong>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="total_2" id="total_2" value="<?php echo $Infor_finan_apoyo_monto; ?>" readonly>
                                    </div>
                                </div>
                             </div>  
                            <div class="row">
                                <div class="col-sm-12">
                                <br>
                                <p>Usa este apartado únicamente para detallar la distribución del recurso solicitado a la Secretaría de Cultura. La suma total de los conceptos registrados deberá ser igual a la cantidad capturada en el apartado de <strong>Monto solicitado a la Secretaría de Cultura</strong>, que figura en la pestaña de Categoría y costo del proyecto.</p>
                                <p>Te invitamos a consultar el apartado de Características de los recursos de la Convocatoria, para conocer los conceptos en los que puede destinarse el recurso PROFEST, según la disciplina de tu proyecto.</p>
                                <p>Todos los gastos deberán contemplar el pago de impuestos.</p>
                                <p><strong>NOTA: En caso de que el proyecto sea beneficiado, los conceptos y montos aquí registrados deberán adecuarse a lo establecido en cuanto al uso del recurso, descrito en las Reglas de Operación</strong></p>
                               </div>  
                            </div>        
                <!--div class="col-md-12">
                   div class="row " id="rowError1" name="rowError1" style="display:none">
              <div class="col-md-12">
                  <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada,<br>
                  * Todos los campos son obligatorios.</div>
              </div>
            </div>
            <div class="row " id="rowBien1" name="rowBien1" style="display:none">
                <div class="col-md-12">
                  <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta.</div>
                </div>
            </div-->
            <div class="row">
            <br>
                <div class="col-md-12"><hr class="red small-margin"></div>
            </div>
                    <div class="form-group clearfix">   
                        <div class="pull-left text-muted text-vertical-align-button"></div>
                            <div class="pull-right">
                                <input class="btn btn-default" type="button" id="botonenviarp" value="Guardar">
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
                        <td><?php echo $h; ?><input type="hidden" name="id<?php echo $h; ?>" id="id<?php echo $h; ?>" value="<?=$id?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        </td>
                        <td>
                            <input class='form-control' name='conceptos<?php echo $h; ?>' id='conceptos<?php echo $h; ?>' value="<?php echo $concepto; ?>" onkeypress="return soloLetras(event)" >
                        </td>
                        <td>
      <input class="form-control" id="monto_tot<?php echo $h; ?>" name="monto_tot<?php echo $h; ?>" value="<?php echo $monto_tot_imp_incluidos1; ?>" placeholder="0.00" type="number" onblur="suma_vertical(<?php echo $h; ?>);">
                        </td>
                         <td></td>
                      </tr>
                    <?php
                           }
                    $cuantos = $cuantos+1;
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
                          <input class='form-control' name='conceptos<?php echo $seguido; ?>' id='conceptos<?php echo $seguido; ?>' onkeypress="return soloLetras(event)">
                        </td>
                        <td>
                        <input class="form-control" id="monto_tot<?php echo $i; ?>" name="monto_tot<?php echo $i?>" placeholder="0.00" type="text"  onblur="suma_vertical(<?php echo $i; ?>);">
                        </td>
                      </tr>
                      <?php } ?>
                      <tr>
                          <?php //include_once('funciones_obtener_valores_presup_PROFEST.php'); ?>
                       
                <td colspan="2" align="right">Subtotal:</td>
                <td><input type="text" class="form-control" name="total_esp_tra" id="total_esp_tra" value="<?php echo $total_esp_tra_1; ?>" placeholder="0.00" readonly>
                </td>
            </tr>
       </table>
    </div>
</div>
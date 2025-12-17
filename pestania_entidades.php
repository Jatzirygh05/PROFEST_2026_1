        <!-- inicio Entidad(es) -->
        <div class="row">
          <div class="col-md-8"> 
            <h3>Entidad(es) donde se planea la realización del proyecto</h3>
          </div>
            <div class="col-md-12"><hr class="red small-margin"></div>
        </div>
        <div class="form-group">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Entidad</th>
              </tr>
            </thead>
            <?php for($f=1;$f<=10;$f++){ ?>
              <tbody>
                <tr>
                  <th scope="row">
                    <?php
                      echo $f;
                      $entidades_a=${'entidades_a'.$f};
                      if($f<=1){ ?>
                        <samp id="errentidades_a<?=$f?>As" name="errentidades_a<?=$f?>As" class="control-label">*</samp><?php } ?>
                  </th>
                  <td> 
                    <select id="entidades_a<?=$f?>" name="entidades_a<?=$f?>" class="form-control proyectocampo">
                      <option value="" selected="selected">Selecciona una opción</option>
                        <?php 
                            $sql_consulta_ent = "SELECT * FROM `entidades`"; 
                            $resultado_consulta_ent = mysqli_query($con, $sql_consulta_ent);
                            $num_resultado_consulta_ent = mysqli_num_rows($resultado_consulta_ent);
                            for ($m2=0; $m2 <$num_resultado_consulta_ent; $m2++){
                                $row_proy_ent2 = mysqli_fetch_array($resultado_consulta_ent, MYSQLI_ASSOC);
                                $id_entidad_proyecto_origen  = $row_proy_ent2["id_entidad_proyecto"];
                                $nombre_entidad_proyecto  = $row_proy_ent2["nombre_entidad_proyecto"];
                        ?>
                      <option value=<?php echo $id_entidad_proyecto_origen; ?> <?php if($id_entidad_proyecto_origen==$entidades_a){ ?> selected="selected" <?php } ?>><?php echo  $nombre_entidad_proyecto; ?></option>
                    <?php } ?>
                  </select>
                  <small id="errentidades_a<?=$f?>" name="errentidades_a<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
      <!-- fin Entidad(es) -->
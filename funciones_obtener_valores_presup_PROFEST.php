<?php
  function arraysuma_resumenpresup($con, $cve_user){
    $query_imp_p="SELECT monto_tot_imp_incluidos FROM reque_v2_1_2 
                    WHERE clave_usuario='".$cve_user."'";
    $res_query_imp_p = mysqli_query($con, $query_imp_p);
        while($row_query_imp_p=mysqli_fetch_array($res_query_imp_p, MYSQLI_ASSOC)){
              $monto_tot_imp_incluidos=$row_query_imp_p['monto_tot_imp_incluidos'];
    } 
        return array($monto_tot_imp_incluidos);
}
$result_presupPROFEST = arraysuma_resumenpresup($con, $cve_user);
?>
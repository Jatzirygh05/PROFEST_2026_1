<?php require_once('Connections/conexion.php');  
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
foreach($_POST as $k => $v)
	{
		${$k}=$_POST[$k];
	}


$total_esp_tra = $_POST['total_esp_tra'];

'<?xml version="1.0"?>';
'<root>';
$query_user2="SELECT * FROM `reque_v2_1_2` WHERE clave_usuario='".$cve_user."';";
$res_user2 =  mysqli_query($con, $query_user2);
$cuantos=mysqli_num_rows($res_user2);

$cuantos_mod = $cuantos;

for($i=1;$i<=$cuantos_mod;$i++){
	$id_a=${'id'.$i};
	$conceptos_a=${'conceptos'.$i};
  	$monto_tot_a=${'monto_tot'.$i};
	
	$query_b="UPDATE reque_v2_1_2 SET 
			concepto	=	'$conceptos_a',
			monto_tot_imp_incluidos	=	'$monto_tot_a',
			fecha_hora_registro=NOW()
			WHERE clave_usuario LIKE '".$cve_user."' && id = '".$id_a."';";
	$mod=mysqli_query($con, $query_b);
}
//if($mod) echo $res_paso=2;

$cuantos_agrega=$cuantos_mod+1;
for($a=$cuantos_agrega;$a<=50;$a++){
	$conceptos_b=${'conceptos'.$a};
    $monto_tot_b=${'monto_tot'.$a};
	if($conceptos_b!='' && $monto_tot_b!='')
	{
		$query_c = "INSERT INTO reque_v2_1_2 
		(id, clave_usuario, concepto, monto_tot_imp_incluidos, fecha_hora_registro)
		VALUES
		(NULL, '$cve_user', '$conceptos_b', '$monto_tot_b', NOW());";
		$mod_c = mysqli_query($con, $query_c);		
	}
	
}	
if ($mod) {
	echo $res_pasop=1;
	//echo $res_pasop=$query_b;

}elseif ($mod_c) {
	echo $res_pasop=1;
	//echo $res_pasop=$query_c;
}
'</root>';
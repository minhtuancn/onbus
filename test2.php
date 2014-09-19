<?php 
include "defined.php";
require_once 'backend/model/Home.php';
$model = new Home;
$sql = "SELECT * FROM rating_detail WHERE nhaxe_id = 19 AND status = 1";
$rs = mysql_query($sql);
$totalRow = mysql_num_rows($rs);
$terrible = $poor = $average = $good = $excel = 0 ; 
$total1 = $total2 = $total3 = $total4 = $diemTB = 0; 
while($row = mysql_fetch_assoc($rs)){
	
	$total1 += $row['point1'];
	$total2 += $row['point2'];
	$total3 += $row['point3'];
	$total4 += $row['point4'];

	$totalDiem = $row['point1'] + 	$row['point2'] + $row['point3'] + $row['point4'];
	$diemTB = $totalDiem/5;
	if($diemTB >= 1 && $diemTB < 2){
		$terrible++;
	}elseif($diemTB >= 2 && $diemTB < 3){
		$poor++;
	}elseif($diemTB >= 3 && $diemTB < 4){
		$average++;
	}elseif($diemTB >= 4 && $diemTB <= 4.5){
		$good++;
	}else{
		$excel++;
	}
}
$sao1 = $total1/$totalRow;
$sao2 = $total2/$totalRow;
$sao3 = $total3/$totalRow;
$sao4 = $total4/$totalRow;
$sao5 = $total5/$totalRow;

$sao1 = tinhsao(round($total1/$totalRow,1));
$sao2 = tinhsao(round($total2/$totalRow,1));
$sao3 = tinhsao(round($total3/$totalRow,1));
$sao4 = tinhsao(round($total4/$totalRow,1));
$sao5 = tinhsao(round($total5/$totalRow,1));

$arrReturn['terrible']['vote'] = $terrible;
$arrReturn['terrible']['percent'] = round($terrible*100/$totalRow);

$arrReturn['poor']['vote'] = $poor;
$arrReturn['poor']['percent'] = round($poor*100/$totalRow);

$arrReturn['average']['vote'] = $average;
$arrReturn['average']['percent'] = round($average*100/$totalRow);

$arrReturn['good']['vote'] = $good;
$arrReturn['good']['percent'] = round($good*100/$totalRow);

$arrReturn['excel']['vote'] = $excel;
$arrReturn['excel']['percent'] = round($excel*100/$totalRow);
$arrReturn['sao'][1] = $sao1;
$arrReturn['sao'][2] = $sao2;
$arrReturn['sao'][3] = $sao3;
$arrReturn['sao'][4] = $sao4;
$arrReturn['sao'][5] = $sao5;
$arrReturn['total'] = $totalRow;

var_dump("<pre>",$arrReturn);
function tinhsao($val){
	if($val<5 && $val >=4.5) $val = 4.5;
	elseif($val >4 && $val <4.5) $val = 4;
	elseif($val <4 && $val >=3.5) $val = 3.5;
	elseif($val >3 && $val <3.5) $val = 3;
	elseif($val <3 && $val >=2.5) $val = 2.5;
	elseif($val >2 && $val <2.5) $val = 2;
	elseif($val <2 && $val >=1.5) $val = 1.5;
	elseif($val >1 && $val <1.5) $val = 1;
	elseif($val <1 && $val >=0.5) $val = 0.5;
	elseif($val >0 && $val <0.5) $val = 0;
	return $val;
}
?>
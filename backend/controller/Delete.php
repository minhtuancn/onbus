<?php 

if(!isset($_SESSION)) 

{ 

    session_start(); 

}  

$url = "../index.php?mod=place&act=list";



require_once "../model/Db.php";



$model = new Db;







$id = (int) $_POST['id'];



$mod = $_POST['mod'];



if($mod=='place'){



    $pk = 'place_id';



}elseif($mod =='time_start'){



    $pk = 'time_id';



}elseif($mod=='route'){



	$pk = 'route_id';



}elseif($mod=='services'){



	$pk = 'service_id';



}



elseif($mod=='tinh'){



	$pk = 'tinh_id';



}



elseif($mod=='nhaxe'){



	$pk = 'nhaxe_id';



}



elseif($mod=='image'){



	$pk = 'image_id';



}



elseif($mod=='branch'){



	$pk = 'branch_id';



}



elseif($mod=='ticket'){



	$pk = 'ticket_id';



}



elseif($mod=='car_type'){



	$pk = 'type_id';



}

elseif($mod=='articles'){



	$pk = 'article_id';



}

elseif($mod=='users'){



	$pk = 'user_id';



}
elseif($mod=='page'){



	$pk = 'page_id';



}
elseif($mod=='troute'){



	$pk = 'troute_id';



}



$time = time();

$user_id = $_SESSION['user_id'];

$sql = "UPDATE ".$mod."



                    SET status = 0,                 



                    update_time =  $time,

                    user_id = $user_id         



                    WHERE ".$pk." = ".$id;

                  if($mod=="troute"){
                  	$sql = "UPDATE ".$mod."



                    SET status = 0

                       



                    WHERE ".$pk." = ".$id;
                  }  



mysql_query($sql) or die(mysql_error() . $sql);



?>
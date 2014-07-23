<?php
$allowedExts = array("jpg", "jpeg", "gif", "png");
$arrRes['text'] = "<div><ul>";
$strHinhAnh = "";

if(!is_dir("../../upload/".date('Y')."/".date('m')."/".date('d')."/".time().'/'))
mkdir("../../upload/".date('Y')."/".date('m')."/".date('d')."/".time().'/',0777,true);

$url = "../../upload/".date('Y')."/".date('m')."/".date('d')."/".time().'/';

for($i=0;$i<count($_FILES['images']['name']);$i++){
	$extension = end(explode(".", $_FILES["images"]["name"][$i]));
	if ((($_FILES["images"]["type"][$i] == "image/gif") || ($_FILES["images"]["type"][$i] == "image/jpeg") || ($_FILES["images"]["type"][$i] == "image/png")
	|| ($_FILES["images"]["type"][$i] == "image/jpeg"))	
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["images"]["error"][$i] > 0)
		{
		//echo "Return Code: " . $_FILES["images"]["error"][$i] . "<br />";
		}
	  else
		{		
	
		if (file_exists($url. $_FILES["images"]["name"][$i]))
		  {
		  //echo $_FILES["images"]["name"][$i] . " đã tồn tại. "."<br />";		 
		  }
		else
		  {
		  if(move_uploaded_file($_FILES["images"]["tmp_name"][$i],
		  $url. $_FILES["images"]["name"][$i])==true){			
		  	$count++;
			$strHinhAnh.= str_replace("../","",$url). $_FILES["images"]["name"][$i].";";
			$arrRes['text'] .="<li style='float:left;display:inline;margin-right:10px;text-align:center'>				
				<img src='"."../".str_replace("../","",$url). $_FILES["images"]["name"][$i]."' width='150' /><br />				
				</li>";
			
		  }
		  }
		}
		
	  }
	  
	  $arrRes['text'].="</ul></div>";
}

if($count>0){
	$strHinhAnh= substr($strHinhAnh,0,-1);
	$arrRes['thongbao'] = "Upload thành công $count images";
	$arrRes['str_hinhanh']="<input type='hidden' id='str_hinh_anh' name='str_hinh_anh' value='".$strHinhAnh."'>";
}else{
	$arrRes['thongbao'] = "Có lỗi xảy ra ! Không upload được file .";
}
echo json_encode($arrRes);
?>
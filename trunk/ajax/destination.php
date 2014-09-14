<?php 
if(!isset($_SESSION)){
  session_start();
}
$lang = $_SESSION['lang'];
require_once "../backend/model/Route.php";
$model = new Route();
$type = (int) $_POST['type'];
$vstart = (int) $_POST['vstart'];
$arrResult = $model->getEndByStartID($vstart);
if($type==1){  
  if(!empty($arrResult)){
    foreach ($arrResult as $key => $value) {      
        if($value['mien_id']==1){
          $arrTinh_Nam[] = $value;
        }elseif($value['mien_id']==2){
          $arrTinh_Trung[] = $value;
        }else{
          $arrTinh_Bac[] = $value;
        }
    }
  }
?>
<?php 
  $miennam = $lang=="vi" ? "Miền Nam":"Southern"; 
  $mientrung =  $lang=="vi" ? "Miền Trung - Tây Nguyên":"Midland & Highland"; 
  $mienbac =  $lang=="vi" ? "Miền Bắc":"Northern"; 
?>
<?php 

$str1 ='<div class="inner rel-pos">
    <a id="closeDept" class="close" href="javascript:;">Đóng</a>
    <div class="region-col first fl-l clearfix">
        <h3>'.$miennam.'</h3>
        <ul class="city-list fl-l">';
       if(!empty($arrTinh_Nam)){
          $i = 0;
          foreach ($arrTinh_Nam as $value) {
            $i++;
            $str = ($value["hot"]==1) ? "<strong>".$value["tinh_name_".$lang]."</strong>" : $value["tinh_name_".$lang];
            
            $str1.='<li class="city"><a href="javascript:;" data-state="'.$value["tinh_id"].'">'.$str.'</a></li>';
            
              if($i==12){
                $str1.='</ul><ul class="city-list fl-l">';
              }
          }
                                   
        
         }else{ $str1.='<li class="city">&nbsp;</li>';}   
        $str1.='</ul>'; 
    $str1.='</div>

    <div class="region-col fl-l clearfix">
        <h3>'.$mientrung.'</h3>
        <ul class="city-list fl-l">'; 
        if(!empty($arrTinh_Trung)){
          $i = 0;
          foreach ($arrTinh_Trung as $value) {
            $i++;
            $str = ($value["hot"]==1) ? "<strong>".$value["tinh_name_".$lang]."</strong>" : $value["tinh_name_".$lang];
            
            $str1.='<li class="city"><a href="javascript:;" data-state="'.$value["tinh_id"].'">'.$str.'</a></li>';
            
              if($i==12){
                $str1.='</ul><ul class="city-list fl-l">';
              }
          }
            }else{ $str1.='<li class="city">&nbsp;</li>';}   
        $str1.='</ul></div><div class="region-col last fl-l clearfix">
        <h3>'.$mienbac.'</h3>
        <ul class="city-list fl-l">';       
        
         if(!empty($arrTinh_Bac)){
          $i = 0;
          foreach ($arrTinh_Bac as $value) {
            $i++;
            $str = ($value["hot"]==1) ? "<strong>".$value["tinh_name_".$lang]."</strong>" : $value["tinh_name_".$lang];
            
            $str1.='<li class="city"><a href="javascript:;" data-state="'.$value["tinh_id"].'">'.$str.'</a></li>';
            
              if($i==12){
                $str1.='</ul><ul class="city-list fl-l">';
              }
          }
            }else{ $str1.='<li class="city">&nbsp;</li>';}                                         
          $str1.='</ul>       
    </div>
</div><script type="text/javascript" src="themes/js/city.js"></script>';
?>

<?php }elseif($type==2){
  $str1 ='<div class="inner rel-pos">
    <div class="region-col first left clearfix">
    <ul class="city-list left">';        
       if(!empty($arrResult)){
          
          foreach ($arrResult as $value) {
          
            $str = ($value["hot"]==1) ? "<strong>".$value["tinh_name_".$lang]."</strong>" : $value["tinh_name_".$lang];
            
            $str1.='<li class="city2"><a href="javascript:;" data-state="'.$value["tinh_id"].'">'.$str.'</a></li>';            
              
          }
         }                                         
         $str1.='</ul>       
    </div>
</div><script type="text/javascript" src="themes/js/city.js"></script>';
}else{
$str1='<script>var statecity2 = [';
         
foreach ($arrResult as $value) {
    $str1.='{';
    
            $str1.='value: '.json_encode($value["tinh_name_".$lang]).',';
            $str1.='StateId: '.$value["tinh_id"].',';           
            $str1.='label: '.json_encode($value["tinh_name_".$lang]);            
     $str1.='}';
$str1.=',';
        }

        
  
$str1.="];</script>";

 } 

$arrReturn['str1'] = $str1;
echo json_encode($arrReturn);
?> 


<?php 
$lang = "vi";
require_once "../backend/model/Route.php";
$model = new Route();
$type = (int) $_POST['type'];
$vstart = (int) $_POST['vstart'];
if($type==1){
  $arrResult = $model->getEndByStartID($vstart);  
?>
<?php 
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
</div><script type="text/javascript" src="themes/js/city2.js"></script>';
?>

<?php }else{ ?>


<?php } 

$arrReturn['str1'] = $str1;
echo json_encode($arrReturn);
?> 


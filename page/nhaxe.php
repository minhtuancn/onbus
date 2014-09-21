<?php 
$arrNhaxe = $model->getListNhaxe("",-1,-1,-1);
?>
<div class="page_profile">
            <div class="block_search_nhaxe">
                <input type="text" id="txtSearch" placeholder="{timkiemnhaxe}..." class="form-control">
                <input type="button" id="btn_search_nhaxe" value="">
            </div>
            <div class="clear"></div>
            <ul class="list_box" id="rs_nhaxe">
                <?php foreach ($arrNhaxe['data'] as $xe) {
                  $img = (strlen($xe['thumbnail_url']) > 10) ? $xe['thumbnail_url'] :  STATIC_URL."/images/bus-2.jpg"; 
                ?>
                <li>
                    <a class="wrap_img" href="<?php echo $lang;?>/chi-tiet-nha-xe-<?php echo $xe['nhaxe_name_safe_vi']; ?>.html"><img src="<?php echo $img; ?>"><span class="arrow_pic"></span></a>
                    <h2><?php echo $xe['nhaxe_name_'.$lang]; ?></h2>
                    <div class="rate sprite-rating_s rating_s">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                </li>
                <?php } ?>
                
            </ul>
          
            <div class="clear"></div>
        </div>

<script type="text/javascript">
$(function(){
    $("#txtSearch").keyup(function() {
      var keyword = $.trim($(this).val());
      
        $.ajax({
            url: "ajax/bus.php",
            type: "POST",
            async: false,                             
            data: {"keyword":keyword},
            success: function(data){                    
                $("#rs_nhaxe").html(data);
            }
        });
      
    });
});
</script>        
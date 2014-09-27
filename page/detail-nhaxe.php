<?php 
$arrImage = $model->getListImageByNhaxe($nhaxe_id,-1,-1);
$row = mysql_fetch_assoc($arrImage);
$arrRating = $model->rating($nhaxe_id);
$totalSaoNhaxe = $arrRating['sao'][1] +  $arrRating['sao'][2] + $arrRating['sao'][3] + $arrRating['sao'][4];
$saoTB = $model->tinhsao(round($totalSaoNhaxe/4,1));
$arrDiem = array(0,1,2,3,4,5);  
?>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jssor.core.js"></script>
<div class="detail-nhaxe">
        	<div class="header_top">
        	<div id="holiday-product-left-top">
            	<div class="rate sprite-rating_s rating_s">
                    <?php $tmpN = $saoTB - 0.5;
                        if(in_array($tmpN,$arrDiem)){
                            $chanN = $tmpN;
                            $leN = 1;
                        }else{
                            $chanN=$saoTB;
                        }
                     ?>
                    <?php for($i=0;$i<$chanN;$i++){ ?>
                    <span></span>
                    <?php } ?>
                    <?php if($leN==1) {?>
                    <span class="part_icon_rating"></span>
                    <?php } ?>
                </div>
                <h1><?php echo $row_nhaxe['nhaxe_name_'.$lang]; ?></h1>
                <div style="text-align:justify">
                    <?php echo $row_nhaxe['description_'.$lang]; ?>        
                </div>
                
            </div>
            <div id="holiday-product-right-top">
                <div id="holiday-product-right-image">
                	<?php 
                    if(strlen($row_nhaxe['thumbnail_url'])>10) {?>
                        <img src="<?php echo $row_nhaxe['thumbnail_url']; ?>">
                    <?php }else{ ?>
                    <img src="<?php echo STATIC_URL;?>/images/1.jpg">
                    <?php } ?>
               </div>
            </div>
            <div class="clear"></div>
            </div>
            <div class="tab_profile">
            	<ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#danhgia" role="tab" data-toggle="tab">{danhgia}</a></li>
                  <li><a href="#hinhanh" role="tab" data-toggle="tab">{hinhanh}</a></li>
                  <li><a href="#tuyenphobien" role="tab" data-toggle="tab">{cactuyenphobien}</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="danhgia">
                  
                  	<div class="left col_review">
                    	<h3><?php echo number_format($arrRating['total']); ?> {danhanxet}</h3>
                        <div class="content wrap trip_type_layout">
                        	<div class="composite">
                                <div class="colTitle">{tuhanhkhach}</div>
                                    <ul class="barChart">
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label class=" selected" for="com1"><span class="text"></span></label>
                                            </span>
                                            <div class="line clickable"><div class="fill" style="width:<?php echo isset($arrRating['excel']['percent']) ? $arrRating['excel']['percent'] : "0" ; ?>%"></div></div>
                                            <span class="compositeCount selected"><?php echo number_format($arrRating['excel']['vote']); ?></span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label class=" selected" for="com1"><span class="text">Very good</span></label>
                                            </span>
                                            <div class="line clickable"><div class="fill" style="width:<?php echo isset($arrRating['good']['percent']) ? $arrRating['good']['percent'] : "0" ; ?>%"></div></div>
                                            <span class="compositeCount selected"><?php echo number_format($arrRating['good']['vote']); ?></span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label class=" selected" for="com1"><span class="text">Average</span></label>
                                            </span>
                                            <div class="line clickable"><div class="fill" style="width:<?php echo isset($arrRating['average']['percent']) ? $arrRating['average']['percent'] : "0" ; ?>%"></div></div>
                                            <span class="compositeCount selected"><?php echo number_format($arrRating['average']['vote']); ?></span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label class=" selected" for="com1"><span class="text">Poor</span></label>
                                            </span>
                                            <div class="line clickable"><div class="fill" style="width:<?php echo isset($arrRating['poor']['percent']) ? $arrRating['poor']['percent'] : "0" ; ?>%"></div></div>
                                            <span class="compositeCount selected"><?php echo number_format($arrRating['poor']['vote']); ?></span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label class=" selected" for="com1"><span class="text">Terrible</span></label>
                                            </span>
                                            <div class="line clickable"><div class="fill" style="width:<?php echo isset($arrRating['terrible']['percent']) ? $arrRating['terrible']['percent'] : "0" ; ?>%"></div></div>
                                            <span class="compositeCount selected"><?php echo number_format($arrRating['terrible']['vote']); ?></span>
                                        </li>
                                    </ul> 
                                </div>                            
                            <div class="clear"></div>
                        </div>
                        
                        <div id="SUMMARYBOX" class="wrap subrating">
                        	<div class="colTitle">{tongketdanhgia}</div>
                            <ul>
                                <li>
                                    <div class="name">{chatluongxe}</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <?php $tmp = $arrRating['sao'][1] - 0.5;
                                            if(in_array($tmp,$arrDiem)){
                                                $chan = $tmp;
                                                $le = 1;
                                            }else{
                                                $chan=$arrRating['sao'][1];
                                            }
                                         ?>
                                        <?php for($i=0;$i<$chan;$i++){ ?>
                                    	<span></span>
                                        <?php } ?>
                                        <?php if($le==1) {?>
                                        <span class="part_icon_rating"></span>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">{thaido}</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <?php $tmp1 = $arrRating['sao'][2] - 0.5;
                                            if(in_array($tmp1,$arrDiem)){
                                                $chan1 = $tmp1;
                                                $le1 = 1;
                                            }else{
                                                $chan1=$arrRating['sao'][2];
                                            }
                                         ?>
                                        <?php for($i=0;$i<$chan1;$i++){ ?>
                                        <span></span>
                                        <?php } ?>
                                        <?php if($le1==1) {?>
                                        <span class="part_icon_rating"></span>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">{dunggio}</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <?php $tmp2 = $arrRating['sao'][3] - 0.5;
                                            if(in_array($tmp2,$arrDiem)){
                                                $chan2 = $tmp2;
                                                $le2 = 1;
                                            }else{
                                                $chan2=$arrRating['sao'][3];
                                            }
                                         ?>
                                        <?php for($i=0;$i<$chan2;$i++){ ?>
                                        <span></span>
                                        <?php } ?>
                                        <?php if($le2==1) {?>
                                        <span class="part_icon_rating"></span>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">{antoan}</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <?php $tmp3 = $arrRating['sao'][4] - 0.5;
                                            if(in_array($tmp3,$arrDiem)){
                                                $chan3 = $tmp3;
                                                $le3 = 1;
                                            }else{
                                                $chan3=$arrRating['sao'][4];
                                            }
                                         ?>
                                        <?php for($i=0;$i<$chan3;$i++){ ?>
                                        <span></span>
                                        <?php } ?>
                                        <?php if($le3==1) {?>
                                        <span class="part_icon_rating"></span>
                                        <?php } ?>
                                    </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="left col_comment_review">
                        <?php $arrDetail = $model->getRatingDetailOfNhaxe($nhaxe_id);
                            if(!empty($arrDetail['data'])){
                                foreach ($arrDetail['data'] as $data) {                                    
                                
                        ?>
                        <div class="items_comment_review">
                            <div class="col1of2">
                                <div class="member_info">
                                    <div class="memberOverlayLink">
                                        <div class="avatar">
                                        <a><img height="74" width="74" class="avatar potentialFacebookAvatar" 
                                            src="http://media-cdn.tripadvisor.com/media/photo-l/01/2e/70/57/avatar030.jpg"></a>
                                        </div>
                                        <div class="username mo">
                                            <span class="expand_inline scrname"><?php echo $data['name']; ?></span>
                                        </div>
                                    </div>
                                    <div class="location"><?php echo $data['address']; ?></div>
                                </div>
                                <div class="memberBadging">
                                <div class="totalReviewBadge no_cpu">                                
                                <ul>                                    
                                    <li>
                                        <span class="icon lazy badge_hotels_2nd sprite-badge_hotels_2nd"></span><span class="badgeText"><?php echo $model->countReviewByEmailID($data['email_id']); ?> {danhgia}</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_helpful sprite-badge_helpful"></span><span class="badgeText"><?php echo $model->countUsefulByEmailID($data['email_id']); ?> {danhgiahuuich}</span>    
                                    </li>
                                    
                                </ul>
                                </div>
                                
                                </div>
                                </div>
                            <div class="col2of2">
                            <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                                <a href="#">“<span class="noQuotes"><?php echo $data['title']; ?></span>”</a>
                            </div>
                            <div class="rating reviewItemInline">
                                <div class="rate sprite-rating_s rating_s">
                                    <?php $sao = $model->countStarByDetail($data['detail_id']);
                                     $tmp = $sao - 0.5;
                                            if(in_array($tmp,$arrDiem)){
                                                $chan = $tmp;
                                                $le10 = 1;
                                            }else{
                                                $chan=$sao;
                                            }
                                         ?>
                                        <?php for($i=0;$i<$chan;$i++){ ?>
                                        <span></span>
                                        <?php } ?>
                                        <?php if($le10==1) {?>
                                        <span class="part_icon_rating"></span>
                                        <?php } ?>                                    
                                </div>
                                <span class="ratingDate relativeDate" title="August 13, 2014">
                                    Reviewed <?php echo date('M d Y', $data['creation_time']); ?>
                                </span>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            <?php echo $data['content']; ?>
                                <!--
                                <span class="partnerRvw">
                                    <span class="taLnk hvrIE6 tr221568014 moreLink ulBlueLinks">More</span>
                                </span>
                            -->
                            </p>
                            </div>
                            </div> </div>
                             </div>
                            <div class="clear"></div>
                        </div> 
                        <?php } } ?>                    
                       
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div class="tab-pane fade" id="hinhanh" style="text-align:center">
                    <?php $arrRsImg = $model->getListImageByNhaxe($nhaxe_id,-1,-1);
                            if(mysql_num_rows($arrRsImg) >0) {    
                            ?>
                  	 <div id="slider1_container" style="position: relative; margin:auto; width: 940px;
                        height: 450px; background: #191919; overflow: hidden;">

                        <!-- Loading Screen -->
                        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            <div style="position: absolute; display: block; background: url(<?php echo STATIC_URL; ?>/images/loading.gif) no-repeat center center;
                                top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                        </div>

                        <!-- Slides Container -->
                        <div u="slides" style="cursor: move; position: absolute; left: 240px; top: 0px; width: 700px; height: 450px; overflow: hidden;">

                            <?php
                            while($row = mysql_fetch_assoc($arrRsImg)){
                                                                
                            ?>
                            <div>
                                <img u="image" src="<?php echo $row['image_url']; ?>" />
                                <img u="thumb" src="<?php echo $row['image_url_3']; ?>" />
                            </div>
                            <?php } ?>                           
                        </div>
                        
                        <!-- Arrow Navigator Skin Begin -->
                        <style>
                            /* jssor slider arrow navigator skin 05 css */
                            /*
                            .jssora05l              (normal)
                            .jssora05r              (normal)
                            .jssora05l:hover        (normal mouseover)
                            .jssora05r:hover        (normal mouseover)
                            .jssora05ldn            (mousedown)
                            .jssora05rdn            (mousedown)
                            */
                            .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
                            {
                                position: absolute;
                                cursor: pointer;
                                display: block;
                                background: url(<?php echo STATIC_URL; ?>/images/a17.png) no-repeat;
                                overflow:hidden;
                            }
                            .jssora05l { background-position: -10px -40px; }
                            .jssora05r { background-position: -70px -40px; }
                            .jssora05l:hover { background-position: -130px -40px; }
                            .jssora05r:hover { background-position: -190px -40px; }
                            .jssora05ldn { background-position: -250px -40px; }
                            .jssora05rdn { background-position: -310px -40px; }
                        </style>
                        <!-- Arrow Left -->
                        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 248px;">
                        </span>
                        <!-- Arrow Right -->
                        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
                        </span>
                        <!-- Arrow Navigator Skin End -->
                        
                        <!-- Thumbnail Navigator Skin 02 Begin -->
                        <div u="thumbnavigator" class="jssort02" style="position: absolute; width: 240px; height: 480px; left:0px; bottom: 0px;">
                        
                            <!-- Thumbnail Item Skin Begin -->
                            <style>
                                /* jssor slider thumbnail navigator skin 02 css */
                                /*
                                .jssort02 .p            (normal)
                                .jssort02 .p:hover      (normal mouseover)
                                .jssort02 .pav          (active)
                                .jssort02 .pav:hover    (active mouseover)
                                .jssort02 .pdn          (mousedown)
                                */
                                .jssort02 .w
                                {
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    width: 100%;
                                    height: 100%;
                                }
                                .jssort02 .c
                                {
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    width: 99px;
                                    height: 66px;
                                    border: #000 2px solid;
                                }
                                .jssort02 .p:hover .c, .jssort02 .pav:hover .c, .jssort02 .pav .c 
                                {
                                    background: url(<?php echo STATIC_URL; ?>/images/t01.png) center center;
                                    border-width: 0px;
                                    top: 2px;
                                    left: 2px;
                                    width: 99px;
                                    height: 66px;
                                }
                                .jssort02 .p:hover .c, .jssort02 .pav:hover .c
                                {
                                    top: 0px;
                                    left: 0px;
                                    width: 99px;
                                    height: 66px;
                                    border: #fff 1px solid;
                                }
                            </style>
                            <div u="slides" style="cursor: move;">
                                <div u="prototype" class="p" style="position: absolute; width: 99px; height: 66px; top: 0; left: 0;">
                                    <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                                    <div class=c>
                                    </div>
                                </div>
                            </div>
                            <!-- Thumbnail Item Skin End -->
                        </div>                       
                        
                    </div>
                    <?php } else{ ?>
                    <div style="min-height:200px"><h2 style="font-size:20px;color:red"><?php echo $lang=="vi" ? "Đang cập nhật hình ảnh!" : "Data updating!"?></h2></div>
                    <?php } ?>
                     <div class="clear"></div>
                  </div>
                  <div class="tab-pane fade" id="tuyenphobien">
                  	<table class="table table-hover">
                    	<thead>
						<tr>
                        	<th style="width:50%;">{tuyenduong}</th>
                           
                            <th>{chuyendau}</th>
                            <th>{chuyencuoi}</th>
                            <th>{giave}</th>                           
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $listTroute = $model->getListTroute($nhaxe_id);
                            if(!empty($listTroute['data'])){
                                foreach ($listTroute['data'] as $key => $value) {                                    
                            ?>
                            <tr>
                        	<td>                            	
                                <a href="#"><?php echo $model->getRouteNameByID($value['route_id'],$lang)?></a>
                             </td>
                           
                            <td>
                            	<span class="time_tpb"><?php echo $value['min_time']; ?></span>
                            </td>
                            <td>
                            	<span class="time_tpb"><?php echo $value['max_time']; ?></span>
                            </td>
                            <td>
                                <span class="time_tpb"><?php echo number_format($value['price']); ?> VNĐ</span>
                            </td>
                            <td class="td_end">
                            	<a href="#" class="btn-muave">{datve}</a>
                            </td>
                        </tr>
                        <?php }}?>
                        
                    </tbody></table>
                  </div>
                  
                </div>
            </div>
            <div class="clear"></div>
        </div>
<script>
    jQuery(document).ready(function ($) {
        var _SlideshowTransitions = [
        //Zoom- in
        {$Duration: 1200, $Zoom: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2 },
        //Zoom+ out
        {$Duration: 1000, $Zoom: 11, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },
        //Rotate Zoom- in
        {$Duration: 1200, $Zoom: 1, $Rotate: 1, $During: { $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5} },
        //Rotate Zoom+ out
        {$Duration: 1000, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },

        //Zoom HDouble- in
        {$Duration: 1200, x: 0.5, $Cols: 2, $Zoom: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },
        //Zoom HDouble+ out
        {$Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },

        //Rotate Zoom- in L
        {$Duration: 1200, x: 0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Left: $JssorEasing$.$EaseSwing, $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5} },
        //Rotate Zoom+ out R
        {$Duration: 1000, x: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },
        //Rotate Zoom- in R
        {$Duration: 1200, x: -0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Left: $JssorEasing$.$EaseSwing, $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5} },
        //Rotate Zoom+ out L
        {$Duration: 1000, x: 4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },

        //Rotate HDouble- in
        {$Duration: 1200, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.7} },
        //Rotate HDouble- out
        {$Duration: 1000, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.7} },
        //Rotate VFork in
        {$Duration: 1200, x: -4, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.7} },
        //Rotate HFork in
        {$Duration: 1200, x: 1, y: 2, $Cols: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Column: 19 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} }
        ];

        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 600,                                //Specifies default duration (swipe) for slide in milliseconds

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            },

            $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $Lanes: 2,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                $SpacingX: 14,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 12,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 6,                             //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 156,                          //[Optional] The offset position to park thumbnail
                $Orientation: 2                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$SetScaleWidth(Math.max(Math.min(parentWidth, 960), 300));
            else
                window.setTimeout(ScaleSlider, 30);
        }

        ScaleSlider();

        if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
            $(window).bind('resize', ScaleSlider);
        }


        //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
        //    $(window).bind("orientationchange", ScaleSlider);
        //}
        //responsive code end
    });
</script>      
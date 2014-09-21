<?php 
$arrImage = $model->getListImageByNhaxe($nhaxe_id,-1,-1);
$row = mysql_fetch_assoc($arrImage);
$arrRating = $model->rating($nhaxe_id);
$totalSaoNhaxe = $arrRating['sao'][1] +  $arrRating['sao'][2] + $arrRating['sao'][3] + $arrRating['sao'][4];
$saoTB = $model->tinhsao(round($totalSaoNhaxe/4,1));
$arrDiem = array(0,1,2,3,4,5);  
?>
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
                                                <label class=" selected" for="com1"><span class="text">Excellent</span></label>
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
                  <div class="tab-pane fade" id="hinhanh">
                  	 <div id="wrap_slider_profile">
                     	<ul class="bxslider_profile">
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL; ?>/images/bus-1.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL; ?>/images/bg-capbus.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL; ?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                        </ul>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="tab-pane fade" id="tuyenphobien">
                  	<table class="table table-hover">
                    	<thead>
						<tr>
                        	<th style="width:50%;">{tuyenduong}</th>
                           
                            <th>{chuyendau}</th>
                            <th>{chuyencuoi}</th>                           
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
      
<?php 
require_once "backend/model/Image.php";
$modelImage = new Image;
$arrImage = $modelImage->getListImageByNhaxe($nhaxe_id,-1,-1);
$row = mysql_fetch_assoc($arrImage);
?>
<div class="detail-nhaxe">
        	<div class="header_top">
        	<div id="holiday-product-left-top">
            	<div class="star-rating-container">
                <span><img alt="star" src="<?php echo STATIC_URL;?>/images/BigStar.png"></span>
                <span><img alt="star" src="<?php echo STATIC_URL;?>/images/BigStar.png"></span>
                <span><img alt="star" src="<?php echo STATIC_URL;?>/images/BigStar.png"></span>
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
            	<ul role="tablist" class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" role="tab" href="#danhgia">Đánh giá</a></li>
                  <li class=""><a data-toggle="tab" role="tab" href="#hinhanh">Hình ảnh</a></li>
                  <li class=""><a data-toggle="tab" role="tab" href="#tuyenphobien">Các tuyến phổ biến</a></li>
                </ul>
                <div class="tab-content">
                  <div id="danhgia" class="tab-pane fade in active">
                    <div class="left col_review">
                        <h3>3,211 people have reviewed this hotel</h3>
                        <div class="content wrap trip_type_layout">
                            <div class="composite">
                                <div class="colTitle">Traveler rating</div>
                                    <ul class="barChart">
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label for="com1" class=" selected"><span class="text">Excellent</span></label>
                                            </span>
                                            <div class="line clickable"><div style="width:70%" class="fill"></div></div>
                                            <span class="compositeCount selected">2,676</span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label for="com1" class=" selected"><span class="text">Very good</span></label>
                                            </span>
                                            <div class="line clickable"><div style="width:10%" class="fill"></div></div>
                                            <span class="compositeCount selected">2,676</span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label for="com1" class=" selected"><span class="text">Average</span></label>
                                            </span>
                                            <div class="line clickable"><div style="width:40%" class="fill"></div></div>
                                            <span class="compositeCount selected">2,676</span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label for="com1" class=" selected"><span class="text">Poor</span></label>
                                            </span>
                                            <div class="line clickable"><div style="width:4%" class="fill"></div></div>
                                            <span class="compositeCount selected">2,676</span>
                                        </li>
                                        <li class="wrap">
                                            <span class="rdoSet">
                                                <label for="com1" class=" selected"><span class="text">Terrible</span></label>
                                            </span>
                                            <div class="line clickable"><div style="width:2%" class="fill"></div></div>
                                            <span class="compositeCount selected">2,676</span>
                                        </li>
                                    </ul> 
                                </div>
                            <!--<div class="trip_type">
                                <div class="colTitle">See reviews for</div>
                                <div class="segment segment1">
                                    <div class="filter_connection_wrapper">
                                        <div class="sprite-tt-family-active-refresh filter_selection taLnk hvrIE6 ulBlueLinks">Families</div>
                                        <div class="value">266</div>
                                    </div>
                                </div>
                                <div class="segment segment2">
                                    <div class="filter_connection_wrapper">
                                        <div class="sprite-tt-couples-active-refresh filter_selection taLnk hvrIE6 ulBlueLinks">Couples</div>
                                        <div class="value">1963</div>
                                    </div>
                                </div>
                                <div class="segment segment3">
                                    <div class="filter_connection_wrapper">
                                        <div class="sprite-tt-solo-active-refresh filter_selection taLnk hvrIE6 ulBlueLinks">Solo</div>
                                        <div class="value">52</div>
                                    </div>
                                </div>
                                <div class="segment segment4">
                                    <div class="filter_connection_wrapper">
                                        <div class="sprite-tt-business-active-refresh filter_selection taLnk hvrIE6 ulBlueLinks">Business</div>
                                        <div class="value">34</div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="clear"></div>
                        </div>
                        <div class="roomTip">
                            <span class="ugc">Traveler tips help you choose the right room. </span> &nbsp;
                            <span class="taLnk ulBlueLinks">Room tips (737)</span>
                        </div>
                        <div class="wrap subrating" id="SUMMARYBOX">
                            <div class="colTitle">Rating summary</div>
                            <ul>
                                <li>
                                    <div class="name">Sleep Quality</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">Location</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">Rooms</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">Service</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">Value</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="name">Cleanliness</div>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 500px;"><div class="left col_comment_review" style="overflow: hidden; width: auto; height: 500px;">
                        <div class="items_comment_review">
                            <div class="col1of2">
                                <div class="member_info">
                                    <div class="memberOverlayLink">
                                        <div class="avatar">
                                        <a><img width="74" height="74" src="http://media-cdn.tripadvisor.com/media/photo-l/01/2e/70/57/avatar030.jpg" class="avatar potentialFacebookAvatar"></a>
                                        </div>
                                        <div class="username mo">
                                            <span class="expand_inline scrname">marc l</span>
                                        </div>
                                    </div>
                                    <div class="location">Manalapan, New Jersey</div>
                                </div>
                                <div class="memberBadging">
                                <div class="totalReviewBadge no_cpu">
                                <div class="reviewerTitle">Senior Contributor</div>
                                <ul>
                                    <li>
                                        <span class="icon lazy badge_srcontributor sprite-badge_srcontributor"></span><span class="badgeText">21 reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_hotels_2nd sprite-badge_hotels_2nd"></span><span class="badgeText">12 hotel reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_helpful sprite-badge_helpful"></span><span class="badgeText">44 helpful votes</span>    
                                    </li>
                                    
                                </ul>
                                </div>
                                
                                </div>
                                </div>
                            <div class="col2of2">
                            <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                                <a href="#">“<span class="noQuotes">"Welcome Home" is not just a mantra</span>”</a>
                            </div>
                            <div class="rating reviewItemInline">
                                <div class="rate sprite-rating_s rating_s">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span title="August 13, 2014" class="ratingDate relativeDate">Reviewed 1 week ago</span>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            With the conclusion of our 4 th visit to the property in 2014, I can honestly say that things only get better. We arrived quite early before our room was ready, but immediately encouraged to use the facilities and dining options. The grounds were immaculate as aways. The food was wonderful and several recent tweats in the dining rooms only...
                                <span class="partnerRvw">
                                    <span class="taLnk hvrIE6 tr221568014 moreLink ulBlueLinks">More</span>
                                </span>
                            </p>
                            </div>
                            </div> </div> </div>
                            <div class="clear"></div>
                        </div>
                        <div class="items_comment_review">
                            <div class="col1of2">
                                <div class="member_info">
                                    <div class="memberOverlayLink">
                                        <div class="avatar">
                                        <a><img width="74" height="74" src="http://media-cdn.tripadvisor.com/media/photo-l/01/2e/70/57/avatar030.jpg" class="avatar potentialFacebookAvatar"></a>
                                        </div>
                                        <div class="username mo">
                                            <span class="expand_inline scrname">marc l</span>
                                        </div>
                                    </div>
                                    <div class="location">Manalapan, New Jersey</div>
                                </div>
                                <div class="memberBadging">
                                <div class="totalReviewBadge no_cpu">
                                <div class="reviewerTitle">Senior Contributor</div>
                                <ul>
                                    <li>
                                        <span class="icon lazy badge_srcontributor sprite-badge_srcontributor"></span><span class="badgeText">21 reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_hotels_2nd sprite-badge_hotels_2nd"></span><span class="badgeText">12 hotel reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_helpful sprite-badge_helpful"></span><span class="badgeText">44 helpful votes</span>    
                                    </li>
                                    
                                </ul>
                                </div>
                                
                                </div>
                                </div>
                            <div class="col2of2">
                            <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                                <a href="#">“<span class="noQuotes">"Welcome Home" is not just a mantra</span>”</a>
                            </div>
                            <div class="rating reviewItemInline">
                                <div class="rate sprite-rating_s rating_s">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span title="August 13, 2014" class="ratingDate relativeDate">Reviewed 1 week ago</span>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            With the conclusion of our 4 th visit to the property in 2014, I can honestly say that things only get better. We arrived quite early before our room was ready, but immediately encouraged to use the facilities and dining options. The grounds were immaculate as aways. The food was wonderful and several recent tweats in the dining rooms only...
                                <span class="partnerRvw">
                                    <span class="taLnk hvrIE6 tr221568014 moreLink ulBlueLinks">More</span>
                                </span>
                            </p>
                            </div>
                            </div> </div> </div>
                            <div class="clear"></div>
                        </div>
                        <div class="items_comment_review">
                            <div class="col1of2">
                                <div class="member_info">
                                    <div class="memberOverlayLink">
                                        <div class="avatar">
                                        <a><img width="74" height="74" src="http://media-cdn.tripadvisor.com/media/photo-l/01/2e/70/57/avatar030.jpg" class="avatar potentialFacebookAvatar"></a>
                                        </div>
                                        <div class="username mo">
                                            <span class="expand_inline scrname">marc l</span>
                                        </div>
                                    </div>
                                    <div class="location">Manalapan, New Jersey</div>
                                </div>
                                <div class="memberBadging">
                                <div class="totalReviewBadge no_cpu">
                                <div class="reviewerTitle">Senior Contributor</div>
                                <ul>
                                    <li>
                                        <span class="icon lazy badge_srcontributor sprite-badge_srcontributor"></span><span class="badgeText">21 reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_hotels_2nd sprite-badge_hotels_2nd"></span><span class="badgeText">12 hotel reviews</span>    
                                    </li>
                                    <li>
                                        <span class="icon lazy badge_helpful sprite-badge_helpful"></span><span class="badgeText">44 helpful votes</span>    
                                    </li>
                                    
                                </ul>
                                </div>
                                
                                </div>
                                </div>
                            <div class="col2of2">
                            <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                                <a href="#">“<span class="noQuotes">"Welcome Home" is not just a mantra</span>”</a>
                            </div>
                            <div class="rating reviewItemInline">
                                <div class="rate sprite-rating_s rating_s">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span title="August 13, 2014" class="ratingDate relativeDate">Reviewed 1 week ago</span>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            With the conclusion of our 4 th visit to the property in 2014, I can honestly say that things only get better. We arrived quite early before our room was ready, but immediately encouraged to use the facilities and dining options. The grounds were immaculate as aways. The food was wonderful and several recent tweats in the dining rooms only...
                                <span class="partnerRvw">
                                    <span class="taLnk hvrIE6 tr221568014 moreLink ulBlueLinks">More</span>
                                </span>
                            </p>
                            </div>
                            </div> </div> </div>
                            <div class="clear"></div>
                        </div>
                    </div><div class="slimScrollBar ui-draggable" style="background: none repeat scroll 0% 0% rgb(159, 2, 52); width: 7px; position: absolute; opacity: 0.7; border-radius: 7px; z-index: 99; right: 1px; top: 171px; height: 328.947px; display: block;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    <div class="clear"></div>
                  </div>
                  <div id="hinhanh" class="tab-pane fade">
                  	 <div id="wrap_slider_profile">
                     	<ul class="bxslider_profile">
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL;?>/images/bus-1.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                          <li>
                          	<div class="wrap_slider_profile"><img src="<?php echo STATIC_URL;?>/images/bg-capbus.jpg"></div>
                            <div class="thum_slider">
                            	<a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/251750,xcitefun-ma05-01mini-bus-car-139464f.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/thumb.jpg"></a>
                                  <a href=""><img src="<?php echo STATIC_URL;?>/images/images (2).jpg"></a>
                            </div>
                          </li>
                        </ul>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div id="tuyenphobien" class="tab-pane fade in">
                  	<table class="table table-hover">
                    	<thead>
						<tr>
                        	<th style="width:30%;">Route</th>
                            <th>Services</th>
                            <th>First Bus</th>
                            <th>Last Bus</th>
                            <th style="width:15%;">Best Rated Bus</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody><tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>Parshwanath Travels Ahmedabad for</p>
                                <a href="#">Udaipur to Ahmedabad</a>
                             </td>
                            <td>10 Buses</td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<span class="time_tpb">12:20 AM</span>
                            </td>
                            <td>
                            	<div>
                                	<b>4.9</b>
                                    <div class="rate sprite-rating_s rating_s">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div>Based on <i>6</i> ratings</div>
                            </td>
                            <td class="td_end">
                            	<a class="btn-muave" href="#">book now</a>
                            </td>
                        </tr>
                    </tbody></table>
                  </div>
                  
                </div>
            </div>
            <div class="clear"></div>
        </div>
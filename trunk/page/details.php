<?php 
$lang_id = $lang == "vi" ? 1 : 2;
$arrTag = $model->getTagsByArticleId($article_id,$lang_id);
?>
<div class="page_detail" id="mid">
      <div id="mid-inner">
        <div class="content wide" id="content">
          <div class="brakum">
            <ul>
              <li><a href="http://onbus.vn">{trangchu}</a><span></span></li>
              <li><a href="<?php echo $lang; ?>/tin-tuc.html">{tintuc}</a></li>              
            </ul>
          </div>
          <h1><?php echo $row_details['title']; ?></h1>
          <?php if(!empty($arrTag)) { ?>
          <div class="group_tab">
            <ul>
            <?php $countTag = 0; foreach($arrTag as $tag){ $countTag++; ?>
              <li><a href="<?php echo $lang; ?>/tags/<?php echo $tag['tag_name_kd']."-".$tag['tag_id'];?>.html" class="tab_<?php echo $countTag; ?>"><?php echo $tag['tag_name'];?></a></li>
              <?php } ?>
              <li class="date_post"><?php echo date('M d Y',$row_details['creation_time']); ?></li>
              <li class="end"> <span class="comment_num"><i></i>0</span> <span class="view_num"><i></i>1459</span> </li>
            </ul>
          </div>
          <?php } ?>
          <div class="wrap_content_detail" style="margin-bottom:50px;text-align:justify"> 
              <?php echo str_replace("../", "", $row_details['content']); ?>
          </div>
        </div>
        <div class="sidebar" id="sidebar2">
          <div class="td_block_wrap td_social widget widget_social" id="td_uid_9_53ffd2c71760d">
            <h4 class="block-title"><span>SOCIAL</span></h4>
            <div class="td_social_type"><span class="td-social-icon-wrap"><a href="#"><span class="td-social-s1-32 td-s-s-32-facebook"></span></a></span><span class="td_social_info">50,951</span><span class="td_social_info">Fans</span><span class="td_social_button"><a href="#">Like</a></span></div>
            <div class="td_social_type"><span class="td-social-icon-wrap"><a href="#"><span class="td-social-s1-32 td-s-s-32-twitter"></span></a></span><span class="td_social_info">286,364</span><span class="td_social_info">Followers</span><span class="td_social_button"><a href="#">Follow</a></span></div>
            <div class="td_social_type"><span class="td-social-icon-wrap"><a href="#"><span class="td-social-s1-32 td-s-s-32-youtube"></span></a></span><span class="td_social_info">1,046</span><span class="td_social_info">Subscribers</span><span class="td_social_button"><a href="http://www.youtube.com/user/MowMiHenek">Subscribe</a></span></div>
          </div>
          <div class="widget">
            <h3>Tin liên quan</h3>
            <ul>
              <?php 
        $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
        $rs = mysql_query("SELECT * FROM articles WHERE lang_id = $lang_id AND status > 0 AND hot = 0 ");
        while($row = mysql_fetch_assoc($rs)){
        ?>
        <li>
              <a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">
                <div class="wrap-img left"><img src="<?php echo $row['image_url']; ?>"></div>
                <div class="left  tlq_items"><strong><?php echo $row['title']; ?></strong>
            <span><?php echo date('M d,Y',$row['creation_time']); ?></span></div>
              </a>
        </li>
        
        <?php } ?>
                
             
        	</ul>
        </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
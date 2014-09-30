<div class="page_detail" id="mid">
      <div id="mid-inner">
        <div class="content wide" id="content">
          <div class="brakum">
            <ul>
              <li><a href="#">{trangchu}</a><span></span></li>
              <li><a href="#">{topdiemden}</a></li>              
            </ul>
          </div>
          <h1><?php echo $row_hot['page_title_'.$lang]; ?></h1>
          <div class="group_tab">
            <ul>
              <li><a href="#" class="tab_1">demo 1</a></li>
              <li><a href="#" class="tab_2">demo 2</a></li>
              <li><a href="#" class="tab_3">demo 3</a></li>
              <li><a href="#" class="tab_1">demo 4</a></li>
              <li class="date_post">May 4, 2014</li>
              <li class="end"> <span class="comment_num"><i></i>0</span> <span class="view_num"><i></i>1459</span> </li>
            </ul>
          </div>
          <div class="wrap_content_detail"> 
              <?php echo str_replace("../", "", $row_hot['content_'.$lang]); ?>
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
            <h3>{tintucganday}</h3>
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
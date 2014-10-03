<style>
  .slider-description h1 {
font-weight: bold;
}

</style>
<div id="mid">
		<div id="mid-inner">			
			<div id="content" class="content wide">
            	<div id="jslidernews2" class="lof-slidecontent">
	
            
            
            <div class="button-previous">Previous</div>
              <div class="main-slider-content">
                <div class="sliders-wrapper" style="width: 700px;"><ul class="sliders-wrap-inner" style="left: 0px; width: 4200px;">
                   
                    <?php 
                    $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
                    $rs = mysql_query("SELECT * FROM articles WHERE lang_id = $lang_id AND status > 0 AND hot = 1 ORDER BY article_id DESC LIMIT 0,4 ");
                    while($row = mysql_fetch_assoc($rs)){
                    ?>
                    <li style="width: 700px;">
                      <div class="wrap-img-slider">
                        <a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html"><img src="<?php echo $row['image_url']; ?>" 
                        title="<?php echo $row['title']; ?>"> </a>           </div>
                        <div class="slider-description">
                            <h1><a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html"><?php echo $row['title']; ?></a></h1>
                            <div><?php echo $row['description']; ?>...</div>
                            <a class="readmore" href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">{chitiet} </a>
                            <p></p>
                         </div>
                    </li> 
                    <?php } ?>

                  
                
                  </ul></div>  	
            </div>
           	<div class="navigator-content">
                  <div class="navigator-wrapper" style="height: 300px; width: 120px;">
                        <ul class="navigator-wrap-inner" style="height: 600px; top: 0px;">
                        
                    <?php 
                    $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
                    $rs = mysql_query("SELECT * FROM articles WHERE lang_id = $lang_id AND status > 0 AND hot = 1 ORDER BY article_id DESC LIMIT 0,4 ");
                    $i = 0;
                    while($row = mysql_fetch_assoc($rs)){
                      $i++;
                    ?>
                    <li class="<?php echo $i==1? "active" : "";?>" style="height: 100px; width: 120px;">
                                <div>
                                    <img src="<?php echo $row['image_url']; ?>" title="<?php echo $row['title']; ?>">     
                                </div>    
                            </li>
                    <?php } ?>  		
                        </ul>
                  </div>
   
             </div> 
          <div class="button-next">Next</div>
          <div class="button-control action-start hover-stop"><span></span></div>
	 </div> 
        <?php 
        $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
        $rs = mysql_query("SELECT * FROM articles WHERE lang_id = $lang_id AND status > 0 AND hot = 0 ORDER BY article_id DESC LIMIT $offset,$limit");
        while($row = mysql_fetch_assoc($rs)){
        ?>
				<div class="post archive">
				
					<div class="post-tnail">
            <a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">
              <img src="<?php echo $row['image_url']; ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php echo $row['title']; ?>"><span>&nbsp;</span></a></div>					
					<div class="post-content">
						<h2><a style="font-weight:bold" href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html"><?php echo $row['title']; ?></a></h2>
						<div class="post-date"><?php echo date('M d,Y',$row['creation_time']); ?> <span>|</span> <a href="#">4 Comments</a></div>
												<p><?php echo $row['description']; ?>[…]</p>
						<p class="more"><a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">{xemtiep}...</a></p>
					</div>
					<div class="clear"></div>
				</div>
        <?php } ?>
               
                <div class="wp-pagenavi">
<span class="pages">Page 1 of 2</span><span class="current">1</span><a class="page larger" href="">2</a><a class="nextpostslink" href="#">»</a>
</div>
			</div>
			<div id="sidebar2" class="sidebar">
<div class="widget">
	<h3>{tintucganday}</h3>
	<ul>
    <?php 
        $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
        $rs = mysql_query("SELECT * FROM articles WHERE lang_id = $lang_id AND status > 0 AND hot = 0 ORDER BY RAND() LIMIT 0,7");
        while($row = mysql_fetch_assoc($rs)){
        ?>
						<li><a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html"><strong><?php echo $row['title']; ?></strong>
		<span><?php echo date('M d,Y',$row['creation_time']); ?></span></a></li>			
    <?php } ?>
			</ul>
</div>
<div class="widget" id="ad-bigbox"><a href="#" target="_top" rel="nofollow"><img src="<?php echo STATIC_URL;?>/images/Untitled-5.jpg"></a></div>
	</div>
			<div class="clear"></div>
		</div>
	</div>
  <div class="clear"></div>
  <script language="javascript" type="text/javascript" src="<?php echo STATIC_URL;?>/js/jquery.easing.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATIC_URL;?>/js/script.js"></script>
  <script type="text/javascript">
  $(document).ready( function(){  
    var buttons = { previous:$('#jslidernews2 .button-previous') ,
            next:$('#jslidernews2 .button-next') };      
    $('#jslidernews2').lofJSidernews( { 
      interval:5000,
      easing:'easeInOutQuad',
      duration:1200,
      auto:true,
      mainWidth:700,
      mainHeight:300,
      navigatorHeight   : 100,
      navigatorWidth    : 120,
      maxItemDisplay:3,
      buttons:buttons } );            
    });
  </script>
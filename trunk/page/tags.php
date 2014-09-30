<style>
  .slider-description h1 {
font-weight: bold;
}

</style>
<div id="mid">
		<div id="mid-inner">			
			<div id="content" class="content wide">
             
        <?php 
        $lang_id = $_SESSION['lang'] == 'vi' ? 1 : 2;        
        $sql = "SELECT * FROM articles WHERE article_id IN ('".$str_article_id."') AND status > 0";
        $rs = mysql_query($sql) or die(mysql_error());
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
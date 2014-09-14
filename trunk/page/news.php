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
                    <li style="width: 700px;">
                          <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/jj.jpg" title="Newsflash 2"></div>
                          <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                   <li style="width: 700px;">
                      <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/images (1).jpg" title="Newsflash 1">           </div>
                         <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                   <li style="width: 700px;">
                      <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/sieutietkiem.jpg" title="Newsflash 3">            </div>
                        <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                    <li style="width: 700px;">
                      <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/5aaefc84-9554-4f4b-a68a-3546655f7409.jpg" title="Newsflash 5">            </div>
                        <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                    <li style="width: 700px;">
                      <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/lpa.jpg" title="Newsflash 5">            </div>
                        <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                    <li style="width: 700px;">
            
                      <div class="wrap-img-slider"><img src="<?php echo STATIC_URL;?>/images/generic.jpg" title="Newsflash 5">            </div>
                        <div class="slider-description">
                          	<h1>EVERYTHING YOU NEED TO KNOW ABOUT NHA TRANG</h1>
                            <div>Often called the Riviera of the South China Sea, Nha Trang has a long stretch of beautiful coastline; miles of white, sandy beaches with mountains...</div>
                            <a class="readmore" href="#">Read more </a>
                            <p></p>
                         </div>
                    </li> 
                
                  </ul></div>  	
            </div>
           	<div class="navigator-content">
                  <div class="navigator-wrapper" style="height: 300px; width: 120px;">
                        <ul class="navigator-wrap-inner" style="height: 600px; top: 0px;">
                          <li class="active" style="height: 100px; width: 120px;">
                                <div>
                                    <img src="<?php echo STATIC_URL;?>/images/jj.jpg" title="Newsflash 2">     
                                </div>    
                            </li>
                             <li style="height: 100px; width: 120px;">
                                <div>
                                    <img src="<?php echo STATIC_URL;?>/images/images (1).jpg" title="Newsflash 1"> 
                                </div>    
                            </li>
                
                            <li style="height: 100px; width: 120px;">
                                <div>
                                    <img src="<?php echo STATIC_URL;?>/images/sieutietkiem.jpg" title="Newsflash 3">         
                                </div>     
                            </li>
                            
                           <li style="height: 100px; width: 120px;">
                                <div>
                                    <img src="<?php echo STATIC_URL;?>/images/5aaefc84-9554-4f4b-a68a-3546655f7409.jpg" title="Newsflash 5">     
                                </div>
                            </li>    
                            <li style="height: 100px; width: 120px;">
                                 <div>
                                    <img src="<?php echo STATIC_URL;?>/images/lpa.jpg" title="Newsflash 5">          
                                 </div>   
                            </li>
                           <li style="height: 100px; width: 120px;">
                                <div>
                                	<img src="<?php echo STATIC_URL;?>/images/generic.jpg" title="Newsflash 5">            
                                </div>
                            </li>     		
                        </ul>
                  </div>
   
             </div> 
          <div class="button-next">Next</div>
          <div class="button-control action-start hover-stop"><span></span></div>
	 </div> 
        <?php 
        $rs = mysql_query("SELECT * FROM articles WHERE status > 0 ");
        while($row = mysql_fetch_assoc($rs)){
        ?>
				<div class="post archive">
				
					<div class="post-tnail">
            <a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">
              <img src="<?php echo $row['image_url']; ?>" class="attachment-post-thumbnail wp-post-image" alt="Praesent Placerat Risus Quis Eros"><span>&nbsp;</span></a></div>					
					<div class="post-content">
						<h2><a style="font-weight:bold" href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html"><?php echo $row['title']; ?></a></h2>
						<div class="post-date"><?php echo date('M d,Y',$row['creation_time']); ?> <span>|</span> <a href="#">4 Comments</a></div>
												<p><?php echo $row['description']; ?>[…]</p>
						<p class="more"><a href="<?php echo $lang; ?>/details/<?php echo $row['title_safe']?>-<?php echo $row['article_id'];?>.html">Continue reading...</a></p>
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
	<h3>Recent Articles</h3>
	<ul>
						<li><a href="#"><strong>Nam Convallis Pellentesque Nisl</strong>
		<span>Thursday, December 22, 2011</span></a></li>
				<li><a href="#"><strong>Cras Iaculis Ultricies Nulla</strong>
		<span>Thursday, September 22, 2011</span></a></li>
				<li><a href="#"><strong>Integer Vitae Libero Ac Risus Egestas Placerat</strong>
		<span>Monday, August 22, 2011</span></a></li>
				<li><a href="#"><strong>Praesent Placerat Risus Quis Eros</strong>
		<span>Wednesday, February 22, 2012</span></a></li>
				<li><a href="#"><strong>Ut Aliquam Sollicitudin Leo</strong>
		<span>Wednesday, February 22, 2012</span></a></li>
				<li><a href="#"><strong>Fusce Lobortis Lorem At Ipsum Semper Sagittis</strong>
		<span>Tuesday, November 22, 2011</span></a></li>
				<li><a href="#"><strong>Donec Quis Dui At Dolor Tempor Interdum</strong>
		<span>Saturday, October 22, 2011</span></a></li>
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
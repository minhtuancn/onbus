<?php 
$arrQuestion = $model->getListQuestion();

?>

<div class="left col_question">
    	<div class="box_question">
        	<h1>Existing Customer Questions</h1>
            <ul>
                <?php foreach ($arrQuestion['data'] as $q) {
                    ?>
            	<li>
                	<a href="#"><span class="glyphicon glyphicon-plus"></span><?php echo $q['content_'.$lang]; ?></a>
                    <div class="content_faq">
                    	 <?php echo $q['answer_'.$lang]; ?>
                    </div>
                </li>
                <?php } ?>                       
            </ul>
        </div>                
    </div>
    <div class="right recent_post">
    	<h1>Recent Post</h1>
        <ul>
        	<li><a href="#">Standard Post Format</a></li>
            <li><a href="#">Standard Post Format</a></li>
            <li><a href="#">Standard Post Format</a></li>
            <li><a href="#">Standard Post Format</a></li>
            <li><a href="#">Standard Post Format</a></li>
        </ul>
    </div>
    <div class="clear"></div>
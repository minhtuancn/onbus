<?php 
$arrTinhHaveTicket = $modelTinh->getListTinhHaveTicket($vstart);
if(!empty($arrTinhHaveTicket)){
foreach ($arrTinhHaveTicket as $value) {      
    if($value['mien_id']==1){
      $arrTinh_Nam[] = $value;
    }elseif($value['mien_id']==2){
      $arrTinh_Trung[] = $value;
    }else{
      $arrTinh_Bac[] = $value;
    }
}
}


?>
<div class="box-sear-ticket">
    <div class="wrap">
        <div class="tabs">
            <ul>
                <li><a href="#"><span class="icon-font active">{timvexe}</span></a></li>
                <li class="sologan_txt">Chia sẻ cùng chúng tôi hành trình của bạn.</li>
            </ul>
        </div>
        <div class="wrap-frm-search">
        <form>
        <ul class="menu triptype clearfix">
            <li class="oneway">
                <input data-ticket="type-1" id="ticket-1" type="radio" name="ticket-type" value="1" checked="checked"/>
                <label for="ticket-1">{ve1chieu}</label>
            </li>
            <li class="return selected">
                <input type="radio" data-ticket="type-2" id="ticket-2" name="ticket-type" value="2"  />
                <label for="ticket-2">{vekhuhoi}</label>
            </li>
        </ul>
        <div class="left item-search">
            <input type="hidden" name="vstart" value="" id="vstart" />
            <label for="departPlace">{diemkhoihanh}</label>
            <input id="departPlace" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Chọn nơi đi" accesskey="1" tabindex="1" autocomplete="off">
            
            <div id="departPlaceSelector" class="place-selector rounded-5 clearfix" style="display:none;">
                <div class="inner rel-pos">
                    <a id="closeDept" class="close" href="javascript:;">Đóng</a>
                    <div class="region-col first fl-l clearfix">
                        <h3>Miền Nam</h3>
                        <ul class="city-list fl-l">
                        <?php if(!empty($arrTinh_Nam)){?>
                          <?php
                          $i = 0;
                          foreach ($arrTinh_Nam as $value) {
                            $i++;
                            $str = ($value['hot']==1) ? "<strong>".$value['tinh_name_'.$lang]."</strong>" : $value['tinh_name_'.$lang];
                            ?>
                            <li class="city"><a href="javascript:;" data-state="<?php echo $value['tinh_id']; ?>"><?php echo $str; ?></a></li>
                            <?php 
                              if($i==12){
                                echo '</ul><ul class="city-list fl-l">';
                              }
                          }
                           ?>
                           <?php }else{ ?>                          
                           <li class="city">&nbsp;</a>
                           <?php } ?>
                        </ul>                                    

                    </div>

                    <div class="region-col fl-l clearfix">
                        <h3>Miền Trung - Tây Nguyên</h3>
                        <ul class="city-list fl-l">
                          <?php if(!empty($arrTinh_Trung)){?>
                          <?php
                          $i = 0;
                          foreach ($arrTinh_Trung as $value) {
                            $i++;
                            $str = ($value['hot']==1) ? "<strong>".$value['tinh_name_'.$lang]."</strong>" : $value['tinh_name_'.$lang];
                            ?>
                            <li class="city"><a href="javascript:;" data-state="<?php echo $value['tinh_id']; ?>"><?php echo $str; ?></a></li>
                            <?php 
                              if($i==12){
                                echo '</ul><ul class="city-list fl-l">';
                              }
                          }
                           ?><?php }else{ ?>                          
                           <li class="city">&nbsp;</a>
                           <?php }?>                          
                        </ul> 
                    </div>
                    
                    <div class="region-col last fl-l clearfix">
                        <h3>Miền Bắc</h3>
                        <ul class="city-list fl-l">
                        <?php if(!empty($arrTinh_Bac)){?>
                          <?php
                          $i = 0;
                          foreach ($arrTinh_Bac['data'] as $value) {
                            $i++;
                            $str = ($value['hot']==1) ? "<strong>".$value['tinh_name_'.$lang]."</strong>" : $value['tinh_name_'.$lang];
                            ?>
                            <li class="city"><a href="javascript:;" data-state="<?php echo $value['tinh_id']; ?>"><?php echo $str; ?></a></li>
                            <?php 
                              if($i==12){
                                echo '</ul><ul class="city-list fl-l">';
                              }
                          }
                           ?> 
                            <?php }else{ ?>                          
                           <li class="city">&nbsp;</a>
                           <?php }?>                        
                        </ul> 
                    </div>
                   

                </div>
                                        </div>

                                        <span class="replay-position">&nbsp;</span>
                                    </div>
        <div class="right item-search">
            <input type="hidden" name="vend" value="" id="vend"/>
            <label for="departPlace">{noiden}</label>
            <input id="destination" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Chọn nơi đến" accesskey="1" tabindex="1" autocomplete="off">                        
            <div id="destinationSelector" class="place-selector rounded-5 clearfix" style="display:none;">
                
                                        </div>
                                    </div>
        <div class="left item-search">
            <label for="departPlace">{ngaydi}</label>
            <input id="departDate" name="dstart" type="text" class="input-txt date form-control" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" autocomplete="off"/>

        </div>
        <div class="right item-search ticket-2">
            <label for="departPlace">{ngayve}</label>
            <input id="returnDate" type="text" name="dend" class="input-txt date form-control" placeholder="Chọn ngày về" accesskey="4" tabindex="4" autocomplete="off"/>

        </div>
        <div class="btn-search-ticket">
            <button type="button" id="btnSearch" class="btn btn-warning right btn-blue">{timvexe}</button>
            <div class="left item-search">
                <label for="departPlace">{nhaxe}</label>
                <select class="form-control input-sm left" name="car" id="car">
                    <option>{chonnhaxe}</option>
                    <?php foreach ($arrNhaXe['data'] as $key => $value) {
                    ?>
                    <option value="<?php echo $value['nhaxe_id']; ?>"><?php echo $value['nhaxe_name_'.$lang];?></option>
                    <?php } ?>                               
                </select>
            </div>
        </div>
        <div class="clear"></div>
    </form>
        </div><!--form search-->
    </div>
</div>
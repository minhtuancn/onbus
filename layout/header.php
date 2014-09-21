<header>
        <div class="w-center header-wrap">
            <div class="right">                
                <div class="dropdown">
                <div class="cell_header">Language</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                     <?php echo ($lang=="vi") ? "Tiếng Việt" : "English" ; ?>
                     <span class="caret"></span>                     
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a data-value="vi" role="menuitem" tabindex="-1" href="javascript:;" class="changelang"><span class="flag-vn"></span>Tiếng Việt</a></li>
                    <li role="presentation"><a data-value="en" role="menuitem" tabindex="-1" href="javascript:;" class="changelang"><span class="flag-en"></span>English &nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                  </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="left"><a href="<?php echo HOST; ?>" class="logo-header">
            <img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" /></a></div>
            <div class="menu-header">
                <ul class="nav nav-pills">
                  <li class="<?php echo ($mod=="home") ? "active": ""; ?> hv-1"><a href="<?php echo HOST; ?>">{trangchu}<span></span></a></li>
                  <li class="hv-4"><a href="javascript:void(0)">{vecuaban}<span></span></a>
                    <div class="submenu">
                      <div class="wrap_sub">
                          <div class="title">
                              <h2>{tinhtrangve}</h2>
                                <a href="javascript:void(0)" class="close_icon"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <form role="form">
                              <div class="form-group">
                                <label for="exampleInputEmail1">{dienthoai}</label>
                                <input type="text" class="form-control" id="phone_myticket" placeholder="Enter phone">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">{mave}</label>
                                <input type="text" class="form-control" id="code_myticket" placeholder="Enter code ticket">
                              </div>
                              <button type="button" id="btnCheckTicket" class="btn btn-default" data-toggle="modal" data-target="#popup_myticket">{tieptuc}</button>
                              <p style="margin-top:10px;font-style:italic;" id="error_myticket" class="error_time">{thongtinkochinhxac}</p>                               
                            </form>

                        </div>
                    </div>
                  </li>
                  <li class="<?php echo ($mod=="news" || $mod =="details") ? "active": ""; ?> hv-3"><a href="<?php echo $lang; ?>/tin-tuc.html">{tintuc}<span></span></a></li>
                  <li class="<?php echo ($mod=="nhaxe" || $mod =="detail-nhaxe") ? "active": ""; ?> hv-4"><a href="<?php echo $lang; ?>/thong-tin-nha-xe.html">{thongtinnhaxe}<span></span></a></li>
                  
                  <!--<li class="cart-icon">
                    <a href="#"><i>&nbsp;</i><b>0</b>Vé</a>
                  </li>-->
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <script type="text/javascript">
$(function(){
  $('.changelang').click(function(){
      $('#dropdownMenu1').html($(this).html()+'<span class="caret"></span>');   
      var lang = $(this).attr('data-value');
      location.href="<?php echo HOST; ?>/" + lang + '/'; 
  });
  $('#btnCheckTicket').on('click',function(){
      var flag = true;
      var phone = $.trim($("#phone_myticket").val());
      var code = $.trim($("#code_myticket").val());    
      if(phone =="" || code == ""){
        flag = false;
      }else{
        $.ajax({
              url: "ajax/myticket.php",
              type: "POST",
              async: true,              
              data: {
                  'phone':phone,
                  'code': code,
                  'mod' : 'myticket'             
              },
              success: function(data){                             
                  $('#loadmyticket').html(data);
              }
              
          });
      }//else
      console.log(flag);
      return flag;
    });   
  });  
    </script>
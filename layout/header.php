<header>
        <div class="w-center header-wrap">
            <div class="right">
                <div class="dropdown tiente">
                    <div class="cell_header">CURRENCY</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown">
                    VNĐ<span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">VNĐ - Vietnamese</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">USD - United States Dollars</a></li>
                  </ul>
                </div>
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
            <div class="left"><a href="<?php echo HOST; ?>" class="logo-header"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" /></a></div>
            <div class="menu-header">
                <ul class="nav nav-pills">
                  <li class="active hv-1"><a href="<?php echo HOST; ?>">{trangchu}<span></span></a></li>
                  <li class="hv-4"><a href="#">{vecuaban}<span></span></a>
                    <div class="submenu">
                      <div class="wrap_sub">
                          <div class="title">
                              <h2>Tình trạng vé</h2>
                                <a href="#" class="close_icon"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <form role="form">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Mã vé</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                              </div>
                              <button type="submit" class="btn btn-default">Tiếp tục</button>
                            </form>
                        </div>
                    </div>
                  </li>
                  <li class="hv-3"><a href="<?php echo $lang; ?>/tin-tuc.html">{tintuc}<span></span></a></li>
                  <li class="hv-4"><a href="<?php echo $lang; ?>/thong-tin-nha-xe.html">{thongtinnhaxe}<span></span></a></li>
                  
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
});
    </script>
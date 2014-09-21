<h1>{lienheonbus}</h1>
            <div class="contact_content">
			<div class="left_col">
            	<div class="frm_contact">
                	<form role="form">                                                                  
                      <div class="form-group">
                        <label for="exampleInputEmail1">{hoten}*</label>
                        <input type="email" class="form-control" id="name_contact" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email*</label>
                        <input type="email" class="form-control" id="email_contact" >
                      </div>                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">{dienthoai}*</label>
                        <input type="email" class="form-control" id="phone_contact" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">{noidung}*</label>
                        <textarea class="form-control" rows="3" id="content_contact"></textarea>
                      </div>
                      <p style="color:red" class="error_time" id="mess_contact"><?php echo $lang=="vi" ? "Vui lòng nhập đầy đủ thông tin!" : "Please fill all information!"; ?></p>
                      <button type="button" id="btnSendContact" class="btn btn-default">{gui}</button>
                    </form>
                </div>                
            </div><!--left_col-->
            
            <div class="right_col">
           <div class="block-address">
              <h2 style="text-transform:uppercase">{tencongty}</h2>
              {diachi}: {diachicongty}
           </div>      
           <div class="wrap_map">
           	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2971405374396!2d106.69934210000002!3d10.788538799999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f355086bee9%3A0xc4230970c235ac!2zNjQgTmd1eeG7hW4gxJDDrG5oIENoaeG7g3UsIMSQYSBLYW8sIFF14bqtbiAxLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1410186631915" width="670" height="372" frameborder="0" style="border:0"></iframe>
           </div>
            </div><!--right_col-->
      	</div>
            <div class="clear"></div>
<script type="text/javascript">
$(function(){
  $('#btnSendContact').click(function(){ 
      var  name = $.trim($('#name_contact').val());    
      var  email = $.trim($('#email_contact').val());
      var  mobile = $.trim($('#phone_contact').val());
      var  content = $.trim($('#content_contact').val());

      if(email!='' && mobile !='' && content !='' && name != ''){
          $.ajax({
              url: "ajax/process.php",
              type: "POST",
              async: true,
              data: {
                  'mod':'contact',
                  'email': email,
                  'mobile' : mobile,
                  'content' : content,
                  'name' : name
              },
              success: function(data){
                  var mess = '<?php echo $lang=="vi" ? "Gửi liên hệ thành công." : "Send contact susccessful."; ?>';
                  if($.trim(data)!=''){
                      $('#mess_contact').html(data).show();
                      if($.trim(data)=="Gửi liên hệ thành công." || $.trim(data)=="Send contact susccessful."){
                          $('#name_contact, #phone_contact,#email_contact, #content_contact').val('');  

                      }  
                      setTimeout(function(){
                            $('#mess_contact').hide();                                                        
                        }, 4000);                      
                                              
                  }
              }
          });
      }else{
          $('#mess_contact').show();          
          setTimeout(function(){$('#mess_contact').hide();}, 4000);            
          return false;
      }
  });
});
</script>            
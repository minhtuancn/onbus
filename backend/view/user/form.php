<?php if(isset($_GET['user_id'])){    $user_id = (int) $_GET['user_id'];    require_once "model/User.php";    $model = new User;    $detail = $model->getDetailUser($user_id);}?><div class="row">    <div class="col-md-8">                <!-- Custom Tabs -->        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=user&act=list'">Danh sách</button>        <div style="clear:both;margin-bottom:10px"></div>        <div class="box box-primary">            <div class="box-header">                <h3 class="box-title"><?php echo ($user_id > 0) ? "Cập nhật" : "Tạo mới" ?> user</h3>                            </div><!-- /.box-header -->            <!-- form start -->            <form role="form" method="post" action="controller/User.php">                <?php if($user_id> 0){ ?>                <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />                <?php } ?>                <div class="box-body">					<div class="form-group">                    <label>Group <span class="required"> ( * ) </span></label>                    <select class="form-control required" name="group_id" id="group_id">                        <option value="0">---chọn---</option>                        <option value="1" <?php echo ($detail['group_id']==1) ? "selected" : ""; ?>>Admin</option>                        <option value="2" <?php echo ($detail['group_id']==2) ? "selected" : ""; ?>>Editor</option>                                                                                       </select>                </div>                    <div class="form-group">                        <label for="exampleInputEmail1">Fullname <span class="required"> ( * ) </span></label>                        <input  value="<?php echo isset($detail['fullname'])  ? $detail['fullname'] : "" ?>" type="text" name="fullname" id="fullname" class="form-control required">                    </div> 					<div class="form-group">                        <label for="exampleInputEmail1">Email <span class="required"> ( * ) </span></label>                        <input  value="<?php echo isset($detail['email'])  ? $detail['email'] : "" ?>" type="text" name="email" id="email" class="form-control required">                    </div>					                </div><!-- /.box-body -->                <div class="box-footer">                     <button class="btn btn-primary btnSave" type="submit">Save</button>                     <button class="btn btn-primary" type="reset">Cancel</button>                </div>            </form>        </div>    </div><!-- /.col --> </div>
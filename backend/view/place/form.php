<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Place.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Trở lại</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title">Tạo mới địa điểm</h3>
            </div><!-- /.box-header -->
        <div class="nav-tabs-custom">
            
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab_1">
                    <img src="<?php echo STATIC_URL?>img/vi.png"/>
                </a></li>
                <li class=""><a data-toggle="tab" href="#tab_2">
                    <img src="<?php echo STATIC_URL?>img/uk_.png"/>
                </a></li>              
                <li class="pull-right"><a class="text-muted" href="#"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="place_name_vi" class="form-control required">
                    </div>
                   
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="place_name_en" class="form-control required">
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
            <div class="button">
                <button class="btn btn-primary btnSave" type="submit">Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>
           
        </div><!-- nav-tabs-custom -->
    </form>
    </div><!-- /.col --> 
</div>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/deviceController/index">وسیله ها</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن وسیله</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن وسیله</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/deviceController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/deviceController/checkAddDevice">
                    <div class="form-body">
                        <div class="form-group form-md-line-input <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">اسم وسیله</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="F18">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_serial_no)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">سریال نمبر</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="serial_no" value="<?php if (!empty($Field_data['serial_no'])) echo $Field_data['serial_no']; ?>" placeholder="سریال نمبر وسیله">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_serial_no)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_serial_no?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_ip)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">IP address</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="ip_addr" value="<?php if (!empty($Field_data['ip_addr'])) echo $Field_data['ip_addr']; ?>" placeholder="x.x.x.x">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_ip)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_ip?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_port_no)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">Port number</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="port_no" value="<?php if (!empty($Field_data['port_no'])) echo $Field_data['port_no']; ?>" placeholder="3370">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_port_no)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_port_no?></span>
                                <?php }?>
                            </div>
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/deviceController/index" class="btn default">لغو</a>
                                <input type="submit" name="addDevice" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
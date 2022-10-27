
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
                    <a href="<?=base_url()?>index.php/UsersController/index">مدیریت استفاده کننده ها</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن حالت شاگرد</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن حالت شاگرد</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/studentController/addState" enctype="multipart/form-data">
                    <div class="form-body">
                         <div class="form-group form-md-line-input <?php if (!empty($error_student_id)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">آیدی شاگرد</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="student_id" value="<?php if (!empty($Field_data['state_name'])) echo $Field_data['state_name']; ?>" placeholder="748392">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_student_id)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_student_id?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_state_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">نام حالت</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="state_name" value="<?php if (!empty($Field_data['state_name'])) echo $Field_data['state_name']; ?>" placeholder="ناکام">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_state_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_state_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_state_description)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">شرح حالت</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="state_description" value="<?php if (!empty($Field_data['state_description'])) echo $Field_data['state_description']; ?>" placeholder="تکمیل ننمودن فیصدی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_state_description)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_state_description?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_state)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">حالت</label>
                            <div class="col-md-8">
                                <select class="form-control" name="state">
                                    <option <?php if(!empty($Field_data['state']) && $Field_data['state'] == 0) echo ' selected '?> value="0">انتخاب حالت</option>
                                    <option <?php if(!empty($Field_data['state']) && $Field_data['state'] == 'y') echo ' selected '?> value="y">واجد لیله</option>
                                    <option <?php if(!empty($Field_data['state']) && $Field_data['state'] == 'n') echo ' selected '?> value="n">عدم لیلیه</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_state)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_state?></span>
                                <?php }?>
                            </div>
                        
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/studentController/index" class="btn default">لغو</a>
                                <input type="submit" name="addState" class="btn btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
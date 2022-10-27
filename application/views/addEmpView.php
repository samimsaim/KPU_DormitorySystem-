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
                    <a href="<?=base_url()?>index.php/employeeController/index">مدیریت کارمندان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن کارمند</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن کارمند</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/employeeController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/employeeController/checkAddEmp" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form-group form-md-line-input <?php if (!empty($error_emp_id)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">آی دی</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="emp_id" value="<?php if (!empty($Field_data['emp_id'])) echo $Field_data['emp_id']; ?>" placeholder="100">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_emp_id)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_emp_id?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">اسم</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_father_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">ولد</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="father_name" value="<?php if (!empty($Field_data['father_name'])) echo $Field_data['last_name']; ?>" placeholder="احمدی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_father_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_grand_father_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">ولدیت</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="grand_father_name" value="<?php if (!empty($Field_data['grand_father_name'])) echo $Field_data['grand_father_name']; ?>" placeholder="ولی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_grand_father_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_grand_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_position)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">موقف</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="position" value="<?php if (!empty($Field_data['position'])) echo $Field_data['position']; ?>" placeholder="استاد بلاک">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_position)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_position?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">شماره تماس</label>
                            <div class="col-md-8">
                                <input type="tel" class="form-control" name="phone" value="<?php if (!empty($Field_data['phone'])) echo $Field_data['phone']; ?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                          <div class="form-group form-md-line-input <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">جنسیت</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gender">
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 0) echo ' selected '?> value="0">انتخاب جنسیت</option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'm') echo ' selected '?> value="m">مرد</option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'f') echo ' selected '?> value="f">زن</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_gender)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_gender?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">عکس کاربر</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کارمند">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/employeeController/index" class="btn default">لغو</a>
                                <input type="submit" name="addEmp" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
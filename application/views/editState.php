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
                    <a href="<?=base_url()?>index.php/studentController/studentState">حا لت شا گرد</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>ویرا یش حالت شاگرد</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن حالت شاگرد</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/studentController/studentState" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <?php foreach ($query as $row) {
                } ?>
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/studentController/checkEditState">
                    <div class="form-body">
                        <div class="form-group form-md-line-input <?php if (!empty($error_state_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">نام حالت</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="state_name" value="<?=$row->state_name?>" placeholder="ناکام">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_state_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_state_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_state_description)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">شرح حالت</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="state_description" value="<?=$row->state_description?>" placeholder="تکمیل ننمودن فیصدی">
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
                                    <option <?php if($row->state == 0) echo ' selected '?> value="0">انتخاب حالت</option>
                                    <option <?php if($row->state  == 'y') echo ' selected '?> value="y">واجد لیله</option>
                                    <option <?php if($row->state  == 'n') echo ' selected '?> value="n">عدم لیلیه</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_state)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_state?></span>
                                <?php }?>
                            </div>
                        
                        </div>
                        <input type="hidden" name="stu_id" value="<?=$row->stu_id?>">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/studentController/studentState" class="btn default">لغو</a>
                                <input type="submit" name="editState" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
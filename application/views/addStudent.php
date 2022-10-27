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
                    <a href="<?=base_url()?>index.php/studentController/index">شاگردان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن شاگرد</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن شاگرد</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/studentController" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/studentController/checkAddStudent" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_student_id)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">آی دی *</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="student_id" value="<?php if (!empty($Field_data['student_id'])) echo $Field_data['student_id']; ?>" placeholder="190456">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_student_id)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_student_id?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">اسم *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_father_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ولد *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="father_name" value="<?php if (!empty($Field_data['father_name'])) echo $Field_data['father_name']; ?>" placeholder="محمود">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_father_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_grand_father_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ولد یت *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="grand_father_name" value="<?php if (!empty($Field_data['grand_father_name'])) echo $Field_data['grand_father_name']; ?>" placeholder="محمد">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_grand_father_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_grand_father_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_identity_no)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نمبر تذکره *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="identity_no" value="<?php if (!empty($Field_data['identity_no'])) echo $Field_data['identity_no']; ?>" placeholder="۵۷۴۸۳۹">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_identity_no)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_identity_no?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_nationality)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ملیت *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nationality" value="<?php if (!empty($Field_data['nationality'])){ echo $Field_data['nationality'];}else { echo 'افغان';} ?>" placeholder="افغان">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_nationality)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_nationality?></span>
                                <?php }?>
                            </div>
                        </div>
                         </div>
                        <div class="row">
                          <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_university)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">پوهنتون *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="university" value="<?php if(!empty($Field_data['university'])){ echo $Field_data['university'];}else{ echo 'پولی تخنیک';} ?>" placeholder="پولی تخنیک">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_university)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_university?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_faculty)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">پوهنحْی *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="faculty" onchange="getDepartment()" id="fac">
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == 0) echo ' selected '?> value="0">انتخاب پوهنحْی</option>
                                    <?php foreach ($fac as $row) { ?>
                                    <option <?php if(!empty($Field_data['faculty']) && $Field_data['faculty'] == $row->fac_id) echo ' selected '?> value="<?=$row->fac_id?>"><?=$row->fac_name?></option>
                                    <?php }?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_faculty)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_faculty?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                    <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_department)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">رشته *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="department" id="dep">
                                    <option <?php if(!empty($Field_data['department']) && $Field_data['department'] == 0) echo ' selected '?> value="0">انتخاب رشته</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_department)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_department?></span>
                                <?php }?>
                            </div>
                        </div>
                          <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_class)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">صنف *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="class_no">
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 0) echo ' selected '?> value="0">انتخاب صنف</option>
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 1) echo ' selected '?> value="1">1</option>
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 2) echo ' selected '?> value="2">2</option>
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 3) echo ' selected '?> value="3">3</option>
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 4) echo ' selected '?> value="4">4</option>
                                    <option <?php if(!empty($Field_data['class_no']) && $Field_data['class_no'] == 5) echo ' selected '?> value="5">5</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_class)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_class?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_provence)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ولایت *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="provence" value="<?php if (!empty($Field_data['provence'])) echo $Field_data['provence']; ?>" placeholder="کابل">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_provence)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_provence?></span>
                                <?php }?>
                            </div>
                        </div>
                          <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_village)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ولسوالی *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="village" value="<?php if (!empty($Field_data['village'])) echo $Field_data['village']; ?>" placeholder="مرکز">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_village)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_village?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_bas_add)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">آدرس اصلی *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="base_address" value="<?php if (!empty($Field_data['base_address'])) echo $Field_data['base_address']; ?>" placeholder="بدخشان">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_bas_add)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_bas_add?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_cur_add)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">آدرس فعلی *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="current_address" value="<?php if (!empty($Field_data['current_address'])) echo $Field_data['current_address']; ?>" placeholder="کابل">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_cur_add)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_cur_add?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group form-md-line-input  col-md-6 <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ایمل آدرس *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?php if (!empty($Field_data['email'])) echo $Field_data['email']; ?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">شماره *</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control" name="phone" value="<?php if (!empty($Field_data['phone'])) echo $Field_data['phone']; ?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                        <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_block)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">بلاک *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="block_no">
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == 0) echo ' selected '?> value="0">انتخاب بلاک</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '1') echo ' selected '?> value="1">1</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '2') echo ' selected '?> value="2">2</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '3') echo ' selected '?> value="3">3</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '4') echo ' selected '?> value="4">4</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '6') echo ' selected '?> value="5">5</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '6') echo ' selected '?> value="6">6</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '7') echo ' selected '?> value="7">7</option>
                                    <option <?php if(!empty($Field_data['block_no']) && $Field_data['block_no'] == '8') echo ' selected '?> value="8">8</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_block)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_block?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_floor)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">منزل *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="floor_no">
                                    <option <?php if(!empty($Field_data['floor_no']) && $Field_data['floor_no'] == 0) echo ' selected '?> value="0">انتخاب منزل</option>
                                    <option <?php if(!empty($Field_data['floor_no']) && $Field_data['floor_no'] == '1') echo ' selected '?> value="1">1</option>
                                    <option <?php if(!empty($Field_data['floor_no']) && $Field_data['floor_no'] == '2') echo ' selected '?> value="2">2</option>
                                    <option <?php if(!empty($Field_data['floor_no']) && $Field_data['floor_no'] == '3') echo ' selected '?> value="3">3</option>
                                    <option <?php if(!empty($Field_data['floor_no']) && $Field_data['floor_no'] == '4') echo ' selected '?> value="4">4</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_floor)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_floor?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                            <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_room)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">اطاق *</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="room_no" value="<?php if (!empty($Field_data['room_no'])) echo $Field_data['room_no']; ?>" placeholder="37"/>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_room)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_room?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">جنسیت *</label>
                            <div class="col-md-9">
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
                                </div>
                    <div class="row">
                        
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عکس کاربر</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_tz_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عکس تذ کره</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="tz_photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_tz_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_tz_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/studentController/index" class="btn default">لغو</a>
                                <input type="submit" name="addStu" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/global/plugins/angularjs/angular.min.js"></script>

<script>
    function getDepartment(){
        var facId = $("#fac").val();
        var department = document.getElementById("dep");
        $(department).empty();
        $(department).append('<option selected value='+0+'></option>');
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/studentController/getDepartments",
            data: {facId:facId},
            dataType: "JSON",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    $(department).append('<option value='+data[i]['dep_id']+'>'+data[i]['dep_name']+'</option>');
                }
            },
            error: function(err) {
            }
        });
    }
</script>
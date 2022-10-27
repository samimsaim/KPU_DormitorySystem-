<?php
    $numbers = array(1=>'اول',2=>'دوم',3=>'سوم',4=>'چهارم',5=>'پنجنم',6=>'ششم',7=>'هفتم',8=>'هشتم',9=>'نهم',10=>'دهم');
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>معومات بایومتریک</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات بایومتریک</span>
                </div>
            </div>
            <div class="portlet-body">
                <form method="post" action="<?=base_url();?>index.php/biometricController/setStuFingerTemplate">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group form-md-line-input form-md-floating-label col-md-2 <?php if (!empty($error_dev_name)) echo 'has-error' ?>" style="margin-right: 10px;">
                                    <select class="form-control" name="device_id">
                                        <option value=""></option>
                                        <?php foreach ($deviceInfo as $devInfo) {?>
                                            <option <?php if(!empty($Field_data['device_id']) && $Field_data['device_id'] == $devInfo->dev_id) echo ' selected ';?> value="<?=$devInfo->dev_id;?>">
                                                <?php   echo 'دروازه '.$numbers[substr($devInfo->name,5)];?>
                                            </option>
                                        <?php }?>
                                    </select>
                                    <label for="form_control_1">انتخاب دروازه</label>
                                    <?php if(!empty($error_dev_name)){?>
                                        <span class="help-block-error" style="color:red;"><?=$error_dev_name?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label col-md-2 <?php if (!empty($error_type)) echo 'has-error' ?>" style="margin-right: 10px;">
                                    <select class="form-control" name="types" id="type" onchange="getTableIds()">
                                        <option value=""></option>
                                        <option <?php if(!empty($Field_data['types']) && $Field_data['types'] == "students") echo ' selected ';?> value="students">محصل</option>
                                        <option <?php if(!empty($Field_data['types']) && $Field_data['types'] == "employee") echo ' selected ';?> value="employee">کارمند</option>
                                    </select>
                                    <label for="form_control_1">نوعیت</label>
                                    <?php if(!empty($error_type)){?>
                                        <span class="help-block-error" style="color:red;"><?=$error_type?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label col-md-7 <?php if (!empty($error_stu_id)) echo 'has-error' ?>" style="margin-right: 10px;">
                                    <input type="text" class="form-control" id="value" autocomplete="false" placeholder="جستجوی آی دی"/>
                                    <select class="form-control" name="stu_id" id="tblId">
                                        <option value=""></option>
                                    </select>
                                    <label for="form_control_1"></label>
                                    <?php if(!empty($error_stu_id)){?>
                                        <span class="help-block-error" style="color:red;"><?=$error_stu_id?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="retrieveTemplate" class="btn blue" style="margin-top: 20px;" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <center>
                        <div style="background:url(<?=base_url();?>assets/img/hand.jpg) no-repeat center ; width: 750px; height: 400px;">
                            <?php
                            if(isset($type) && $type == true){?>
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: 80px; margin-right: -25px">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 9){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: -50px; margin-right: -180px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 8){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: -68px; margin-right: -115px; margin-left: -35px">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 7){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top:-30px; margin-right: -34px">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 6){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>


                                        <td>
                                            <svg width="100" height="100" style="margin-top: -30px; margin-right: 30px; margin-left: 12px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 3){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: -68px; margin-right: -45px; margin-left: -3px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 2){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: -50px; margin-right: -37px; margin-left: 10px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 1){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td>
                                            <svg width="100" height="100" style="margin-top: 80px; margin-right: -60px; margin-left: 17px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 0){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <svg width="100" height="100" style="margin-top: 55px; margin-right: 268px">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 5){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                        <td colspan="4">
                                            <svg width="100" height="100" style="margin-top: 55px; margin-right: -65px;">
                                                <circle cx="25" cy="25" r="20" stroke="#D3D3D3" fill="<?php $d = false; foreach($fingerIds as $ids) { if($ids["fingerId"] == 4){ echo '#20B2AA'; $d = true;}}if($d == false) {echo '#f5f5f0';}?>" />
                                            </svg>
                                        </td>
                                    </tr>
                                </table>
                            <?php }?>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($msg) && isset($type)) {
    ?>
    <div id="success" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismis="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:<?php if(isset($type) && $type == true)echo 'green';else echo 'red';?>;font-weight: bold"><?php if(isset($type) && $type == true) echo 'موفقانه!';elseif(isset($type) && $type == false) echo 'متاسفانه!'?></h4>
                </div>
                <div class="modal-body">
                    <p style="color:<?php if(isset($type) && $type == true)echo 'green';else echo 'red';?>;font-size: 20px"><?=$msg?></p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url()?>index.php/biometricController" class="btn btn-primary">بستن</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(window).load(function () {
            $('#success').modal({backdrop: 'static', keyboard: false});
            $('#success').modal('show');
        });
    </script>
<?php } ?>

<script>
    function getTableIds(){
        var types = $("#type").val();
        var ids = document.getElementById("tblId");
        $(ids).empty();
        $(ids).append('<option selected value='+0+'></option>');
        if(types == "students") {
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>index.php/studentController/getStuIds",
                data: {tblName: types},
                dataType: "JSON",
                success: function (data) {
//                    data.reverse();
                    for (var i = 0; i < data.length; i++) {
                        $(ids).append('<option value=' + data[i]['student_id'] + '>' + data[i]['student_id'] + '</option>');
                    }
                },
                error: function (err) {
                }
            });
        }
        if(types == "employee"){
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>index.php/employeeController/getEmpIds",
                data: {tblName: types},
                dataType: "JSON",
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        $(ids).append('<option value=' + data[i]['emp_id'] + '>' + data[i]['emp_id'] + '</option>');
                    }
                },
                error: function (err) {
                }
            });

        }
    }

    $(document).ready(function(){
        $('#value').on('keyup',function(){
            var value = $(this).val().toLowerCase();
            $('#tblId *').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
            });
        });
    });
</script>
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
                    <b>وسیله ها</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6" style=" margin-bottom: -8px;">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url()?>index.php/deviceController/addDevice" id="sample_editable_1_new" class="btn sbold green">اضافه نمودن<i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">

                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <form class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn btn-transparent green-meadow btn-outline btn-circle btn-sm <?php if(isset($_SESSION["moment"]) && $_SESSION["moment"] == "morning") echo 'active';?>">
                                    <input type="radio" onchange="morning()" class="toggle">&nbsp;&nbsp;صبح&nbsp;&nbsp;</label>
                                <label class="btn btn-transparent blue btn-outline btn-circle btn-sm <?php if(isset($_SESSION["moment"]) && $_SESSION["moment"] == "lunch") echo 'active';?>">
                                    <input type="radio" onchange="lunch()" class="toggle">&nbsp;&nbsp;چاشت&nbsp;&nbsp;</label>
                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm <?php if(isset($_SESSION["moment"]) && $_SESSION["moment"] == "night") echo 'active';?>">
                                    <input type="radio" onchange="night()" class="toggle">&nbsp;&nbsp;شب &nbsp;&nbsp;</label>
                            </form>
                        </center>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th style="text-align: center;">اسم وسیله</th>
                                <th style="text-align: center;">سریال نمبر</th>
                                <th style="text-align: center;">IP address</th>
                                <th style="text-align: center;">Port number</th>
                                <th style="text-align: center;">حالت</th>
                                <th style="text-align: center;">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($device as  $row) {?>
                                <tr>
                                    <td style="text-align: center;"><?=$row->name?></td>
                                    <td style="text-align: center;"><?=$row->serial_no?></td>
                                    <td style="text-align: center;"><?=$row->ip_addr?></td>
                                    <td style="text-align: center;"><?=$row->port_no?></td>
                                    <td style="text-align: center;">

                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent green-meadow btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Enable</label>
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Disable</label>
                                            </div>
                                        </div>

                                    </td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-circle btn-icon-only btn-success" href="<?php echo base_url()?>index.php/deviceController/updateDevice?id=<?=$row->dev_id;?>" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                     <span class="fa fa-pencil">
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-danger" href="javascript:void(0);" onclick="delete_record(<?=$row->dev_id?>);" data-toggle="tooltip" data-placement="top" title="حذف"><span class="fa fa-trash-o"></a>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var url="<?php echo base_url(); ?>";
    function delete_record(id){
        var r=confirm("آیا میخواهد که این ریکارد را حذف کنید؟")
        if(r==true)
            window.location=url+"index.php/deviceController/deleteDevice?id="+id;
        else
            return false;
    }
</script>

<?php
if (isset($Message) && isset($Type)) {
    ?>
    <div id="success" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismis="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:<?php if(isset($Type) && $Type == 'success')echo 'green';else echo 'red';?>;font-weight: bold"><?php if(isset($Type) && $Type == 'success') echo 'موفقانه!';elseif(isset($Type) && $Type =='failed') echo 'متاسفانه!'?></h4>
                </div>
                <div class="modal-body">
                    <p style="color:<?php if(isset($Type) && $Type == 'success')echo 'green';else echo 'red';?>;font-size: 20px"><?=$Message?></p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url()?>index.php/deviceController/index" class="btn btn-primary">Close</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(window).load(function () {
            // this code prevent closing when the user clicking to out of modal area
            $('#success').modal({backdrop: 'static', keyboard: false});
            $('#success').modal('show');
        });
    </script>
<?php } ?>

<script type="text/javascript">
    function morning() {
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/attendanceController/setMoment",
            data: {moment:"morning"},
            dataType: "JSON",
            success: function(data) {
                if(data["result"] == "morning") {
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("موفقانه!");
                    $('#msg').text("توضیح غذای صبح شروع شد، لطفاً کمپیوتر را به هیچ وجه خاموش نکیند!");
                    $('#moment').modal('show');
                }else{
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("متاسفانه!");
                    $('#title').css("color","red");
                    $('#msg').css("color","red");
                    $('#msg').text("کوشش شما موفقانه نبود. لطفاً دوباره کوشش نماید!");
                    $('#moment').modal('show');
                }
            },
            error: function(err) {
            }
        });
    }

    function lunch() {
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/attendanceController/setMoment",
            data: {moment:"lunch"},
            dataType: "JSON",
            success: function(data) {
                if(data["result"] == "lunch") {
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("موفقانه!");
                    $('#msg').text("توضیح غذای چاشت شروع شد، لطفاً کمپیوتر را به هیچ وجه خاموش نکیند!");
                    $('#moment').modal('show');
                }else{
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("متاسفانه!");
                    $('#title').css("color","red");
                    $('#msg').css("color","red");
                    $('#msg').text("کوشش شما موفقانه نبود. لطفاً دوباره کوشش نماید!");
                    $('#moment').modal('show');
                }
            },
            error: function(err) {
            }
        });
    }

    function night() {
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/attendanceController/setMoment",
            data: {moment:"night"},
            dataType: "JSON",
            success: function(data) {
                if(data["result"] == "night") {
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("موفقانه!");
                    $('#msg').text("توضیح غذای شب شروع شد، لطفاً کمپیوتر را به هیچ وجه خاموش نکیند!");
                    $('#moment').modal('show');
                }else{
                    $('#moment').modal({backdrop: 'static', keyboard: false});
                    $('#title').text("متاسفانه!");
                    $('#title').css("color","red");
                    $('#msg').css("color","red");
                    $('#msg').text("کوشش شما موفقانه نبود. لطفاً دوباره کوشش نماید!");
                    $('#moment').modal('show');
                }
            },
            error: function(err) {
            }
        });
    }
</script>

<div id="moment" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismis="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title" style="color:green; font-weight: bold"></h4>
            </div>
            <div class="modal-body">
                <p id="msg" style="font-size: 16px; color:green; font-weight: bold"></p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url()?>index.php/mainPageController/index" class="btn btn-primary">بستن</a>
            </div>
        </div>
    </div>
</div>

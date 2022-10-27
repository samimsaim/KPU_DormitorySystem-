
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
                    <b>تقسیم اوقات</b>
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
                                        <a href="#addSchedule" data-toggle="modal" class="btn sbold green">اضافه نمودن<i class="fa fa-plus"></i></a>
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
                    <div class="portlet-body">

                        <div class="popover confirmation">
                            <div class="arrow"></div>
                            <h3 class="popover-title">ab</h3>
                            <div class="popover-content text-center">
                                <div class="btn-group">
                                    <a class="btn" data-apply="confirmation">yes</a>
                                    <a class="btn" data-dismiss="confirmation">no</a>
                                    </div>
                                </div>
                        </div>


                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align: center;">وقت</th>
                                <th style="text-align: center;">مدت</th>
                                <th style="text-align: center;">شروع</th>
                                <th style="text-align: center;">ختم</th>
                                <th style="text-align: center;">اضافه کننده</th>
                                <th style="text-align: center;">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach ($schedule as  $row) {?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td style="text-align: center;"><?=$row->moment_name?></td>
                                    <td style="text-align: center;"><?=$row->time_amount?></td>
                                    <td style="text-align: center;"><?=$row->start_time?></td>
                                    <td style="text-align: center;"><?=$row->end_time?></td>
                                    <td style="text-align: center;"><?php foreach($users as $user){ if($user->user_id == $row->user_id) {echo ucfirst($user->username);}}?></td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-circle btn-icon-only btn-success" onclick="editSchedule(<?=$row->id;?>)" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                     <span class="fa fa-pencil">
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-danger" onclick="delete_record(<?=$row->id?>)"><span class="fa fa-trash-o"></a>
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
            window.location=url+"index.php/deviceController/deleteSchedule?id="+id;
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
                    <a href="<?php echo base_url()?>index.php/deviceController/schedule" class="btn btn-primary">بستن</a>
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


<div id="addSchedule" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url();?>index.php/deviceController/addSchedule" method="post" class="form-horizontal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">اضافه نمودن تقسیم اوقات</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-3">وقت</label>
                    <div class="col-md-6">
                        <div class="input-icon">
                            <i class="fa fa-text"></i>
                            <input type="text" class="form-control" name="moment_name" placeholder="صبح"  required="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">مدت</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control timepicker timepicker-24" name="amount" required="">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">شروع</label>
                    <div class="col-md-6">
                        <div class="input-icon">
                            <i class="fa fa-clock-o"></i>
                            <input type="text" class="form-control timepicker timepicker-default" name="start_time">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">ختم</label>
                    <div class="col-md-6">
                        <div class="input-icon">
                            <i class="fa fa-clock-o"></i>
                            <input type="text" class="form-control timepicker timepicker-default" name="end_time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn grey-salsa btn-outline" data-dismiss="modal" aria-hidden="true">بستن</button>
                <input type="submit" name="addSchedule" class="btn green btn-primary" value="ذخیره"/>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editSchedule(id){
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/deviceController/searchSchedule",
            data: {scheduleId:id},
            dataType: "JSON",
            success: function(data) {
                $('#moment_name').val(data["moment_name"]);
                $('#amount').val(data["time_amount"]);
                $('#start_time').val(data["start_time"]);
                $('#end_time').val(data["end_time"]);
                $('#scheduleId').val(data["id"]);
                $('#editSchedule').modal({backdrop: 'static', keyboard: false});
                $('#editSchedule').modal('show');
            },
            error: function(err) {
            }
        });
    }
</script>


<div id="editSchedule" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url();?>index.php/deviceController/editSchedule" method="post" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">اضافه نمودن تقسیم اوقات</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">وقت</label>
                        <div class="col-md-6">
                            <div class="input-icon">
                                <i class="fa fa-text"></i>
                                <input type="text" class="form-control" name="moment_name" id="moment_name" placeholder="صبح"  required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">مدت</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control timepicker timepicker-24" id="amount" name="amount" required="">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">شروع</label>
                        <div class="col-md-6">
                            <div class="input-icon">
                                <i class="fa fa-clock-o"></i>
                                <input type="text" class="form-control timepicker timepicker-default" id="start_time" name="start_time">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">ختم</label>
                        <div class="col-md-6">
                            <div class="input-icon">
                                <i class="fa fa-clock-o"></i>
                                <input type="text" class="form-control timepicker timepicker-default" id="end_time" name="end_time">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="scheduleId"/>
                    <button class="btn grey-salsa btn-outline" data-dismiss="modal" aria-hidden="true">بستن</button>
                    <input type="submit" name="editSchedule" class="btn green btn-primary" value="ذخیره"/>
                </div>
            </form>
        </div>
    </div>
</div>


<!--<script>-->
<!--    function deleteSchedule(schedule_id){-->
<!--        $('#bs').confirmation('show');-->
<!---->
<!--        $('#bs').on('confirmed.bs.confirmation', function () {-->
<!--            console.log("hi");-->
<!--        });-->
<!---->
<!--        $('#bs').on('canceled.bs.confirmation', function () {-->
<!--            alert(schedule_id);-->
<!--        });-->
<!--    }-->
<!--</script>-->
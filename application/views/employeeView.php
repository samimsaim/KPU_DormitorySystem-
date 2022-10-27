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
                    <b>لیست کارمندان</b>
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
                                        <a href="<?php echo base_url()?>index.php/employeeController/addEmp" id="sample_editable_1_new" class="btn sbold green">اضافه نمودن<i class="fa fa-plus"></i></a>
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
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">آی دی</th>
                                    <th style="text-align: center;">اسم</th>
                                    <th style="text-align: center;">ولد</th>
                                    <th style="text-align: center;">ولدیت</th>
                                    <th style="text-align: center;">جنسیت</th>
                                    <th style="text-align: center;">موقف</th>
                                    <th style="text-align: center;">شماره تماس</th>
                                    <th style="text-align: center;">تنظیمات</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employee as  $row) {?>
                                    <tr>
                                        <td style="text-align: center;"><?=$row->emp_id?></td>
                                        <td style="text-align: center;"><?=$row->name?></td>
                                        <td style="text-align: center;"><?=$row->father_name?></td>
                                        <td style="text-align: center;"><?=$row->grand_father_name?></td>
                                        <td style="text-align: center;"><?php if($row->gender=='m') echo 'مرد'; else echo 'زن';?></td>
                                        <td style="text-align: center;"><?=$row->position?></td>
                                        <td style="text-align: center;"><?=$row->phone?></td>
                                         <td style="text-align: center;">
                                            <a href="<?= base_url()?>index.php/employeeController/empInfo?id=<?=$row->emp_id;?>" class="btn btn-circle btn-icon-only btn-defualt"><span class="glyphicon glyphicon-eye-open "></a>
                                            <a class="btn btn-circle btn-icon-only btn-success" href="<?= base_url()?>index.php/EmployeeController/editEmp?id=<?=$row->emp_id;?>"><span class="fa fa-pencil"></a>
                                             <div class="dropdown" style="display: inline-block;" dir="ltr">
                                                 <a href="" class="fa fa-trash-o dropdown-toggle btn btn-circle btn-icon-only btn-danger" id="select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></a>&nbsp;
                                                 <ul class="dropdown-menu " aria-labelledby="select">
                                                     <li><a href="<?= base_url()?>index.php/employeeController/deleteEmpInfo?id=<?=$row->emp_id;?>"><b>حذف اطلاعات کارمند</b></a></li>
                                                     <li><a href="<?= base_url()?>index.php/employeeController/deleteBioData?id=<?=$row->emp_id;?>"><b>حذف اطلاعات بایومتریک</b></a></li>
                                                 </ul>
                                             </div>
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
            window.location=url+"index.php/usersController/delete_user?id="+id;
        else
            return false;
    }
</script>

<?php
if (isset($Message) && isset($Type)) {
    ?>
    <div id="success" class="modal fade " role="dialog">
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
                    <a href="<?php echo base_url()?>index.php/employeeController/index" class="btn btn-primary">بستن</a>
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

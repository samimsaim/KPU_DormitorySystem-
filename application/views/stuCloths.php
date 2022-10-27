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
                    <b>لیست البسه</b>
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
                                    <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">اضافه نمودن<i class="fa fa-plus"></i></a>
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
                                    <th style="text-align: center;">بالش</th>
                                    <th style="text-align: center;">روی جایی</th>
                                    <th style="text-align: center;">دوشک</th>
                                    <th style="text-align: center;">کمپل</th>
                                    <th style="text-align: center;">تنظیمات</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) {?>
                                    <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        foreach($studentId as $stuId){
                                            if($stuId->stu_id == $row->stu_id){?>
                                                <a href="<?=base_url()?>index.php/studentController/studentDetail?id=<?=$stuId->stu_id?>"><?=$stuId->student_id;?></a>
                                            <?php }
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->pillow=='1') echo 'checked';?> ></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->blanket=='1') echo 'checked';?> ></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->mattress=='1') echo 'checked';?>></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->bedsheet=='1') echo 'checked';?>></td>
                                        <td style="text-align: center;">
                                         <a class="btn btn-circle btn-icon-only btn-success" href="<?= base_url()?>index.php/studentController/editStuCloths?id=<?=$row->stu_id;?>"><span class="fa fa-pencil"></a>
                                        </td>
                                    </tr>
                                     <?php } ?>
                            </tbody>
                        </table>
                       
                    </div>
                </div><!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
     </div>
   </div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" align="right" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">اضافه نمودن البسه </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/studentController/addStuCloth">
                    <div class="form-group">
                           <div class="form-group form-md-line-input">
                            <div class="col-sm-3">
                                <select class="form-control" name="stu_id">
                                    <option value="0">انتخاب آی دی</option>
                                    <?php foreach ($student as  $value) {?>
                                    <option  value="<?=$value->stu_id?>"><?=$value->student_id?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <label>بالش
                            <input type="checkbox" name="action[]" value="pillow" class="form-control"></label>
                        &nbsp&nbsp&nbsp
                        <label>روی جای
                            <input type="checkbox" name="action[]" value="blanket" class="form-control" ></label>
                        &nbsp&nbsp&nbsp
                        <label>دوشک
                            <input type="checkbox" name="action[]" value="mattress" class="form-control" ></label>
                        &nbsp&nbsp&nbsp
                        <label>کمپل
                            <input type="checkbox" name="action[]" value="bedsheet" class="form-control"></label>
                        &nbsp&nbsp&nbsp

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="addStuCloth" class="btn btn-success" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>
                        

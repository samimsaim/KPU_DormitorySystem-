<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>mainpage/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>لیست صلاحیت های کاربران</b>
                </li>
            </ul>
        </div>
    <div class="portlet-body flip-scroll">
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
                               <th style="text-align: center;"> نام </th>
                               <th style="text-align: center;"> ایجاد کردن </th>
                               <th style="text-align: center;" > خواندن </th>
                               <th style="text-align: center;" > ویرایش </th>
                               <th style="text-align: center;" > حذف </th>
                               <th style="text-align: center;"> صلاحیت </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as  $row) {?>
                                <tr>
                                    <td style="text-align: center;"><?=$row->pervilage_name?></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->create_roll=='1') echo 'checked';?> ></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->read_roll=='1') echo 'checked';?> ></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->update_roll=='1') echo 'checked';?>></td>
                                    <td style="text-align: center;"><input type="checkbox" disabled="" <?php if($row->delete_roll=='1') echo 'checked';?>></td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-circle btn-icon-only btn-success" href="<?php echo base_url()?>index.php/usersController/updatePrivilege?id=<?=$row->privilege_id;?>">
                                            <span class="fa fa-pencil">
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-danger" href="<?php echo base_url()?>index.php/usersController/deletePrivilege?id=<?=$row->privilege_id;?>">
                                            <span class="fa fa-trash-o">
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
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
                <h4 class="modal-title">اضافه نمودن صلاحیت </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>index.php/usersController/addPrivilege">
                    <div class="form-group">
                        <div class="form-group form-md-line-input col-md-4 has-success">
                            <input  type="text" name="name" class="form-control" id="form_control_1" placeholder="اسم"  required>
                            <label for="form_control_1">اسم</label>
                        </div>
                        <br><br>
                        <label>ایجاد نمودن
                            <input type="checkbox" name="action[]" value="create" ></label>
                        &nbsp&nbsp&nbsp
                        <label>خواند
                            <input type="checkbox" name="action[]" value="read" ></label>
                        &nbsp&nbsp&nbsp
                        <label>ویرایش
                            <input type="checkbox" name="action[]" value="update" ></label>
                        &nbsp&nbsp&nbsp
                        <label>حذف
                            <input type="checkbox" name="action[]" value="delete"></label>
                        &nbsp&nbsp&nbsp

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" align="right" data-dismiss="modal">لغو</button>
                <input type="submit" name="add_roll" class="btn btn-success" value="ثبت" >
                </form>
            </div>
        </div>
    </div>
</div>

               
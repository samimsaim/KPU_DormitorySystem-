            <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>mainpage/index">صفحه اصلی</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    ویرایش صلاحیت های استفاده کننده
                   </div>
            </div>
            <div class="portlet-body flip-scroll">
                <form method="post" action="<?=base_url()?>index.php/usersController/editPrivilege">
                    <table class="table table-bordered table-striped table-condensed flip-content" style="text-align: center;">
                        <thead class="flip-content">
                            <tr>
                            <th style="text-align: center;">نام </th>
                                <th style="text-align: center;"> ایجاد کردن </th>
                                <th style="text-align: center;"> خواندن </th>
                                <th style="text-align: center;"> ویرایش </th>
                                <th style="text-align: center;"> حذف </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($priv as  $value) {?>
                            <tr>
                            <td>

                            <?=$value->pervilage_name?></td>
                             <td><input type="checkbox" name="action[]" value="create"
                             <?php echo set_checkbox('action[]', 'create', FALSE); ?>
                             <?php if($value->create_roll=='1') echo 'checked';?>>
                             </td>
                             <td><input type="checkbox" name="action[]" value="read"
                              <?php echo set_checkbox('action[]', 'read', FALSE); ?>
                              <?php if($value->read_roll=='1') echo 'checked';?>>
                              </td>
                             <td><input type="checkbox" name="action[]" value="update" <?php echo set_checkbox('action[]', 'update', FALSE); ?>
                              <?php if($value->read_roll=='1') echo 'checked';?>>
                              </td>
                             <td><input type="checkbox" name="action[]" value="delete" <?php echo set_checkbox('action[]', 'delete', FALSE); ?>
                             <?php if($value->delete_roll=='1') echo 'checked';?>>
                             </td>

                            </tr>
                            <input type="hidden" name="priv_id" value="<?=$value->privilege_id?>">
                            <?php }?>
                        </tbody>
                    </table>
                    <input type="submit" name="editPrivilege" class="btn btn-success" value="ثبت">
                    <a href="<?=base_url()?>index.php/usersController/privilege"><span class="btn btn-danger">لغو</span></a>
                </form>
            </div>
        </div>
    </div>
</div>

       
          
                        

               
                   
               
      
         
       
 
    
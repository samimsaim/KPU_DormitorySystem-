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
                    ویرایش البسه شاگرد
                   </div>
            </div>
            <div class="portlet-body flip-scroll">
                <form method="post" action="<?=base_url()?>index.php/studentController/updateCloths">
                    <table class="table table-bordered table-striped table-condensed flip-content" style="text-align: center;">
                        <thead class="flip-content">
                            <tr>
                            <th style="text-align: center;">آی دی</th>
                            <th style="text-align: center;">بالش</th>
                            <th style="text-align: center;">روی جایی</th>
                            <th style="text-align: center;">دوشک</th>
                            <th style="text-align: center;">کمپل</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($result as  $value) {}?>
                            <tr>
                            <td>

                            <?=$value->stu_id?></td>
                             <td><input type="checkbox" name="action[]" value="create"
                             <?php echo set_checkbox('action[]', 'create', FALSE); ?>
                             <?php if($value->pillow=='1') echo 'checked';?>>
                             </td>
                             <td><input type="checkbox" name="action[]" value="read"
                              <?php echo set_checkbox('action[]', 'read', FALSE); ?>
                              <?php if($value->blanket=='1') echo 'checked';?>>
                              </td>
                             <td><input type="checkbox" name="action[]" value="update" <?php echo set_checkbox('action[]', 'update', FALSE); ?>
                              <?php if($value->mattress=='1') echo 'checked';?>>
                              </td>
                             <td><input type="checkbox" name="action[]" value="delete" <?php echo set_checkbox('action[]', 'delete', FALSE); ?>
                             <?php if($value->bedsheet=='1') echo 'checked';?>>
                             </td>

                            </tr>
                            <input type="hidden" name="stu_id" value="<?=$value->stu_id?>">
                        </tbody>
                    </table>
                    <input type="submit" name="editPrivilege" class="btn btn-success" value="ثبت">
                </form>
            </div>
        </div>
    </div>
</div>

       
          
                        

               
                   
               
      
         
       
 
    
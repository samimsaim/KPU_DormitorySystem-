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
                     <b>لیست پوهنحًی ها</b>
                </li>
            </ul>
        </div>
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6" style=" margin-bottom: -8px;">
                            <div class="btn-group">
                                <a href="<?php echo base_url()?>index.php/facultyController/addFaculty" id="sample_editable_1_new" class="btn sbold green">اضافه نمودن<i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-list">
                    <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                        <div class="list-head-title-container">
                            <h3 class="list-title">لیست پوهنحْی ها</h3>
                        </div>
                    </div>
                    <?php
                    $i=0;
                     foreach ($fac as $value) {?>
                    <div class="mt-list-container list-simple ext-1 group">
                        <a class="list-toggle-container" data-toggle="collapse" href="#<?='col_id'.$i?>" aria-expanded="false">
                            <div class="list-toggle <?php if($i%2==0) echo 'done';?> uppercase">
                                <span><?=$value->fac_name?></span>
                                <span class="badge badge-default bg-white font-green bold pull-right"><?php $j=$i; echo ++$j;?></span>
                                <form action="<?=base_url()?>index.php/facultyController/deleteFaculty" method="post" class="pull-right" style="margin-top: -8px; margin-left: 15px;">
                                    <input type="hidden" name="fac_id" value="<?=$value->fac_id;?>"/>
                                    <button type="submit" name="deleteFac" class="btn btn-circle btn-icon-only btn-danger" ><span class="fa fa-trash-o"></button>
                                </form>
                            </div>
                        </a>
                        <div class="panel-collapse collapse" id="<?='col_id'.$i?>">
                            <ul>
                                <?php foreach ($dep as $row) {
                                    if($row->fac_id == $value->fac_id){?>
                                    <li class="mt-list-item done">
                                        <div class="list-icon-container">
                                            <i class="icon-check"></i>
                                        </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase">
                                                <a href="javascript:;"><?php echo $row->dep_name;?></a>
                                                <a class="btn btn-circle btn-icon-only btn-danger pull-right" style="margin-top: -8px;" href="<?php echo base_url()?>index.php/facultyController/deleteDep?id=<?=$row->dep_id;?>"><span class="fa fa-trash-o"></a>
                                            </h3>
                                        </div>
                                    </li>
                                <?php }}?>
                            </ul>
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <a href="<?php echo base_url()?>index.php/facultyController/index" class="btn btn-primary">بستن</a>
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
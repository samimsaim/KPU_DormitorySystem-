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
                    <a href="<?=base_url()?>index.php/employeeController/index">مدیریت کارمندان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>نمایش کاربر</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات کاربر</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/employeeController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <?php foreach($employeeDetails as $row){?>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>اسم</th>
                                            <td><?=ucfirst($row->name)?></td>
                                        </tr>
                                        <tr>
                                            <th>ولد</th>
                                            <td><?=ucfirst($row->father_name)?></td>
                                        </tr>
                                         <tr>
                                            <th>ولدیت</th>
                                            <td><?=ucfirst($row->grand_father_name)?></td>
                                        </tr>
                                        <tr>
                                            <th>جنسیت</th>
                                            <td><?php if($row->gender=='m') echo 'مرد'; else echo 'زن';?></td>
                                        </tr>
                                        <tr>
                                            <th>موقف</th>
                                            <td><?=$row->position?></td>
                                        </tr>
                                        <tr>
                                            <th>شماره تماس</th>
                                            <td><?=$row->phone?></td>
                                        </tr>
                                        <tr>
                                            <th>تاریخ درج</th>
                                            <td style="font-weight: bold;"><?php
                                                // -------------- date setting ----------
                                                $date = preg_split("/[- ]+/", $row->created_at);
                                                $jalaliDate = $jDate->toJalali($date[0],$date[1],$date[2]);
                                                $jalaliDate[3] = $date[3];
                                                $jalaliDate[1] = $jDate->getMonthNames($jalaliDate[1]);
                                                $jalaliDate[0] = $jDate->convertNumbers($jalaliDate[0]);
                                                $jalaliDate[2] = $jDate->convertNumbers($jalaliDate[2]);
                                                $jalaliDate[3] = $jDate->convertNumbers($jalaliDate[3]);
                                                krsort($jalaliDate);
                                                // ------------- print date -------------
                                                echo implode(' - ', $jalaliDate);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ردج کننده</th>
                                            <td>
                                                <?php foreach($users as $value);?>
                                                <a href="<?php echo base_url()?>index.php/usersController/userDetails?id=<?=$value->user_id?>"><?=ucfirst($value->username);?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3"><br/>
                            <span class="thumbnail">
                                <img src="<?php if(!empty($row->photo)){ echo base_url().$row->photo;} else{ if($row->gender=='m'){ echo base_url()."assets/img/employee/male.jpg";} elseif($row->gender=='f'){ echo base_url()."assets/img/employee/female.jpg";}}?>">
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <div style="background:url(<?=base_url();?>assets/img/hand.jpg) no-repeat center ; width: 750px; height: 400px;">
                                <?php
                                if(isset($fingerIds)){?>
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
            <?php }?>
        </div>
    </div>
</div>








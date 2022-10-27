
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
                                <a href="<?=base_url()?>index.php/studentController/index">شاگردان</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                               <b>جزئیات شاگرد</b>
                            </li>

                        </ul>
                        </div>
                   <?php foreach ($result as  $row)  {}?>
                    <?php foreach ($stu_cont as  $cont) {} ?>
                    <?php foreach ($dorm_info as  $dorm) {} ?>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="profile-content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات شلگرد</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/studentController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                         <div class="">
                                <div class="portlet-title">
                                  
                                    <div class="tools">
                                       
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-5 col-md-push-1 col-sm-5 col-sm-push-1">
                                                <div class="profile-userpic">
                                                    <img class="img-rounded" src="<?php if(!empty($row->stu_photo)){ echo base_url().$row->stu_photo;} else{ if($row->gender=='m'){ echo base_url()."assets/img/students/male.jpg";} elseif($row->gender=='f'){ echo base_url()."assets/img/students/female.jpg";}}?>" style="height: 120px; width: 120px;" >
                                                    <h3 style="margin-right: 10px;">عکس شاگرد</h3>
                                                </div>
                                                <div class="container"></div>
                                            </div>
                                            <div class="col-md-2 col-md-push-4 col-sm-2 col-sm-push-4">
                                                <div class="profile-userpic">
                                                    <a href="">
                                                        <img class="img-rounded" src="<?php if(!empty($row->tazkira_photo)){ echo base_url().$row->tazkira_photo;} else{echo base_url()."assets/img/students/document.svg"; }?>" style="height: 120px; width: 120px;" >
                                                    </a>
                                                    <h3 style="margin-right: 15px;">عکس تذکره</h3>
                                                </div>
                                                <div class="container"></div>
                                            </div>
                                        </div>


                              <table class="table table-bordered table-hover"> 
                                                <tr >
                                                    <th> اسم </th>
                                                    <td><?=$row->name?></td>
                                                     <th>ولد </th>
                                                    <td><?=$row->father_name?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> ولد یت </th>
                                                    <td><?=$row->grand_father_name?></td>
                                                      <th> نمبر تذکره </th>
                                                    <td><?=$jDate->convertNumbers($row->identity_no);?></td>
                                                </tr>
                                               
                                                 <tr>
                                                    <th>جنسیت</th>
                                                    <td><?php if($row->gender=='m') echo 'مرد'; if($row->gender=='f') echo 'زن';?></td>
                                                    <th>ملیت</th>
                                                    <td><?=$row->nationality?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>پوهنتون</th>
                                                    <td><?=$row->university?></td>
                                                    <th>پوهنحًی</th>
                                                    <td><?php
                                                        foreach($fac as $faculty) {
                                                            if ($faculty->fac_id == $row->faculty)
                                                                echo $faculty->fac_name;
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                               
                                                <tr>
                                                    <th>رشته</th>
                                                    <td><?php
                                                        foreach($dep as $deps) {
                                                            if ($deps->dep_id == $row->department)
                                                                echo $deps->dep_name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <th>صنف</th>
                                                    <td><?php
                                                        if($row->class_no == 1) echo 'اول';
                                                        if($row->class_no == 2) echo 'دوم';
                                                        if($row->class_no == 3) echo 'سوم';
                                                        if($row->class_no == 4) echo 'چهارم';
                                                        if($row->class_no == 5) echo 'پنجم';
                                                        ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>ولایت</th>
                                                    <td><?=$row->provence?></td>
                                                    <th>ولسوالی</th>
                                                    <td><?=$row->village?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>سکونت اصلی</th>
                                                    <td><?=$row->base_address?></td>
                                                     <th>سکونت فعلی</th>
                                                    <td><?=$row->current_address?></td>
                                                </tr>
                                                 <tr>
                                                    <th>بلاک</th>
                                                    <td><?php
                                                        if($dorm->block_no == 1) echo 'اول';
                                                        if($dorm->block_no == 2) echo 'دوم';
                                                        if($dorm->block_no == 3) echo 'سوم';
                                                        if($dorm->block_no == 4) echo 'چهارم';
                                                        if($dorm->block_no == 5) echo 'پنجم';
                                                        ?></td>
                                                    <th>منزل</th>
                                                    <td><?php
                                                        if($dorm->floor_no == 1) echo 'اول';
                                                        if($dorm->floor_no == 2) echo 'دوم';
                                                        if($dorm->floor_no == 3) echo 'سوم';
                                                        if($dorm->floor_no == 4) echo 'چهارم';
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <th>اطاق</th>
                                                    <td><?=$jDate->convertNumbers($dorm->room_no);?></td>
                                                     <th>شماره تماس</th>
                                                    <td><?=$jDate->convertNumbers($cont->phone);?></td>
                                                </tr>
                                                 <tr>
                                                    <th>ایمیل آدرس</th>
                                                    <td><a href="mailto:<?=$cont->email?>"><?=$cont->email?></a></td>
                                                    <th>تاریخ ثبت</th>
                                                    <td style="font: bold"><?php
                                                        // -------------- date setting ----------
                                                        $date = preg_split("/[- ]+/", $row->create_at);
                                                        $jalaliDate = $jDate->toJalali($date[0],$date[1],$date[2]);
                                                        $jalaliDate[3] = $date[3];
                                                        $jalaliDate[1] = $jDate->getMonthNames($jalaliDate[1]);
                                                        $jalaliDate[0] = $jDate->convertNumbers($jalaliDate[0]);
                                                        $jalaliDate[2] = $jDate->convertNumbers($jalaliDate[2]);
                                                        $jalaliDate[3] = $jDate->convertNumbers($jalaliDate[3]);
                                                        krsort($jalaliDate);
                                                        // ------------- print date -------------
                                                        echo implode(' - ', $jalaliDate);
                                                        ?></td>
                                                </tr>
                                                <tr>
                                                    <th>درج کننده</th>
                                                    <td>
                                                        <?php foreach($users as $value);?>
                                                            <a href="<?php echo base_url()?>index.php/usersController/userDetails?id=<?=$value->user_id?>"><?=ucfirst($value->username);?></a>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                    
                                </div>
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
                     </div>
                   </div>
                 </div>
               </div>
              </div>
           </div>
        </div>        
     </div>
  </div>
  </div>
  </div>
</div>
       
          
                        

               
                   
               
      
         
       
 
    
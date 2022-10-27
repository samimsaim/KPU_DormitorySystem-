<link rel="stylesheet" href="<?=base_url()?>assets/dist/style.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/datepicker.css">

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
                    <b>لیست شاگردان</b>
                </li>
            </ul>
        </div>
         <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light " style="margin-bottom: -160px;">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">لیست حاضری شاگردان</span>
                                    </div>
                                     <div class="actions">
                                            <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/attendanceController" style="font-size: 16px;">
                                                <i class="fa fa-share"></i>برگشت</a>
                                             </a>
                                     </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th> اسم</th>
                                                    <th> ولد </th>
                                                    <th> ولدیت </th>
                                                    <th> آدرس لیله </th>
                                                    <th> شماره تماس </th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ahmad </td>
                                                    <td> Mark </td>
                                                    <td> Otto </td>
                                                    <td> 8/6/4 </td>
                                                    <td>078699504 </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
</div>

<div class="container" style="margin:150px auto;">
    
    <div class="calender"></div>
    <div class="gap"></div>
</div>
<script src="<?=base_url()?>assets/dist/datepicker.js"></script>
<script>
    $(document).ready(function(){
        $(".calender").datepicker({
            altField : "#calenderSelector",
            altSecondaryField : "#calenderSecondarySelector",
            format : "long",
            date   : '2017-07-29',
        });
    });
</script>

</div>
</div>


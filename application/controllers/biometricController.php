<?php
class BiometricController extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model("biometricModel");
        $this->load->library("fingerprint/fingerConfig");
    }

	function index(){
        $deviceInfo = $this->biometricModel->getAllDeviceInfo();
		$this->load->view('include/header.inc.php');
		$this->load->view('biometricView', array("deviceInfo"=>$deviceInfo));
		$this->load->view('include/footer.inc.php');
	}

    function setStuFingerTemplate(){
        $error_dev_name = $error_stu_id = $error_type = '';
        $error = false;
        if (isset($_POST['retrieveTemplate'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['device_id'])) {
                $error_dev_name = 'لطفاً دروازه مورد نظر را انتخاب کنید!';
                $error = true;
            }
            if (empty($_POST['types'])) {
                $error_type = 'لطاً نوعیت اشخاص را انتخاب کنید';
                $error = true;
            }
            if (empty($_POST['stu_id'])) {
                $error_stu_id = 'لطتاً آی دی محصل را انتخاب کنید!';
                $error = true;
            }
        }
        if (!$error) {
            BiometricController::insertBioData($_POST['stu_id'],$_POST['types'],$_POST['device_id']);
        } else {
            $this->load->view('include/header.inc.php');
            $deviceInfo = $this->biometricModel->getAllDeviceInfo();
            $this->load->view('biometricView', array(
                "deviceInfo"=>$deviceInfo,
                'error_dev_name' => $error_dev_name,
                'error_type'=>$error_type,
                'error_stu_id' => $error_stu_id,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

    function insertBioData($id,$type,$devId){
        $deviceIp = $this->biometricModel->getDeviceInfo($devId);
        $zkteco = $this->fingerconfig->setUp($deviceIp,0);
        $check = null;
        $tblId = 0;
        if($type == "students") {
            $stuId = $this->biometricModel->getRecordId($id);
            $check = $this->biometricModel->checkHasRecord($stuId,$type);
            $tblId = $stuId;
        }elseif($type == "employee"){
            $check = $this->biometricModel->checkHasRecord($id,$type);
            $tblId = $id;
        }
        if($check == 0 ){
            $stuInfo = $zkteco->get_user_info(['pin'=>$id])->to_array();
            if(!empty($stuInfo)) {
                $bioData = array(
                    'RFID_card' => $stuInfo["Row"]["Card"],
                    'tbl_id' => $tblId,
                    'type' => $type,
                    'create_at' => date('Y-m-d h:i:s a'),
                    'update_at' => date('Y-m-d h:i:s a')
                );
                $bioId = $this->biometricModel->insertBioData($bioData);
                if (isset($bioId)) {
                    $fingerTemplate = $zkteco->get_user_template(['pin' => $id])->to_array();
                    $fingerData = array();
                    if (count($fingerTemplate["Row"]) == 5) {
                        $fingerData[0] = array(
                            'finger_id' => $fingerTemplate["Row"]["FingerID"],
                            'size' => $fingerTemplate["Row"]["Size"],
                            'valid' => $fingerTemplate["Row"]["Valid"],
                            'template' => $fingerTemplate["Row"]["Template"],
                            'bio_id' => $bioId
                        );
                    } else {
                        for ($x = 0; $x < count($fingerTemplate["Row"]); $x++) {
                            $fingerData[$x] = array(
                                'finger_id' => $fingerTemplate["Row"][$x]["FingerID"],
                                'size' => $fingerTemplate["Row"][$x]["Size"],
                                'valid' => $fingerTemplate["Row"][$x]["Valid"],
                                'template' => $fingerTemplate["Row"][$x]["Template"],
                                'bio_id' => $bioId
                            );
                        }
                    }
                    $fingerIds = array();
                    for ($y = 0; $y < count($fingerData); $y++) {
                        $this->biometricModel->insertFingerTemplate($fingerData[$y]);
                        $fingerIds[$y] = array("fingerId" => $fingerData[$y]["finger_id"]);
                    }
                    $this->load->view('include/header.inc.php');
                    $deviceInfo = $this->biometricModel->getAllDeviceInfo();
                    $this->load->view('biometricView', array(
                        "deviceInfo" => $deviceInfo,
                        'type' => true,
                        'msg' => "اثر انگشت این شخص موفقانه درج سیستم شد!",
                        'fingerIds' => $fingerIds
                    ));
                    $this->load->view('include/footer.inc.php');
                }
            }else{
                $this->load->view('include/header.inc.php');
                $deviceInfo = $this->biometricModel->getAllDeviceInfo();
                $this->load->view('biometricView', array(
                    "deviceInfo"=>$deviceInfo,
                    'type' => false,
                    'msg'=> "اثر انگشت این شخص در این وسیله موجود نیست، لطفاً وسیله دیگر را امتحان کنید!"
                ));
                $this->load->view('include/footer.inc.php');
            }
        }else{
            $this->load->view('include/header.inc.php');
            $deviceInfo = $this->biometricModel->getAllDeviceInfo();
            $this->load->view('biometricView', array(
                "deviceInfo"=>$deviceInfo,
                'type' => false,
                'msg'=> "اثر انگشت این شخص در سیستم موجود است، لطفاً شخص دیگر را امتحان کنید!"
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
}
?>
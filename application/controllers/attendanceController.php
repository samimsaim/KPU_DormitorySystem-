<?php
/**
* 
*/
class AttendanceController extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model("biometricModel");
        $this->load->model("attendanceModel");
        $this->load->model("employeeModel");
        $this->load->model("StudentModel");
        $this->load->library("fingerprint/fingerConfig");
	}

	function index(){
		$this->load->view('include/header.inc.php');
		$this->load->view('attendanceView');
		$this->load->view('include/footer.inc.php');
	}

	function stuAttView(){
		$this->load->view('include/header.inc.php');
		$this->load->view('stuAttView');
		$this->load->view('include/footer.inc.php');
	}

    function setMoment(){
        $option = $_POST["moment"];
        if($option == "morning"){
            $_SESSION["moment"] = "morning";
            $deviceIps = $this->biometricModel->getAllDeviceInfo();
            foreach($deviceIps as $ip ){
                $zkteco = $this->fingerconfig->setUp($ip->ip_addr,0);
                // ------------- delete all device data -------------
                $zkteco->delete_data(['value'=>1]);
                // ------------ upload all employees data -----------
                $empIds = $this->employeeModel->getAllEmpData();
                foreach($empIds as $eIds){
                    if($eIds->position == "super") {
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 14
                        ]);
                        $template = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($template as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }else{
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 0
                        ]);
                        $tempate = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($tempate as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }
                }
                // ----------- upload all students data -------------
                $stuIds = $this->StudentModel->getAllStuData();
                foreach($stuIds as $sIds){
                    $bioId = $this->StudentModel->getStuBioId($sIds->stu_id);
                    $bioCard = $this->StudentModel->getStuBioCard($sIds->stu_id);
                    $zkteco->set_user_info([
                        'pin' => $sIds->student_id,
                        'card' => $bioCard,
                        'privilege' => 0
                    ]);
                    $template = $this->StudentModel->getStuTemplates($bioId);
                    foreach($template as $finger){
                        $zkteco->set_user_template([
                            'pin' => $sIds->student_id,
                            'finger_id' => $finger->finger_id,
                            'size' => $finger->size,
                            'valid' => $finger->valid,
                            'template' => $finger->template
                        ]);
                    }
                }
            }
            echo json_encode(array("result"=>$option));
        }
        elseif($option == "lunch"){
            $_SESSION["moment"] = "lunch";
            $deviceIps = $this->biometricModel->getAllDeviceInfo();
            foreach($deviceIps as $ip ){
                $zkteco = $this->fingerconfig->setUp($ip->ip_addr,0);
                // ------------- delete all device data -------------
                $zkteco->delete_data(['value'=>1]);
                // ------------ upload all employees data -----------
                $empIds = $this->employeeModel->getAllEmpData();
                foreach($empIds as $eIds){
                    if($eIds->position == "super") {
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 14
                        ]);
                        $template = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($template as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }else{
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 0
                        ]);
                        $tempate = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($tempate as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }
                }
                // ----------- upload all students data -------------
                $stuIds = $this->StudentModel->getAllStuData();
                foreach($stuIds as $sIds){
                    $bioId = $this->StudentModel->getStuBioId($sIds->stu_id);
                    $bioCard = $this->StudentModel->getStuBioCard($sIds->stu_id);
                    $zkteco->set_user_info([
                        'pin' => $sIds->student_id,
                        'card' => $bioCard,
                        'privilege' => 0
                    ]);
                    $template = $this->StudentModel->getStuTemplates($bioId);
                    foreach($template as $finger){
                        $zkteco->set_user_template([
                            'pin' => $sIds->student_id,
                            'finger_id' => $finger->finger_id,
                            'size' => $finger->size,
                            'valid' => $finger->valid,
                            'template' => $finger->template
                        ]);
                    }
                }
            }
            echo json_encode(array("result"=>$option));
        }
        elseif($option == "night"){
            $_SESSION["moment"] = "night";
            $deviceIps = $this->biometricModel->getAllDeviceInfo();
            foreach($deviceIps as $ip ){
                $zkteco = $this->fingerconfig->setUp($ip->ip_addr,0);
                // ------------- delete all device data -------------
                $zkteco->delete_data(['value'=>1]);
                // ------------ upload all employees data -----------
                $empIds = $this->employeeModel->getAllEmpData();
                foreach($empIds as $eIds){
                    if($eIds->position == "super") {
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 14
                        ]);
                        $template = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($template as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }else{
                        $bioId = $this->employeeModel->getEmpBioId($eIds->emp_id);
                        $bioCard = $this->employeeModel->getEmpBioCard($eIds->emp_id);
                        $zkteco->set_user_info([
                            'pin' => $eIds->emp_id,
                            'card' => $bioCard,
                            'privilege' => 0
                        ]);
                        $tempate = $this->employeeModel->getEmpTemplates($bioId);
                        foreach($tempate as $finger){
                            $zkteco->set_user_template([
                                'pin' => $eIds->emp_id,
                                'finger_id' => $finger->finger_id,
                                'size' => $finger->size,
                                'valid' => $finger->valid,
                                'template' => $finger->template
                            ]);
                        }
                    }
                }
                // ----------- upload all students data -------------
                $stuIds = $this->StudentModel->getAllStuData();
                foreach($stuIds as $sIds){
                    $bioId = $this->StudentModel->getStuBioId($sIds->stu_id);
                    $bioCard = $this->StudentModel->getStuBioCard($sIds->stu_id);
                    $zkteco->set_user_info([
                        'pin' => $sIds->student_id,
                        'card' => $bioCard,
                        'privilege' => 0
                    ]);
                    $template = $this->StudentModel->getStuTemplates($bioId);
                    foreach($template as $finger){
                        $zkteco->set_user_template([
                            'pin' => $sIds->student_id,
                            'finger_id' => $finger->finger_id,
                            'size' => $finger->size,
                            'valid' => $finger->valid,
                            'template' => $finger->template
                        ]);
                    }
                }
            }
            echo json_encode(array("result"=>$option));
        }
        else{
            echo json_encode(array("result"=>"nothing"));
        }
    }

    function setAttendanceFirst(){
        $devId = $this->biometricModel->getDevIdFromName($_POST["devName"]);
        $deviceIp = $this->biometricModel->getDeviceInfo($devId);
        $zkteco = $this->fingerconfig->setUp($deviceIp,0);
        $result = $zkteco->get_att_log()->to_array();
        for($i = $_SESSION["attSizeFirst"]; $i <count($result['Row']);$i++){
            $stuId = $this->attendanceModel->getRecordId($result['Row'][$i]["PIN"]);
            $stuPin = $result['Row'][$i]["PIN"];
            $data = array(
                "stu_id"=>$stuId,
                "att_time"=>$result['Row'][$i]["DateTime"],
                "verified_type"=> $result['Row'][$i]["Verified"],
                "status"=>$result['Row'][$i]["Status"]
            );
            if($this->attendanceModel->insertAttData("att_".$_SESSION["moment"],$data) > 0 ){
                $zkteco->delete_user(['pin'=>$stuPin]);
            }
        }
        $_SESSION["attSizeFirst"] = count($result['Row']);
    }

    function setAttendanceSecond(){
        $devId = $this->biometricModel->getDevIdFromName($_POST["devName"]);
        $deviceIp = $this->biometricModel->getDeviceInfo($devId);
        $zkteco = $this->fingerconfig->setUp($deviceIp,0);
        $result = $zkteco->get_att_log()->to_array();
        for($i = $_SESSION["attSizeSecond"]; $i <count($result['Row']);$i++){
            $stuId = $this->attendanceModel->getRecordId($result['Row'][$i]["PIN"]);
            $stuPin = $result['Row'][$i]["PIN"];
            $data = array(
                "stu_id"=>$stuId,
                "att_time"=>$result['Row'][$i]["DateTime"],
                "verified_type"=> $result['Row'][$i]["Verified"],
                "status"=>$result['Row'][$i]["Status"]
            );
            if($this->attendanceModel->insertAttData("att_".$_SESSION["moment"],$data) > 0 ){
                $zkteco->delete_user(['pin'=>$stuPin]);
            }
        }
        $_SESSION["attSizeSecond"] = count($result['Row']);
    }

    function test1(){
//        $devId = 2;
//        $deviceIp = $this->biometricModel->getDeviceInfo($devId);
//        $zkteco = $this->fingerconfig->setUp($deviceIp,0);
//        echo '<pre>';
//        print_r($t = $zkteco->get_att_log()->to_array());
//        echo '</pre>';
//        echo $_SESSION["attSizeFirst"];
//        echo '<br>';
//        echo $_SESSION["attSizeSecond"];

        echo $_SESSION['moment'];
    }
}
?>
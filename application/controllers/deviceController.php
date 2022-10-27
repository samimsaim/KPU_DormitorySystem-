<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class DeviceController extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('deviceModel');
        $this->load->model('usersModel');
    }

    function index($message = null, $type = null){
        $device=$this->deviceModel->getDeviceInfo();
        $this->load->view('include/header.inc.php');
        $this->load->view('device',array("device"=>$device,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
    }

    function addDevice(){
        $this->load->view('include/header.inc.php');
        $this->load->view('addDevice');
        $this->load->view('include/footer.inc.php');
    }

    function checkAddDevice(){
        $error_name = $error_serial_no = $error_ip = $error_port_no = '';
        $error = false;
        if (isset($_POST['addDevice'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم وسیله را وارد نماید';
                $error = true;
            }
            if (empty($_POST['serial_no'])) {
                $error_serial_no = 'لطفاً سریال نمبر وسیله را وارد نماید';
                $error = true;
            }
            if (empty($_POST['ip_addr'])) {
                $error_ip = 'لطفاً ip آدرس وسیله را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['port_no'])) {
                $error_port_no = 'لطفاً نمبر پورت وسیله را وارد نماید!';
                $error = true;
            }
        }
        if (!$error) {
            $fields_data = array(
                'name' => $_POST['name'],
                'serial_no' => $_POST['serial_no'],
                'ip_addr' => $_POST['ip_addr'],
                'port_no' => $_POST['port_no'],
                'status' => 0,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d')
            );
            DeviceController::insertDevice($fields_data);
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addDevice', array(
                'error_name' => $error_name,
                'error_serial_no' => $error_serial_no,
                'error_ip' => $error_ip,
                'error_port_no'=>$error_port_no,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

    function insertDevice($data){
        $result = $this->deviceModel->insertDevice($data);
        if ($result) {
            DeviceController::index("وسیله مورد نظر شما موفقانه اضافه گردید!", 'success');
        } else {
            DeviceController::index("وسیله مورد نظر شما متاسفانه اضافه نگردید. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    function updateDevice(){
        $deviceId = $_GET['id'];
        $result = $this->deviceModel->searchDevice($deviceId);
        $this->load->view('include/header.inc.php');
        $this->load->view('editDevice',array('device'=>$result));
        $this->load->view('include/footer.inc.php');
    }

    function checkEditDevice(){
        $error_name = $error_serial_no = $error_ip = $error_port_no = '';
        $error = false;
        if (isset($_POST['editDevice'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم وسیله را وارد نماید';
                $error = true;
            }
            if (empty($_POST['serial_no'])) {
                $error_serial_no = 'لطفاً سریال نمبر وسیله را وارد نماید';
                $error = true;
            }
            if (empty($_POST['ip_addr'])) {
                $error_ip = 'لطفاً ip آدرس وسیله را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['port_no'])) {
                $error_port_no = 'لطفاً نمبر پورت وسیله را وارد نماید!';
                $error = true;
            }
        }
        $devId = $_POST['deviceId'];
        if (!$error) {
            $fields_data = array(
                'name' => $_POST['name'],
                'serial_no' => $_POST['serial_no'],
                'ip_addr' => $_POST['ip_addr'],
                'port_no' => $_POST['port_no'],
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d')
            );
            DeviceController::editDevice($fields_data,$devId);
        } else {
            $deivceInfo = $this->deviceModel->searchDevice($devId);
            $this->load->view('include/header.inc.php');
            $this->load->view('editDevice', array(
                'device'=>$deivceInfo,
                'error_name' => $error_name,
                'error_serial_no' => $error_serial_no,
                'error_ip' => $error_ip,
                'error_port_no'=>$error_port_no,
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

    function editDevice($data, $id){
        $result = $this->deviceModel->updateDevice($data,$id);
        if ($result) {
            DeviceController::index("وسیله مورد نظر شما موفقانه ویرایش شد!", 'success');
        } else {
            DeviceController::index("وسیله مورد نظر شما متاسفانه ویرایش نشد!", 'failed');
        }
    }

    function deleteDevice(){
        $id=$_GET['id'];
        $result = $this->deviceModel->deleteDevice($id);
        if($result){
            DeviceController::index("وسیله مورد نظر شما موفقانه حذف شد!", 'success');
        }else{
            DeviceController::index("وسیله مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    function schedule($message = null, $type = null){
        $users = $this->usersModel->getUser();
        $schedule=$this->deviceModel->getScheduleInfo();
        $this->load->view("include/header.inc.php");
        $this->load->view("schedule",array("schedule"=>$schedule,"users"=>$users,'Message' => $message, 'Type' => $type));
        $this->load->view("include/footer.inc.php");
    }

    function addSchedule(){
        if(isset($_POST["addSchedule"])){
            $data = array(
                "time_amount"=> $_POST["amount"],
                "moment_name"=>$_POST["moment_name"],
                "start_time"=>$_POST["start_time"],
                "end_time"=>$_POST["end_time"],
                "user_id"=>$_SESSION["id"]
            );
            $result = $this->deviceModel->insertSchedule($data);
            if($result){
                DeviceController::schedule("عملیات اضافه کردن موفقانه انجام شد!", 'success');
            }else{
                DeviceController::schedule("عملیات اضافه کردن موفقانه انجام نشد؛ لطفاً دوباره کوشش نماید!", 'failed');
            }
        }
    }

    function searchSchedule(){
        $id = $_POST["scheduleId"];
        $result = $this->deviceModel->searchSchedule($id);
        echo json_encode($result);
    }

    function editSchedule(){
        if(isset($_POST["editSchedule"])){
            $id = $_POST["id"];
            $data = array(
                "time_amount"=> $_POST["amount"],
                "moment_name"=>$_POST["moment_name"],
                "start_time"=>$_POST["start_time"],
                "end_time"=>$_POST["end_time"],
                "user_id"=>$_SESSION["id"]
            );
            $result = $this->deviceModel->updateSchedule($data,$id);
            if($result){
                DeviceController::schedule("عملیات ویرایش کردن موفقانه انجام شد!", 'success');
            }else{
                DeviceController::schedule("عملیات ویرایش کردن موفقانه انجام نشد؛ لطفاً دوباره کوشش نماید!", 'failed');
            }
        }
    }

    function deleteSchedule(){
        $result = $this->deviceModel->deleteSchedule($_GET["id"]);
        if($result){
            DeviceController::schedule("عملیات حذف کردن موفقانه انجام شد!", 'success');
        }else{
            DeviceController::schedule("عملیات حذف کردن موفقانه انجام نشد؛ لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
}
?>
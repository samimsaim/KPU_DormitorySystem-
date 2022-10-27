<?php
class EmployeeController extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('employeeModel');
		$this->load->model('usersModel');
		$this->load->model('biometricModel');
	}

	function index($message = null, $type = null){
		$employee=$this->employeeModel->getEmp();
		$this->load->view('include/header.inc.php');
		$this->load->view('employeeView',array("employee"=>$employee,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}

	function addEmp(){
		$this->load->view('include/header.inc.php');
		$this->load->view('addEmpView');
		$this->load->view('include/footer.inc.php');
	}

	function checkAddEmp(){
        $error_emp_id = $error_name=$error_father_name=$error_grand_father_name =$error_position=$error_phone=$error_photo=$error_gender = '';
		$error = false;
			if(isset($_POST['addEmp'])){
                if (empty($_POST['emp_id'])) {
                    $error_emp_id = 'لطفاً آی دی خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['name'])) {
                    $error_name = 'لطفاً اسم خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['father_name'])) {
                    $error_father_name = 'لطفاً اسم پدر خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['grand_father_name'])) {
                    $error_grand_father_name = 'لطفاً اسم پدر کلان خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['position'])) {
                    $error_position = 'لطفاً موقف خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['phone'])) {
                    $error_phone = 'لطفاً شماره تماس خود را درج نماید!';
                    $error = true;
                }
                if (empty($_POST['gender'])) {
                    $error_gender = 'لطفاً جنسیت خود را انتخاب نماید!';
                    $error = true;
                }
                // ------------------------ Image validation ---------------
                if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                    if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                        $error_photo = "Please select jpeg| jpg| png files";
                        $error = true;
                    }
                } else {
                    switch ($_FILES["photo"]["error"]){
                        case UPLOAD_ERR_INI_SIZE:
                            $error_photo = "This photo has larger size";
                            $error = true;
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $error_photo = "The photo is larger than the script allows.";
                            $error = true;
                            break;
                        case UPLOAD_ERR_NO_FILE:
//                            $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                            $error = true;
                            break;
                        default:
                            $error_photo = "Please contact to server manager !";
                            $error = true;
                    }
                }
            // ---------------------------------------------------------
            if(!$error){
            $destination ="C:/xampp/htdocs/kpu/assets/img/employee/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
            move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "assets/img/employee/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
                if(empty($_FILES["photo"]["name"])){
                    $image = "";
                }
                $data=array(
                'emp_id'=>$_POST['emp_id'],
                'name'=>$_POST['name'],
                'father_name'=>$_POST['father_name'],
                'grand_father_name'=>$_POST['grand_father_name'],
                'position'=>$_POST['position'],
                'phone'=>$_POST['phone'],
                'photo'=>$image,
                'author_id'=>$_SESSION["id"],
                'gender'=>$_POST['gender'],
                'created_at'=>date('Y-m-d h:m:s'),
                );
                $result = $this->employeeModel->addEmp($data);
                if ($result) {
                    EmployeeController::index("کارمند مورد نظر شما موفقانه اضافه شد!", 'success');
                } else {
                    EmployeeController::index("کارمند مورد نظر شما متاسفانه اضافه نشد!", 'failed');
                }
	        }else{
                $this->load->view('include/header.inc.php');
                $this->load->view('addEmpView',array(
                    'error_emp_id'=>$error_emp_id,
                    'error_name'=>$error_name,
                    'error_father_name'=>$error_father_name,
                    'error_grand_father_name'=>$error_grand_father_name,
                    'error_position'=>$error_position,
                    'error_phone'=>$error_phone,
                    'error_photo'=>$error_photo,
                    'error_gender'=>$error_gender
                ));
                $this->load->view('include/footer.inc.php');
	        }
	    }
    }

	function editEmp(){
		$id = $_GET['id'];
        $result = $this->employeeModel->empDetails($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('editEmp',array('emp'=>$result));
        $this->load->view('include/footer.inc.php');
	}

	function checkEditEmp(){
        $error_name=$error_father_name=$error_grand_father_name =$error_position=$error_phone=$error_photo=$error_gender = '';
        $error = false;
        if(isset($_POST['editEmp'])){
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['father_name'])) {
                $error_father_name = 'لطفاً اسم پدر خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['grand_father_name'])) {
                $error_grand_father_name = 'لطفاً اسم پدر کلان خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['position'])) {
                $error_position = 'لطفاً موقف خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً شماره تماس خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت خود را انتخاب نماید!';
                $error = true;
            }
            // ------------------------ Image validation ---------------
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]){
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                            $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                            $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
            if(!$error){
                $id=$_POST['id'];
                $data=array(
                    'name'=>$_POST['name'],
                    'father_name'=>$_POST['father_name'],
                    'grand_father_name'=>$_POST['grand_father_name'],
                    'position'=>$_POST['position'],
                    'phone'=>$_POST['phone'],
                    'author_id'=>$_SESSION["id"],
                    'gender'=>$_POST['gender'],
                    'created_at'=>date('Y-m-d h:m:s'),
                    'photo'=>""
                );
                if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                    $destination = "C:/xampp/htdocs/kpu/assets/img/employee/";
                    if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                        move_uploaded_file($_FILES['photo']['tmp_name'], $destination .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5));
                    $image = "assets/img/employee/" .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5);
                    $data['photo'] = $image;
                    $photo_url =(isset($_POST['photo_path']))? $_POST['photo_path'] : null;
                    if($photo_url !=null)
                        unlink($photo_url);
                }else{
                    array_pop($data);
                }
                $result = $this->employeeModel->updateEmp($id,$data);
                if ($result) {
                    EmployeeController::index("کارمند مورد نظر شما موفقانه ویرایش شد!", 'success');
                } else {
                    EmployeeController::index("کارمند مورد نظر شما متاسفانه ویرایش نشد!", 'failed');
                }
            }else{
                $id = $_POST["id"];
                $result = $this->employeeModel->empDetails($id);
                $this->load->view('include/header.inc.php');
                $this->load->view('editEmp',array('emp'=>$result,
                    'error_name'=>$error_name,
                    'error_father_name'=>$error_father_name,
                    'error_grand_father_name'=>$error_grand_father_name,
                    'error_position'=>$error_position,
                    'error_phone'=>$error_phone,
                    'error_photo'=>$error_photo,
                    'error_gender'=>$error_gender
                ));
                $this->load->view('include/footer.inc.php');
            }
        }
	}

    function empInfo(){
        $id=$_GET['id'];
        $jDate = new jDateTime(true,true,"asia/kabul");
        $templateIds = array();
        if($this->biometricModel->checkHasBioData($id,"employee") > 0) {
            $bioId = $this->biometricModel->getBioDataId($id,"employee");
            $templateIds = $this->biometricModel->getTemplateIds($bioId);
        }
        $fingerIds = array();
        $x = 0;
        foreach($templateIds as $value){
            $fingerIds[$x] = array("fingerId"=>$value->finger_id);
            $x++;
        }
        $data = $this->employeeModel->empDetails($id);
        foreach($data as $value);
        $user = $this->usersModel->search_user($value->author_id);
        $this->load->view('include/header.inc.php');
        $this->load->view('employeeDetail',array('employeeDetails'=>$data,'jDate'=>$jDate,'users'=>$user,'fingerIds'=>$fingerIds));
        $this->load->view('include/footer.inc.php');
    }

	function deleteEmpInfo(){
        $empId = $_GET["id"];
        $check = $this->biometricModel->checkHasBioData($empId,"employee");
        if($check > 0) {
            $bioId = $this->employeeModel->deleteEmployeeBioData($empId);
            if($bioId > 0)
                $this->employeeModel->deleteFingerTemplate($bioId);
        }
        $delete = $this->employeeModel->empDetails($empId);
        foreach($delete as $row){
            if(!empty($row->photo)) {
                unlink($row->photo);
            }
        }
        $result = $this->employeeModel->deleteEmp($empId);
        if($result){
            EmployeeController::index("کارمند مورد نظر شما موفقانه حذف شد!", 'success');
        } else {
            EmployeeController::index("کارمند مورد نظر شما متاسفانه حذف نشد!", 'failed');
        }
	}

    function deleteBioData(){
        $empId = $_GET["id"];
        $check = $this->biometricModel->checkHasBioData($empId,"employee");
        if($check > 0) {
            $bioId = $this->employeeModel->deleteEmployeeBioData($empId);
            if($bioId > 0) {
                $res = $this->employeeModel->deleteFingerTemplate($bioId);
                if($res){
                    EmployeeController::index("معلومات بایومتریک کارمند مورد نظر شما موفقانه حذف گردید!", 'success');
                }else{
                    EmployeeController::index("معلومات بایومتریک کارمند مورد نظر شما متاسفانه حذف نگردید. لطفاً دوباره کوشش نماید!", 'failed');
                }
            }
        }
    }

    function getEmpIds(){
        $result = $this->employeeModel->getAllEmpId();
        echo json_encode($result);
    }

}
?>
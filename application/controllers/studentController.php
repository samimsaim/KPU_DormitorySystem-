<?php
class StudentController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('biometricModel');
		$this->load->model('usersModel');
    }

	function index($message = null, $type = null){
        $query=$this->StudentModel->getAllStudentDetail();
        $dep=$this->StudentModel->getDepartment();
        $fac=$this->StudentModel->getFaculty();
        $this->load->view('include/header.inc.php');
        $this->load->view('students',array('query'=>$query,'fac'=>$fac,'dep'=>$dep,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}

    function addStudent(){
        $department=$this->StudentModel->getDepartment();
        $faculty=$this->StudentModel->getFaculty();
        $this->load->view('include/header.inc.php');
        $this->load->view("addStudent",array('fac'=>$faculty,'dep'=>$department));
        $this->load->view('include/footer.inc.php');
    }

    function checkAddStudent(){
        $error_name = $error_father_name = $error_grand_father_name = $error_identity_no = $error_nationality = $error_university = $error_faculty = $error_department = $error_class = $error_provence=$error_cur_add=$error_bas_add=$error_email=$error_phone=$error_email=$error_block=$error_floor=$error_room=$error_gender=$error_stu_photo=$error_tz_photo=$error_gender=$error_village=$error_student_id =$error_photo = '';
        $error = false;
        if (isset($_POST['addStu'])) {
            // -------------- Form validation -----------------
            if(empty($_POST['student_id'])){
                $error_student_id = 'لطفاً آی دی محصل را وارد نماید!';
                    $error = true;
            }else{
                if ($this->StudentModel->checkHasStudent($_POST['student_id']) > 0) {
                    $error_student_id = 'این آی دی فعلاً در سیستم موجود است لطفاً آی دی خود را دوباره چیک کنید!';
                    $error = true;
                }
            }
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['father_name'])) {
                $error_father_name = 'لطفاً نام پدر خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['grand_father_name'])) {
                $error_grand_father_name = 'لطفاً نام پدر کلان خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['identity_no'])) {
                $error_identity_no = 'لطفاً نمبر تذکره خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['nationality'])) {
                $error_nationality = 'لطفاً  ملیت خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['university'])) {
                $error_university = 'لطفاً نام پوهنتون خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['faculty'])) {
                $error_faculty = 'لطفاً پوهنحْی خود را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['department'])) {
                $error_department = 'لطفاً نام رشته خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['class_no'])) {
                $error_class = 'لطفاً صنف خود درج نماید!';
                $error = true;
            }
            if (empty($_POST['provence'])) {
                $error_provence = 'لطفاً نام ولایت خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['village'])) {
                $error_village = 'لطفاً نام ولسوالی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['current_address'])) {
                $error_cur_add = 'لطفاً آدرس فعلی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['base_address'])) {
                $error_bas_add = 'لطفاً آدرس اصلی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً شماره تماس خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً ایمیل خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['block_no'])) {
                $error_block = 'لطفاً نمبر بلاک خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['floor_no'])) {
                $error_floor = 'لطفاً نمبر منزل  خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['room_no'])) {
                $error_room = 'لطفاً نبر اطاق خود را انتخاب نماید!';
                $error = true;
            }
            // ------------------------ Image validation ---------------
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
            // ------------------------ Image validation ---------------
            if (isset($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["tz_photo"]["type"] != "image/jpeg" && $_FILES["tz_photo"]["type"] != "image/png") {
                    $error_tz_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["tz_photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_tz_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_tz_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_tz_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
        }
        //------------------------------------------------
        if(!$error) {
            $destination = "C:/xampp/htdocs/kpu/assets/img/students/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "assets/img/students/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $destinations = "C:/xampp/htdocs/kpu/assets/img/students/tz_photo/";
            if (!empty($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['tz_photo']['tmp_name'], $destinations . ($_FILES['tz_photo']['name']) . date('his') . "." . substr($_FILES['tz_photo']['type'], 6, 5));
            $tz_image = "assets/img/students/tz_photo/" . ($_FILES['tz_photo']['name']) . date('his') . "." . substr($_FILES['tz_photo']['type'], 6, 5);
            if (empty($_FILES["tz_photo"]["name"])) {
                $tz_image = "";
            }
            $data = array(
                "student_id" => $_POST['student_id'],
                "name" => $_POST['name'],
                "father_name" => $_POST['father_name'],
                "grand_father_name" => $_POST['grand_father_name'],
                "identity_no" => $_POST['identity_no'],
                "gender" => $_POST['gender'],
                "nationality" => $_POST['nationality'],
                "department" => $_POST['department'],
                "faculty" => $_POST['faculty'],
                "university" => $_POST['university'],
                "class_no" => $_POST['class_no'],
                "village" => $_POST['village'],
                "provence" => $_POST['provence'],
                "author_id" => $_SESSION["id"],
                "base_address" => $_POST['base_address'],
                "current_address" => $_POST['current_address'],
                "stu_photo" => $image,
                "tazkira_photo" => $tz_image,
                "create_at" => date('Y-m-d h:m:s')
            );
            $stu_id = $this->StudentModel->insertStudent($data);
            if ($stu_id > 0) {
                $data = array(
                    'block_no' => $_POST['block_no'],
                    'floor_no' => $_POST['floor_no'],
                    'room_no' => $_POST['room_no'],
                    'create_at' => date('Y-m-d h:m:s'),
                    'stu_id' => $stu_id
                );
                $success = $this->StudentModel->InsertDormitoryInfo($data);
                if ($success > 0) {
                    $stu_cont = array(
                        'phone' => $_POST['phone'],
                        'email' => $_POST['email'],
                        'create_at' => date('Y-m-d h:m:s'),
                        'stu_id' => $stu_id
                    );
                    $row = $this->StudentModel->insertStudentContact($stu_cont);
                    if ($row) {
                        $stu_state = array(
                            'state_name' => 'کامیاب',
                            'state_description' => 'واجد شرایت لیلیه میباشد',
                            'state' => 'y',
                            'stu_id' => $stu_id
                        );
                        $stuStateInfo = $this->StudentModel->insertStudentStateInfo($stu_state);
                    }
                    if ($stuStateInfo) {
                        StudentController::index("محصل مورد نظر شما موفقانه اضافه گردید!", 'success');
                    } else {
                        StudentController::index("محصل مورد نظر شما متاسفانه اضافه نگردید. لطفاً دوباره کوشش نماید!", 'failed');
                    }

                }
            }
        } else {
            $dep = $this->StudentModel->getDepartment();
            $fac = $this->StudentModel->getFaculty();
            $this->load->view('include/header.inc.php');
            $this->load->view('addStudent', array(
                'fac' => $fac,
                'dep' => $dep,
                'error_student_id' => $error_student_id,
                'error_name' => $error_name,
                'error_father_name' => $error_father_name,
                'error_grand_father_name' => $error_grand_father_name,
                'error_identity_no' => $error_identity_no,
                'error_nationality' => $error_nationality,
                'error_university' => $error_university,
                'error_faculty' => $error_faculty,
                'error_department' => $error_department,
                'error_class' => $error_class,
                'error_provence' => $error_provence,
                'error_village' => $error_village,
                'error_cur_add' => $error_cur_add,
                'error_bas_add' => $error_bas_add,
                'error_email' => $error_email,
                'error_phone' => $error_phone,
                'error_block' => $error_block,
                'error_floor' => $error_floor,
                'error_room' => $error_room,
                'error_gender' => $error_gender,
                'error_photo' => $error_photo,
                'error_tz_photo' => $error_tz_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

	function editStudent(){
		$id=$_GET['id'];
        $state = $this->StudentModel->getState();
		$fac=$this->StudentModel->getFaculty();
		$result=$this->StudentModel->searchStudent($id);
        foreach($result as $value);
        $dep=$this->StudentModel->getDepOfFaculty($value->faculty);
        $stu_cont=$this->StudentModel->getStudentContact($id);
		$dorm_info=$this->StudentModel->searchDormitoryInfo($id);
		$this->load->view('include/header.inc.php');
		$this->load->view('editStudent',array('result'=>$result,'stu_cont'=>$stu_cont,'dorm_info'=>$dorm_info,'dep'=>$dep,'fac'=>$fac,'state'=>$state));
		$this->load->view('include/footer.inc.php');
	}

	function checkEditStudent(){
        $error_name = $error_father_name = $error_grand_father_name = $error_identity_no = $error_nationality = $error_university = $error_faculty = $error_department = $error_class = $error_provence=$error_cur_add=$error_bas_add=$error_email=$error_phone=$error_email=$error_block=$error_floor=$error_room=$error_gender=$error_stu_photo=$error_tz_photo=$error_gender=$error_village=$error_student_id =$error_photo = '';
        $error = false;
        if (isset($_POST['editStu'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['student_id'])) {
//                $error_student_id = 'لطفاً آیدی خود را درج نماید';
//                $error = true;
            }
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['father_name'])) {
                $error_father_name = 'لطفاً نام پدر خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['grand_father_name'])) {
                $error_grand_father_name = 'لطفاً نام پدر کلان خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['identity_no'])) {
                $error_identity_no = 'لطفاً نمبر تذکره خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['nationality'])) {
                $error_nationality = 'لطفاً  ملیت خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['university'])) {
                $error_university = 'لطفاً نام پوهنتون خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['faculty'])) {
                $error_faculty = 'لطفاً پوهنحْی خود را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['department'])) {
                $error_department = 'لطفاً نام رشته خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['class_no'])) {
                $error_class = 'لطفاً صنف خود درج نماید!';
                $error = true;
            }
            if (empty($_POST['provence'])) {
                $error_provence = 'لطفاً نام ولایت خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['village'])) {
                $error_village = 'لطفاً نام ولسوالی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['current_address'])) {
                $error_cur_add = 'لطفاً آدرس فعلی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['base_address'])) {
                $error_bas_add = 'لطفاً آدرس اصلی خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً شماره تماس خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً ایمیل خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['block_no'])) {
                $error_block = 'لطفاً نمبر بلاک خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['floor_no'])) {
                $error_floor = 'لطفاً نمبر منزل  خود را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['room_no'])) {
                $error_room = 'لطفاً نبر اطاق خود را انتخاب نماید!';
                $error = true;
            }
            // ------------------------ Image validation ---------------
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
//                        $error_photo = "This photo has larger size";
//                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
            // ------------------------ Image validation ---------------
            if (isset($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["tz_photo"]["type"] != "image/jpeg" && $_FILES["tz_photo"]["type"] != "image/png") {
                    $error_tz_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["tz_photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
//                        $error_tz_photo = "This photo has larger size";
//                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_tz_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_tz_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
        }
        //------------------------------------------------
        if(!$error){
            $id = $_POST["stu_id"];
            $data=array(
                "student_id"=>$_POST['student_id'],
                "name"=>$_POST['name'],
                "father_name"=>$_POST['father_name'],
                "grand_father_name"=>$_POST['grand_father_name'],
                "identity_no"=>$_POST['identity_no'],
                "gender"=>$_POST['gender'],
                "nationality"=>$_POST['nationality'],
                "department"=>$_POST['department'],
                "faculty"=>$_POST['faculty'],
                "university"=>$_POST['university'],
                "class_no"=>$_POST['class_no'],
                "village"=>$_POST['village'],
                "provence"=>$_POST['provence'],
                "base_address"=>$_POST['base_address'],
                "current_address"=>$_POST['current_address'],
                "create_at"=>date('Y-m-d h:m:s'),
                "stu_photo"=>"",
                "tazkira_photo"=>""
            );
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                $destination = "C:/xampp/htdocs/kpu/assets/img/students/";
                if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                    move_uploaded_file($_FILES['photo']['tmp_name'], $destination .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5));
                $image = "assets/img/students/" .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5);
                $data['stu_photo'] = $image;
                $photo_url =(isset($_POST['photo_path']))? $_POST['photo_path'] : null;
                if($photo_url !=null)
                    unlink($photo_url);
            }else{
                unset($data["stu_photo"]);
            }

            if(isset($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK) {
                $destination = "C:/xampp/htdocs/kpu/assets/img/students/tz_photo/";
                if (!empty($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK)
                    move_uploaded_file($_FILES['tz_photo']['tmp_name'], $destination .($_FILES['tz_photo']['name']) .date('his'). "." . substr($_FILES['tz_photo']['type'], 6, 5));
                $image = "assets/img/students/tz_photo/" .($_FILES['tz_photo']['name']) .date('his'). "." . substr($_FILES['tz_photo']['type'], 6, 5);
                $data['tazkira_photo'] = $image;
                $photo_url =(isset($_POST['tz_photo_path']))? $_POST['tz_photo_path'] : null;
                if($photo_url !=null)
                    unlink($photo_url);
            }else{
                unset($data["tazkira_photo"]);
            }
            $res=$this->StudentModel->updateStudent($id,$data);
            if($res){
                $data=array(
                    'block_no'=>$_POST['block_no'],
                    'floor_no'=>$_POST['floor_no'],
                    'room_no'=>$_POST['room_no'],
                    'create_at'=>date('Y-m-d h:m:s'),
                    'stu_id'=>$id
                );
                $success=$this->StudentModel->updateDormitoryInfo($id,$data);
                if($success){
                    $stu_cont=array(
                        'phone'=>$_POST['phone'],
                        'email'=>$_POST['email'],
                        'create_at'=>date('Y-m-d h:m:s'),
                        'stu_id'=>$id
                    );
                    $row=$this->StudentModel->updateStudentContact($id,$stu_cont);
                    if($row){
                        StudentController::index("محصل مورد نظر شما موفقانه ویرایش گردید!", 'success');
                    }
                    else{
                        StudentController::index("محصل مورد نظر شما متاسفانه ویرایش نگردید. لطفاً دوباره کوشش نماید!", 'failed');
                    }
                }
            }
        }else {
            $id = $_POST["stu_id"];
            $state = $this->StudentModel->getState();
            $fac = $this->StudentModel->getFaculty();
            $result=$this->StudentModel->searchStudent($id);
            foreach($result as $value);
            $dep=$this->StudentModel->getDepOfFaculty($value->faculty);
            $stu_cont=$this->StudentModel->getStudentContact($id);
            $dorm_info=$this->StudentModel->searchDormitoryInfo($id);
            $this->load->view('include/header.inc.php');
            $this->load->view('editStudent', array(
                'result'=>$result,
                'state'=>$state,
                'fac' => $fac,
                'dep' => $dep,
                'stu_cont'=>$stu_cont,
                'dorm_info'=>$dorm_info,
                'error_student_id' => $error_student_id,
                'error_name' => $error_name,
                'error_father_name' => $error_father_name,
                'error_grand_father_name' => $error_grand_father_name,
                'error_identity_no' => $error_identity_no,
                'error_nationality' => $error_nationality,
                'error_university' => $error_university,
                'error_faculty' => $error_faculty,
                'error_department' => $error_department,
                'error_class' => $error_class,
                'error_provence' => $error_provence,
                'error_village' => $error_village,
                'error_cur_add' => $error_cur_add,
                'error_bas_add' => $error_bas_add,
                'error_email' => $error_email,
                'error_phone' => $error_phone,
                'error_block' => $error_block,
                'error_floor' => $error_floor,
                'error_room' => $error_room,
                'error_gender' => $error_gender,
                'error_photo' => $error_photo,
                'error_tz_photo' => $error_tz_photo
            ));
            $this->load->view('include/footer.inc.php');
        }
	}

    function studentDetail(){
        $stuId=$_GET['id'];
        $jDate = new jDateTime(true,true,"asia/kabul");
        $result=$this->StudentModel->searchStudent($stuId);
        $stu_cont=$this->StudentModel->getStudentContact($stuId);
        $dorm_info=$this->StudentModel->searchDormitoryInfo($stuId);
        $stuInfo = $this->StudentModel->searchStudent($stuId);
        $dep=$this->StudentModel->getDepartment();
        $fac=$this->StudentModel->getFaculty();
        foreach($stuInfo as $value);
        $user = $this->usersModel->search_user($value->author_id);
        $templateIds = array();
        if($this->biometricModel->checkHasBioData($stuId,"students") > 0) {
            $bioId = $this->biometricModel->getBioDataId($stuId,"students");
            $templateIds = $this->biometricModel->getTemplateIds($bioId);
        }
        $fingerIds = array();
        $x = 0;
        foreach($templateIds as $value){
            $fingerIds[$x] = array("fingerId"=>$value->finger_id);
            $x++;
        }
        $this->load->view('include/header.inc.php');
        $this->load->view('studentDetail',array('result'=>$result,'stu_cont'=>$stu_cont,'dorm_info'=>$dorm_info,"fingerIds"=>$fingerIds,'fac'=>$fac,'dep'=>$dep,'users'=>$user,'jDate'=>$jDate));
        $this->load->view('include/footer.inc.php');
    }

    function getDepartments(){
        $facId = $_POST["facId"];
        $deps = $this->StudentModel->getDepOfFaculty($facId);
        echo json_encode($deps);
    }

    function deleteStudentInfo(){
        $stuId = $_GET["id"];
        $this->StudentModel->deleteStudentStates($stuId);
        $this->StudentModel->deleteStudentContact($stuId);
        $this->StudentModel->deleteStudentClothing($stuId);
        $this->StudentModel->deleteDormitoryInfo($stuId);
        $check = $this->biometricModel->checkHasBioData($stuId,"students");
        if($check > 0) {
            $bioId = $this->StudentModel->deleteStudentBioData($stuId);
            if($bioId > 0)
                $this->StudentModel->deleteFingerTemplate($bioId);
        }
        $res = $this->StudentModel->deleteStudentInfo($stuId);
        if($res){
            StudentController::index("محصل مورد نظر شما موفقانه حذف گردید!", 'success');
        }
        else{
            StudentController::index("محصل مورد نظر شما متاسفانه حذف نگردید. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    function deleteBioData(){
        $stuId = $_GET["id"];
        $check = $this->biometricModel->checkHasBioData($stuId,"students");
        if($check > 0) {
            $bioId = $this->StudentModel->deleteStudentBioData($stuId);
            if($bioId > 0) {
                $res = $this->StudentModel->deleteFingerTemplate($bioId);
                if($res){
                    StudentController::index("معلومات بایومتریک محصل مورد نظر شما موفقانه حذف گردید!", 'success');
                }else{
                    StudentController::index("معلومات بایومتریک محصل مورد نظر شما متاسفانه حذف نگردید. لطفاً دوباره کوشش نماید!", 'failed');
                }
            }
        }

    }

    function studentState($message = null, $type = null){
        $query=$this->StudentModel->getStuState();
        $stuInfo = $this->StudentModel->getAllStuId();
        $this->load->view('include/header.inc.php');
        $this->load->view('stateView', array('query'=>$query,'studentId'=>$stuInfo,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
    }

    function editState(){
        $id=$_GET['id'];
        $query=$this->StudentModel->studentState($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('editState', array('query'=>$query));
        $this->load->view('include/footer.inc.php');
    }

    function checkEditState(){
        $error_state_name=$error_state_description =$error_state = '';
        $error = false;
        if(isset($_POST['editState'])){
            if (empty($_POST['state_name'])) {
                $error_state_name = 'لطفاً نام حالت را درج نماید';
                $error = true;
            }
            if (empty($_POST['state_description'])) {
                $error_state_description = 'لطفاً شرح حالت  را درج نماید!';
                $error = true;
            }
            if (empty($_POST['state'])) {
                $error_state = 'لطفاً حالت را انتخاب نماید!';
                $error = true;
            }
            $id=$_POST['stu_id'];
            if(!$error){
                $data=array(
                    'state_name'=>$_POST['state_name'],
                    'state_description'=>$_POST['state_description'],
                    'state'=>$_POST['state'],
                    'author_id'=>$_SESSION["id"],
                    "update_at"=>date('Y-m-d h:m:s')
                );
                $result = $this->StudentModel->updateState($id,$data);
                if($result){
                    StudentController::studentState("حالت محصل مورد نظر شما موفقانه ویرایش گردید!", 'success');
                }
                else{
                    StudentController::studentState("حالت محصل مورد نظر شما متاسفانه ویرایش نگردید. لطفاً دوباره کوشش نماید!", 'failed');
                }

            }else{
                $query=$this->StudentModel->studentState($id);
                $this->load->view('include/header.inc.php');
                $this->load->view('editState', array(
                    'query'=>$query,
                    'error_state_name' => $error_state_name,
                    'error_state_description' => $error_state_description,
                    'error_state' => $error_state,
                ));
                $this->load->view('include/footer.inc.php');
            }
        }
    }

    function getStuIds(){
        $result = $this->StudentModel->getAllStuId();
        echo json_encode($result);
    }
    ///// ----------------clothing functions-------------->//////
    function clothing(){
        $data=$this->StudentModel->getStuCloths();
        $stuInfo = $this->StudentModel->getAllStuId();
        $result=$this->StudentModel->getAllStudentDetail();
        $this->load->view('include/header.inc.php');
        $this->load->view('stuCloths',array('data'=>$data,'student'=>$result,'studentId'=>$stuInfo));
        $this->load->view('include/footer.inc.php');
    }

    function addStuCloth(){
        $this->StudentModel->addStuCloth();
        redirect('StudentController/clothing');
    }

    function editStuCloths(){
        $id=$_GET['id'];
        $result=$this->StudentModel->studentCloths($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('editCloths',array('result'=>$result));
        $this->load->view('include/footer.inc.php');
    }

    function updateCloths(){
        $id=$_POST['stu_id'];
        $this->StudentModel->editCloth($id);
    }

    function test(){
        echo $this->StudentModel->checkHasStudent(86370);
    }
}
?>
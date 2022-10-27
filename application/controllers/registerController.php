<?php 
/**
* 
*/
class RegisterController extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("registerModel");
		
	}

	// adding new student function
	public function newStudent()
	{
		$error_name = $error_father_name = $error_grand_father_name = $error_identity_no = $error_nationality = $error_university = $error_faculty = $error_department = $error_class = $error_provence=$error_cur_add=$error_bas_add=$error_email=$error_phone=$error_email=$error_block=$error_floor=$error_room=$error_gender=$error_stu_photo=$error_tz_photo=$error_gender=$error_village=$error_student_id =$error_photo = '';
        $error = false;
        if (isset($_POST['addStu'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['student_id'])) {
                $error_student_id = 'لطفاً آیدی خود را درج نماید';
                $error = true;
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
                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
                        $error = true;
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
                        $error_tz_photo = "شما هیج عکس انتخاب نکرده اید";
                        $error = true;
                        break;
                    default:
                        $error_tz_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
        }
		//------------------------------------------------
		if(!$error){
			 $destination ="C:/xampp/htdocs/kpu/assets/img/students/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  base_url()."assets/img/students/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);

            $destinations ="C:/xampp/htdocs/kpu/assets/img/students/tz_photo/";
            if (!empty($_FILES["tz_photo"]) and $_FILES["tz_photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['tz_photo']['tmp_name'], $destinations . ($_FILES['tz_photo']['name']) . date('his') . "." . substr($_FILES['tz_photo']['type'], 6, 5));
            $tz_image =  base_url()."assets/img/students/tz_photo/" . ($_FILES['tz_photo']['name']) . date('his') . "." . substr($_FILES['tz_photo']['type'], 6, 5);

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
				"stu_photo"=>$image,
                "tazkira_photo"=>$tz_image,
				"create_at"=>date('Y-m-d h:m:s'),
				);
			$result=$this->registerModel->new_student($data);
			if($result){
				$stu_id = $this->registerModel->getLastId();
				$data=array(
				'block_no'=>$_POST['block_no'],
				'floor_no'=>$_POST['floor_no'],
				'room_no'=>$_POST['room_no'],
				'create_at'=>date('Y-m-d h:m:s'),
				'stu_id'=>$stu_id,
				
			);
				$success=$this->registerModel->dormitoryInfo($data);
				if($success){
					$stu_id=$this->registerModel->getLastId();
					$stu_cont=array(
						'phone'=>$_POST['phone'],
						'email'=>$_POST['email'],
						'create_at'=>date('Y-m-d h:m:s'),
						'stu_id'=>$stu_id,
					);
					$row=$this->registerModel->studentContact($stu_cont);
					if($row){
                        $stu_id=$this->registerModel->getLastId();
                        $stu_state=array(
						'state_name'=>'کامیاب',
                        'state_description'=>'واجد شرایت لیلیه میباشد',
                        'state'=>'y',
                        'stu_id'=>$stu_id
                    );
                    $stuStateInfo=$this->registerModel->stuStateInfo($stu_state);
					}if($stuStateInfo){
                        redirect('studentController/index');                        
                    }
                    else{
						echo "note inserted";
					}
			
		}
		}
		}else {
			$dep=$this->registerModel->getDepartment();
			$fac=$this->registerModel->getFaculty();
            $this->load->view('include/header.inc.php');
            $this->load->view('registerView', array(
            	'fac'=>$fac,
            	'dep'=>$dep,
                'error_student_id'=>$error_student_id,
                'error_name' => $error_name,
                'error_father_name' => $error_father_name,
                'error_grand_father_name' => $error_grand_father_name,
                'error_identity_no'=>$error_identity_no,
                'error_nationality'=>$error_nationality,
                'error_university'=>$error_university,
                'error_faculty'=>$error_faculty,
                'error_department'=>$error_department,
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
                'error_tz_photo'=>$error_tz_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
	}
	//---------deleting a row-------------
	public function deletePost()
	{   $id=$_GET['id'];
		$this->load->model('registerModel');
		$this->registerModel->deleteStuInfo($id);
		$this->registerModel->deleteStuCont($id);
		$this->registerModel->deleteDdormInfo($id);
		$this->registerModel->stuStates($id);
		redirect('studentController/index');
	}	
}


?>

<?php
class MainPageController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('mainPageModel');
	}
 	function index()
    {
        if ($_SESSION["privilege"] == "admin") {
            $morningP = $this->mainPageModel->getMorningP();
            $lunchP = $this->mainPageModel->getLunchP();
            $nightP = $this->mainPageModel->getNightP();
            $noneP = $this->mainPageModel->getStuCount();
            $this->load->view('include/header.inc.php');
            $this->load->view("mainPage", array('morningP' => json_encode($morningP), 'lunchP' => json_encode($lunchP), 'nightP' => json_encode($nightP), 'noneP' => json_encode($noneP)));
            $this->load->view('include/footer.inc.php');
        }else{
            redirect("studentController/index");
        }
 	}
 	function report(){
 	    $morningP=$this->mainPageModel->getMorningP();
        $lunchP=$this->mainPageModel->getLunchP();
        $nightP=$this->mainPageModel->getNightP();
 	    echo json_encode(array('morningP' =>$morningP ,'lunchP'=>$lunchP,'nightP'=>$nightP ));

 	}	
}?>






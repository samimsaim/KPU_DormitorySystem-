<?php
class BiometricModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getAllStuId(){
        $this->db->select("student_id");
        $this->db->from("students");
        return $this->db->get()->result();
    }

    function getAllDeviceInfo(){
        $this->db->select("dev_id,name,ip_addr");
        $this->db->from("device");
        return $this->db->get()->result();
    }

    function getBioDataId($tblId,$type){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$tblId);
        $this->db->where("type",$type);
        $this->db->from("biometric_data");
        $id = $this->db->get()->row()->bio_id;
        if(!empty($id)){
            return $id;
        }else{
            return 0;
        }
    }

    function checkHasBioData($tblId,$type){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$tblId);
        $this->db->where("type",$type);
        $this->db->from("biometric_data");
        return $this->db->get()->num_rows();
    }

    function getTemplateIds($bioId){
        $this->db->select("finger_id");
        $this->db->where("bio_id",$bioId);
        $this->db->from("finger_template");
        return $this->db->get()->result();
    }

    function checkHasRecord($tblId,$type){
        $this->db->select("tbl_id");
        $this->db->from("biometric_data");
        $this->db->where("tbl_id",$tblId);
        $this->db->where("type",$type);
        return $this->db->get()->num_rows();
    }

    function getRecordId($studentId){
        $this->db->select("stu_id");
        $this->db->from("students");
        $this->db->where("student_id",$studentId);
        return $this->db->get()->row()->stu_id;
    }

    function getDeviceInfo($device_id){
        $this->db->select("ip_addr");
        $this->db->from("device");
        $this->db->where("dev_id",$device_id);
        return $this->db->get()->row()->ip_addr;
    }

    function getDevIdFromName($devName){
        $this->db->select("dev_id");
        $this->db->from("device");
        $this->db->where("name",$devName);
        return $this->db->get()->row()->dev_id;
    }

    function insertBioData($bioData){
        $this->db->insert("biometric_data",$bioData);
        return $this->db->insert_id();
    }

    function insertFingerTemplate($fingerData){
        $this->db->insert("finger_template",$fingerData);
        return $this->db->insert_id();
    }

}
?>
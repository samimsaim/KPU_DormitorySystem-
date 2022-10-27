<?php
class AttendanceModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getRecordId($studentId){
        $this->db->select("stu_id");
        $this->db->from("students");
        $this->db->where("student_id",$studentId);
        return $this->db->get()->row()->stu_id;
    }

    function insertAttData($tblName,$data){
        $this->db->insert($tblName,$data);
        return $this->db->insert_id();
    }
}
?>
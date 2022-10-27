<?php
class StudentModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }

    function getAllStudentDetail(){
        $this->db->from('students');
        return $this->db->get()->result();
    }

    function getAllStuId(){
        $this->db->select('student_id,stu_id');
        $this->db->from('students');
        return $this->db->get()->result();
    }

    function searchDormitoryInfo($stuId){
        $this->db->where('stu_id',$stuId);
        $this->db->from('dormitory_address');
        return $this->db->get()->result();
    }

    function getStudentContact($id){
        $this->db->where('stu_id',$id);
        $this->db->from('contact_address');
        return $this->db->get()->result();
    }

    function searchStudent($stuId){
        $this->db->where('stu_id',$stuId);
        $this->db->from('students');
        return $this->db->get()->result();
    }

    function updateStudent($stuId, $data){
        $this->db->where('stu_id',$stuId);
        return $this->db->update('students',$data);
    }

    function updateStudentContact($id, $data){
        $this->db->where('stu_id',$id);
        return $this->db->update('contact_address',$data);
    }

    function updateDormitoryInfo($id, $data){
        $this->db->where('stu_id',$id);
        return $this->db->update('dormitory_address',$data);
    }

    function updateStudentState($id,$data){
        $this->db->where('stu_id',$id);
        $this->db->update('state',$data);
    }

    function insertStudentStateInfo($data){
        return $this->db->insert('state',$data);
    }

    function insertStudentContact($data){
        return $this->db->insert("contact_address",$data);
    }

    function InsertDormitoryInfo($data){
        $this->db->insert("dormitory_address",$data);
        return $this->db->insert_id();
    }

    function getStudentId($id){
        $query=$this->db->query("SELECT stu_id FROM students WHERE student_id=$id");
        return $query->row()->stu_id;
    }

    function checkHasStudent($studentId){
        $this->db->select('stu_id');
        $this->db->where('student_id',$studentId);
        $this->db->from('students');
        return $this->db->get()->num_rows();
    }

    function getLastId(){
        $query=$this->db->query("SELECT stu_id FROM students ORDER BY stu_id DESC LIMIT 1");
        return $query->row()->stu_id;
    }

    function getFaculty(){
        $this->db->from('faculty');
        return $this->db->get()->result();
    }

    function getState(){
        $this->db->from('state');
        return $this->db->get()->result();
    }

    function getDepartment(){
        $this->db->from('department');
        return $this->db->get()->result();
    }

    function getDepOfFaculty($facId){
        $this->db->where('fac_id',$facId);
        $this->db->from('department');
        return $this->db->get()->result();
    }

    function showAllEmployee(){
        $query=$this->db->get('students');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    function insertStudent($data){
        $this->db->insert("students",$data);
        return $this->db->insert_id();
    }

    function deleteStudentInfo($id){
        $this->db->select("stu_photo,tazkira_photo");
        $this->db->where("stu_id",$id);
        $this->db->from("students");
        $result = $this->db->get()->result();
        foreach ($result as $value) {
            if(!empty($value->stu_photo)){
                unlink($value->stu_photo);
            }
            if(!empty($value->tazkira_photo)){
                unlink($value->tazkira_photo);
            }
        }
        $this->db->where('stu_id',$id);
        return $this->db->delete('students');
    }

    function deleteStudentContact($id){
        $this->db->where('stu_id',$id);
        $this->db->delete('contact_address');
    }

    function deleteDormitoryInfo($id){
        $this->db->where('stu_id',$id);
        $this->db->delete('dormitory_address');
    }

    function deleteStudentStates($id){
        $this->db->where('stu_id',$id);
        $this->db->delete('state');
    }

    function deleteStudentClothing($id){
        $this->db->where('stu_id',$id);
        $this->db->delete('clothing');
    }
    function deleteStudentBioData($id){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$id);
        $this->db->where("type","students");
        $this->db->from("biometric_data");
        $bioId = $this->db->get()->row()->bio_id;
        $this->db->where('tbl_id',$id);
        $res = $this->db->delete('biometric_data');
        if($res){
            return $bioId;
        }
    }
    // --------- upload data to device -----------------
    function getAllStuData(){
        $this->db->select("stu_id");
        $this->db->where("state",'y');
        $this->db->from("state");
        $result = $this->db->get()->result();
        $ids = array();
        $i = 0;
        foreach($result as $value){
            $ids[$i] = $value->stu_id;
            $i++;
        }
        $this->db->select('stu_id,student_id');
        $this->db->where_in("stu_id",$ids);
        $this->db->from('students');
        return $this->db->get()->result();
    }

    function getStuBioId($stuId){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$stuId);
        $this->db->where("type","students");
        $this->db->from("biometric_data");
        return $this->db->get()->row()->bio_id;
    }

    function getStuBioCard($stuId){
        $this->db->select("RFID_card");
        $this->db->where("tbl_id",$stuId);
        $this->db->where("type","students");
        $this->db->from("biometric_data");
        return $this->db->get()->row()->RFID_card;
    }

    function getStuTemplates($bioId){
        $this->db->where("bio_id",$bioId);
        $this->db->from("finger_template");
        return $this->db->get()->result();
    }
    // -----------------------------------------------

    function deleteFingerTemplate($id){
        $this->db->where('bio_id',$id);
        return $this->db->delete('finger_template');
    }
    function getStuState(){
        $this->db->from('state');
        return $this->db->get()->result();
    }
    function studentState($id){
        $this->db->where('stu_id',$id);
        $this->db->from('state');
        return $this->db->get()->result();
    }
    function updateState($id,$data){
        $this->db->where('stu_id',$id);
        return $this->db->update('state',$data);
    }
//------------ clothing function--------------//'/
    function getStuCloths(){
        $this->db->from('clothing');
        return $this->db->get()->result();
    }
    function studentCloths($id){
        $this->db->where('stu_id',$id);
        $this->db->from('clothing');
        return $this->db->get()->result();
    }
    function addStuCloth(){
        $type=$this->input->post('action');
        $data=array(
            'stu_id'=>$this->input->post('stu_id'),
            'pillow'=>0,
            'blanket'=>0,
            'mattress'=>0,
            'bedsheet'=>0,
        );
        foreach ($type as $row) {
            if ($row == "pillow") {
                $data["pillow"] = 1;
            }
            if ($row == "blanket") {
                $data["blanket"] = 1;
            }
            if ($row == "mattress") {
                $data["mattress"] = 1;
            }
            if ($row == "bedsheet") {
                $data["bedsheet"] = 1;
            }
        }
        $query=$this->db->insert('clothing',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }


}
?>
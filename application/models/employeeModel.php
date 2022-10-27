<?php
class EmployeeModel extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	function getEmp(){
		$this->db->from('employee');
		return $this->db->get()->result();
	}

    function getAllEmpId(){
        $this->db->select('emp_id');
        $this->db->from('employee');
        return $this->db->get()->result();
    }

	function addEmp($data){
		return $this->db->insert('employee',$data);
	}

	function updateEmp($id,$data){
		$this->db->where('emp_id',$id);
		return $this->db->update('employee',$data);
	}

	function deleteEmp($id){
		$this->db->where('emp_id',$id);
		return $this->db->delete('employee');
	}

	function empDetails($id){
		$this->db->where('emp_id',$id);
		$this->db->from('employee');
		return $this->db->get()->result();
	}
    // -------------- upload data to device -------------
    function getAllEmpData(){
        $this->db->select('emp_id,position,name');
        $this->db->from('employee');
        return $this->db->get()->result();
    }

    function getEmpBioId($empId){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$empId);
        $this->db->where("type","employee");
        $this->db->from("biometric_data");
        return $this->db->get()->row()->bio_id;
    }

    function getEmpBioCard($empId){
        $this->db->select("RFID_card");
        $this->db->where("tbl_id",$empId);
        $this->db->where("type","employee");
        $this->db->from("biometric_data");
        return $this->db->get()->row()->RFID_card;
    }

    function getEmpTemplates($bioId){
        $this->db->where("bio_id",$bioId);
        $this->db->from("finger_template");
        return $this->db->get()->result();
    }
    // ------------------------------------------------

    function deleteEmployeeBioData($id){
        $this->db->select("bio_id");
        $this->db->where("tbl_id",$id);
        $this->db->where("type","employee");
        $this->db->from("biometric_data");
        $bioId = $this->db->get()->row()->bio_id;
        $this->db->where('tbl_id',$id);
        $res = $this->db->delete('biometric_data');
        if($res){
            return $bioId;
        }
    }

    function deleteFingerTemplate($id){
        $this->db->where('bio_id',$id);
        return $this->db->delete('finger_template');
    }
}
?>
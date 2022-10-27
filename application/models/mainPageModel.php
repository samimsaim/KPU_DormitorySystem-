<?php
class MainPageModel extends CI_Model{

     public function getMale (){

        $this->db->select("stu_id")->from("students");
        $male=$this->db->get();
        return $male->num_rows();
     }
     public function getMorningP (){
        $this->db->select("stu_id")->from("att_morning");
        $female=$this->db->get();
        return $female->num_rows();
     }
      public function getLunchP (){
        $this->db->select("stu_id")->from("att_lunch");
        $female=$this->db->get();
        return $female->num_rows();
      }
      public function getNightP(){
        $this->db->select('stu_id')->from('att_night');
        return $this->db->get()->num_rows();
      }

    public function getStuCount(){
        $this->db->select('stu_id')->from('students');
        return $this->db->get()->num_rows();
    }
} 
?>

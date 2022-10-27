<?php
class DeviceModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDeviceInfo(){
        $this->db->from("device");
        return $this->db->get()->result();
    }

    function getScheduleInfo(){
        $this->db->from("time_table");
        return $this->db->get()->result();
    }

    function insertDevice($data){
        return $this->db->insert("device",$data);
    }

    function updateDevice($data, $id){
        $this->db->where('dev_id',$id);
        return $this->db->update('device',$data);
    }

    function deleteDevice($deviceId){
        $this->db->where('dev_id', $deviceId);
        return $this->db->delete('device');
    }

    function searchDevice($deviceId){
        $query = $this->db->query("SELECT * FROM device WHERE dev_id=$deviceId");
        return $query->result();
    }

    function searchSchedule($id){
        $query = $this->db->query("SELECT * FROM time_table WHERE id=$id");
        return $query->row();
    }

    function insertSchedule($data){
        return $this->db->insert("time_table",$data);
    }

    function updateSchedule($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('time_table',$data);
    }

    function deleteSchedule($id){
        $this->db->where("id",$id);
        return $this->db->delete("time_table");
    }
}
?>
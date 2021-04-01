<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    // Fetch users
    function getUsers($searchTerm=""){

        // Fetch users
        $this->db->select('*');
        $this->db->where("KELURAHAN like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('provinsi');
        $users = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
             $all = $user['KELURAHAN'].','.$user['KECAMATAN'].','.$user['KABUPATEN'].','.$user['PROVINSI'];
            $data[] = array("id"=>$user['KPos'], "text"=>$all);
        }
        return $data;
    }

}
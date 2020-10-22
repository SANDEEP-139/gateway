<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmodel extends CI_Model
{

    function __construct(){
     
          parent::__construct();
		  
     }
	 
	public function get_user($username, $password){
		$this -> db -> select('*');
		$this -> db -> from('tbl_users');
		$this -> db -> where('username', $username);
		$this -> db -> where('status', '1');
		$query = $this->db->get();
		if($query->num_rows()==1)
		{
			
			//1234567
			$data=$query->result_array();
			if($data[0]['type']=='smartadmin' || $data[0]['type']=='admin')
			{
				$hash=hash("sha256", $password.$data[0]['salt']);
				//print_r($hash); exit();
				//echo "$hash";
				if($hash===$data[0]['password'])
				{
					return $data;	
				}
				else
				{
					return FALSE;
					
				}
			}
		}
     }
	 
	public function loginCheckStatus($username){
     
		$this -> db -> select('*');
		$this -> db -> from('tbl_users');
		$this -> db -> where('username', $username);
		$query = $this->db->get();
		
		return $query->result_array();
		
     }
	 
	public function get_userdetail($id){
	
	$this->db->select('*');
	$this->db->from('tbl_users');
	$this->db->join('tbl_users_detail', 'tbl_users.id = tbl_users_detail.user_id');
	$this -> db -> where('tbl_users.id', $id);
	$query = $this->db->get();
	return $query->result();
	
}
	 
	public function configration($fields) {
		$this->db->where('id', '1');
		$this->db->update('tbl_setting', $fields);
		return true;		
	}
    public function getconfigration() {
                $this->db->select('*');
                $this->db->from('tbl_setting');
		$this->db->where('id', '1');
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function addpage($fields) {
		$query = $this->db->insert('tbl_pages', $fields);
		return $query;
	}
		
	public function addmenu($menu) {
		$query = $this->db->insert('tbl_menu', $menu);
		return $query;
	}
	
	public function save_file_info($file, $id, $table, $field) {
		//start db traction
		$this->db->trans_start();
		
		$this->db->where('id', $id);
		$this->db->update($table, array($field=>$file['file_name']));
		
		//complete the transaction
		$this->db->trans_complete();
		//check transaction status
		if ($this->db->trans_status() === FALSE) {
			$file_path = $file['full_path'];
			//delete the file from destination
			if (file_exists($file_path)) {
			unlink($file_path);
		}
		//rollback transaction
		$this->db->trans_rollback();
			return FALSE;
		} else {
			//commit the transaction
			$this->db->trans_commit();
			return TRUE;
		}
	}	
	
	public function getLastInserted() {
		return $this->db->insert_id();
    }
	
	public function getLogo() {
		$this->db->select('logo');
		$this->db->from('tbl_setting');
		$this->db->where('id', '1');
		$query = $this->db->get();
		$q = $query->result_array();
		$file = $q[0]['logo'];	
		if(file_exists(base_url('assets/backend/images/'.$file))) {
			return base_url('assets/backend/images/'.$file);
		}
		else {
			return base_url('assets/backend/images/'.$file);
			
		}
	}
	
	public function pages(){
	
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	public function getpages($id){
	
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	public function getcourse($id){
	
		$this->db->select('*');
		$this->db->from('tbl_course');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	public function updatepage($fields,$id) {
		$this->db->where('id', $id);
		$this->db->update('tbl_pages', $fields);
		return true;		
	}
	
	public function updateuser($table,$fields,$id) {
		$this->db->where('id', $id);
		$this->db->update($table , $fields);
		return true;		
	}
	
	public function getList($fields,$tablename,$order, $by) {
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->order_by($order, $by);
		$this->db->where_not_in('status','3');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getListByFeatured($fields,$tablename,$order, $by, $slug) {
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->order_by($order, $by);
		$this->db->where('featuredpage', $slug);
		$this->db->where_not_in('status','3');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getListByLike($fields,$tablename,$colum, $like) {
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->like($colum, $like, 'both');
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function getListByLikeblog($fields,$tablename,$colum, $like) {
		$this->db->select($fields);
		$this->db->limit(4);
		$this->db->from($tablename);
		$this->db->like($colum, $like, 'both');
		$this->db->where('featuredpage','blog');
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function getListByLikeb($fields,$tablename,$colum) {
		$this->db->select($fields);
		$this->db->limit(4);
		$this->db->from($tablename);
		$this->db->like($colum);
		$this->db->where('featuredpage','blog');
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function checkDuplicate($table_name, $field){
	
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($field);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function Create($tablename, $value){
		$this->db->insert($tablename, $value);
		return TRUE;
	}
	
	public function getName($tbl, $value, $id){
		$this->db->select($value);
		$this->db->from($tbl);
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		return $query->result();
		
		}
		public function getblogName($tbl, $value,$id){
		$this->db->select($value);
		$this->db->from($tbl);
		$this->db->where('featuredpage','blog');
		//$this->db->where_in('id',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		}
		public function getblogdetailName($tbl, $value,$id){
		$this->db->select($value);
		$this->db->limit(1);
		$this->db->from($tbl);
		$this->db->where('featuredpage','blog');
		
		$this->db->where_in('id',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		}
		public function getblogcontent($tbl, $value,$id){
		$this->db->select($value);
		$this->db->from($tbl);
		$this->db->where('featuredpage','blog');
		$this->db->where_in('id',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		}
	 
	public function getViewById($fields,$tablename,$getId) {
		$this->db->select($fields);
		$this->db->where('id',$getId);
		$this->db->from($tablename);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function Update($tablename,$value, $getId) {
		$this->db->where('id',$getId);
		$this->db->update($tablename,$value);
		return TRUE;
	}
}
?>
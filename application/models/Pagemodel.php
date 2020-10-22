<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagemodel extends CI_Model
{

     function __construct(){
     
          parent::__construct();
		  
     }
	
	public function getsetting() {
	
		$this->db->select('*');
		$this->db->from('tbl_setting');
		$this->db->where('id', '1');
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return false;	
		}
		
	}
		public function get_gallery(){
	
		$this->db->select('*');
		$this->db->from('tbl_images');
		$this->db->where('status', '1');
		
		$this->db->order_by("id","ASC");
		
		
		$query= $this->db->get();
		return $query->result_array();
		
		}
	
	public function getlivemode() {
	
		$this->db->select('live_mode');
		$this->db->from('tbl_setting');
		$this->db->where('id', '1');
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
	public function getpagedata($slug) {
	
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('slug', $slug);
		$this->db->where('status', '1');
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return false;	
		}
		
	}
	
	public function get_detail($data) {
	
		$this->db->select('*');
		$this->db->from('tbl_users_detail');
		$this->db->where('email',$data['eid']);
	   $query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return false;	
		}
		
	}
	
	public function getcountries(){
		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where('status', '1');
		$this->db->order_by('country_name', 'ASC');
		$query = $this->db->get();
		if($query){
		return $query;
		}
		else
		{
			return false;	
		}	
	}
	
	public function select_list($value, $table, $where, $orderby){
		$this->db->select($value);
		$this->db->from($table);
		$this->db->where('status', '1');
		$this->db->where($where);
		$this->db->order_by($orderby, 'ASC');
		$query = $this->db->get();
		if($query){
		return $query;
		}
		else
		{
			return false;	
		}	
	}
	public function getRecord($table,$id){
		$this->db->select('*');
		$this->db->limit(4);
		$this->db->from($table);
		$this->db->where('status', '1');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}
	public function getLatestRecord($table){
		$this->db->select('*');
		$this->db->limit(1);
		$this->db->from($table);
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}
		public function getListblog(){
		$this->db->select('*');
		$this->db->from('tbl_featuredpages');
		$this->db->where('status', '1');
		$this->db->where('featuredpage', 'blog');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}
	
	public function getListimg(){
		$this->db->select('*');
		$this->db->limit(4);
		$this->db->from('tbl_images');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}
	public function getnamebyid($table,$value,$where) {
	
		$this->db->select($value);
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}
		
	}
	
	public function sendVerificatinEmail($name,$email,$subject,$message){
		
		$this->load->library('email'); 

		$this->email->from('admin@ssak.co.in', 'Elearner'); 
		$to 	 = $email;	
		$subject =$subject;	
		$message =$message ;
			
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	
	}	
	
	public function Update($tablename,$value, $getId) {
		$this->db->where('id',$getId);
		$this->db->update($tablename,$value);
		return TRUE;
	}
	
	public function insertuser($fields){
	
		$query = $this->db->insert('tbl_users',$fields);
		return $query;
		
	}
	
	public function insertsub($fields){
	
		$query = $this->db->insert('tbl_subscribe',$fields);
		return $query;
		
	}
	
	public function insertpaymentdetail($data){
	
		$query = $this->db->insert('tbl_payment_eazypay', $data);
		return $query;
	}

	public function get_user($username, $password){
		$this -> db -> select('*');
		$this -> db -> from('tbl_users');
		$this -> db -> where('username', $username);
		$this -> db -> where('status', '1');
		$this -> db -> where('role', '2');
		$query = $this->db->get();
		if($query->num_rows()==1)
		{
			$data=$query->result_array();
			$hash=hash("sha256", $password.$data[0]['salt']);
			if($hash===$data[0]['password'])
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
				
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
	 
	public function get_schoollist(){
		$this -> db -> select('*');
		$this -> db -> from('tbl_school_list');
		$query = $this->db->get();
		return $query->result_array();
	 }

	public function get_userdetail($id){

	$this->db->select('tbl_users.id,name,email,mobile');
	$this->db->from('tbl_users');
	$this->db->join('tbl_users_detail', 'tbl_users.id = tbl_users_detail.user_id');
	$this -> db -> where('tbl_users.id', $id); 
	$query = $this->db->get();
	return $query->result();

}

	public function get_webcontent($parent,$template){
	
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('status', '1');
		$this->db->where('parent', $parent);
		$this->db->where('template', $template);
		//$this->db->order_by('id', 'DESC');
		$query= $this->db->get();
		return $query->result_array();
		
		}
	
	public function getresponsecode($id) {
	
		$this->db->select('description');
		$this->db->from('tbl_code');
		$this->db->where('trans_code',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return false;	
		}
		
	}
	
	public function getresponse($id) {
	
		$this->db->select('ReferenceNo');
		$this->db->from('tbl_payment_eazypay');
		$this->db->where('ReferenceNo',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return TRUE;
		}
		else
		{
			return FALSE;	
		}
		
	}
	
	public function ProfilePhoto($file,$id) {
		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('tbl_users_detail', array('profile_photo'=>$file['file_name']));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$file_path = $file['full_path'];
			if (file_exists($file_path)) {
			unlink($file_path);
		}
		$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	public function profileUpdate($user, $detail, $id) {
	
		$this->db->set($user);
		$this->db->where(array('id' => $id));
		$query = $this->db->update('tbl_users',$user);
		//update the user table next//
		$this->db->set($detail);
		$this->db->where(array('user_id' => $id));
		$query = $this->db->update('tbl_users_detail',$detail); 
		return $query;		
	}
	
	public function getordersummary($id) {
	
		$this->db->select('*');
		$this->db->from('tbl_payment_eazypay');
		$this->db->where('tbl_id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return FALSE;	
		}
		
	}
	
	public function getAlreadypaid($userid, $programid) {
	
		$this->db->select('*');
		$this->db->from('tbl_payment_eazypay');
		$this->db->where('User_id', $userid);
		$this->db->where('Program_id', $programid);
		$this->db->where('Response_Code', 'E000');
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return FALSE;	
		}
		
	}
	
	public function paymentsummary($id) {
	
		$this->db->select('tbl_id,User_id,Program_id,Test_Mode,Response_Code,Response_Status,Unique_Ref_Number,Total_Amount,Transaction_Date,Payment_Mode,ReferenceNo');
		$this->db->from('tbl_payment_eazypay');
		$this->db->where('User_id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return FALSE;	
		}
		
	}
	
	public function payment_success($id) {
	
		$this->db->select('tbl_id,User_id,Program_id,Test_Mode,Response_Code,Response_Status,Unique_Ref_Number,Total_Amount,Transaction_Date,Payment_Mode,ReferenceNo');
		$this->db->from('tbl_payment_eazypay');
		$this->db->where('User_id',$id);
		$this->db->where('Response_Code','E000');
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return $query->result_array();
		}
		else
		{
			return FALSE;	
		}
		
	}
	
	public function getProfileUsers($id) {
		$this->db->select("*");
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_detail', 'tbl_users_detail.user_id = tbl_users.id');
		$this->db->where('tbl_users.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getpaymentduplicate($duplicate){
		$this -> db -> select('*');
		$this -> db -> from('tbl_payment_eazypay');
		$this -> db -> where($duplicate);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return TRUE;	
			}
			else
			{
				return FALSE;
				
			}
			
		
     }
	
}
?>
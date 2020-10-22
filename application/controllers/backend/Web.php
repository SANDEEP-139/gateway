<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends Admin_controller
{
 
  function __construct()
  {
    parent::__construct();
	$this->load->library('PHPExcel');
  }
  
  	public function index() {
         if ($this->session->userdata('loginuser')) {
			// var_dump($this->session->userdata('loginuser')); die;
			$this->load->view('dashboard/dashboard_view');
            //redirect('web/dashboard');
        } else {
			$this->load->view('backend/login');
        }
    }
	
  	public function dashboard() {
		if ($this->session->userdata('loginuser')) {
			$data['title'] 	 = 'Dashboard | Admin';
			$data['content'] = 'backend/dashboard/dashboard_view';
			$this->load->view($this->layout, $data);
		}
		else {
			redirect('web/login');
		}
	}
	
	public function login(){
	  	if($this->session->userdata('loginuser')) {
			redirect("backend/web/index");
		}
		else{	
			
			 $username = $this->input->post("username");
			 $password = $this->input->post("password");
			  //set validations
			  $this->form_validation->set_rules("username", "Username", "trim|required");
			  $this->form_validation->set_rules("password", "Password", "trim|required");
	
			  if ($this->form_validation->run() == FALSE) {
				  $this->load->view('backend/login');
			  }
			  else {
				  	if ($this->input->post('btn_login') == "Sign In") {
						
						
						$usr_result = $this->Webmodel->get_user($username, $password);
					//echo var_dum($usr_result);
						//exit;
								if ($usr_result) {
									 //set the session variables
									 $sessiondata = array(
									 	'name' 	=> $usr_result[0]['name'],
										  'username' 	=> $username,
										  'loginuser' 	=> $usr_result[0]['id']
										 // 'role' 		=> $usr_result[0]['role']
									 );
									 //echo (var_dump($sessiondata));exit;
									 $this->session->set_userdata($sessiondata);
									 
									 redirect('web/index');;
								}
								else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username &amp; password!</div>');
										redirect('web/login');
								}	
					}
				  
				  }
	}
	}
	
	public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('backend/web/index', 'refresh');
    }
	
	public function profile() {
		
		if ($this->session->userdata('loginuser')) {
			
			$id = $this->session->userdata('loginuser');
			$data['title'] = 'Profile | Admin';
			$data['content'] = 'backend/dashboard/profile';
			
			$query = $this->Webmodel->get_userdetail($id);
			$data['Users'] = $query[0];
			//echo var_dump($query); exit;
			$user['username']			= $this->input->post("username");
			if(!empty($this->input->post("password"))) {
				$pass=$this->input->post("password");
				$user['password']		=hash("sha256", $pass.$query[0]->salt);
			}
			$user['name']				= $this->input->post("name");
			$userdeatils['email']				= $this->input->post("email");
			$userdeatils['mobile']				= $this->input->post("telephone");
			$user['updatedon']			= date_timestamp_get(date_create());
			$userdeatils['firstname']				= $this->input->post("name");
			
			//echo var_dump($data['Users']); exit;
			//set validations
			$this->form_validation->set_rules("username", 	"Username", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else { 
				
				if($this->input->post('Update')) {
					
					$this->Webmodel->updateuser('tbl_users',$user, $id);
					if($this->Webmodel->updateuser('tbl_users_detail',$userdeatils, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Profile Has Been Updated</div>');
							 redirect('backend/web/profile');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							 redirect('backend/web/profile');					
					}					
				}
			}
		} else {
			redirect('web/login');	
		}
    }
	
	public function Configration() {
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']		        = 'Appearance Setting';
			$data['content']	        = 'backend/dashboard/configration';
                        $data['setting']	        = $this->Webmodel->getconfigration();
   
			$fields['title']			= $this->input->post("title");
			$fields['keyword']			= $this->input->post("keyword");
			$fields['description']		= $this->input->post("description");
			$fields['analytics_code']	= $this->input->post("analytics_code");
			$fields['site_name']		= $this->input->post("site_name");
			$fields['site_url']			= $this->input->post("site_url");
			$fields['address']			= $this->input->post("address");
			$fields['phone']			= $this->input->post("phone");
			$fields['email']			= $this->input->post("email");
			$fields['live_mode']		= $this->input->post("live_mode");
			
			//set validations
			$this->form_validation->set_rules("title", "Title", "trim|required");
			$this->form_validation->set_rules("keyword", "Keyword", "trim|required");
			$this->form_validation->set_rules("description", "description", "trim|required");
			$this->form_validation->set_rules("analytics_code", "analytics_code", "trim|required");
			$this->form_validation->set_rules("site_name", "site_name", "trim|required");
			$this->form_validation->set_rules("keyword", "Keyword", "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('setting')=='Configration') {
					
					$config['upload_path'] = 'assets/backend/images/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('logo')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file,'1', 'tbl_setting','logo');
					}
					if($this->Webmodel->configration($fields)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">General Setting Has Been Updated</div>');
							 redirect('backend/web/configration');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							 redirect('backend/web/configration');					
					}					
				}
			}
		} else {
			redirect('backend/web/login');	
		}
    }
	
	public function pages(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/page/listview';
			$data['pages']					= $this->Webmodel->pages();
			//echo var_dump($data['pages']); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
	}
	
	public function addpage(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/page/add';
			$fields['title']			= $this->input->post("pagetitle");
			$fields['content']			= $this->input->post("description");
			$fields['status']			= $this->input->post("status");
			$fields['permalink']		= $this->input->post("permalinkvalue");
			$link=explode('/', $this->input->post("permalinkvalue"));
			$count=count($link);
			$fields['slug']=$link[$count-1];
			$fields['parent']			= $this->input->post("parent");
			$fields['template']			= $this->input->post("template");
			$date						= date_create();
			$fields['createdon']			= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("pagetitle", "Title", "trim|required");
			$this->form_validation->set_rules("description", "Keyword", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			$this->form_validation->set_rules("permalinkvalue", "analytics_code", "trim|required");
			$this->form_validation->set_rules("parent", "site_name", "trim|required");
			$this->form_validation->set_rules("template", "Keyword", "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('page')=='publish') {
					//echo $fields['content']; exit;
					$config['upload_path'] = 'assets/frontend/upload/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					$insert=$this->Webmodel->addpage($fields);
					$id=$this->Webmodel->getLastInserted();
					$menu['menu_name']=$fields['title'];
					$menu['page_link']=$fields['permalink'];
					$menu['status']=$fields['status'];
					$menu['page_id']=$id;
					$insertmenu=$this->Webmodel->addmenu($menu);
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_pages', 'feature_img');
					}
					if($insert && $insertmenu) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Page Publish Successfully</div>');
							 redirect('backend/web/addpage');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							 redirect('backend/web/addpage');					
					}					
				}
			}
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function updatepages($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Page';
			$data['content']			= 'backend/page/update';
			$data['pagedata']			= $this->Webmodel->getpages($id);
			
			$fields['title']			= $this->input->post("pagetitle");
			$fields['content']			= $this->input->post("description");
			$fields['status']			= $this->input->post("status");
			$fields['parent']			= $this->input->post("parent");
			$fields['template']			= $this->input->post("template");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			//set validations
			$this->form_validation->set_rules("pagetitle", "Title", "trim|required");
			$this->form_validation->set_rules("description", "Keyword", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			$this->form_validation->set_rules("parent", "site_name", "trim|required");
			$this->form_validation->set_rules("template", "Keyword", "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('page')) {
					
					$config['upload_path'] = 'assets/frontend/upload/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_pages','feature_img');
					}
					//echo var_dump($fields['content']); exit;
					if($this->Webmodel->updatepage($fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Page Has Been Updated</div>');
							 redirect('backend/web/pages');

					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							 $this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
	}
		
	public function addImageCategory() { 
		
		if($this->session->userdata('loginuser')) {
			
			$data['ImageList'] = $this->Webmodel->getList('*','tbl_image_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/image/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					$config['upload_path'] = 'assets/frontend/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/addImageCategory');
							
						} else {
							
							$file = $this->upload->data();
							$value['filepath']=$file['file_name'];
						}
						
					}	
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_image_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addImageCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_image_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addImageCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addImageCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addImageCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editImageCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['ImageList'] = $this->Webmodel->getList('*','tbl_image_category','category_name','ASC');
				$data['EditImage'] = $this->Webmodel->getViewById('*','tbl_image_category',$getId);
				
				$data['title']				= 'Edit | Image Category';
				$data['content']			= 'backend/image/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					$config['upload_path'] = 'assets/frontend/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $getId, 'tbl_image_category','filepath');
					}
							
							
							if(preg_match('/^[a-zA-Z0-9]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_image_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addImageCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addImageCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_image_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addImageCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_image_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Class Has Been Updated.</div>');
										redirect('backend/web/addImageCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addImageCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listimage(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/image/listview';
			$data['ImageList'] 			= $this->Webmodel->getList('*','tbl_images','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function Addimg(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/image/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_image_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Image-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Image-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('image')=='submit') {
					$config['upload_path'] = 'assets/frontend/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/Addimg');
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					
					if($this->Webmodel->Create('tbl_images',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Image Upload Successfully.</div>');
							redirect('backend/web/listimage');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/Addimg');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateimg($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Image';
			$data['content']			= 'backend/image/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_image_category','id','ASC');
			$data['EditImage'] = $this->Webmodel->getViewById('*','tbl_images', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Image-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Image-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					
					$config['upload_path'] = 'assets/frontend/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_images','filepath');
					}
					//echo var_dump($fields['content']); exit;
					if($this->Webmodel->Update('tbl_images',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Image Updated</div>');
						redirect('backend/web/listimage');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}
	
	public function addVidCategory() { 
		
		if($this->session->userdata('loginuser')) {
			
			$data['VideoList'] = $this->Webmodel->getList('*','tbl_video_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/video/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					$config['upload_path'] = 'assets/frontend/upload/video/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/addVidCategory');
							
						} else {
							
							$file = $this->upload->data();
							$value['filepath']=$file['file_name'];
						}
						
					}	
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_video_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addVidCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_video_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addVidCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addVidCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addVidCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editVidCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['VideoList'] = $this->Webmodel->getList('*','tbl_video_category','category_name','ASC');
				$data['EditVideo'] = $this->Webmodel->getViewById('*','tbl_video_category',$getId);
				
				$data['title']				= 'Edit | Image Category';
				$data['content']			= 'backend/video/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					$config['upload_path'] = 'assets/frontend/upload/video/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $getId, 'tbl_video_category','filepath');
					}
							
							
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_video_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addVidCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addVidCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_video_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addVidCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_video_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Class Has Been Updated.</div>');
										redirect('backend/web/addVidCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addVidCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listVid(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Video List';
			$data['content']			= 'backend/video/listview';
			$data['VideoList'] 			= $this->Webmodel->getList('*','tbl_videos','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddVid(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/video/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_video_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Video-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Video-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('image')=='submit') {
					$config['upload_path'] = 'assets/frontend/upload/video/';
					$config['allowed_types'] = 'mp4';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/AddVid');
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					
					if($this->Webmodel->Create('tbl_videos',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Video Upload Successfully.</div>');
							redirect('backend/web/listVid');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddVid');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateVid($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Video';
			$data['content']			= 'backend/video/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_video_category','id','ASC');
			$data['EditVideo'] = $this->Webmodel->getViewById('*','tbl_videos', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Video-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Video-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					
					$config['upload_path'] = 'assets/frontend/upload/video/';
					$config['allowed_types'] = '3gp|mp4|flv|wvm';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_videos','filepath');
					}
					//echo var_dump($fields['content']); exit;
					if($this->Webmodel->Update('tbl_videos',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Video Updated</div>');
						redirect('backend/web/listVid');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}	
		
	public function addBookCategory() { 
		
		if($this->session->userdata('loginuser')) {
			
			$data['BookList'] = $this->Webmodel->getList('*','tbl_book_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/book/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/addBookCategory');
							
						} else {
							
							$file = $this->upload->data();
							$value['filepath']=$file['file_name'];
						}
						
					}	
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_book_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addBookCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_book_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addBookCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addBookCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addBookCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editBookCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['BookList'] = $this->Webmodel->getList('*','tbl_book_category','category_name','ASC');
				$data['EditBook'] = $this->Webmodel->getViewById('*','tbl_book_category',$getId);
				
				$data['title']				= 'Edit | Book Category';
				$data['content']			= 'backend/book/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $getId, 'tbl_book_category','filepath');
					}
							
							
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_book_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addBookCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addBookCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_book_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addBookCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_book_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addBookCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addBookCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listBook(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/book/listview';
			$data['BookList'] 			= $this->Webmodel->getList('*','tbl_books','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddBook(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Book';
			$data['content']			= 'backend/book/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_book_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Book-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Book-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				//echo var_dump($fields); exit;
				if($this->input->post('image')=='submit') {
					
					if($_FILES['coverpage']){
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'jpg|png|gif';
					$config['max_size'] = '4048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('coverpage')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/AddBook');
							
						} else {
							
							$file = $this->upload->data();
							$fields['coverpage']=$file['file_name'];
						}
						
					}	
					}
					if($_FILES['feature_img']){
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '4048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/AddBook');
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					}
					if($this->Webmodel->Create('tbl_books',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Book Upload Successfully.</div>');
							redirect('backend/web/listBook');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddBook');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateBook($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Book';
			$data['content']			= 'backend/book/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_book_category','id','ASC');
			$data['EditBook'] = $this->Webmodel->getViewById('*','tbl_books', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Book-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Book-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					if($_FILES['coverpage']){
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'jpg|png|gif';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('coverpage')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_books','coverpage');
					}
					}
					if($_FILES['feature_img']){
					$config['upload_path'] = 'assets/frontend/upload/book/';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_books','filepath');
					}
					}
					//echo var_dump($fields['content']); exit;
					if($this->Webmodel->Update('tbl_books',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Book Updated</div>');
						redirect('backend/web/listBook');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}
		
	public function addArticleCategory() {
		if($this->session->userdata('loginuser')) {
			
			$data['ArticleList'] = $this->Webmodel->getList('*','tbl_article_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/article/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_article_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addArticleCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_article_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addArticleCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addArticleCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addArticleCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editArticleCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['ArticleList'] = $this->Webmodel->getList('*','tbl_article_category','category_name','ASC');
				$data['EditArticle'] = $this->Webmodel->getViewById('*','tbl_article_category',$getId);
				
				$data['title']				= 'Edit | Article Category';
				$data['content']			= 'backend/article/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_article_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addArticleCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addArticleCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_article_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addArticleCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_article_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addArticleCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addArticleCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listArticle(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/article/listview';
			$data['ArticleList'] 			= $this->Webmodel->getList('*','tbl_articles','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddArticle(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Article';
			$data['content']			= 'backend/article/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_article_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'Gateway Unimart-Article-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Article-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['isfile']			= $this->input->post("isfile");
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				//echo var_dump($fields); exit;
				if($this->input->post('image')=='submit') {
					
					if($_FILES['coverpage']){
					$config['upload_path'] = 'assets/frontend/upload/article/';
					$config['allowed_types'] = 'jpg|png|gif';
					$config['max_size'] = '4048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('coverpage')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							
							
						} else {
							
							$file = $this->upload->data();
							$fields['coverpage']=$file['file_name'];
						}
						
					}	
					}
					if($_FILES['feature_img']){
					$config['upload_path'] = 'assets/frontend/upload/article/';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '4048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					}
					if($this->Webmodel->Create('tbl_articles',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Article Upload Successfully.</div>');
							redirect('backend/web/listArticle');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddArticle');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateArticle($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Article';
			$data['content']			= 'backend/article/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_article_category','id','ASC');
			$data['EditArticle'] = $this->Webmodel->getViewById('*','tbl_articles', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Article-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Article-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['isfile']			= $this->input->post("isfile");
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					if($_FILES['coverpage']){
					$config['upload_path'] = 'assets/frontend/upload/article/';
					$config['allowed_types'] = 'jpg|png|gif';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;

					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('coverpage')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_articles','coverpage');
					}
					}
					if($_FILES['feature_img']){
					$config['upload_path'] = 'assets/frontend/upload/article/';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_articles','filepath');
					}
					}
					//echo var_dump($fields['content']); exit;
					if($this->Webmodel->Update('tbl_articles',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Article Updated</div>');
						redirect('backend/web/listArticle');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}
		
	public function addAudioCategory() { 
		
		if($this->session->userdata('loginuser')) {
			
			$data['AudioList'] = $this->Webmodel->getList('*','tbl_audio_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/audio/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					$config['upload_path'] = 'assets/frontend/upload/audio/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/addAudioCategory');
							
						} else {
							
							$file = $this->upload->data();
							$value['filepath']=$file['file_name'];
						}
						
					}	
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_audio_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addAudioCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_audio_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addAudioCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addAudioCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addAudioCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editAudioCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['AudioList'] = $this->Webmodel->getList('*','tbl_audio_category','category_name','ASC');
				$data['EditAudio'] = $this->Webmodel->getViewById('*','tbl_audio_category',$getId);
				
				$data['title']				= 'Edit | Audio Category';
				$data['content']			= 'backend/audio/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					$config['upload_path'] = 'assets/frontend/upload/audio/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $getId, 'tbl_audio_category','filepath');
					}
							
							
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_audio_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addAudioCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addAudioCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_audio_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addAudioCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_audio_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addAudioCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addAudioCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listAudio(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/audio/listview';
			$data['AudioList'] 			= $this->Webmodel->getList('*','tbl_audios','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddAudio(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Audio';
			$data['content']			= 'backend/audio/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_audio_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Audio-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Audio-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('image')=='submit') {
					$config['upload_path'] = 'assets/frontend/upload/audio/';
					$config['allowed_types'] = 'mp3|MP3';
					$config['max_size'] = '10048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/AddAudio');
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					
					if($this->Webmodel->Create('tbl_audios',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Audio Upload Successfully.</div>');
							redirect('backend/web/listAudio');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddAudio');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateAudio($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Audio';
			$data['content']			= 'backend/audio/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_audio_category','id','ASC');
			$data['EditAudio'] = $this->Webmodel->getViewById('*','tbl_audios', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Audio-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Audio-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					
					$config['upload_path'] = 'assets/frontend/upload/audio/';
					$config['allowed_types'] = 'mp3|MP3';
					$config['max_size'] = '10048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/AddAudio');
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					//echo var_dump($is_file_error); exit;
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_audios','filepath');
					}
					
					if($this->Webmodel->Update('tbl_audios',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Audio Updated</div>');
						redirect('backend/web/listAudio');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}	
		
	public function addYoutubeCategory() { 
		
		if($this->session->userdata('loginuser')) {
			
			$data['YoutubeList'] = $this->Webmodel->getList('*','tbl_youtube_category','id','ASC');
			$data['title']				= 'Add New Category';
			$data['content']			= 'backend/youtube/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					$config['upload_path'] = 'assets/frontend/upload/youtube/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$errors.'</div>');
							  		redirect('backend/web/addYoutubeCategory');
							
						} else {
							
							$file = $this->upload->data();
							$value['filepath']=$file['file_name'];
						}
						
					}	
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_youtube_category', array('category_name'=>$value['category_name']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addYoutubeCategory');
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_youtube_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addYoutubeCategory');
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addYoutubeCategory');			
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addYoutubeCategory');			
					}
				}
			}			
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editYoutubeCategory($getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			
			if($getId) {
				
				$data['YoutubeList'] = $this->Webmodel->getList('*','tbl_youtube_category','category_name','ASC');
				$data['EditYoutube'] = $this->Webmodel->getViewById('*','tbl_youtube_category',$getId);
				
				$data['title']				= 'Edit | Youtube Category';
				$data['content']			= 'backend/youtube/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					$config['upload_path'] = 'assets/frontend/upload/youtube/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							echo $this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $getId, 'tbl_youtube_category','filepath');
					}
							
							
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_youtube_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addYoutubeCategory');
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addYoutubeCategory');	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_youtube_category', array('category_name'=>$value['category_name']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addYoutubeCategory');
									}
									else{
										
										if($this->Webmodel->Update('tbl_youtube_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addYoutubeCategory');
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addYoutubeCategory');			
					}
						}
						
				 }
			}
		
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listYoutube(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Page';
			$data['content']			= 'backend/youtube/listview';
			$data['YoutubeList'] 			= $this->Webmodel->getList('*','tbl_youtubes','id','ASC');
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddYoutube(){
		if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Add New Youtube';
			$data['content']			= 'backend/youtube/add';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_youtube_category','id','ASC');
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Youtube-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Youtube-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['filepath']		= $this->input->post("youtube");
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("youtube", "Youtube Link", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				//echo var_dump($fields); exit;
				if($this->input->post('image')=='submit') {
					
					if($this->Webmodel->Create('tbl_youtubes',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Youtube Upload Successfully.</div>');
							redirect('backend/web/listYoutube');
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddYoutube');			
						}
				}

		} 
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateYoutube($id){
		
			if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Update Youtube';
			$data['content']			= 'backend/youtube/update';
			$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_youtube_category','id','ASC');
			$data['EditYoutube'] = $this->Webmodel->getViewById('*','tbl_youtubes', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'AmbedkarTV-Youtube-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'AmbedkarTV-Youtube-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['filepath']			= $this->input->post("youtube");
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("youtube", "Youtube Link", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					
					
					
					if($this->Webmodel->Update('tbl_youtubes',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Youtube Updated</div>');
						redirect('backend/web/listYoutube');
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else {
			redirect('backend/web/login');	
		}
		}	
	
	public function selectFeaturedPage(){
	if ($this->session->userdata('loginuser')) {
			
			$data = array();
			$data['title']				= 'Featured Pages';
			$data['content']			= 'backend/featuredpage/selectcategory';
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			
			
			
		} else {
			redirect('backend/web/login');	
		}
			
		
	}
		
	public function addFeaturedPageCategory($slug) { 
		
		if($this->session->userdata('loginuser')) {
			
			if($slug=='blog'||$slug=='services' || $slug=='explore' || $slug=='news' || $slug=='ourleader' || $slug=='attrocities'){
			$data['FeaturedList'] = $this->Webmodel->getListByFeatured('*','tbl_featuredpage_category','id','ASC', $slug);
			$data['title']				= 'Add New Category';
			$data['slug']				= $slug;
			$data['content']			= 'backend/featuredpage/addcategory';
			//FORM POST DATA
			
			$value['category_name']	= $this->input->post('category_name');
			$value['featuredpage']	= $this->input->post('featuredpage');
			$value['status']		= $this->input->post('status');
			$value['createdon']	= date_timestamp_get(date_create());
			
			//FORM POST DATA VALIDATION
			$this->form_validation->set_rules("featuredpage"      , "Featured"	, "trim|required");
			$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
			$this->form_validation->set_rules("status"			, "Status"		, "trim|required");
			
			if ($this->form_validation->run() == FALSE) {
				 $this->load->view($this->layout, $data);
			 }
			 else { 
				
				if($this->input->post('Create')=='Submit') {
					
					
					if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $value['category_name'])){
						if($f=$this->Webmodel->checkDuplicate('tbl_featuredpage_category', array('category_name'=>$value['category_name'],'featuredpage'=>$value['featuredpage']))){
							
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
							redirect('backend/web/addFeaturedPageCategory/'.$slug);
						}
						else {
							if(empty($f)) { 
								
								if($this->Webmodel->Create('tbl_featuredpage_category',$value)) {
									
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Added.</div>');
							 		redirect('backend/web/addFeaturedPageCategory/'.$slug);
								}
								else {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
							  		redirect('backend/web/addFeaturedPageCategory/'.$slug);		
								}
							}
						}	
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
						redirect('backend/web/addFeaturedPageCategory/'.$slug);		
					}
				}
			}	
			}
			else{
					echo '<script>window.history.back();</script>';
				}
		} 
		else {
			redirect('backend/web/login');	
		}
	}
	
	public function editFeaturedPageCategory($slug, $getId) { 
		
		if($this->session->userdata('loginuser')) {
			
			if($slug=='blog' ||$slug=='services' || $slug=='explore' || $slug=='news' || $slug=='ourleader' || $slug=='attrocities'){
			if($getId) {
				
				$data['FeaturedList'] = $this->Webmodel->getListByFeatured('*','tbl_featuredpage_category','id','ASC', $slug);
				$data['EditFeatured'] = $this->Webmodel->getViewById('*','tbl_featuredpage_category',$getId);
				
				$data['title']				= 'Edit | Feature Category';
				$data['slug']				= $slug;
				$data['content']			= 'backend/featuredpage/editcategory';
				
				//FORM POST DATA
				
				$value['category_name']	= $this->input->post('category_name');
				$value_hidden			=$this->input->post('category_name_hidden');
				$value['featuredpage']	= $this->input->post('featuredpage');
				$value['status']		= $this->input->post('status');
				$value['updatedon']	= date_timestamp_get(date_create());
				
				//FORM POST DATA VALIDATION
				$this->form_validation->set_rules("category_name"      , "Category Name"	, "trim|required");
				$this->form_validation->set_rules("status"			, "Status"		, "trim|required");	
				
				if ($this->form_validation->run() == FALSE) {
					 $this->load->view($this->layout, $data);
				 }
				 else { 
					
					if($this->input->post('Create')=='Update') {
					
							
							if(preg_match('/^[a-zA-Z0-9 ]{1,50}$/',$value['category_name'])){
								if($value['category_name']==$value_hidden){
									
									if($this->Webmodel->Update('tbl_featuredpage_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addFeaturedPageCategory/'.$slug);	
									}
						 			else {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
								  		redirect('backend/web/addFeaturedPageCategory/'.$slug);	
								}
										
								}
								else{
									if($f=$this->Webmodel->checkDuplicate('tbl_featuredpage_category', array('category_name'=>$value['category_name'],'featuredpage'=>$value['featuredpage']))){
							
									$this->session->set_flashdata('msg', '<div class="alert alert-danger">This Category is already registerd</div>');
									redirect('backend/web/addFeaturedPageCategory/'.$slug);	
									}
									else{
										
										if($this->Webmodel->Update('tbl_featuredpage_category',$value, $getId)) {
										$this->session->set_flashdata('msg', '<div class="alert alert-success">Category Has Been Updated.</div>');
										redirect('backend/web/addFeaturedPageCategory/'.$slug);	
									}
									
								}
									
							}	
							}
							else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Only Alphanumeric Valuse are Allowed!</div>');
							 redirect('backend/web/addYoutubeCategory');			
					}
						}
						
				 }
			}
			}
			else{
					echo '<script>window.history.back();</script>';
				}
		} 
		else {
			redirect('backend/web/login');
		}
	}
		
	public function listFeaturedPage($slug){
		if ($this->session->userdata('loginuser')) {
			if($slug=='blog' ||$slug=='services' || $slug=='explore' || $slug=='news' || $slug=='ourleader' || $slug=='attrocities'){
			$data = array();
			$data['title']				= $slug.' | Page List';
			$data['content']			= 'backend/featuredpage/listview';
			$data['slug']				= $slug;
			$data['FeaturedList'] 		= $this->Webmodel->getListByFeatured('*','tbl_featuredpages','id','ASC', $slug);
			//echo var_dump($data); exit;
			$this->load->view($this->layout, $data);
			}
			else{
					echo '<script>window.history.back();</script>';
				}
			
			
		} 
		else {
			redirect('backend/web/login');	
		}
		}
	
	public function AddFeaturedPage($slug){
		if ($this->session->userdata('loginuser')) {
			if($slug=='blog' ||$slug=='services' || $slug=='explore' || $slug=='news' || $slug=='ourleader' || $slug=='attrocities'){
			$data = array();
			$data['title']				= $slug.' | Add Page';
			$data['content']			= 'backend/featuredpage/add';
			$data['slug']				= $slug;
			$data['CategoryList'] 		= $this->Webmodel->getListByFeatured('*','tbl_featuredpage_category','id','ASC', $slug);
			
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'GatwayUnimart-'.$slug.'-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'GatwayUnimart-'.$slug.'-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['featuredpage']		= $this->input->post('featuredpage');
			$fields['status']			= $this->input->post("status");
			$date						= date_create();
			$fields['createdon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
			}
			else {
				
				if($this->input->post('image')=='submit') {
					if($_FILES['feature_img']){
					$config['upload_path'] = 'assets/frontend/upload/featuredpage/';
					$config['allowed_types'] = 'jpg|png|gif';
					$config['max_size'] = '4048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					
					if (!$is_file_error) {
						
						$s =  $this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							
							$errors= $this->upload->display_errors();
							//echo var_dump($errors); exit;
							$is_file_error = TRUE;
							
							
						} else {
							
							$file = $this->upload->data();
							$fields['filepath']=$file['file_name'];
						}
						
					}	
					}
					if($this->Webmodel->Create('tbl_featuredpages',$fields)) {
									
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Content Upload Successfully.</div>');
							redirect('backend/web/listFeaturedPage/'.$slug);
						}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						redirect('backend/web/AddFeaturedPage/'.$slug);			
						}
				}

		}
		 }
			else{
					echo '<script>window.history.back();</script>';
				}
		}
		else {
			redirect('backend/web/login');	
		}
		
	}
	
	public function updateFeaturedPage($slug, $id){
		
			if ($this->session->userdata('loginuser')) {
			if($slug=='blog' ||$slug=='services' || $slug=='explore' || $slug=='news' || $slug=='ourleader' || $slug=='attrocities'){
			$data = array();
			$data['title']				= 'Update '.$slug;
			$data['content']			= 'backend/featuredpage/update';
			$data['slug']				= $slug;
			$data['CategoryList'] 		= $this->Webmodel->getListByFeatured('*','tbl_featuredpage_category','id','ASC', $slug);
			$data['EditFeatured'] 		= $this->Webmodel->getViewById('*','tbl_featuredpages', $id);
			//echo var_dump($data); exit;
			if($this->input->post("pagetitle")!=''){
			$fields['title']			= $this->input->post("pagetitle");
			}else
			{
				$fields['title']		= 'GatwayUnimart-'.$slug.'-'.rand(0000,9999);
			}
			if($this->input->post("description")!=''){
			$fields['content']			= $this->input->post("description");
			}else
			{
				$fields['content']		= 'GatwayUnimart-'.$slug.'-'.rand(0000,9999);
			}
			$categoryid					= $this->input->post("categoryid");
			$fields['category_ids']		= implode(',',$categoryid);
			$fields['status']			= $this->input->post("status");
			$fields['featuredpage']		= $this->input->post('featuredpage');
			$date						= date_create();
			$fields['updatedon']		= date_timestamp_get($date);
			
			
			//set validations
			$this->form_validation->set_rules("categoryid[]", "Category", "trim|required");
			$this->form_validation->set_rules("status", "description", "trim|required");
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->layout, $data);
				
			}
			else {
				
				if($this->input->post('image')=='update') {
					$config['upload_path'] = 'assets/frontend/upload/featuredpage/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;	
					if (!$is_file_error) {
						
						$s=$this->upload->initialize($config);
						
						
						if (!$this->upload->do_upload('feature_img')) {
							$this->upload->display_errors();
							$is_file_error = TRUE;
							
						} else {
							
							$file = $this->upload->data();
						}
					}	
					
					if (!$is_file_error) {
						$this->Webmodel->save_file_info($file, $id, 'tbl_featuredpages','filepath');
					}
					
					
					if($this->Webmodel->Update('tbl_featuredpages',$fields, $id)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Content Updated</div>');
						redirect('backend/web/listFeaturedPage/'.$slug);
					}
					else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
						$this->load->view($this->layout, $data);				
					}					
				}
			}
			}
			else{
					echo '<script>window.history.back();</script>';
				}
			}
			else {
			redirect('backend/web/login');	
		}
		}	
	
	
}
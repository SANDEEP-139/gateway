<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends Public_controller
{
 
  function __construct()
  {
    parent::__construct();
	
  }
  
  	public function index() {
		$bloglist=array($this->Pagemodel->getlistblog());
		$data['BlogList']=$bloglist[0];
		//echo var_dump($data['BlogList']); exit;
		$imglist= array($this->Webmodel->getList('*','tbl_images','id','DSC'));
		$data['ImageList'] = $imglist[0];
		//echo var_dump($data['ImageList']); exit;
		  $mode= $this->Pagemodel->getlivemode();
			if($mode[0]['live_mode']==1){
				$data['content']='web_view';
			$this->load->view($this->layout, $data);
			}
			
			if($mode[0]['live_mode']==0){
				if($this->session->userdata('loginuser')){
					$data['content']='web_view';
					
			$this->load->view($this->layout, $data);
				}else{
			$this->load->view('comingsoon', $data);}
			}
       
    }
	public function gallery(){
			
		$data = array();
		$data['gallerylist']=$this->Pagemodel->get_gallery();
		$data['title'] = 'Home | Gallery';
	    $data['content'] = 'gallery_view';
		//echo var_dump($data);exit;
		$this->load->view($this->layout,$data);
		}
	
	public function page($slug) {
		$result=$this->Pagemodel->getpagedata($slug);
		
		
		if($result== false)
	   {
		   $this->output->set_status_header('404');
		   $data['title']='Home | 404';
			$data['content']='404';
			$this->load->view($this->layout, $data);
		}
		else
		{
			
			$data['title']='Home | '.$result[0]['title'];
			$data['content']=$result[0]['template'].'_view';
			$data['pagedata']=$result;
			//echo var_dump($data);exit;
			$this->load->view($this->layout, $data);
		}
	}
	
	public function Subscribe(){
		$value['emails']= $this->input->post('emailid');
		$insert= $this->Pagemodel->insertsub($value);
		if($insert){echo '<script>alert("Thanks for subscribe us"); window.history.back();</script>';}else{echo '<script>alert("Invalid response");window.history.back();</script>';}
		}
	
	public function dashboard(){
		if($this->session->userdata('loginid')){
			$data = array();
		   $data['title']			   = 'Dashboard';
		   $data['content']			   = 'dashboard';
		   if($this->session->userdata('loginid')){
		   $this->load->view($this->layout, $data);
		   }
		}
		else{
			redirect('web/login');
		}
	}
	
	public function ajaxdata(){
		//echo var_dump($_POST); exit;
		if(!empty($_POST["country_id"])){
    //Get all state data
   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
	$where['country_id']=$_POST["country_id"];
    $query= $this->Pagemodel->select_list('*', 'states', $where, 'state_name');
    //Count total number of rows
    $rowCount = $query->num_rows();
	$rowlist = $query->result_array();
    //echo var_dump($rowlist);
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        foreach($rowlist as $row){ 
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(!empty($_POST["state_id"])){
    //Get all city data
    //$query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    $where1['state_id']=$_POST["state_id"];
    $query= $this->Pagemodel->select_list('*', 'cities', $where1, 'city_name');
    //Count total number of rows
     $rowCount = $query->num_rows();
	$rowlist = $query->result_array();
     //echo var_dump($rowlist);
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        foreach($rowlist as $row){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
		}

	
	public function contact(){
	 
		
		$data = array();
		
		$data['title'] = 'Home | contact';
	    $data['content'] = 'contact_view';
	 
			
	    $user['name']		    = $this->input->post("name");
		$user['email']		    = $this->input->post("email");
                $user['mobile']		    = $this->input->post("mobile");
		$user['message']			    = $this->input->post("message");
		
		//echo var_dump($data);exit;
		$this->form_validation->set_rules('name','Name', 'trim|required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('message','Message', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
		$this->load->view($this->layout, $data);
			}
		else
		{
			if($this->input->post('submit')=='Submit')
			{
			if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
						{
						    $secret = '6LcPkRgUAAAAAHyDFDJAxSIOZKXTMuLNx16Ex6Zd';
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        	$responseData = json_decode($verifyResponse);
							
			if($responseData->success==false) {
						$message="Hello Dear,
			You have a message. Please get his detail: 
			User name: ".$user['name']."
			User Subject: ".$user['user']."contact with you
                        User Mobile: ".$user['mobile']."
			User Message: ".$user['message']."
			Thanks &amp; Regard's 
			Gateway Unimart";
			
			$this->email->from($user['email'],'User');
		$this->email->to('prashant.shukla@ssak.co.in');
 
		$this->email->subject($user['subject']);
	    $this->email->message($message);
		$send = $this->email->send();
		if($send)
		{
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Send success full</div>');
			
			redirect('web/thankyou');
		 
		}
		else
		{
		$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
			redirect('web/contact');
		}
			
			
		}
			else{
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger">Please enter valid chaptcha</div>');
		
			redirect('web/contact');
			}
			}
		
		}
	if($this->input->post('submit')=='Send')
			{
			
						    
		
						$message="Hello Dear,
			You have a message. Please get his detail: 
			User name: ".$user['name']."
			User Subject: ".$user['user']."contact with you
                        User Mobile: ".$user['mobile']."
			User Message: ".$user['message']."
			Thanks &amp; Regard's 
			Gateway Unimart";
			
			$this->email->from($user['email'],'User');
		
                $this->email->to('info@gatewayunimart.com','drkaleemshah@gmail.com');
		$this->email->subject($user['name']);
	    $this->email->message($message);
		$send = $this->email->send();
		if($send)
		{
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Send success full</div>');
			
			redirect('web/thankyou');
		 
		}
		else
		{
		$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid! Error Occured.</div>');
			redirect('web/contact');
		}
			
			
		}
			
			}


		
		
		}
	
		
	public function showImage($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Image';
	    $data['content'] = 'image/image_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_image_category', 'category_name', $id);
	  	$data['ImageList'] 	= $this->Webmodel->getListByLike('id,title,content,filepath','tbl_images','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
 	public function thankyou(){
	$data['title'] = 'Thank You For Contacting us';
	$this->load->view('thankyou', $data);
	}
 	public function showImageCategory(){
	 
		
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_image_category','id','ASC');
		$data['title'] = 'Home | Image';
	    $data['content'] = 'image/image_view_category';
	  
		$this->load->view($this->layout, $data);
			
	    
 }
 
 	public function showVid($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Video';
	    $data['content'] = 'video/video_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_video_category', 'id, category_name', $id);
	  	$data['VidList'] 	= $this->Webmodel->getListByLike('id,title,content,filepath','tbl_videos','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
 	
	public function watchVideo($cid, $id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Video';
	    $data['content'] = 'video/watch_video';
		$data['VideoDetail'] 	= $this->Webmodel->getName('tbl_videos', '*', $id);
		$data['Category'] 	= $this->Webmodel->getName('tbl_video_category', 'id, category_name', $cid);
	  	$data['VidList'] 	= $this->Webmodel->getremListByLike('id,title,content,filepath','tbl_videos','category_ids', $cid, $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }	
		
 	public function showVidCategory(){
	 
		
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_video_category','id','ASC');
		$data['title'] = 'Home | Video';
	    $data['content'] = 'video/video_view_category';
	  
		$this->load->view($this->layout, $data);
			
	    
 }
 
 	public function showYoutube($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Youtube';
	    $data['content'] = 'youtube/video_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_youtube_category', 'id, category_name', $id);
	  	$data['VidList'] 	= $this->Webmodel->getListByLike('id,title,content,filepath','tbl_youtubes','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
 	
	public function watchYoutube($cid, $id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Youtube';
	    $data['content'] = 'youtube/watch_video';
		$data['VideoDetail'] 	= $this->Webmodel->getName('tbl_youtubes', '*', $id);
		$data['Category'] 	= $this->Webmodel->getName('tbl_youtube_category', 'id, category_name', $cid);
	  	$data['VidList'] 	= $this->Webmodel->getremListByLike('id,title,content,filepath','tbl_youtubes','category_ids', $cid, $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }	
		
 	public function showYoutubeCategory(){
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_youtube_category','id','ASC');
		$data['title'] = 'Home | Audio';
	    $data['content'] = 'youtube/video_view_category';
	  
		$this->load->view($this->layout, $data);
	    
 }
 
 	public function showAudio($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Audio';
	    $data['content'] = 'audio/audio_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_audio_category', 'id, category_name', $id);
	  	$data['VidList'] 	= $this->Webmodel->getListByLike('id,title,content,filepath','tbl_audios','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
		
 	public function showAudioCategory(){
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_audio_category','id','ASC');
		$data['title'] = 'Home | Audio';
	    $data['content'] = 'audio/audio_view_category';
	  
		$this->load->view($this->layout, $data);
	    
 }
 
 	public function showBook($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Book';
	    $data['content'] = 'book/book_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_book_category', 'id, category_name,filepath', $id);
	  	$data['ImageList'] 	= $this->Webmodel->getListByLike('id,title,content,filepath,coverpage','tbl_books','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
		
 	public function showBookCategory(){
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_book_category','id','ASC');
		$data['title'] = 'Home | Book';
	    $data['content'] = 'book/book_view_category';
	  
		$this->load->view($this->layout, $data);
	    
 }
 
 	public function showArticle($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Article';
	    $data['content'] = 'article/article_view';
		$data['Category'] 	= $this->Webmodel->getName('tbl_article_category', 'id, category_name', $id);
	  	$data['ImageList'] 	= $this->Webmodel->getListByLike('*','tbl_articles','category_ids', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
	
	public function showArticleDetail($id){
	 
		
		$data = array();
		
		$data['title'] = 'Home | Article';
	    $data['content'] = 'article/article_details';
		$data['Category'] 	= $this->Webmodel->getName('tbl_article_category', 'id, category_name', $id);
	  	$data['Article'] 	= $this->Webmodel->getName('tbl_articles', '*', $id);
		//echo var_dump($data);exit;
		
		$this->load->view($this->layout, $data);
			
	    
 }
		
 	public function showArticleCategory(){
		$data = array();
		$data['CategoryList'] 		= $this->Webmodel->getList('*','tbl_article_category','id','ASC');
		$data['title'] = 'Home | Article';
	    $data['content'] = 'article/article_view_category';
	  
		$this->load->view($this->layout, $data);
	    
 }
 
 	public function showFeaturedPage($slug, $id){
	 
		
		$data = array();
		
		$data['title'] 		= 'Home | Blog';
	    $data['content'] 	= 'featuredpage/page_view';
		$data['slug'] 		= $slug;
		$data['Category'] 	= $this->Webmodel->getblogName('tbl_featuredpage_category', 'id, category_name', $id);
	  	$data['ImageList'] 	= $this->Webmodel->getListByLikeblog('*','tbl_featuredpages','category_ids', $id);
		$data['Article'] 	= $this->Webmodel->getName('tbl_featuredpages', '*', $id);
		//echo var_dump($data);exit;
		$this->load->view($this->layout, $data);
			
	    
 }
	
	public function showFeaturedPageDetail($slug, $id){
	 
		$data = array();
		$data['title'] = 'Home | Blog';
	    $data['content'] = 'featuredpage/page_details';
		$data['slug'] 		= $slug;
		$data['Category'] 	= $this->Webmodel->getblogName('tbl_featuredpage_category', 'id, category_name', $id);
		$data['ImageList'] 	= $this->Webmodel->getListByLikeb('*','tbl_featuredpages','category_ids');
	  	$data['Article'] 	= $this->Webmodel->getName('tbl_featuredpages', '*', $id);
		//echo var_dump($data);exit;
		$this->load->view($this->layout, $data);
 }
		
 	public function showFeaturedPageCategory($slug){
		$data = array();
		$data['title'] = 'Home | Blog';
		$data['CategoryList'] 		= $this->Webmodel->getListByFeatured('*','tbl_featuredpage_category','id','ASC', $slug);
		$data['Categ'] 	= $this->Webmodel->getblogName('tbl_featuredpage_category', 'id, category_name', $id);
	  	$data['ImageList'] 	= $this->Webmodel->getListByLikeblog('*','tbl_featuredpages','category_ids', $id);
		$data['Article'] 	= $this->Webmodel->getblogdetailName('tbl_featuredpages', '*',$id);
		$data['slug']				= $slug;
		
	    $data['content'] = 'featuredpage/page_category';
	 //echo var_dump($data['Article']);exit;
		$this->load->view($this->layout, $data);
	    
 }

	public function db_backup(){
       $this->load->dbutil();   
       $backup =& $this->dbutil->backup();  
       //$this->load->helper('file');
     	$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'uploads/dbbackup/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 


        $this->load->helper('download');
        force_download($db_name, $backup);
		unlink($save); 
}


}
    


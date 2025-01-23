<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\VehicleModel;
use App\Models\VehicleImagesModel;
use App\Models\VehicleFeaturesModel;
use App\Models\VehicleInquiryModel;
use App\Models\ContentModel;

class Stock extends BaseController
{   

    protected $vehModel;          
    protected $vehImagesModel;          
    protected $vehFeaturesModel;          
    protected $vehInquiryModel;          
    protected $contentModel;          


    public function __construct()
    {
        $this->vehModel = new VehicleModel();
    }


    public function set_per_page()
    {   
        $this->session->set('per_page', $this->request->getPost('per_page'));
    }


    public function set_sort_by()
    {   
        $this->session->set('sort_by', $this->request->getPost('sort_by'));
    }




    public function index()
    {  
        
      


        $post_submit_check = '';
        $search = array();
        $session_array = array();
        $where = array();
        $price = array();
        $cc = array();
        $mileage = array();
        $price[0] = 0;
        $price[1] = 1000000;
        $cc[0] = 0;
        $cc[1] = 10000;
        $mileage[0] = 0;
        $mileage[1] = 1000000; 
        $meta_description = '';
        $encoded = '';
        $decoded = '';
        $url_link = array();
                        
        $uri = service('uri');


                // Check URI for make/model conditions
            if($uri->getSegment(1) == 'make' && $uri->getSegment(3) == 'model') {
                $search['make'] = urldecode($uri->getSegment(2));
                $search['model'] = urldecode($uri->getSegment(4));
            } elseif ($uri->getSegment(1) == 'make') {
                $search['make'] = urldecode($uri->getSegment(2));
            }

            // Set session for filters if available
            if ($search) {
                $session_array = $search;
                $this->session->set('filter', $session_array);
            } else {
                $session_array = $this->session->get('filter') ?? [];
            }

 

        if(in_array($uri->getSegment(1), array('make', 'model', 'drive', 'condition'))) {
            $post_submit_check = 1;
            $encoded = current_url();
        }

        //if(current_url() == base_url('stock') AND !$this->request->getPost() AND !strpos($_SERVER['REQUEST_URI'], "page")){
        if(strpos(current_url(), "stock") AND !$this->request->getPost() AND !strpos($_SERVER['REQUEST_URI'], "page")){
            $this->session->remove('filter');        
        }
        

        if($uri->getSegment(2) == 'UAE'){

            $search['drive'] = 'LHD';
            $session_array = $search;
        }

        if($uri->getSegment(2) == 'Export'){
            
            $search['drive'] = 'RHD';
            $session_array = $search;
        }

        if($uri->getSegment(1) == 'make'){
            
            $search['make'] = urldecode($uri->getSegment(2));
        }

        if($uri->getSegment(1) == 'model'){
            $search['make'] = urldecode($uri->getSegment(2));
            $search['model'] = urldecode($uri->getSegment(3));
        }

        if($uri->getSegment(1) == 'drive'){
            
            $search['drive'] = $uri->getSegment(2);
        }
        if($uri->getSegment(1) == 'condition'){
            
            $search['veh_condition'] = $uri->getSegment(2);
        }


       

        //url search decode  
        if($uri->getSegment(1) == 'search'){
            $url = $uri->getSegment(2);
            $json = base64_decode($url);
            $decoded = json_decode($json, true);


            foreach($decoded as $key=>$val){


                if(!in_array($key,array('year_from','year_to','amount','cc','km'))){
                 $search[$key] = $val;
                }else{
                    $_POST[$key]=$val;
                }

            }


            
            $json = json_encode(array_merge($search,$_POST));
            $encoded = base_url('search/'.base64_encode($json));
          


            $session_array = $search;
            $this->session->set('filter', $session_array);

        }




        if($this->request->getPost()){
        

            if($this->request->getPost('make')){
                $search['make'] = $this->request->getPost('make');
            }
        
            if($this->request->getPost('model')){
                $search['model'] = $this->request->getPost('model');
            }

            if($this->request->getPost('body_type')){
                $search['body_type'] = $this->request->getPost('body_type');
            }

            if($this->request->getPost('drive')){
                $search['drive'] = $this->request->getPost('drive');
            }
            
            if($this->request->getPost('veh_condition')){
                $search['veh_condition'] = $this->request->getPost('veh_condition');
            }

            if($this->request->getPost('fuel')){
                $search['fuel'] = $this->request->getPost('fuel');
            }

            if($this->request->getPost('exterior_color')){
                $search['exterior_color'] = $this->request->getPost('exterior_color');
            }

            if($this->request->getPost('transmission')){
                $search['transmission'] = $this->request->getPost('transmission');
            }
            
            if($this->request->getPost('year_from')){
                $year_from = $this->request->getPost('year_from');
                $url_link['year_from'] = $year_from;
            }else{
                $year_from = 2000;
                $url_link['year_from'] = $year_from;
            }
            if($this->request->getPost('year_to')){
                $year_to = $this->request->getPost('year_to');
                $url_link['year_to'] = $year_to;
            }else{
                $year_to = date('Y');
                $url_link['year_to'] = $year_to;
            }

            if($this->request->getPost('amount')){
                $price = preg_replace('/[^0-9]/','',explode("-", $this->request->getPost('amount')));
                $url_link['amount'] = $price[0].'-'.$price[1];
            }   

            if($this->request->getPost('cc')){
                $cc = preg_replace('/[^0-9]/','',explode("-", $this->request->getPost('cc')));
                $url_link['cc'] = $cc[0].'-'.$cc[1];
            }

            if($this->request->getPost('km')){
                $mileage = preg_replace('/[^0-9]/','', explode("-", $this->request->getPost('km')));
                $url_link['km'] = $mileage[0].'-'.$mileage[1];
            }


            $where = ['display_website' => 1, 'year>=' => $year_from, 'year<=' => $year_to, 'fob_price>=' => $price[0], 'fob_price<=' => $price[1], 'cc>=' => $cc[0], 'cc<=' => $cc[1], 'mileage>=' => $mileage[0], 'mileage<=' => $mileage[1]];
             
        }else{
           $where = ['display_website' => 1]; 
        }

      



        if($this->session->get('per_page')!=""){
            $perPage = $this->session->get('per_page');
        }
        else{
            $perPage = 20;
        }


        if($this->session->get('sort_by')!=""){
            $sort_by = $this->session->get('sort_by');
            $sort_by = explode("_", $sort_by);

            if($sort_by[0] == "year"){
                if($sort_by[1] == "a"){
                    $orderby = "year ASC";
                }else{
                    $orderby = "year DESC";
                }
            }
            elseif($sort_by[0] == "mileage"){
                if($sort_by[1] == "a"){
                    $orderby = "mileage ASC";
                }else{
                    $orderby = "mileage DESC";
                }
            }
            elseif($sort_by[0] == "vehicle"){
                    $orderby = "veh_id DESC";
            }

        }else{
            $orderby = 'veh_id DESC';
        }
        

    
     if($this->request->getPost('submit') != NULL OR $post_submit_check==1){
      $session_array = $search;
      $this->session->set('filter', $session_array);


          //url search encode  
          if($search AND !$post_submit_check){
          $json = json_encode(array_merge($search,$url_link));
          $encoded = base_url('search/'.base64_encode($json));
          }



     }else{


      if($this->session->get('filter') != NULL){
        $session_array = $this->session->get('filter');
      }
      
     }
        
                
        $data = [
            "stock" => $this->vehModel->like($session_array,'','before')->where($where)->orderBy($orderby)->paginate($perPage),
            "pager" => $this->vehModel->pager,
            "found"=> $this->vehModel->like($session_array,'','before')->where($where)->countAllResults(),
            //drop down filters
            "makes" => $this->vehModel->distinct()->where('make<>','')->orderBy('make','ASC')->findColumn('make'),
            "body_types" => $this->vehModel->where('body_type<>','')->distinct()->orderBy('body_type','ASC')->findColumn('body_type'),
            "handles" => ['LHD', 'RHD'],
            "veh_condition" => ['New', 'Used'],
            "colors" => $this->vehModel->where('exterior_color<>','')->distinct()->orderBy('exterior_color','ASC')->findColumn('exterior_color'),
            "fuels" => $this->vehModel->where('fuel<>','')->distinct()->orderBy('fuel','ASC')->findColumn('fuel'),
            "transmissions" => $this->vehModel->where('transmission<>','')->distinct()->orderBy('transmission','ASC')->findColumn('transmission'),
            "tractions" => $this->vehModel->where('traction<>','')->distinct()->orderBy('traction','ASC')->findColumn('traction'),
            "encoded" => $encoded,
            "user_search" => $session_array,
            "request" => $this->request
        ]; 

        //echo "<pre>"; print_r($this->vehModel->getLastQuery()->getQuery()); echo "</pre>"; //exit;


        if($data['stock']){

            foreach ($data['stock'] as $item) 
            {   
                $updated_item  = $item;
                $updated_item['slug'] = strtolower(str_replace(" ", "-", $item['make']."-".$item['model']."-".$item['year']."-".$item['veh_id']));
                $updated_item['featured_image'] = $this->get_pic_link($item['featured_image']);
                //$updated_item['fob_price'] = 'ASK';
                $stock_data[] = $updated_item;
            }
            $data['stock'] = $stock_data;

        }else{
            $data['stock'] = '';
        }



        if(isset($search['make'])){
            $models_where = ['make'=>$search['make'],'model<>'=>''];
            $data['models'] = $this->vehModel->distinct()->where($models_where)->orderBy('model','ASC')->findColumn('model');
        }else{
            $data['models'] = '';
        }   



        if(isset($search['make']) AND !isset($search['model'])){
            $data['h1'] = ucwords(strtolower($search['make'])).' Cars For Sale In Durban With Price';
            $meta = stock_meta_make($search['make']);
        }
        elseif(isset($search['make']) AND isset($search['model'])){
            $data['h1'] = ucwords(strtolower($search['make'])).' '.ucwords(strtolower($search['model'])).' Cars For Sale In Durban';
            $meta = stock_meta_make_model($search['make'], $search['model']);
        }
        elseif(isset($search['veh_condition'])){
            $data['h1'] = 'Buy '.$search['veh_condition'].' Cars For Sale In Durban';
            $meta = stock_meta_condition($search['veh_condition']);
        }
        elseif(isset($search['drive'])){
            $meta = stock_meta_drive($search['drive']);
        }
        else{
           $data['h1'] = 'Used Cars For Sale In Durban With Price';
           $meta = stock_meta_default();
        }


        $data['page_title'] = $meta[4]['content'];
        $data['meta'] = $meta;


        $this->contentModel = new ContentModel();
        $data['content'] = $this->contentModel->where('route',str_replace("%20", "+", uri_string()))->findColumn('content');
       
        // echo "<pre>";
        // print_r($data); 
        // echo "</pre>";

        return view('stock', $data);

    }
  




    // car detail
    public function carDetail($slug)
    {   

        if(strpos($_SERVER['REQUEST_URI'],'index.php') !== false){
            return redirect()->to(current_url());
        }
        
        $this->vehImagesModel = new VehicleImagesModel();
        $this->vehFeaturesModel = new VehicleFeaturesModel();

        $get_id =  explode("-", $slug);
        $veh_id = end($get_id);

        $data['veh'] = $this->vehModel->where('display_website',1)->find($veh_id);
        if(!$data['veh']){
            throw new PageNotFoundException();
        }

        

        if($data['veh']){

            $data['veh']['fob_price'] = 'ASK';
            /*if($data['veh']['fob_price'] == 0){
                $data['veh']['fob_price'] = 'ASK';
            }else{
                $data['veh']['fob_price'] = number_format($data['veh']['fob_price']);
            }*/

            if($data['veh']['mileage'] == 0){
                $data['veh']['mileage'] = '-';
            }
            if($data['veh']['doors'] == 0){
                $data['veh']['doors'] = '-';
            }
            if($data['veh']['body_type'] == ''){
                $data['veh']['body_type'] = '-';
            }
            $data['featured_image'] = $this->get_thumb_link($data['veh']['featured_image']);

            $veh_images = $this->vehImagesModel->where('veh_id',$veh_id)->orderBy('pic_priority')->findColumn('pic_url');

            if($veh_images){
                foreach ($veh_images as $item) 
                {   
                    $item_updated['pic_link'] = $this->get_pic_link($item);
                    $item_updated['thumb_link'] = $this->get_thumb_link($item);
                    $images[] = $item_updated;  
                }
            $data['images'] = $images;
            }else{
            $data['images'] = '';
            }


            $features = $this->vehFeaturesModel->find($veh_id);
            if($features){
                $yes_attributes = array();
                foreach ($features as $key => $value) {
                    if($key != 'attrib_id' AND $key != 'veh_id'){
                        if($value=="YES"){
                            $yes_attributes[] = str_replace("_", " ", strtoupper($key));
                            
                        }
                    }
                }
                $data['attributes'] = $yes_attributes;
            }else{
                $data['attributes'] = '';
            }

        
            
            $car = ucwords(strtolower($data['veh']['make']))." ".ucwords(strtolower($data['veh']['model']))." ".$data['veh']['year'];
            $meta = car_detail_meta($car);
            $data['page_title'] = $meta[4]['content'];
            $data['meta'] = $meta;

            return view('car-detail', $data);
      
      }  
        
        

    } 




    public function inquiry()
    {   
        

        $email_obj = \Config\Services::email();
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');
        $featured_image = $this->request->getPost('featured_image');
        $veh_id = $this->request->getPost('veh_id');
        $stock_id = $this->request->getPost('stock_id');
        $vehicle_name = $this->request->getPost('vehicle_name');

        $fob_price = $this->request->getPost('fob_price');
        $type = gettype($fob_price);
        if ($fob_price == 0 OR $type === "string") {
            $fob_price = 'ASK';
        }else{
            $fob_price = number_format($fob_price,0);
        }

        $slug = strtolower(str_replace(" ", "-", $vehicle_name));
        $link = base_url('car/'.$slug.'-'.$veh_id);


        if($name == '' || $phone == '' || $email == '' || $message == '')
        {
            $data = array(
                            'error' => true,    
                            'error_message'  => 'All Fields are Required'
                        );
        }

        elseif(!$this->request->getPost('recaptcha_token'))
        {   
            $data = array(
                            'error' => true,    
                            'error_message'  => 'Recaptcha Validation Failed.'
                            );
        }
        else
        { 
            $token = $this->request->getPost('recaptcha_token');

            $secret_key = '6LenXaYqAAAAAKbuGJoO7UFoIKieHojgJZYPaCro';

            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$token);

            $response_data = json_decode($response);

            if(!$response_data->success AND !$response_data->score >= 0.5 AND !$response_data->action == 'submit')
            {
                $data = array(
                            'error' => true,    
                            'error_message'  => 'Recaptcha Validation Failed.'
                            );
            }else{

                    $success_message = '';

                    $this->vehInquiryModel = new VehicleInquiryModel();
                    $data = [
                        'name' => $name,
                        'email'    => $email,
                        'phone'    => $phone,
                        'message'    => $message,
                        'veh_id'    => $veh_id,
                    ];

              
                     if($this->vehInquiryModel->insert($data))
                     {


                        $email_obj->setFrom('info@autocraftusa.net', 'AUTOCRAFT USA');   
                        //$email_obj->setTo('mnoman55@gmail.com');        
                        // $email_obj->setTo('info@autocraftkorea.com');        
                        // $email_obj->setBCC('info@autocraftkorea.com');            
                        $email_obj->setTo('info@autocraftusa.net');   

                        $email_obj->setSubject('Autocraft USA - Car Inquiry from '.$name);
                        $test = '<table width="800px" style="font-family:calibri;">
                          <tr height="50">
                            <td colspan="2"><h2>INQUIRY</h2></td>
                          </tr>

                          
                          <tr height="10">
                            <td colspan="2" style="border-bottom:1px solid #ddd;"></td>
                          </tr>

                          <tr height="20"></tr>

                          <tr>
                            <td width="40%" ><img src="'.$featured_image.'" style="width:100%"></td>
                            <td width="60%" >
                                <table width="100%" cellpadding="5" cellspacing="0" border="0">
                                  <tbody>
                                    <tr bgcolor="#eee">
                                        <td width="50%"  style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Stock ID:</td>
                                        <td width="50%"  style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">'.$stock_id.'</td>
                                    </tr>
                                    <tr bgcolor="#fff">
                                        <td style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="" colspan="2">'.$vehicle_name.'</td>
                                    </tr>
                                    <tr bgcolor="#eee">
                                        <td style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Price FOB:</td>
                                        <td style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">'.$fob_price.'</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </td>
                          </tr>

                          <tr height="20"></tr>

                          <tr height="40">
                            <td colspan="2">
                                <table width="100%" cellpadding="5" cellspacing="0" border="0">
                                  <tbody>
                                    <tr width="100%">
                                        <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Link:</td>
                                        <td width="85%" colspan="3" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">
                                        <a href="'.$link.'">'.$link.'</a></td>
                                    </tr>
                                    <tr width="100%">
                                        <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Name:</td>
                                        <td width="40%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$name.'</td>
                                        <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Email</td>
                                        <td width="30%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$email.'</td>
                                    </tr>
                                    <tr width="100%">
                                        <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Phone</td>
                                        <td width="85%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$phone.'</td>
                                    </tr>
                                    <tr width="100%">
                                        <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Message:</td>
                                        <td width="85%" colspan="3" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;">'.$message.'</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </td>
                          </tr>
                        </table>';

                    $email_obj->setMessage($test);
                    if($email_obj->send()){

                            $success_message = "REQUEST SUBMITTED SUCCESSFULLY";
                                $data = array(
                               'success'  => true,
                               'success_message'  => $success_message
                            );
                    }else{
                        $data = array(
                                'error' => true,    
                                'error_message'  => $email_obj->printDebugger()
                                );
                    }
                    
                    
                 }
                 else
                 {
                        $data = array(
                        'error' => true,    
                        'error_message'  => "Something went wrong. Record Insertion Failed"
                        );
                 }

            } 

        }


         echo json_encode($data);


    }









}
<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\VehicleModels;
use App\Models\BodyStyleModel;
use App\Models\ColorTypeModel;
use App\Models\CountriesModel;
use App\Models\VehicleMakeModel;
use App\Models\VehicleFeaturesModel;
use App\Models\VehicleImagesModel;





class VehicleImportController extends BaseController
{

    public function __construct(){

        $this->db = \Config\Database::connect();
        $this->vehModel       = new VehicleModel();
        $this->vehModels       = new VehicleModels();
        $this->bodyStyleModel = new BodyStyleModel();
        $this->clrTypeModel   = new ColorTypeModel();
        $this->countryModel   = new CountriesModel();
        $this->vehMakeModel   = new VehicleMakeModel();
        $this->vehFeatureModel   = new VehicleFeaturesModel();
        $this->VehicleImagesModel   = new VehicleImagesModel();
        $this->pager = \Config\Services::pager();
        $this->session = session();
        
    }
    



public function index(){


        $db = db_connect();
        $already_uploaded = $db->query('SELECT group_concat(veh_id) as result FROM tbl_vehicles')->getResultArray();
        

        $url = 'https://senda.us/autocraft/avisnew/page_include/scripts/autohaus_durban_website_stock.php';
        $data = $already_uploaded[0]['result'];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        curl_close($curl);
        $vehicles = json_decode($result, true);
        
        $stock_data = array();
        $updated_item = array();
        foreach ($vehicles as $item) 
            {   
                if(count($item['images'])>2){
                    $updated_item['veh_id']  = $item['vehicle_id'];
                    $updated_item['stock_no']  = "SA-".$item['vehicle_id'];
                    $updated_item['chassis']  = $item['veh_chassis_model']."-".$item['veh_chassis_number'];
                    $updated_item['engine_no']  = $item['veh_engine_number'];
                    $updated_item['engine_type']  = $item['veh_engine_type'];
                    $updated_item['body_type'] = $item['body_type'];
                    $updated_item['model']  = $item['model_name'];
                    $updated_item['make']  = $item['make_name'];
                    $updated_item['year']  = $item['veh_year'];
                    $updated_item['fuel']  = $item['veh_fuel'];
                    $updated_item['traction']  = $item['veh_traction'];
                    $updated_item['drive']  = $item['veh_drive'];
                    $updated_item['month']  = $item['manu_month'];
                    $updated_item['status']  = 'AVAILABLE';
                    $updated_item['doors']  = $item['veh_door'];
                    $updated_item['seats']  = $item['veh_passenger'];
                    $updated_item['cc']  = $item['veh_cc'];
                    $updated_item['mileage']  = $item['veh_km'];
                    $updated_item['transmission']  = $item['veh_t_m'];
                    $updated_item['gross_weight']  = $item['veh_gross_weight'];
                    $updated_item['net_weight']  = $item['veh_net_weight'];
                    $updated_item['length']  = $item['veh_l'];
                    $updated_item['width']  = $item['veh_w'];
                    $updated_item['height']  = $item['veh_h'];
                    $updated_item['m3']  = $item['veh_m3'];
                    $updated_item['model_grade']  = $item['lookupitem_id_grade'];
                    $updated_item['exterior_color']  = $item['veh_color'];
                    $updated_item['interior_color']  = $item['veh_interior_color'];
                    $updated_item['display_website']  = '1';
                    $updated_item['added_on']  = date("Y-m-d H:i:s");
                    $updated_item['updated_on']  = date("Y-m-d H:i:s");
                    $updated_item['featured_image'] = $item['images'][0];
                
                    $stock_data[] = $updated_item;
                }

            }

            $filtered_vehicles = $stock_data;

            

            $page = ($this->request->getGet('page') ?? 1);
            $offset = ($page*100)-100;
        
    
            $data = [
                'stock' => $filtered_vehicles,
                'offset' => $offset
            ];



            return view('admin/import_from_avis', $data);
    }






public function import_from_avis_submit(){


        $url = 'https://senda.us/autocraft/avisnew/page_include/scripts/autohaus_durban_website_stock_fetch_single_vehicle.php';
        $data = $this->request->getPost('veh_id');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        curl_close($curl);
        $vehicle = json_decode($result, true);

        //echo '<pre>'; print_r($vehicle[0]['options']); exit();

        foreach($vehicle as $veh){

                $car = array(
                   'veh_id' => $veh['vehicle_id'], 
                   'stock_no' => "SA-".$veh['vehicle_id'], 
                   'model_code' => $veh['model_code'], 
                   'chassis' => $veh['veh_chassis_model']."-".$veh['veh_chassis_number'],
                   'engine_no' => $veh['veh_engine_number'], 
                   'engine_type' => $veh['veh_engine_type'], 
                   'body_type' => $veh['body_type'], 
                   'make' => $veh['make_name'], 
                   'model' => $veh['model_name'],
                   'fuel' => $veh['veh_fuel'],
                   'traction' => $veh['veh_traction'],
                   'drive' => $veh['veh_drive'],
                   'veh_condition' => $veh['veh_condition'],
                   'year' => $veh['veh_year'],
                   'month' => $veh['manu_month'],
                   'doors' => $veh['veh_door'],
                   'seats' => $veh['veh_passenger'],
                   'cc' => $veh['veh_cc'],
                   'mileage' => $veh['veh_km'],
                   'transmission' => $veh['veh_t_m'],
                   'gross_weight' => $veh['veh_gross_weight'],
                   'net_weight' => $veh['veh_net_weight'],
                   'length' => $veh['veh_l'],
                   'width' => $veh['veh_w'],
                   'height' => $veh['veh_h'],
                   'm3' => $veh['veh_m3'],
                   'model_grade' => $veh['lookupitem_id_grade'],
                   'exterior_color' => $veh['veh_color'],
                   'interior_color' => $veh['veh_interior_color'],
                   'avis_price' => $veh['veh_sale_price'],
                   'fob_price' => $veh['veh_sale_price'],
                   'status' => 'AVAILABLE',
                   'display_website' => '1',
                   'featured_image' => $veh['images'][0],
                   'added_on' => date("Y-m-d H:i:s"),
                   'updated_on' => date("Y-m-d H:i:s")
                 );

            }

            $this->vehModel->insert($car);




            foreach($vehicle[0]['images'] as $key=>$img ){
                    $images = [
                        'veh_id'=>$vehicle[0]['vehicle_id'],
                        'pic_url'=>$img,
                        'pic_priority'=>$key+1
                    ];
                    $this->VehicleImagesModel->insert($images);
                    
                }




            $att_arr = array();
            foreach( $vehicle[0]['options'] as $key => $val ){

                    if($key != 'vehicle_id' ) {
                        if($vehicle[0]['options'][$key] == 1){ $vehicle[0]['options'][$key] = 'YES';}else{ $vehicle[0]['options'][$key] = '';}
                    }

                    $att_arr = array(
                           'veh_id' => $vehicle[0]['options']['vehicle_id'], 
                           'AC' => $vehicle[0]['options']['veh_a_c'], 
                           'POWER_STEERING' => $vehicle[0]['options']['veh_p_s'], 
                           'ABS' => $vehicle[0]['options']['veh_abs'], 
                           'SRS' => $vehicle[0]['options']['veh_srs'], 
                           'REAR_SPOILER' => $vehicle[0]['options']['veh_r_spoiler'], 
                           'ROOF_RAIL' => $vehicle[0]['options']['veh_roof_rail'], 
                           'CD' => $vehicle[0]['options']['veh_cd'], 
                           'TV' => $vehicle[0]['options']['veh_tv'], 
                           'NAVIGATION' => $vehicle[0]['options']['veh_navigation'], 
                           'ALLOY_WHEEL' => $vehicle[0]['options']['veh_a_w'], 
                           'LEATHER_SEATS' => $vehicle[0]['options']['veh_leather_seats'], 
                           'BACKTYRE' => $vehicle[0]['options']['veh_back_tyre'], 
                           'RADIO' => $vehicle[0]['options']['veh_radio'], 
                           'CENTRAL_LOCKING' => $vehicle[0]['options']['veh_central_locking'], 
                           'POWER_MIRROR' => $vehicle[0]['options']['power_mirror'], 
                           'BACK_CAMERA' => $vehicle[0]['options']['back_camera'], 
                           'FRONT_CAMERA' => $vehicle[0]['options']['front_camera'], 
                           'SUN_ROOF' => $vehicle[0]['options']['sun_roof'], 
                           'DVD_Player' => $vehicle[0]['options']['dvd_player'], 
                           'MD_Player' => $vehicle[0]['options']['md_player'], 
                           'FOG_Lights' => $vehicle[0]['options']['fog_lights'], 
                           'Body_Kit' => $vehicle[0]['options']['body_kit'], 
                           'Turbo' => $vehicle[0]['options']['turbo'], 
                           'One_Owner' => $vehicle[0]['options']['one_owner'], 
                           'HID' => $vehicle[0]['options']['hid'], 
                           'POWER_SLIDE_DOOR' => $vehicle[0]['options']['power_slide_door'], 
                           'CORNER_SENSOR' => $vehicle[0]['options']['corner_sensor'], 
                           'STEERING_SWITCH' => $vehicle[0]['options']['steering_switch'], 
                           'AUTO_AC' => $vehicle[0]['options']['auto_ac'], 
                           'half_leather_seat' => $vehicle[0]['options']['half_leather_seat'], 
                           'seven_seater' => $vehicle[0]['options']['seven_seater'], 
                           'paddle_shift' => $vehicle[0]['options']['paddle_shift'], 
                           'double_power_slide_door' => $vehicle[0]['options']['double_slide_door'], 
                           'key_start' => $vehicle[0]['options']['key_start'], 
                           'double_moonroof' => $vehicle[0]['options']['double_moonroof'], 
                           'maker_navi_tv' => $vehicle[0]['options']['maker_navi_tv'], 
                           'dealer_navi_tv' => $vehicle[0]['options']['dealer_navi_tv'], 
                           'maker_navi_jbl_sound_system' => $vehicle[0]['options']['maker_navi_jbl_sound_system'], 
                           'front_side_back_camera' => $vehicle[0]['options']['front_side_back_camera'], 
                           'around_view_4_camera' => $vehicle[0]['options']['around_view_4_camera'], 
                           'maker_rear_entertainment' => $vehicle[0]['options']['maker_rear_entertainment'], 
                           'alpine_rear_entertainment' => $vehicle[0]['options']['alpine_rear_entertainment'], 
                           'rear_entertainment_premium_sound' => $vehicle[0]['options']['push_start'], 
                           'coolbox' => $vehicle[0]['options']['coolbox'], 
                           'black_interior' => $vehicle[0]['options']['black_interior'], 
                           'black_half_leather' => $vehicle[0]['options']['black_half_leather'], 
                           'black_full_leather' => $vehicle[0]['options']['black_full_leather'], 
                           'beige_interior' => $vehicle[0]['options']['beige_interior'], 
                           'beige_half_leather' => $vehicle[0]['options']['beige_half_leather'], 
                           'beige_full_leather' => $vehicle[0]['options']['beige_full_leather'], 
                           'eight_seater' => $vehicle[0]['options']['eight_seater'], 
                           'one_power_seat' => $vehicle[0]['options']['one_power_seat'], 
                           'two_power_seat' => $vehicle[0]['options']['two_power_seat'], 
                           'three_power_seat' => $vehicle[0]['options']['three_power_seat'], 
                           'power_boot' => $vehicle[0]['options']['power_boot'], 
                           'modelista_front_spoiler' => $vehicle[0]['options']['modelista_front_spoiler'], 
                           'modelista_full_body_kit' => $vehicle[0]['options']['modelista_full_body_kit'], 
                           'admiration_front_spoiler' => $vehicle[0]['options']['admiration_front_spoiler'], 
                           'admiration_full_body_kit' => $vehicle[0]['options']['admiration_full_body_kit'], 
                           'after_market_front_spoiler' => $vehicle[0]['options']['after_market_front_spoiler'], 
                           'after_market_full_body_kit' => $vehicle[0]['options']['after_market_full_body_kit'], 
                           'maker_alloy_wheels' => $vehicle[0]['options']['maker_alloy_wheels'], 
                           'after_market_alloy_wheels' => $vehicle[0]['options']['after_market_alloy_wheels'], 
                           'four_disc_brake' => $vehicle[0]['options']['four_disc_brake'], 
                           'difflock' => $vehicle[0]['options']['difflock'], 
                           'spare_key' => $vehicle[0]['options']['spare_key']
                         );

                    }

                    $this->vehFeatureModel->insert($att_arr);

            
                    $this->session->setFlashdata('message', 'Vehicle Imported Succesfully');
                    return redirect()->to('admin/vehicle/import_from_avis');
   
    
    }






}
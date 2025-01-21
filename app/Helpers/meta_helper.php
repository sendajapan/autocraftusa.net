<?php

function home_meta(){

    $title = 'Autocraft USA | Trusted Vehicle Importer/Exporter in USA';
    $meta_description = 'Autocraft USA is your reliable partner for Importin and exporting high-quality USAn vehicles. Explore our extensive stock of new and used cars.';
    $keywords = 'Autocraft USA, USAn vehicle exporter, used cars USA, new cars USA, USAn car export, high-quality vehicles';

    return meta_tags($title, $meta_description, $keywords);
}

function about_meta(){

	$title = "About Autocraft USA | Trusted Experts in Vehicle Export/Import";
	$meta_description = 'Learn about Autocraft USA, a leading exporter and importer of USAn vehicles. Discover our mission, values, and commitment to quality and customer satisfaction.';
    $keywords = 'Autocraft USA, about us, USAn vehicle exporter, vehicle trading experts, quality USAn cars';

	return meta_tags($title, $meta_description, $keywords);
}

function contact_meta(){

	$title = "Contact Autocraft USA | Get in Touch for Vehicle Exports/Imports";
	$meta_description = 'Reach out to Autocraft USA for inquiries about exporting or Importing USAn vehicles. We’re here to assist you with high-quality service and expert advice.';
    $keywords = 'Contact Autocraft USA, USAn vehicle exporter contact, export inquiries, customer support, export service assistance';

	return meta_tags($title, $meta_description, $keywords);
}

function testimonials_meta(){

	$title = "Customer Testimonials | Why Clients Trust Autocraft USA";
	$meta_description = "Read what our satisfied clients say about Autocraft USA. Discover why businesses worldwide trust us for high-quality USAn vehicle.";
	$keywords = 'Autocraft USA reviews, customer testimonials, trusted USAn exporter, client feedback, quality vehicle export services';

	return meta_tags($title, $meta_description, $keywords);
}

function car_detail_meta($car){

    $title = $car.' - Autocraft USA';
    $meta_description = 'Autocraft USA is a car dealer which provides '.$car.' for sale and other models too.';
    $keywords = 'Autocraft USA, used cars USA, new cars USA, quality vehicles, trusted car dealer, car dealership USA, best used cars, car delivery USA';

    return meta_tags($title, $meta_description, $keywords);
}

function stock_meta_default(){
	
    $title = 'Explore Our Stock | High-Quality USAn Vehicles for Import/Export';
    $meta_description = 'Browse our wide range of USAn vehicles, including sedans, SUVs, and commercial vehicles. We provide high-quality and competitively priced options.';
    $keywords = 'USAn vehicles, cars for export, used cars stock, new USAn cars, SUVs for Import, USAn commercial vehicles';

    return meta_tags($title, $meta_description, $keywords);
	//return $data;
}

function stock_meta_make($make){
	
    $title = ''.ucwords(strtolower($make)).' Cars For Sale In USA At Best Price - Autocraft USA';
    $meta_description = 'Find your dream '.ucwords(strtolower($make)).' cars for sale in USA with Autocraft USA! We offer competitive prices and excellent customer service to help you find the perfect vehicle at a great price.';
    $keywords = 'Autocraft USA stock, used cars for sale, new cars for sale, car inventory USA, vehicle selection, car stock USA, buy used cars, buy new cars, car delivery';

	return meta_tags($title, $meta_description, $keywords);
}

function stock_meta_make_model($make, $model){

    $title = ''.ucwords(strtolower($make)).' '.ucwords(strtolower($model)).' For Sale In USA At Best Price - Autocraft USA';
    $meta_description = 'Find your dream '.ucwords(strtolower($make)).' '.ucwords(strtolower($model)).' for sale in USA with Autocraft USA! We offer competitive prices and excellent customer service to help you find the perfect vehicle at a great price.';
    $keywords = 'Autocraft USA stock, used cars for sale, new cars for sale, car inventory USA, vehicle selection, car stock USA, buy used cars, buy new cars, car delivery';
    return meta_tags($title, $meta_description, $keywords);
}

function stock_meta_condition($veh_condition){

    $title = 'Buy '.$veh_condition.' Cars For Sale In USA - Autocraft USA';
    $meta_description = 'Find your dream '.strtolower($veh_condition).' cars for sale in USA with Autocraft USA! We offer competitive prices and excellent customer service to help you find the perfect '.strtolower($veh_condition).' vehicles at a great price.';
    $keywords = 'Autocraft USA stock, used cars for sale, new cars for sale, car inventory USA, vehicle selection, car stock USA, buy used cars, buy new cars, car delivery';

    return meta_tags($title, $meta_description, $keywords);
}

function stock_meta_drive($drive){

	if($drive == 'RHD'){$meta_drive='Right';}else{$meta_drive='Left';}
        $h1 = '<h1 class="h4 font-weight-bold">'.$meta_drive.' Hand Drive Cars For Sale In USA</h1>';
        $title = ''.$meta_drive.' Hand Drive Cars For Sale In USA - Autocraft USA';
        $meta_description = 'Find your dream '.strtolower($meta_drive).' hand drive car at Autocraft USA. We offer a wide selection of '.strtolower($meta_drive).' hand drive cars for sale in USA at a great price.';
        $keywords = 'Autocraft USA stock, used cars for sale, new cars for sale, car inventory USA, vehicle selection, car stock USA, buy used cars, buy new cars, car delivery';

    return meta_tags($title, $meta_description, $keywords);
}



function meta_tags($title, $meta_description, $keywords){

    $data[] = array('name' => 'description', 'content' => $meta_description);
    $data[] = array('name' => 'keywords', 'content' => $keywords);
    $data[] = array('name' => 'author', 'content' => "Autocraft USA");
    $data[] = array('name' => 'robots', 'content' => "index,follow");
	$data[] = array('property' => 'og:title', 'content' => $title);
    $data[] = array('property' => 'og:description', 'content' => $meta_description);
    $data[] = array('property' => 'og:url', 'content' => current_url());
    $data[] = array('property' => 'og:type', 'content' => 'website');
    if(strpos($_SERVER['REQUEST_URI'], "page"))
    {   
        $data[] = array('name' => 'robots', 'content' => 'noindex');
    }

    return $data;
}	

?>
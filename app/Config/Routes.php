<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes);


$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'stock', 'Stock::index');
$routes->get('make/(:any)','Stock::index');
$routes->get('contact', 'Contact::index');
$routes->get('about', 'About::index');
$routes->get('testimonials', 'Testimonials::index');
$routes->get('car/(:any)','Stock::carDetail/$1'); //car detail
$routes->get('model/(:any)/(:any)','Stock::index');
$routes->post('get-models', 'Home::getModels');
$routes->post('ajax_vehicle_inquiry','Stock::inquiry');
$routes->post('website/subscribtion','Home::subscription'); //email subscription
$routes->post('contact/submit', 'Contact::contact_submit');

$routes->get('script/vehicles/import', 'admin\StockController::getAllVehiclesIds');

$routes->post('per-page', 'Stock::set_per_page');
$routes->post('sort-by', 'Stock::set_sort_by');


// Site Map
$routes->get('/sitemap.xml', 'SitemapController::index');


/*$routes->match(['get', 'post'], 'login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');*/
//$routes->get('login', 'LoginController::login');

/*----------ADMIN----------*/

//$routes->get('admin', 'LoginController::login');
$routes->get('admin/dashboard', 'admin\AdminController::index');
$routes->match(['get','post'],'admin/testimonial', 'admin\AdminController::testimonial'); 
$routes->get('admin/testimonials/create', 'admin\AdminController::create_testimonial'); 
$routes->post('admin/testimonials/store', 'admin\AdminController::store_testimonial'); 
$routes->get('admin/testimonials/edit/(:num)', 'admin\AdminController::edit_testimonial/$1'); 
$routes->post('admin/testimonials/update', 'admin\AdminController::update'); 
$routes->get('admin/profile', 'admin\AdminController::profile'); 
$routes->post('admin/profile/update', 'admin\AdminController::profile_update'); 
$routes->get('admin/testimonials/delete/(:num)', 'admin\AdminController::delete/$1'); 
$routes->match(['get','post'],'admin/subscribers', 'admin\AdminController::subscribers'); 
$routes->get('admin/subscriber/delete/(:num)', 'admin\AdminController::subscribers_del/$1');

// messages
$routes->match(['get','post'],'admin/messages', 'admin\AdminController::messages'); 
$routes->get('admin/messages_delete/(:num)', 'admin\AdminController::messages_delete/$1'); 

// vehicle data 
// make

$routes->match(['get','post'],'admin/vehicle/make', 'admin\AdminController::vehicle_make'); 
$routes->get('admin/vehicle/make/create', 'admin\AdminController::vehicle_make_create'); 
$routes->post('admin/vehicle/make/store', 'admin\AdminController::vehicle_make_store'); 
$routes->get('admin/vehicle/make/delete/(:num)', 'admin\AdminController::vehicle_make_delete/$1'); 
$routes->get('admin/vehicle/make/edit/(:num)', 'admin\AdminController::vehicle_make_edit/$1');
$routes->post('admin/vehicle/make/update', 'admin\AdminController::vehicle_make_update');

// model
$routes->match(['get','post'],'admin/vehicle/model', 'admin\AdminController::vehicle_model');
$routes->get('admin/vehicle/model/edit/(:num)', 'admin\AdminController::vehicle_model_edit/$1');
$routes->post('admin/vehicle/model/update', 'admin\AdminController::vehicle_model_update');

$routes->get('admin/vehicle/model/create', 'admin\AdminController::vehicle_model_create');
$routes->post('admin/vehicle/model/store', 'admin\AdminController::vehicle_model_store');
$routes->get('admin/vehicle/model/delete/(:num)', 'admin\AdminController::vehicle_model_delete/$1');

//vehicle import from autocraft    
$routes->get('admin/vehicle/import_from_avis', 'admin\VehicleImportController::index');
$routes->post('admin/vehicle/import_from_avis_submit', 'admin\VehicleImportController::import_from_avis_submit');

// Inquiries
$routes->get('admin/inquiries', 'admin\AdminController::inquiries'); 
$routes->get('admin/inquiries/delete/(:num)', 'admin\AdminController::inquiries_delete/$1');

// stock controller
$routes->post('admin/stock/edit_image', 'admin\StockController::edit_image');   
$routes->post('admin/stock/upload_images', 'admin\StockController::upload_images');   
$routes->post('admin/stock/delete_image', 'admin\StockController::delete_image');
$routes->post('admin/stock/delete_edit_image', 'admin\StockController::delete_edit_image');



$routes->match(['get','post'],'admin/stock', 'admin\StockController::get_stock');   
$routes->get('admin/stock/create', 'admin\StockController::create_stock');   
$routes->post('admin/stock/store', 'admin\StockController::store');   
$routes->post('admin/stock/update', 'admin\StockController::update');   
$routes->get('admin/stock/edit/(:any)', 'admin\StockController::edit/$1');   
$routes->post('admin/veh_models', 'admin\StockController::veh_models');   
$routes->get('admin/stock/delete/(:any)', 'admin\StockController::delete/$1');   
$routes->post('admin/stock/stock_dealer_delete', 'admin\StockController::stock_dealer_delete');

// Pages Content
$routes->match(['get','post'],'admin/content', 'admin\ContentController::content');   
$routes->get('admin/content/create', 'admin\ContentController::create');   
$routes->post('admin/content/store', 'admin\ContentController::store');   
$routes->get('admin/content/edit/(:any)', 'admin\ContentController::edit/$1');    
$routes->post('admin/content/update/(:num)', 'admin\ContentController::update/$1');   
$routes->get('admin/content/delete/(:num)', 'admin\ContentController::delete/$1');
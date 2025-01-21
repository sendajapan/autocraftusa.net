<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['url','text','meta_helper'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
    }

    function get_pic_link($picture)
    {
            if($picture=="")
            {
                $picture = base_url('public/assets/admin/uploads/stock/no_image.png');
            }
            elseif(strpos($picture, "http://")===false && strpos($picture,"https://") === false)
            {
                $picture = base_url('public/assets/admin/uploads/stock/'.$picture);
            }
            else 
            {   
                $picture = str_replace("/thumbs/", "/", $picture); 
            }
            return $picture;
    }



    function get_thumb_link($picture)
    {
            if($picture=="")
            {
                $picture = base_url('public/assets/admin/uploads/stock/no_image.png');
            }
            elseif(strpos($picture, "http://")===false && strpos($picture,"https://") === false)
            {   
                if(@getimagesize(base_url('public/assets/admin/uploads/stock/thumbs/'.$picture))){
                    $picture = base_url('public/assets/admin/uploads/stock/thumbs/'.$picture);
                }else{
                    /*$picture = base_url('public/assets/admin/uploads/stock/'.$picture);*/   
                }

            } 
            elseif(strpos($picture,'https://senda.us') !== false) {

                $picture = str_replace('images/veh_images/','images/veh_images/thumbs/',$picture);
            } 
            elseif(strpos($picture,'https://www.senda.us') !== false) {

                $picture = str_replace('images/veh_images/','images/veh_images/thumbs/',$picture);
            }
            else 
            {
                $picture = str_replace("senda.ne.jp","senda.us",$picture); 
            }
            
            return $picture;
    }

}

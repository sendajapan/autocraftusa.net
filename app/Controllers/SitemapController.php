<?php

namespace App\Controllers;

use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;

class SitemapController extends BaseController
{


	public function __construct()
    {
        $this->db = \Config\Database::connect();   
    }


    public function index()
    {
        // Define a custom absolute path to the sitemap file
        $sitemapFile = FCPATH.'public/assets/sitemap/sitemap.xml';


        // Ensure the directory exists
        $directory = dirname($sitemapFile);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }


        // Create a new Sitemap object
        $sitemap = new Sitemap($sitemapFile);

        $baseUrl = base_url();

        // Add URLs
        /*$sitemap->addItem(base_url(), time(), Sitemap::DAILY, 1.0);
        $sitemap->addItem(base_url('/stock'), time(), Sitemap::DAILY, 0.9);
        $sitemap->addItem(base_url('/about'), time(), Sitemap::YEARLY, 0.6);
        $sitemap->addItem(base_url('/testimonials'), time(), Sitemap::YEARLY, 0.6);
        $sitemap->addItem(base_url('/contact'), time(), Sitemap::YEARLY, 0.6);*/

        $staticUrls = [
            ['loc' => $baseUrl, 'lastmod' => time(), 'changefreq' => Sitemap::DAILY, 'priority' => 1.0],
            ['loc' => "$baseUrl"."stock", 'lastmod' => time(), 'changefreq' => Sitemap::DAILY, 'priority' => 0.9],
            ['loc' => "$baseUrl"."about", 'lastmod' => strtotime('2024-05-27'), 'changefreq' => Sitemap::YEARLY, 'priority' => 0.6],
            ['loc' => "$baseUrl"."testimonials", 'lastmod' => strtotime('2024-05-27'), 'changefreq' => Sitemap::YEARLY, 'priority' => 0.6],
            ['loc' => "$baseUrl"."contact", 'lastmod' => strtotime('2024-05-27'), 'changefreq' => Sitemap::YEARLY, 'priority' => 0.6],
        ];


        $makes = [];
        $query_makes = $this->db->query("SELECT DISTINCT(make) as make FROM tbl_vehicles where make<>'' order by make ASC")->getResultArray();
        foreach($query_makes as $make){
            if(trim($make['make'])!=""){
                //$sitemap->addItem(base_url("/make/".urlencode(trim(ucwords(strtolower($url['make']))))), time(), Sitemap::WEEKLY, 0.8);
                $makes[] = [
                'loc' => "$baseUrl"."make/".urlencode(ucwords(strtolower($make['make']))),
                'lastmod' => time(),
                'changefreq' => Sitemap::WEEKLY,
                'priority' => 0.8,
                ];
            }  
        }

        $models = [];
        $query_models = $this->db->query("SELECT make, model FROM tbl_vehicles where model<>'' Group By model order by make ASC, model ASC")->getResultArray();
        foreach($query_models as $model){
            if(trim($model['model'])!=""){
                //$sitemap->addItem(base_url("/model/".urlencode(ucwords(strtolower(trim($url['make'])))).'/'.urlencode(ucwords(strtolower(trim($url['model']))))), time(), Sitemap::WEEKLY, 0.8);
                $models[] = [
                'loc' => "$baseUrl"."model/".urlencode(ucwords(strtolower($model['make'])))."/".urlencode(ucwords(strtolower($model['model'])))."",
                'lastmod' => time(),
                'changefreq' => Sitemap::WEEKLY,
                'priority' => 0.8,
                ];
            }
        }

        $cars = [];
        $query_available_stock = $this->db->query("SELECT concat(make,'-',trim(model),'-',year,'-',veh_id) as slug FROM tbl_vehicles where status='AVAILABLE' order by veh_id DESC")->getResultArray();
        foreach($query_available_stock as $car){
            if(trim($car['slug'])!=""){
                //$sitemap->addItem(base_url("/car/".urlencode(trim(strtolower($url['slug'])))), time(), Sitemap::DAILY, 0.7);
                $cars[] = [
                'loc' => "$baseUrl"."car/".urlencode(strtolower($car['slug'])),
                'lastmod' => time(),
                'changefreq' => Sitemap::WEEKLY,
                'priority' => 0.7,
                ];
            }
        }


        // Merge static and dynamic URLs
        $urls = array_merge($staticUrls, $makes, $models, $cars);

        // Add URLs to the sitemap
        foreach ($urls as $url) {
            $sitemap->addItem($url['loc'], $url['lastmod'], $url['changefreq'], $url['priority']);
        }



        // Write the sitemap file
        $sitemap->write();

        // Output the sitemap
        return $this->response->setContentType('application/xml')->setBody(file_get_contents($sitemapFile));


    }
}

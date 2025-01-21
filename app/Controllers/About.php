<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {   

        $meta = about_meta();
        $data['page_title'] = $meta[4]['content'];    
        $data['meta'] = $meta;

        return view('about', $data);
    }
}
?>
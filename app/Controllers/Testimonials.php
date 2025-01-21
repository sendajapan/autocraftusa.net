<?php

namespace App\Controllers;
use App\Models\TestimonialModel;

class Testimonials extends BaseController
{   

    protected $testimonialmodel;


    public function __construct()
    {
        $this->testimonialmodel = new TestimonialModel();
    }


    public function index(): string
    {   

        $data['testimonials'] = $this->testimonialmodel->where('testimonial_visibility','Show')->orderBy('testimonial_id','DESC')->findAll();
        $meta = testimonials_meta();
        $data['page_title'] = $meta[4]['content'];    
        $data['meta'] = $meta;

        return view('testimonials', $data);
    }

}
?>
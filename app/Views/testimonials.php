
<?= $this->extend('template') ?>


<?= $this->section('content') ?>





    <!-- hero section start  -->
    <section class="testimonial top_banner position-relative">
    <div class="container text-center">
        <div class="row">
            <div class="">
                <h2 class="page-title display-3 text-start">Testimonial</h2>
            </div>
        </div>
    </div>
</section>

    <section id="review">
        <div class=" services-sub container my-5 py-5">
            <div class="row">
            <div class="testimonial-content d-flex align-items-start flex-column gap-4">
                <a href="" class="about_btn d-flex align-items-center gap-3">
                    <div></div>
                    <span>TESTIMONAIS</span>
                    <div></div>
                </a>
                <p>Here are our testimonials from satisfied customers. They speak for themselves <br> and show that we're
                dedicated to providing the best possible services.</p>
            </div>
                <?php foreach ($testimonials as $item) { ?>

                <div class=" mt-5 col-md-4">
                    <div class="testimonials_card">
                            <div class="">
                                <p><?= word_limiter($item['testimonial_desc']) ?></p>
                            </div>
                            <div class="d-flex justify-content-around align-items-center">
                                <div>
                                    <h5><?=$item['testimonial_by']?></h5>
                                </div>
                                <p class="testimonial-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p>
                            </div>
                        </div>
                </div>

                <?php } ?>

            </div>
        </div>
    </section>

    

  

    <!-- script ================================================== -->
   
  


<?= $this->endSection() ?>
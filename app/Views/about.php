<?= $this->extend('template') ?>


<?= $this->section('content') ?>

<section class="top_banner position-relative">
    <div class="container text-center">
        <div class="row">
            <div class="">
                <h2 class="page-title display-3 text-start">About Us</h2>
            </div>
        </div>
    </div>
</section>


<section class="contact-us-wrap">

    <div class=" container">
        <div class="row">
            <div class="about col-lg-5 col-md-12 col-sm-12">
                <div class="about_content d-flex align-items-start flex-column gap-4">
                    <a href="" class="about_btn d-flex align-items-center gap-3">
                        <div></div>
                        <span>ABOUT US</span>
                        <div></div>
                    </a>
                    <h1>Driven by Trust, Powered by Quality</h1>
                    <p>we make car buying simple, reliable, and stress-free. With a wide selection of high-quality
                        vehicles and a commitment to customer satisfaction, we help you find the perfect car that fits
                        your lifestyle and budget. Whether you're looking for a brand-new model or a trusted pre-owned
                        vehicle, our expert team is here to guide you every step of the way. Experience hassle-free car
                        shopping with us today.</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="car-bg">
                    <div class="about_img d-flex justify-content-end">
                        <div><img src="<?=base_url('public/assets/images/bg2.png')?>" alt="" class="img1">
                            <div class="exp_box text-center"> <span>20+</span> <br>
                                <p>YEARS OF EXPERIANCE</p>
                            </div>
                        </div>
                        <div><img src="<?=base_url('public/assets/images/bg.png')?>" alt="" class="img2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>





<!------------------------------------- video starts  -------------------->
<section class="video py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 video-container">
                <iframe width="100%" height="640" src="https://www.youtube.com/embed/9kubHjOpXg4"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 video-container px-5 d-flex flex-column justify-content-center gap-4">
                <h4 class="video_text">Enhanced performance for a smoother journey ahead</h4>
                <p>Autocraft USA Car Finance allows you to get a quote without affecting your credit rating. Find a car
                    from any dealer, and we’ll do the rest. With a large panel of 30+ lenders we can help most drivers.
                </p>
                <div class="">
                    <a href="<?=base_url("about")?>" class="btn stylish-btn">Read More <svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                        </svg></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!------------------------------------- video ends  -------------------->


<!------------------------------------- facts section start  -------------------->
<section class="facts my-5 py-4">
    <div class="container py-5">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="fact-card">
                    <i class="fa-solid fa-users text-center"></i>
                    <h2 class="text-center">100+ Satisfied Customers</h2>
                </div>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="fact-card">
                    <i class="fa-solid fa-car text-center"></i>
                    <h2 class="text-center"> 2,000+ vehicles</h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="fact-card">
                    <i class="fa-solid fa-headset text-center"></i>
                    <h2 class="text-center">24/7 Support Services</h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="fact-card">
                    <i class="fa-solid fa-users-gear text-center"></i>
                    <h2 class="text-center">Roles in the company</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------------------------- facts section ends  -------------------->







<?= $this->endSection() ?>
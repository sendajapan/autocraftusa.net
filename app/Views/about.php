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
                    <p>At Autocraft USA, we are passionate about connecting customers with high-quality American
                        vehicles through a seamless import and export process. With years of expertise in the automotive
                        industry, we specialize in sourcing, trading, and delivering a wide range of new and used cars
                        from trusted manufacturers, including Tesla, GMC, Ford, Cadillac, Chevrolet, and more. <br>
                        Our goal is to simplify vehicle trading by offering transparent, efficient, and reliable services that cater to the needs of both individual buyers and businesses worldwide. Whether you are looking to import a dream car, trade-in your current vehicle, or explore auction opportunities, we ensure a smooth experience from start to finish.
                    </p>
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
            <div
                class="col-lg-6 col-md-12 col-sm-12 video-container px-5 d-flex flex-column justify-content-center gap-4">
                <h4 class="video_text">Why Choose Us?</h4>
                <p>Diverse Inventory: We offer a vast selection of premium vehicles to match every preference and
                    budget.<br>

                    Global Network: With strong international partnerships, we facilitate hassle-free imports and
                    exports.<br>

                    Customer-Centric Approach: Your satisfaction is our priority, and we provide personalized assistance
                    at every step.<br>

                    Secure Transactions: We value trust and transparency, ensuring safe and reliable vehicle trading.

                </p>
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
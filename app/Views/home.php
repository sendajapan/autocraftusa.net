<?= $this->extend('template') ?>


<?= $this->section('content') ?>

<?php session()->remove('filter'); ?>




<!---------------------------------- hero section start  ---------------------------------------->

<section>
    <div class="container-fluid hero-content p-0">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-start justify-content-center">
                <div class=" border_title d-flex align-items-start justify-content-center flex-column gap-lg-5">
                    <h1>Drive the Future.<br> Experience the <br> Extra ordinary.</h1>
                    <a href="<?=base_url("stock")?>" class="btn-primary btn ">Check our Collection</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 pt-5">
                <img src="<?=base_url("public/assets/images/Image.png")?>" alt="" style="width:100%;">
            </div>
        </div>
    </div>
</section>

<!--- ---------------------------------Form section start --------------------------------- -->
<section id="search">


    <div class="container-fluid search-block">

        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div class="search_form" style="margin-left:170px;">
                    <h2 class="text-left mb-2">SEARCH <span class="text-primary"> VEHICLE </span></h2>
                    <form action="<?=base_url('stock')?>" method="post" class="row form-group flex-wrap" id="form2">
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">
                            <div class="d-flex flex-column">

                                <label for="vehicle-make2">Makes</label>
                                <select name="make" id="vehicle-make2" class="form-select form-control">
                                    <option selected value=""> Make</option>
                                    <?php if($makes){
                                        foreach($makes as $item){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">
                            <div class="d-flex flex-column">

                                <label for="v_model2">Model</label>
                                <select name="model" id="v_model2" class="form-select form-control">
                                    <option value="">Model</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="veh_condition">Condition</label>
                                <select id="veh_condition" name="veh_condition" class="form-select form-control"
                                    id="vehicle">
                                    <option selected>Condition</option>
                                    <?php foreach($veh_condition as $item){
                                    if($item!=""){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="body_type">Body Type</label>
                                <select id="body_type" name="body_type" class="form-select form-control">
                                    <option value="">Body Type</option>
                                    <?php if($body_types){
                                        foreach($body_types as $item){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="transmission">Transmission</label>
                                <select id="transmission" name="transmission" class="form-select form-control">
                                    <option value="">Transmission</option>
                                    <?php if($transmissions){
                                        foreach($transmissions as $item){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="exterior_color">Color</label>
                                <select id="exterior_color" name="exterior_color" class="form-select form-control">
                                    <option value=""> Color</option>
                                    <?php if($colors){
                                        foreach($colors as $item){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>
                                </select>

                            </div>
                        </div>
                     
                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="year_from">Date From</label>

                                <select id="year_from" name="year_from" class="form-select form-control">
                                    <?php for($y=2000; $y<=date("Y"); $y++){ ?>
                                    <option <?= ($request->getPost('year_from')==$y) ? "selected": "" ?>
                                        value="<?=$y?>">
                                        <?=$y?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">

                            <div class="d-flex flex-column">

                                <label for="year_to">Date To</label>

                                <select id="year_to" name="year_to" class="form-select form-control">
                                    <?php for($y=date("Y"); $y>=2000; $y--){ ?>
                                    <option <?= ($request->getPost('year_to')==$y) ? "selected": "" ?> value="<?=$y?>">
                                        <?=$y?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">
                            <div class="d-flex flex-column">

                                <label for="fuel">Fuel</label>
                                <select id="fuel" name="fuel" class="form-select form-control">
                                    <option value=""> Fuel</option>
                                    <?php if($fuels){
                                        foreach($fuels as $item){ ?>
                                    <option value="<?=$item?>"><?=$item?></option>
                                    <?php } } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 mt-lg-0 mb-2">
                            <div class="d-grid" style="margin-top:38px">
                                <input type="submit" name="submit" value="Search Car" class="btn btn-secondary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-flex justify-content-end img">
                <img src="<?=base_url("public/assets/images/Group 813.png")?>" alt="" style="width:800px;">
            </div>
        </div>


    </div>

</section>
<!----------------------------------- form section ends  --------------------------------------->



<!--------------------------------------- stock section start ------------------------------ -->

<section id="search" style="margin-bottom: 50px;">
    <div class="container pt-5">
        <div class="row mt-1 pt-5">

            <div class="col-lg-12 col-md-12 stockbar">
                <div class="container new-arrivals mb-5">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-3">
                            <h2 class="mb-4">BEST SELLING CARS</h2>
                            <a href="<?=base_url("stock")?>" class="view_all">View All</a>
                        </div>
                        <?php if($new_arrivals){foreach($new_arrivals as $item){ ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card rounded-5">
                                <div class="card-body p-0 ">
                                    <a class="figure" target="_blank" href="<?= base_url('car/'.$item['slug']) ?>">
                                        <?php if($item['featured_image']){ ?>
                                        <img src="<?=$item['featured_image']?>" class="card-img-top rounded-top-5"
                                            alt="...">
                                        <?php }else{ ?>
                                        <img src="<?=base_url("public/assets/images/test.webp")?>" class="card-img-top"
                                            alt="...">
                                        <?php } ?>
                                    </a>
                                    <div class="row px-4 d-flex justify-content-around">
                                        <div class="col-7 p-0">
                                            <a>
                                                <h4 class="card-title" target="_blank"
                                                    href="<?= base_url('car/'.$item['slug']) ?>">
                                                    <span> <?= $item['make'] ?> </span><br><?= $item['model'] ?>
                                                    <?=$item['year']?>
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="col-3 p-0">
                                        </div>


                                    </div>
                                    <div class="row card-text">
                                        <div
                                            class=" col-lg-12 d-flex flex-row align-items-baseline detail_box justify-content-around">
                                            <div class="text-nowrap d-flex flex-column"><i
                                                    class="fa-solid fa-gauge"></i>
                                                <span><?= ($item['mileage']) ? number_format($item['mileage']).' km' : '-'; ?></span>
                                            </div>
                                            <div class="text-nowrap d-flex  flex-column"><i
                                                    class="fa-solid fa-palette"></i>
                                                <span><?=$item['exterior_color']?></span>
                                            </div>
                                            <div class="text-nowrap  d-flex  flex-column"><i
                                                    class="fa-solid fa-gas-pump"></i>
                                                <span><?=$item['fuel']?> </span>
                                            </div>
                                            <div class="text-nowrap  d-flex  flex-column"><i
                                                    class="fa-solid fa-dharmachakra"></i>
                                                <span><?=$item['drive']?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-4 d-flex justify-content-around py-4">
                                        <div class="col-5 text-start p-0">
                                            <a href="" class="text-black fs-5 fw-bold">ASK</a>
                                        </div>
                                        <div class="col-6 text-end p-0">
                                            <a target="_blank" href="<?= base_url('car/'.$item['slug']) ?>"
                                                class="view_details">View Details <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-up-right"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                                </svg></a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>

                </div>

                <div class="container clearance">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-3">
                            <h2 class="mb-4">NEW ARRIVALS</h2>
                            <a href="<?=base_url("stock")?>" class="view_all">View All</a>
                        </div>
                        <?php if($new_arrivals){foreach($new_arrivals as $key => $item){ if($key<3){?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card rounded-5">
                                <div class="card-body p-0 ">
                                    <a class="figure" target="_blank" href="">
                                        <?php if($item['featured_image']){ ?>
                                        <img src="<?=$item['featured_image']?>" class="card-img-top rounded-top-5"
                                            alt="...">
                                        <?php }else{ ?>
                                        <img src="<?=base_url("public/assets/images/test.webp")?>" class="card-img-top"
                                            alt="...">
                                        <?php } ?>
                                    </a>
                                    <div class="row px-4 d-flex justify-content-around">
                                        <div class="col-7 p-0">
                                            <a>
                                                <h4 class="card-title" target="_blank"
                                                    href="<?= base_url('car/'.$item['slug']) ?>">
                                                    <span> <?= $item['make'] ?> </span><br><?= $item['model'] ?>
                                                    <?=$item['year']?>
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="col-3 p-0">
                                        </div>


                                    </div>
                                    <div class="row card-text">
                                        <div
                                            class=" col-lg-12 d-flex flex-row align-items-baseline detail_box justify-content-around">
                                            <div class="text-nowrap d-flex flex-column"><i
                                                    class="fa-solid fa-gauge"></i>
                                                <span><?= ($item['mileage']) ? number_format($item['mileage']).' km' : '-'; ?></span>
                                            </div>
                                            <div class="text-nowrap d-flex  flex-column"><i
                                                    class="fa-solid fa-palette"></i>
                                                <span><?=$item['exterior_color']?></span>
                                            </div>
                                            <div class="text-nowrap  d-flex  flex-column"><i
                                                    class="fa-solid fa-gas-pump"></i>
                                                <span><?=$item['fuel']?> </span>
                                            </div>
                                            <div class="text-nowrap  d-flex  flex-column"><i
                                                    class="fa-solid fa-dharmachakra"></i>
                                                <span><?=$item['drive']?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-4 d-flex justify-content-around py-4">
                                        <div class="col-5 text-start p-0">
                                            <a href="" class="text-black fs-5 fw-bold">ASK</a>
                                        </div>
                                        <div class="col-6 text-end p-0">
                                            <a target="_blank" href="<?= base_url('car/'.$item['slug']) ?>"
                                                class="view_details">View Details <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-up-right"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                                </svg></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } } } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--------------------------------------- stock section ends ------------------------------ -->



<!--------------------------------------- about us section ends ------------------------------ -->

<section class="mt-5 pt-5">
    <div class="container about">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-3 col-md-12 col-sm-11"><img src="<?=base_url("public/assets/images/Background.png")?>"
                    alt="" style="width:440px;"></div>
            <div class="col-lg-5 col-md-11 col-sm-11 abtus">
                <div class="text-center aboutus d-flex align-items-center flex-column justify-content-center">
                    <h4>ABOUT US </h4>
                    <p>At Autocraft USA, we pride ourselves on being a trusted name in the automotive industry,
                        delivering high-quality vehicles that combine reliability, innovation, and exceptional value.
                    </p>
                    <a href="<?=base_url("about")?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 text-end col-md-12 col-sm-11"><img
                    src="<?=base_url("public/assets/images/Background (1).png")?>" alt="" style="width:440px;"></div>
        </div>
    </div>
</section>
<!--------------------------------------- about us section ends ------------------------------ -->




<!------------------------------------- our services start  -------------------->

<section class="our-services mt-5 pt-5">
    <div class="container mb-5">
        <div class="row px-1">

            <h2 class="mb-4">OUR TOP SERVICES</h2>
            <div class="testimonial__slider owl-carousel mt-5">
                <div class="testimonial__item">
                    <div class="testimonial__item__author">
                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons.png")?>" alt="">
                                <h3>Trade-in services</h3>
                            </div>
                            <p class="m-0">We offer trade-in options, allowing you to sell your current vehicle and apply its value towards the purchase of a new or used car.</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>

                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (2).png")?>" alt="">
                                <h3>Instant Offer Services</h3>
                            </div>
                            <p class="m-0">Utilize our instant offer services to receive a fast and straightforward estimate for your car's value.</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="testimonial__item">
                    <div class="testimonial__item__author">
                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (1).png")?>" alt="">
                                <h3>Auction Services</h3>
                            </div>
                            <p class="m-0">For those looking to sell their vehicles quickly, we provide access to physical and online auctions, including options for bulk or salvage conditions.</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>

                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (3).png")?>" alt="">
                                <h3>Consignment Services</h3>
                            </div>
                            <p class="m-0">Our consignment service enables you to entrust your vehicle to us, where we handle the sale process on your behalf for a commission.</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="testimonial__item">
                    <div class="testimonial__item__author">
                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons.png")?>" alt="">
                                <h3>Trade-in services</h3>
                            </div>
                            <p class="m-0">Many dealerships offer a trade-in option where you can sell your car and use
                                the value as a down payment on a new or used car......</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>

                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (2).png")?>" alt="">
                                <h3>Instant Offer Services</h3>
                            </div>
                            <p class="m-0">Services like Kelley Blue Book offer a fast and straightforward way to get an
                                estimated value for your car. Some sites, like KBB or Edmunds......</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="testimonial__item">
                    <div class="testimonial__item__author">
                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (1).png")?>" alt="">
                                <h3>Auction Services</h3>
                            </div>
                            <p class="m-0">Physical or online auctions (such as Copart or IAA for cars in bulk or
                                salvage condition) can be an option if you want to sell your car quickly......</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>

                        <div class="service-card d-flex align-items-start flex-column mb-5 gap-4">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?=base_url("public/assets/images/Icons (3).png")?>" alt="">
                                <h3>Consignment Services</h3>
                            </div>
                            <p class="m-0">A consignment service allows you to hand over your car to a dealership or
                                broker who will sell it for you, taking a commission for the service......</p>
                            <a href="<?=base_url("about")?>">View details <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>

<!------------------------------------- our services ends  -------------------->









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










<!------------------------------------- brands section start  -------------------->
<section id="makes">

    <div class="makes-sub container mt-5 pt-5">
        <h2 class="text-dark pb-5 m-0">PREMIUM BRAND</h2>
        <div class="row justify-content-center">

            <div class="brand-carousel owl-carousel owl-theme">
                <div class="item"> <a href="<?=base_url('make/Tesla')?>">
                        <div class="services-components text-center">
                            <img src="<?=base_url("public/assets/images/makes/Stellantis_Logo 1.png")?>" alt="makes">
                            <h5>TESLA</h5>
                        </div>
                    </a></div>
                <div class="item"><a href="<?=base_url('make/GMC')?>">
                        <div class="services-components text-center">
                            <img src="<?=base_url("public/assets/images/makes/GMC-Logo 1.png")?>" alt="makes">
                            <h5>GMC</h5>
                        </div>
                    </a></div>
                <div class="item">
                    <a href="<?=base_url('make/Ford')?>">
                        <div class="services-components center text-center">
                            <img src="<?=base_url("public/assets/images/makes/b3.jpg.png")?>" alt="makes">
                            <h5>FORD</h5>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="<?=base_url('make/Buick')?>">
                        <div class="services-components text-center">
                            <img src="<?=base_url("public/assets/images/makes/R (1) 2.png")?>" alt="makes">
                            <h5>BUICK</h5>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="<?=base_url('make/Cadillac')?>">
                        <div class="services-components text-center">
                            <img src="<?=base_url("public/assets/images/makes/cadillac-logo.jpg")?>" alt="makes">
                            <h5>CADILLAC</h5>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="<?=base_url('make/Chevrolet ')?>">
                        <div class="services-components text-center">
                            <img src="<?=base_url("public/assets/images/makes/char.png")?>" alt="makes">
                            <h5>Chevrolet </h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

</section>
<!------------------------------------- brands section ends  -------------------->








<!------------------------------------- insta start  -------------------------------->

<section class="insta">
    <div class="container py-4">
        <div class="row">
            <h2 class="text-start heading">INSTAGRAM FEEDS</h2>
            <div class="col-12 insta_inner d-flex align-items-center flex-column justify-content-center gap-4">
                <div class="instagram_icon">
                    <img src="<?=base_url("public/assets/images/Group.png")?>" alt="">
                </div>
                <h2>Autocraft USA</h2>
                <div class="d-flex followers">
                    <div class="col-2 d-flex justify-content-center align-items-center"><i
                            class="fa-solid fa-image icons"></i></div>
                    <div class="col-4"><span>12,000</span> </div>
                    <div class="col-2 d-flex justify-content-center align-items-center"><i
                            class="fa-solid fa-user icons"></i></div>
                    <div class="col-4"><span>56,000</span> </div>
                </div>
                <h3>Autoboot Sense Of Luck</h3>
                <a href="" class="follow_btn">Follow on Instagram</a>
            </div>

        </div>
    </div>
</section>

<!------------------------------------- insta ends  -------------------->







<!------------------------------------- Location section start  -------------------------------->

<section class="location mt-5 pt-4">
    <div class="container">
        <div class="row">
            <h2>LOCATIONS</h2>
            <div class="location-carousel owl-carousel owl-theme ">
                <div class="item">
                    <div class="location-card">
                        <h4 class="text-center border-bottom border-2 pb-3 mb-5">Head Office</h4>
                        <div class="d-flex">

                            <div class="col-5 d-flex flex-column address">
                                <p><span>Office No.</span></p>
                                <p><span>Address</span></p>
                                <p> <span>Contact No.</span></p>
                                <p> <span>WhatsApp No.</span></p>
                            </div>
                            <div class="col-7 d-flex flex-column address">
                                <p>0000</p>
                                <p>ABCD</p>
                                <p>+1 000 000-0000</p>
                                <p>+1 000 000-0000</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="location-card">
                        <h4 class="text-center border-bottom border-2 pb-3 mb-5">Showroom</h4>
                        <div class="d-flex">

                            <div class="col-5 d-flex flex-column address">
                                <p><span>Office No.</span></p>
                                <p><span>Address</span></p>
                                <p> <span>Contact No.</span></p>
                                <p> <span>WhatsApp No.</span></p>
                            </div>
                            <div class="col-7 d-flex flex-column address">
                                <p>0000</p>
                                <p>ABCD</p>
                                <p>+1 000 000-0000</p>
                                <p>+1 000 000-0000</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="location-card">
                        <h4 class="text-center border-bottom border-2 pb-3 mb-5">Service Center</h4>
                        <div class="d-flex">

                            <div class="col-5 d-flex flex-column address">
                                <p><span>Office No.</span></p>
                                <p><span>Address</span></p>
                                <p> <span>Contact No.</span></p>
                                <p> <span>WhatsApp No.</span></p>
                            </div>
                            <div class="col-7 d-flex flex-column address">
                                <p>0000</p>
                                <p>ABCD</p>
                                <p>+1 000 000-0000</p>
                                <p>+1 000 000-0000</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="location-card">
                        <h4 class="text-center border-bottom border-2 pb-3 mb-5">Warehouse</h4>
                        <div class="d-flex">

                            <div class="col-5 d-flex flex-column address">
                                <p><span>Office No.</span></p>
                                <p><span>Address</span></p>
                                <p> <span>Contact No.</span></p>
                                <p> <span>WhatsApp No.</span></p>
                            </div>
                            <div class="col-7 d-flex flex-column address">
                                <p>0000</p>
                                <p>ABCD</p>
                                <p>+1 000 000-0000</p>
                                <p>+1 000 000-0000</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!------------------------------------- Location section ends  -------------------------->











<!------------------------------------- testimonials section start  -------------------------->

<section class="testimonials py-4 my-5">
    <div class="container py-4">
        <div class="row">
            <h2>TESTIMONIAL</h2>
            <p>Here are our testimonials from satisfied customers. They speak for themselves <br> and show that we're
                dedicated to providing the best possible services.</p>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $counter = 0; 
                    foreach($testimonials as $item){ 
                         if ($counter == 5) break; 
                         $counter++; 
                        ?>

                    <div class="swiper-slide">
                        <div class="testimonials_card">
                            <div class="">
                                <p><?= word_limiter($item['testimonial_desc'], 25) ?></p>
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
                <!-- Pagination -->
                <div class="swiper-pagination mt-3"></div>
            </div>

        </div>

    </div>
</section>

<!------------------------------------- testimonials section ends  -------------------------->










<!------------------------------------- Contact section start  -------------------------->

<section class="contact-form mb-5 pb-5">
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-4 col-md-12">
                <div class="contact-box">
                    <h3>CONTACT US</h3>
                    <p>We’d love to hear from you! Whether you have questions about our cargo bikes, need assistance
                        with an order, or want to collaborate, our team is here to help. You can also reach out via our
                        contact form below, and we’ll get back to you as soon as possible.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="form-box">
                    <form id="contact__form" method="POST" class="form-group flex-wrap d-flex justify-content-between">
                        <div class="col-lg-4 col-md-12 mb-1 pe-lg-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-lg-4 col-md-12 mb-1 pe-lg-3">
                            <input type="email" name="email" id="email" class="form-control " placeholder="Email">
                        </div>
                        <div class="col-lg-4 col-md-12 mb-1">
                            <input type="text" name="telephone" id="telephone" class="form-control"
                                placeholder="Phone No.">
                        </div>
                        <div class="col-lg-12 mb-1">
                            <textarea name="message" id="message" class="form-control ps-3" rows="4"
                                placeholder="Message"></textarea>
                        </div>
                        <div id="loader_contact" class="d-none text-center mt-3">
                            <div class="spinner-border text-success" role="status"></div>
                        </div>

                        <p id="success_msg" class="d-none alert alert-success">Messege sent successfully</p>
                        <p id="error_msg" class="d-none alert alert-danger">Something went wrong</p>

                        <div class="d-flex align-items-end w-100 justify-content-end">
                            <button id="submit_btn" class="btn btn-primary mt-3 text-right">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!------------------------------------- Contact section ends  -------------------------->





<?= $this->endSection() ?>



<?=$this->section('scripts')?>

<script type="text/javascript">
$(window).on("load", function() {
    var selected = '';

    var body = $("#body_type").val();
    if (!body == '') {
        $.ajax({
            url: "<?= base_url('get-body-types') ?>",
            type: "POST",
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var body_type =
                        '<option selected="selected" value="">Select Body Type</option>';

                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == body) {
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        body_type += '<option value="' + data[i] + '" ' + selected + '>' + data[i] +
                            '</option>';
                    }
                    $("#body_type").html(body_type);
                    $('#body_type').niceSelect('update');
                }

            }
        });
    }



    var color = $("#exterior_color").val();
    if (!color == '') {
        $.ajax({
            url: "<?= base_url('get-colors') ?>",
            type: "POST",
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var exterior_color = '<option selected="selected" value="">Colors</option>';

                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == color) {
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        exterior_color += '<option value="' + data[i] + '" ' + selected + '>' +
                            data[i] + '</option>';
                    }
                    $("#exterior_color").html(exterior_color);
                    $('#exterior_color').niceSelect('update');
                }

            }
        });
    }



    var trans = $("#transmission").val();
    if (!trans == '') {
        $.ajax({
            url: "<?= base_url('get-transmission') ?>",
            type: "POST",
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var transmission = '<option selected="selected" value="">Transmission</option>';

                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == trans) {
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        transmission += '<option value="' + data[i] + '" ' + selected + '>' + data[
                            i] + '</option>';
                    }
                    $("#transmission").html(transmission);
                    $('#transmission').niceSelect('update');
                }

            }
        });
    }


    var condition = $("#veh_condition").val();
    if (!condition == '') {

        var data = ['New', 'Used'];
        //console.log(data);
        var veh_condition = '<option selected="selected" value="">Condition</option>';

        for (var i = 0; i < data.length; i++) {
            if (data[i] == condition) {
                selected = 'selected';
            } else {
                selected = '';
            }
            veh_condition += '<option value="' + data[i] + '" ' + selected + '>' + data[i] + '</option>';
        }
        $("#veh_condition").html(veh_condition);
        $('#veh_condition').niceSelect('update');


    }


    var handle = $("#drive").val();
    if (!handle == '') {

        var data = ['LHD', 'RHD'];
        var drive = '<option selected="selected" value="">Handle</option>';

        for (var i = 0; i < data.length; i++) {
            if (data[i] == handle) {
                selected = 'selected';
            } else {
                selected = '';
            }
            drive += '<option value="' + data[i] + '" ' + selected + '>' + data[i] + '</option>';
        }
        $("#drive").html(drive);
        $('#drive').niceSelect('update');


    }


    var year_from = $("#year_from").val();
    if (year_from != 2000) {

        var y_f = '';
        for (var i = 2000; i <= new Date().getFullYear(); i++) {
            if (i == year_from) {
                selected = 'selected';
            } else {
                selected = '';
            }
            y_f += "<option value='" + i + "' " + selected + ">" + i + "</option>";
        }

        $("#year_from").html(y_f);
        $('#year_from').niceSelect('update');

    }


    var year_to = $("#year_to").val();
    if (year_to != new Date().getFullYear()) {

        var y_e = '';
        for (var i = new Date().getFullYear(); i >= 2000; i--) {
            if (i == year_to) {
                selected = 'selected';
            } else {
                selected = '';
            }
            y_e += "<option value='" + i + "' " + selected + ">" + i + "</option>";
        }

        $("#year_to").html(y_e);
        $('#year_to').niceSelect('update');

    }


    var make = $("#vehicle-make").val();
    if (!make == '') {
        $.ajax({
            url: "<?= base_url('get-makes') ?>",
            type: "POST",
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var make_select = '<option selected="selected" value="">Select Make</option>';

                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == make) {
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        make_select += '<option value="' + data[i].trim() + '" ' + selected + '>' +
                            data[i].toUpperCase() + '</option>';
                    }
                    $("#vehicle-make").html(make_select);
                    $('#vehicle-make').niceSelect('update');
                }

            }
        });

        $.ajax({
            url: "<?= base_url('get-models') ?>",
            type: "POST",
            data: {
                make: make
            },
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var model_select = '<option selected="selected" value="">Select Model</option>';

                    for (var i = 0; i < data.length; i++) {
                        model_select += '<option value="' + data[i].trim() + '">' + data[i]
                            .toUpperCase() + '</option>';
                        model_html = '<li data-value="' + data[i].trim() + '" class="option">' +
                            data[i].toUpperCase() + '</li>';
                    }
                    $("#v_model").html(model_select);
                    $('#v_model').niceSelect('update');
                } else {
                    $("#v_model").html(
                        '<option selected="selected" value="">No Model Available</option>');
                    $('#v_model').niceSelect('update');
                }
            }
        });
    }

});






$(document).on("change", "#vehicle-make", function() {

    var make = $("#vehicle-make").val();

    if (!make == '') {

        $.ajax({
            url: "<?= base_url('get-models') ?>",
            type: "POST",
            data: {
                make: make
            },
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var model_select = '<option selected="selected" value="">Select Model</option>';

                    for (var i = 0; i < data.length; i++) {
                        model_select += '<option value="' + data[i].trim() + '">' + data[i]
                            .toUpperCase() + '</option>';
                    }
                    $("#v_model").html(model_select);

                } else {
                    $("#v_model").html(
                        '<option selected="selected" value="">No Model Available</option>');

                }
            }
        });
    } else {
        $("#v_model").html('<option selected="selected" value="">Select Model</option>');

    }
});

$(document).on("change", "#vehicle-make2", function() {

    var make = $("#vehicle-make2").val();

    if (!make == '') {

        $.ajax({
            url: "<?= base_url('get-models') ?>",
            type: "POST",
            data: {
                make: make
            },
            success: function(response) {

                if (response) {
                    var data = response.split(",");
                    var model_select = '<option selected="selected" value="">Select Model</option>';

                    for (var i = 0; i < data.length; i++) {
                        model_select += '<option value="' + data[i].trim() + '">' + data[i]
                            .toUpperCase() + '</option>';
                    }
                    $("#v_model2").html(model_select);

                } else {
                    $("#v_model2").html(
                        '<option selected="selected" value="">No Model Available</option>');

                }
            }
        });
    } else {
        $("#v_model2").html('<option selected="selected" value="">Select Model</option>');

    }
});
</script>
<script>
// JavaScript to toggle the dropdown
document.querySelectorAll('.accordion-title').forEach(item => {
    item.addEventListener('click', () => {
        // Toggle active class for arrow direction
        item.classList.toggle('active');

        // Toggle display of content
        const content = item.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    });
});

$('.testimonial__slider').owlCarousel({
    nav: true,
    slidesPerView: 2,
    spaceBetween: 40,
    loop: true,
    freeMode: true,
    margin: 40,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        480: {
            items: 2
        },
        760: {
            items: 2
        },
        1560: {
            items: 2
        },
        1960: {
            items: 2
        }
    }
});


$('.brand-carousel').owlCarousel({
    loop: true,
    margin: 60,
    nav: true,
    dots: false,
    spaceBetween: 40,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})

$('.location-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 2
        }
    }
})

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        // when the window width is >= 320px
        320: {
            slidesPerView: 1,
        },
        // when the window width is >= 768px
        780: {
            slidesPerView: 2,
        },
        // when the window width is >= 1024px
        1024: {
            slidesPerView: 3,
            spaceBetween: 100,
        },

    },
});
</script>



<script>
jQuery('#contact__form').validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        telephone: {
            required: true
        },
        message: {
            required: true
        }
    },
    messages: {
        name: {
            required: "*Name is required"
        },
        email: {
            required: "*Email is required",
            email: "*Please enter valid email"
        },
        telephone: {
            required: "*Telephone No is required"
        },
        message: {
            required: "*Message is required"
        },
    },
    errorPlacement: function(error, element) {
        error.insertBefore(element);
    },
    submitHandler: function() {

        grecaptcha.ready(function() {
            grecaptcha.execute('6LenXaYqAAAAAOpYOl81pk5ADV9DZq2BpNNo-TNr', {
                action: 'submit'
            }).then(function(token) {


                $("#submit_btn").hide();
                $("#loader_contact").removeClass("d-none");
                var formData = new FormData(document.getElementById("contact__form"));
                formData.append('recaptcha_token', token);

                $.ajax({
                    url: "<?=base_url('contact/submit')?>",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $("#submit_btn").show();
                            $("#loader_contact").addClass("d-none");
                            $('#contact__form').trigger('reset');
                            $("#success_msg").removeClass("d-none");
                            $('#success_msg').fadeIn();
                            $('#success_msg').fadeOut(7000);
                        } else {
                            $("#submit_btn").show();
                            $("#loader_contact").addClass("d-none");
                            $("#error_msg").removeClass("d-none");
                            $('#error_msg').fadeIn();
                            $('#error_msg').fadeOut(7000);
                        }
                    }
                });


            });
        });

    }
});
</script>
<?= $this->endSection() ?>
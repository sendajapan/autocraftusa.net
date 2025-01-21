<?= $this->extend('template') ?>


<?= $this->section('content') ?>
<link rel="stylesheet" href="<?=base_url('public/assets/css/splide.min.css')?>" type="text/css">





<!-- hero section start  -->
<section class="top_banner position-relative overflow-hidden">

    <div class="container text-center">
        <div class="row">
            <div class="d-flex flex-wrap flex-column justify-content-center align-items-center">
            <h2 class="page-title display-3"><?=$veh['make']?> <?=$veh['model']?>  <?= ($veh['year']) ? $veh['year'] : '' ?></h2>
            <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="<?=base_url()?>">Home</a>
                    <span class="breadcrumb-item active" aria-current="page"><?= $veh['make'].' '.$veh['model'] ?> <?=($veh['year']) ? $veh['year'] : '' ?></span>
            </nav>
        </div>
        </div>
    </div>
</section>

<div class="post-wrap no-padding-bottom bg-white">
    <div class="container">

        <div class="row my-5">
            <main class="post-grid col-lg-9 col-md-12">
                
                            <?php if($images){ ?>

                                <!-- product-large-slider -->
                                    <div id="main-carousel" class="splide" aria-label="Vehicle Images">
                                          <div class="splide__track">
                                                <div class="splide__list">
                                                    <?php foreach($images as $item){ ?>
                                                        <div class="splide__slide"><img class="" src="<?=$item['pic_link']?>"></div>
                                                     <?php } ?>
                                                </div>
                                          </div>
                                    </div>
                               
                                <!-- / product-large-slider -->
                            
                            
                                <!-- product-thumbnail-slider -->
                                    <div id="thumbnail-carousel" class="splide mt-4" aria-label="Vehicle Thumbnails">
                                        <div class="splide__track">
                                            <div class="splide__list">
                                                <?php foreach($images as $item){ ?>
                                                <div class="splide__slide"><img class="" src="<?=$item['thumb_link']?>"></div>
                                                 <?php } ?>
                                            </div>
                                         </div>
                                    </div>
                                <!-- / product-thumbnail-slider -->
                            

                             <?php } ?>

                        

                        <div class="post-content py-5">

                            <div class="overview my-5">
                                <h3 class=" mb-4">Vehicle Overview</h3>

                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 mt-1">
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="fa-solid:car" class="property-icon border rounded-2 p-3">
                                        </iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Body</h6>
                                            <p><?=$veh['body_type']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="healthicons:clean-hands"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Make</h6>
                                            <p><?=$veh['make']?></p>
                                        </div>
                                    </div>

                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="mdi:car-brake-worn-linings"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Model</h6>
                                            <p><?=$veh['model']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="bi:fuel-pump" class="property-icon border rounded-2 p-3">
                                        </iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Fuel Type</h6>
                                            <p><?=$veh['fuel']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="material-symbols:speed-outline"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Mileage</h6>
                                            <p><?=number_format((int)$veh['mileage'])?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="mdi:steering" class="property-icon border rounded-2 p-3">
                                        </iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Drive</h6>
                                            <p><?=$veh['drive']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="raphael:acw" class="property-icon border rounded-2 p-3">
                                        </iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Condition</h6>
                                            <p><?=$veh['veh_condition']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="solar:calendar-linear"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Year</h6>
                                            <p><?= ($veh['year']) ? $veh['year'] : '-' ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="game-icons:car-door"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Doors</h6>
                                            <p><?=$veh['doors']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="mdi:car-seat"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Seats</h6>
                                            <p><?=$veh['seats']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="fluent:transmission-20-filled"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Transmission</h6>
                                            <p><?= ($veh['transmission']) ? $veh['transmission'] : '-'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="icon-park:oceanengine"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Engine
                                            </h6>
                                            <p><?= ($veh['engine_type']) ? $veh['engine_type'] : '-'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="oui:color" 
                                        class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Color</h6>
                                            <p><?= ($veh['exterior_color']) ? ucwords(strtolower($veh['exterior_color'])) : '-'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="f7:status"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Status</h6>
                                            <p><?=ucwords(strtolower($veh['status']))?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="fa6-solid:car-rear"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Chassis</h6>
                                            <p><?= ($veh['chassis']) ? $veh['chassis'] : '-'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="bi:badge-cc-fill"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">CC</h6>
                                            <p><?=number_format($veh['cc'])?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="fa6-solid:car-rear"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Stock #</h6>
                                            <p><?=$veh['stock_no']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="mdi:car-cog"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Grade</h6>
                                            <p><?=$veh['model_grade']?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="icon-park-outline:weight"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Weight</h6>
                                            <p><?= ($veh['net_weight']) ? $veh['net_weight'] : '-'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-start">
                                        <iconify-icon icon="ri:price-tag-line"
                                            class="property-icon border rounded-2 p-3"></iconify-icon>
                                        <div class="ms-4 mt-2">
                                            <h6 class="fw-bold mb-0 mt-1 fs-6 text-body-emphasis">Price</h6>
                                            <p><?= $veh['fob_price'] ?></p>
                                        </div>
                                    </div>

                                    <!-- Price
                                    m3
                                
                                    Model Code -->

                                </div>

                            </div>

                            <hr>

                            <?php if($veh['description']){ ?>

                            <div class="details my-5">
                                <h3 class=" fs-2 mb-4">Vehicle Details</h3>
                                <div><?=$veh['description']?></div>

                            </div>
                            <hr>

                            <?php } ?>

                            <?php if($attributes){ ?>
                            <div class="feature my-5">
                                <h3 class=" fs-2 mb-4">Features</h3>
                                <div class="d-md-flex">
                                    <ul class="ms-4 me-5">
                                        <?php foreach($attributes as $item){?>
                                            <li><?=$item?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    
            </main>



            <aside class="col-lg-3 col-md-12 sidebar">
                <div class="vehicle_inquiry brands">
                    <h3 class="text-primary text-uppercase py-2 text-center">Vehicle
                        Inquiry</h3>
                    <form id="form" class="form-group flex-wrap p-3 ">
                        <div class="form-input col-lg-12 my-4">
                            <label for="name"
                                class="form-label fs-6 text-uppercase fw-bold text-black">Full
                                Name</label>
                            <input type="text" id="name" placeholder="Write Your Name Here"
                                class="form-control ps-3">
                        </div>
                        <div class="form-input col-lg-12 my-4">
                            <label for="email"
                                class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                Address</label>
                            <input type="text" id="email" placeholder="Write Your Email Here"
                                class="form-control ps-3">
                        </div>
                        <div class="form-input col-lg-12 my-4">
                            <label for="phone"
                                class="form-label fs-6 text-uppercase fw-bold text-black">Phone
                                Number</label>
                            <input type="text" id="phone" placeholder="Phone Number" class="form-control ps-3">
                        </div>
                        <div class="form-input col-lg-12 my-4">
                            <label for="message"
                                class="form-label fs-6 text-uppercase fw-bold text-black">Your
                                Message</label>
                            <textarea id="message" placeholder="Write Your Message Here" class="form-control ps-3"
                                rows="8"></textarea>
                        </div>
                                    <input type="hidden" id="veh_id" value="<?=$veh['veh_id']?>">
                                    <input type="hidden" id="featured_image" value="<?=$featured_image?>">
                                    <input type="hidden" id="stock_id" value="<?=$veh['stock_no']?>">
                                    <input type="hidden" id="fob_price" value="<?=$veh['fob_price']?>">
                                    <input type="hidden" id="vehicle_name" value="<?=$veh['make']." ".$veh['model']." ".$veh['year']?>">
                        
                        <div class="d-grid mb-3">         
                        
                            <button class="g-recaptcha btn btn-secondary btn-lg text-uppercase btn-rounded-none" 
                                      data-sitekey="6LenXaYqAAAAAOpYOl81pk5ADV9DZq2BpNNo-TNr" 
                                      data-callback='onSubmit' 
                                      data-action='submit' type="button" id="inquiry_submit_btn">SEND INQUIRY</button>

                                    <div id="loader" class="d-none text-center">  
                                        <div class="spinner-border text-success" role="status"></div>
                                    </div>

                                    <div id="inquiry_msg" class="d-none text-center mt-3"></div>
                        
                        </div>

                    </form>
                </div>
            </aside>
        </div>
    </div>
</div>


<script src="<?=base_url('public/assets/js/splide.min.js')?>"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
    function onSubmit(recaptcha_token) {
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    var veh_id = $('#veh_id').val();
    var featured_image = $('#featured_image').val();
    var stock_id = $('#stock_id').val();
    var vehicle_name = $('#vehicle_name').val();
    var fob_price =  $('#fob_price').val();

    if(name == '' || email == '' || phone == '' || message == '')
    {   

        $("#inquiry_msg").removeClass("d-none");
        $("#inquiry_msg").addClass("text-danger fw-bold");
        $("#inquiry_msg").text("All fields are required");
    }
            
    else{
        
        $("#inquiry_submit_btn").hide();
        $("#inquiry_msg").hide();
        $("#loader").removeClass("d-none");
            
        let succes_text = "Message has been sent successfully, Thank you. We will contact you soon.";

        $.ajax({
          url: "<?=base_url('ajax_vehicle_inquiry');?>",
          method: "POST",
          data: { name : name, email : email, phone : phone, message : message, veh_id : veh_id, featured_image : featured_image, stock_id : stock_id, vehicle_name : vehicle_name, fob_price : fob_price, recaptcha_token: recaptcha_token },
          dataType: "json",
          success:function(data){

                $("#loader").hide();

                if(data.success)
                {   
                    $("#inquiry_msg").removeClass("d-none");
                    $("#inquiry_msg").show();
                    $("#inquiry_msg").html( "<h4 class='fw-bold text-success'>"+succes_text+"</h4>" );

                }else{

                    $("#inquiry_msg").removeClass("d-none");
                    $("#inquiry_msg").show();
                    $( "#inquiry_msg").html( "<h4 class='fw-bold text-danger'>"+data.error_message+"</h4>" );
                }
          }

        });
    
    }
   
}





var main = new Splide( '#main-carousel', {
    type      : 'fade',
    rewind    : true,
    pagination: false,
    arrows    : true,
    heightRatio: 0.55
  } );


var thumbnails = new Splide( '#thumbnail-carousel', { 
    fixedWidth : 100,
    fixedHeight: 60,
    gap        : 10,
    rewind     : true,
    pagination : false,
    focus      : 'center',
    isNavigation: true,
    breakpoints: {
    600: {
      fixedWidth : 60,
      fixedHeight: 44,
        },
    },
});


main.sync( thumbnails );
main.mount();
thumbnails.mount();




</script>

<?= $this->endSection() ?>
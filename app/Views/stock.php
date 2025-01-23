<?= $this->extend('template') ?>


<?= $this->section('content') ?>


<!-- hero section start  -->
<section class="stock_page top_banner position-relative">
    <div class="container text-center">
        <div class="row">
            <div class="">
                <h2 class="page-title display-3 text-start">CAR STOCK</h2>
            </div>
        </div>
    </div>
</section>

<section id="search">


    <div class="container search-block">

        <h2 class="text-center mb-4">SEARCH <span class="text-primary"> VEHICLE </span></h2>


        <form action="<?=base_url('stock')?>" method="post" class="row form-group flex-wrap px-3">
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">

                    <select name="make" id="vehicle-make" class="form-select form-control">
                        <option selected value="">Select Make</option>
                        <?php if($makes){
                                        foreach($makes as $item){ ?>
                        <option
                            <?php if(isset($user_search['make'])){if(strtoupper($user_search['make'])==strtoupper($item)){echo"selected";}}?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>

                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select name="model" id="v_model" class="form-select form-control">
                        <option value="">Select Model</option>
                        <?php if($models){ 
                                            foreach($models as $item){ ?>
                        <option
                            <?php if(isset($user_search['model'])){if(strtoupper($user_search['model'])==strtoupper(trim($item))){echo "selected";}} ?>
                            value="<?=trim($item)?>"><?=strtoupper($item)?></option>
                        <?php } } ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select id="veh_condition" name="veh_condition" class="form-select form-control" id="vehicle">
                        <option value="">Select Condition</option>
                        <?php foreach($veh_condition as $item){
                                    if($item!=""){ ?>
                        <option
                            <?php if(isset($user_search['veh_condition'])){if($user_search['veh_condition']==$item){echo"selected";}}?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select id="body_type" name="body_type" class="form-select form-control">
                        <option value="">Select Body Type</option>
                        <?php if($body_types){
                                        foreach($body_types as $item){ ?>
                        <option
                            <?php if(isset($user_search['body_type'])){if($user_search['body_type']==$item){echo "selected";}} ?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select id="transmission" name="transmission" class="form-select form-control">
                        <option value="">Select Transmission</option>
                        <?php if($transmissions){
                                        foreach($transmissions as $item){ ?>
                        <option
                            <?php if(isset($user_search['transmission'])){if($user_search['transmission']==$item){echo"selected";}}?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select id="exterior_color" name="exterior_color" class="form-select form-control">
                        <option value="">Select color</option>
                        <?php if($colors){
                                        foreach($colors as $item){ ?>
                        <option
                            <?php if(isset($user_search['exterior_color'])){if($user_search['exterior_color']==$item){echo"selected";}}?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group ">
                    <select id="fuel" name="fuel" class="form-select form-control">
                        <option value="">Select Fuel</option>
                        <?php if($fuels){
                                        foreach($fuels as $item){ ?>
                        <option
                            <?php if(isset($user_search['fuel'])){if($user_search['fuel']==$item){echo"selected";}}?>
                            value="<?=$item?>"><?=$item?></option>
                        <?php } } ?>
                    </select>

                </div>
            </div>


            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group">

                    <select id="year_from" name="year_from" class="form-select form-control">
                        <?php for($y=2000; $y<=date("Y"); $y++){ ?>
                        <option <?= ($request->getPost('year_from')==$y) ? "selected": "" ?> value="<?=$y?>"><?=$y?>
                        </option>
                        <?php } ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-lg-0 mb-2">
                <div class="input-group">

                    <select id="year_to" name="year_to" class="form-select form-control">
                        <?php for($y=date("Y"); $y>=2000; $y--){ ?>
                        <option <?= ($request->getPost('year_to')==$y) ? "selected": "" ?> value="<?=$y?>"><?=$y?>
                        </option>
                        <?php } ?>
                    </select>

                </div>
            </div>

            <!-- <div class="ps-3 col-12 col-md-6 col-lg-4 mt-4 mt-lg-0 mb-2 home-range-slider">
                <div class="hero__tab__form">
                    <div class="car-price">
                        <p>CC</p>
                        <div class="price-range-wrap">
                            <div class="cc-range"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <label for="cc"></label>
                                    <input type="text" name="cc" id="cc" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="ps-3 col-12 col-md-6 col-lg-4 mt-4 mt-lg-0 mb-2 home-range-slider">
                <div class="hero__tab__form">
                    <div class="car-price">
                        <p>Mileage</p>
                        <div class="price-range-wrap">
                            <div class="km-range"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <label for="km"></label>
                                    <input type="text" name="km" id="km" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-12 col-md-12 col-lg-12 mt-lg-0 mb-2">
                <div class="d-grid" style="margin-top:33px">
                    <input type="submit" name="submit" value="Search Car" class="stock-btn">
                </div>
            </div>

        </form>


    </div>

</section>


<section id="cars" class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <div class="stock-filter d-flex justify-content-between mb-4">

                    <div class="form-group">
                        <label for="per_page" class="text-white">Show On Page:</label>
                        <select id="per_page" class="fiter">
                            <option value="12" <?php if(session()->per_page=='20'){echo 'selected';} ?>>20 Cars</option>
                            <option value="20" <?php if(session()->per_page=='40'){echo 'selected';} ?>>40 Cars</option>
                            <option value="32" <?php if(session()->per_page=='80'){echo 'selected';} ?>>80 Cars</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_by" class="text-white">Sort By:</label>
                        <select id="sort_by" class="fiter">
                            <option value="year_d" <?php if(session()->sort_by=='year_d'){echo 'selected';} ?>>Year:
                                Desc</option>
                            <option value="year_a" <?php if(session()->sort_by=='year_a'){echo 'selected';} ?>>Year: Asc
                            </option>
                            <option value="mileage_d" <?php if(session()->sort_by=='mileage_d'){echo 'selected';} ?>>
                                Mileage: Desc</option>
                            <option value="mileage_a" <?php if(session()->sort_by=='mileage_a'){echo 'selected';} ?>>
                                Mileage: Asc</option>
                            <option value="vehicle_d" <?php if(session()->sort_by=='vehicle_d'){echo 'selected';} ?>>
                                Recent Additions</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-between mb-4"><span
                        class="fs-5 fw-bold"><?= $found.' Cars Found'?></span></div>



                <div class="row stock-section">
                    <?php 
                if($stock){
                    foreach($stock as $item){    
                       
            ?>

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
                                        <div class="text-nowrap d-flex flex-column"><i class="fa-solid fa-gauge"></i>
                                            <span><?= ($item['mileage']) ? number_format($item['mileage']).' km' : '-'; ?></span>
                                        </div>
                                        <div class="text-nowrap d-flex  flex-column"><i class="fa-solid fa-palette"></i>
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
                                            class="view_details">View Details <svg xmlns="http://www.w3.org/2000/svg"
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

                    <?php }  }else{ ?>

                    <img src="<?=base_url('public/assets/images/no_cars_search.png');?>" alt="No Cars Found">

                    <?php } ?>

                </div>

            </div>




        </div>


        <?php 
        if ($pager->getPageCount() > 1) : 
            echo $pager->links(); 
        endif    
        ?>

    </div>
</section>


<?= $this->endSection() ?>


<?=$this->section('scripts')?>

<script type="text/javascript">
$(document).on("change", "#per_page", function() {

    var per_page = $("#per_page").val();

    $.ajax({
        url: "<?= base_url('per-page') ?>",
        method: "POST",
        data: {
            per_page: per_page
        },
        dataType: "html",
        success: function() {
            location.reload();
        }

    });

});

$(document).on("change", "#sort_by", function() {

    var sort_by = $("#sort_by").val();

    $.ajax({
        url: "<?= base_url('sort-by') ?>",
        method: "POST",
        data: {
            sort_by: sort_by
        },
        dataType: "html",
        success: function() {
            location.reload();
        }

    });

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
</script>

<?= $this->endSection() ?>
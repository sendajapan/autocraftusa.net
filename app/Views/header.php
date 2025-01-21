<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <?php 
          foreach($meta as $item) {
            $name = isset($item['name']) ? "name='{$item['name']}'" : (isset($item['property']) ? "property='{$item['property']}'" : '');
            $content = $item['content'];
            echo "<meta " . $name . " content='$content'>";
            echo "\n";
        }  
    ?>

    <link rel="icon" href="<?=base_url('public/assets/images/B1.png');?>" type="image/png">
    <link rel="shortcut icon" href="<?=base_url('public/assets/images/B1.png');?>" type="image/png">
    <!--vendor css ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/assets/css/vendor.css')?>">

    <!--Bootstrap ================================================== -->
    <link rel="stylesheet" href="<?=base_url('public/assets/css/owl.carousel.min.css')?>" type="text/css">

    <link href="<?=base_url('public/assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Style Sheet ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/assets/css/style.css')?>">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Roboto"> -->

    <link rel="stylesheet" href="<?=base_url('public/assets/css/jquery-ui.min.css')?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
    <!-- script ================================================== -->
    <script src="<?=base_url('public/assets/js/modernizr.js')?>"></script>

    <!-- Link Swiper's CSS -->
    <!-- <link rel="stylesheet" href="<?=base_url('public/assets/css/swiper-bundle.min.css')?>" /> -->


</head>

<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0">

<nav class="navbar navbar-expand-lg navbar-light container-fluid position-relative sticky-top p-0 position-fixed top-0 start-0 w-100 shadow">
  <div class="container-fluid pe-0">
    <a class="navbar-brand-mobile" href="<?=base_url('/')?>">
      <img style="width:260px;" src="<?=base_url("public/assets/images/logo.png")?>">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <?php   
        $uri = service('uri');
        $uri = $uri->getSegment(1); 
      ?>

      <div class="offcanvas-body">
        <ul class="navbar-nav align-items-center justify-content-center flex-grow-1 ps-5">
          <li class="nav-item">
            <a class="navbar-brand-disktop" href="<?=base_url('/')?>">
              <img style="width:220px;" src="<?=base_url("public/assets/images/logo.png")?>">
            </a>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center justify-content-start flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="<?= ($uri=='') ? 'active':''; ?> nav-link" aria-current="page" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="<?= ($uri=='stock') ? 'active':''; ?> nav-link" href="<?=base_url('stock')?>">Stock</a>
          </li>
          <li class="nav-item">
            <a class="<?= ($uri=='about') ? 'active':''; ?> nav-link" href="<?=base_url('about')?>">About</a>
          </li>
          <li class="nav-item">
            <a class="<?= ($uri=='testimonials') ? 'active':''; ?> nav-link" href="<?=base_url('testimonials')?>">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="<?= ($uri=='contact') ? 'active':''; ?> nav-link" href="<?=base_url('contact')?>">Contact Us</a>
          </li>
        </ul>
        <div class="phone_number d-flex">
          <ul class="navbar-nav align-items-center justify-content-center flex-grow-1">
            <li class="nav-item">
              <a class="<?= ($uri=='') ? '':''; ?> nav-link m-0" href="tel:+821055204441">
                <i class="fas fa-phone" style="color: white;"></i>+82-10-5520-4441
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

(function ($) {

  "use strict";





  $(document).ready(function () {

    // product single page
    var thumb_slider = new Swiper(".product-thumbnail-slider", {
      autoplay: true,
      loop: true,
      spaceBetween: 8,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
      navigation: {
        nextEl: ".swiper-button-prev",
        prevEl: ".swiper-button-next",
      },
    });

    var large_slider = new Swiper(".product-large-slider", {
      autoplay: false,
      loop: true,
      spaceBetween: 10,
      effect: 'fade',
      thumbs: {
        swiper: thumb_slider,
      },
      navigation: {
        nextEl: ".swiper-button-prev",
        prevEl: ".swiper-button-next",
      },
    });


    /*//switch javascript

    const switchInput = document.getElementById('flexSwitchCheckChecked');
    const contentElements = document.querySelectorAll('.content');
    const monthlyLabel = document.getElementById('monthly-label');
    const yearlyLabel = document.getElementById('yearly-label');


    yearlyLabel.classList.add('label-color'); // Set initial accent color to yearly label


    switchInput.addEventListener('change', function () {
      if (this.checked) {
        yearlyLabel.classList.add('label-color'); // Add color to label
        monthlyLabel.classList.remove('label-color'); // Remove color from label
      } else {
        monthlyLabel.classList.add('label-color'); // Add color to label
        yearlyLabel.classList.remove('label-color'); // Remove color from label
      }
    });

    contentElements.forEach(function (element) {
      if (element.classList.contains('yearly')) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });     // Set the price initial state


    switchInput.addEventListener('change', function () {
      if (this.checked) {

        contentElements.forEach(function (element) {
          if (element.classList.contains('yearly')) {
            element.style.display = 'block';
          } else {
            element.style.display = 'none';
          }
        });
      } else {

        contentElements.forEach(function (element) {
          if (element.classList.contains('monthly')) {
            element.style.display = 'block';
          } else {
            element.style.display = 'none';
          }
        });
      }
    });    // Add event listener to the switch input*/


    $('.testimonial__slider').owlCarousel({
      loop: true,
      center: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots:true,
      nav: false,
      navText: [prevIcon,nextIcon],
      autoplayTimeout: 4500,
      checkVisibility: true,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 2
        },
        760: {
          items: 3
        },
        1560: {
          items: 3
        },
        1960: {
          items: 3
        }
      }
  });


    // rental swiper
    var swiper = new Swiper(".rental-swiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      navigation: {
        nextEl: ".rental-swiper-next",
        prevEl: ".rental-swiper-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1400: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      }
    });



    var swiper = new Swiper(".home-reviews-swiper", {
      slidesPerView: 3,
      spaceBetween: 40,
      loop: true,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
      },
      navigation: {
        nextEl: ".rental-swiper-next",
        prevEl: ".rental-swiper-prev",
      },
      breakpoints: {
        
        0: {
        slidesPerView: 1,
  
        },

        480: {
        slidesPerView: 1,
        
        },
        640: {
          slidesPerView: 2,
        
        },

        768: {
          slidesPerView: 3,
          
        },
        1400: {
          slidesPerView: 3,
          
        },
      }
    });


    //testimonial swiper
    var swiper = new Swiper(".testimonial-swiper", {
      loop: true,
      pagination: {
        el: ".swiper-pagination",
      },
    });




    //date picker
    $("#datepicker1, #datepicker2").datepicker({
      autoclose: true,
      todayHighlight: true,
    }).datepicker('update', new Date());



    // Animate on Scroll
    AOS.init({
      duration: 1000,
      once: true,
    })





    /*-----------------------
    Range Slider
  ------------------------ */

    var rangeSlider = $(".price-range");
    rangeSlider.slider({
        range: true,
        min: 0,
        max: 10000000,
        values: [price_range_min, price_range_max],
        slide: function (event, ui) {
            $("#amount").val("$ " + ui.values[0] + " - $ " + ui.values[1]);
        }
    });
    $("#amount").val("$ " + $(".price-range").slider("values", 0) + " - $ " + $(".price-range").slider("values", 1));


    var ccSlider = $(".cc-range");
    ccSlider.slider({
        range: true,
        min: 0,
        max: 10000,
        values: [cc_range_min, cc_range_max],
        slide: function (event, ui) {
            $("#cc").val(ui.values[0] + " - " + ui.values[1]);
        }
    });
    $("#cc").val($(".cc-range").slider("values", 0) + " - " + $(".cc-range").slider("values", 1));

    
    var kmSlider = $(".km-range");
    kmSlider.slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [km_range_min, km_range_max],
        slide: function (event, ui) {
            $("#km").val(ui.values[0] + " - " + ui.values[1]);
        }
    });
    $("#km").val($(".km-range").slider("values", 0) + " - " + $(".km-range").slider("values", 1));




  });


})(jQuery);



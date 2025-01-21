<?= $this->extend('template') ?>


<?= $this->section('content') ?>


<!-- hero section start  -->
<section class="contact-us top_banner position-relative">
    <div class="container text-center">
        <div class="row">
            <div class="">
                <h2 class="page-title display-3 text-start">Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<!------------------------------------- Contact section start  -------------------------->

<section class="contact-form my-5 py-5">
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="contact-content d-flex align-items-start flex-column gap-4">
                <a href="" class="about_btn d-flex align-items-center gap-3">
                    <div></div>
                    <span>CONTACT US</span>
                    <div></div>
                </a>
                <h2>GET IN TOUCH</h2>
            </div>
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

                        <div class="d-flex align-items-end  w-100 justify-content-end">
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




<?= $this->section('scripts') ?>

<script src="https://www.google.com/recaptcha/api.js?render=6LenXaYqAAAAAOpYOl81pk5ADV9DZq2BpNNo-TNr"></script>
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
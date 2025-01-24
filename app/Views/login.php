<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Autohaus Durban</title>
<link href="<?=base_url()?>public/assets/login/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="<?=base_url()?>public/assets/login/font-awesome.css" rel="stylesheet">
<link href="<?=base_url()?>public/assets/login/style.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
<script src="<?=base_url()?>adminPanel/js/ajax.js"></script> 
    
</head>

<body>


    <div class="navbar navbar-fixed-top">
    
    <div class="navbar-inner">
        
        <div class="container">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <a class="brand" href="<?=base_url('admin/dashboard')?>">
                Autocraft USA lnc Administrative Panel
            </a>        
            
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    
                    <li class="">                       
                        <a href="<?=base_url()?>" class="">
                            <i class="icon-chevron-left"></i>
                            Back to Homepage
                        </a>
                        
                    </li>
                </ul>
                
            </div><!--/.nav-collapse -->    
    
        </div> <!-- /container -->
        
    </div> <!-- /navbar-inner -->
    
</div> <!-- /navbar -->


<div class="main">
    <div class="main-inner">
        <div class="container">
          <div class="row">
            <div class="span12">
            
            

                
<div class="account-container">
    <div class="content clearfix">

        
        <form action="<?=base_url('login')?>" method="post">
        
        <br><br>


       


            <h1>Admin Login</h1>        
            
            <br>


            <div class="login-fields">
                
                <style>
                    .errors{background: #FFDDDD;width: 23.5%;padding: 1px 0;color: red;}}
                </style>
                <div class="field">
                    <?php
                        if (isset($validation)) {
                                ?> <p style="color:red;margin-bottom: -1px;"><?=$validation->listErrors()?></p> <?php
                            }elseif(session()->getFlashdata('notFound')){
                                ?> <p style="color:red;margin-bottom: 3px;background: #FFDDDD;width: 23.5%;padding:;"><?=session()->getFlashdata('notFound')?></p> <?php
                            }
                    ?>
                    <input type="email" id="email" name="email"  value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } if(isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="Email" class="login username-field" />
                    
                </div> <!-- /field -->
                



                <div class="field">
                    <input type="password" id="password" name="password"  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; }if(isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->
                
            </div> <!-- /login-fields -->
            
            <div class="login-actions">

                <br>
                <span class="login-checkbox">
                    <input id="remember_me" name="remember_me" type="checkbox" class="field login-checkbox" value="1" <?php if(isset($_COOKIE['remember_me']) && $_COOKIE['remember_me']=='1'){echo 'checked=checked';} ?> style="float:left; margin-right:10px;"/>
                    <label class="choice" for="remember_me">Remember Me</label>
                </span>
                
                <br>
                <button type="submit" class="button btn btn-success btn-large">Sign In</button>
                
            </div> <!-- .actions -->
            
            
            
        </form>
        
    </div> <!-- /content -->
    
</div> <!-- /account-container -->




            </div> <!-- /span8 -->
            
          </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->




<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; <?=date("Y")?> <a target="_blank" href="http://www.autohausdurban.com/">Autohaus Durban</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 







</body>

</html>

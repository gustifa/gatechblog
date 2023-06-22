<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Realshed - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<link rel="icon" href="{{asset('frontend/assets/images/favicon.ico')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('frontend/assets/css/font-awesome-all.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/flaticon.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/owl.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/bootstrap.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/animate.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/jquery-ui.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/nice-select.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/color/theme-color.css')}} " id="jssDefault" rel="stylesheet">
<link href="{{asset('frontend/assets/css/switcher-style.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/style.css')}} " rel="stylesheet">
<link href="{{asset('frontend/assets/css/responsive.css')}} " rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        @include('frontend.home.preloader')
        <!-- preloader end -->


        <!-- switcher menu -->
        @include('frontend.home.switcher')
        <!-- end switcher menu -->


        <!-- main header -->
        @include('frontend.home.header')
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        @include('frontend.home.mobile')
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>User Profile </h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>User Profile </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    








                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="blog-sidebar">
                            <div class="sidebar-widget post-widget">
                                    <div class="widget-title">
                                        <h4>User Profile </h4>
                                    </div>
                                    <div class="post-inner">
                                        <div class="post">
                                            <figure class="post-thumb"><a href="blog-details.html">
                    <img src="assets/images/news/post-1.jpg" alt=""></a></figure>
                        <h5><a href="blog-details.html">Kazi Ariyan </a></h5>
                        <p>user@gmail.com </p>
                                        </div> 
                                    </div>
                                </div> 
                    
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list ">
                                
                    <li class="current">  <a href="blog-details.html"><i class="fab fa fa-envelope "></i> Dashboard </a></li>


                    <li><a href="blog-details.html"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                    <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy credits<span class="badge badge-info">( 10 credits)</span></a></li>
                    <li><a href="blog-details.html"><i class="fa fa-list-alt" aria-hidden="true"></i></i> Properties </a></li>
                    <li><a href="blog-details.html"><i class="fa fa-indent" aria-hidden="true"></i> Add a Property  </a></li>
                    <li><a href="blog-details.html"><i class="fa fa-key" aria-hidden="true"></i> Security </a></li>
                    <li><a href="blog-details.html"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Logout </a></li>
                                </ul>
                            </div>
                        </div> 
                                        
                                        </div>
                                    </div>




                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                                        <div class="blog-details-content">
                                            <div class="news-block-one">
                                                <div class="inner-box">
                                                    
                                                    <div class="lower-content">
                                                        <h3>Including Animation In Your Design System.</h3>
                                                        <ul class="post-info clearfix">
                                                            <li class="author-box">
                                                                <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                                                <h5><a href="blog-details.html">Eva Green</a></h5>
                                                            </li>
                                                            <li>April 10, 2020</li>
                                                        </ul>
                                                    
                        


                <div class="row">
                <div class="col-lg-4">
                    <div class="card-body" style="background-color: #1baf65;">
                    <h1 class="card-title" style="color: white; font-weight: bold;">0</h1>
                    <h5 class="card-text"style="color: white;"> Approved properties</h5>
                    
                </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body" style="background-color: #ffc107;">
                    <h1 class="card-title" style="color: white; font-weight: bold; ">0</h1>
                    <h5 class="card-text"style="color: white;"> Pending approve properties</h5>
                    
                </div>
                </div>


                <div class="col-md-4">
                    <div class="card-body" style="background-color: #002758;">
                    <h1 class="card-title" style="color: white; font-weight: bold;">0</h1>
                    <h5 class="card-text"style="color: white; "> Rejected properties</h5>
                    
                </div>
                </div>
                    
                </div> 

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>


                    <div class="blog-details-content">
                                            <div class="news-block-one">
                                                <div class="inner-box">
                                                    
                                                    <div class="lower-content">
                                                        <h3>Activity Logs</h3>
                                                    <hr>
                                                    
                        


                

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>






                                    </div> 


                                </div>
                            </div>
        </section>
        <!-- sidebar-page-container -->


        <!-- subscribe-section -->
        @include('frontend.home.subscribe')
        <!-- subscribe-section end -->


        <!-- main-footer -->
        @include('frontend.home.footer')
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{asset('frontend/assets/js/jquery.js')}} "></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/owl.js')}} "></script>
    <script src="{{asset('frontend/assets/js/wow.js')}} "></script>
    <script src="{{asset('frontend/assets/js/validation.js')}} "></script>
    <script src="{{asset('frontend/assets/js/jquery.fancybox.js')}} "></script>
    <script src="{{asset('frontend/assets/js/appear.js')}} "></script>
    <script src="{{asset('frontend/assets/js/scrollbar.js')}} "></script>
    <script src="{{asset('frontend/assets/js/isotope.js')}} "></script>
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/jQuery.style.switcher.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}} "></script>
    <script src="{{asset('frontend/assets/js/product-filter.js')}}"></script>

    
    <!-- main-js -->
    <script src="{{asset('frontend/assets/js/script.js')}}"></script>


</body><!-- End of .page_wrapper -->
</html>

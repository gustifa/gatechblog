@extends('frontend.frontend_dashboard')
@section('main')

<!--Page Title-->
        <section class="page-title centred" style="background-image: url({{asset('frontend/assets/images/background/page-title-5.jpg')}});">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Wishlist Property </h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


   <!-- sidebar-page-container -->
        <section class="property-page-section property-list">
            <div class="auto-container">
                <div class="row clearfix">
                    

                            @php
                                $id = Auth::user()->id;
                                $profileData = App\Models\User::find($id);

                            @endphp






                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="blog-sidebar">
                                <div class="sidebar-widget post-widget">
                                    <div class="widget-title">
                                        <h4>User Profile </h4>
                                    </div>
                                    <div class="post-inner">
                                        <div class="post">
                                            <figure class="post-thumb"><a href="blog-details.html">
                                        <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt=""></a></figure>
                                            <h5><a href="blog-details.html">{{$profileData->name}} </a></h5>
                                            <p>{{$profileData->email}} </p>
                                        </div> 
                                    </div>
                                </div> 
                    
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h4>Category</h4>
                                </div>
                                @include('frontend.dashboard.dashboard_sidebar')
                            </div> 
                        </div>
                    </div>




                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                 


                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-3.jpg" alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text"><h4><a href="property-details.html">Villa on Grand Avenue</a></h4></div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$30,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb"> 
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html" class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div> 


                </div>
            </div>
        </section>
        <!-- sidebar-page-container -->
@endsection
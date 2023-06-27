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
                                 


                                <div id="wishlist">
                                    
                                </div>
                    </div> 


                </div>
            </div>
        </section>
        <!-- sidebar-page-container -->
@endsection

@extends('frontend.frontend_dashboard')
@section('main')

<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>


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
                        @php
                            $id = Auth::user()->id;
        			         $profileData = App\Models\User::find($id);

					      @endphp
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
       <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt=""></a></figure>
        <h5><a href="blog-details.html">{{$profileData->name}}</a></h5>
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
                                      
          
 <form method="post" class="default-form" action="{{route('user.update.password')}}" enctype="multipart/form-data">
 @csrf
        
        
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="old_password" required="">
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" required="">
        </div>
        <div class="form-group">
            <label>Comfirmation Password</label>
            <input type="password" name="new_password_confirmation" required="">
        </div>
 


        <div class="form-group message-btn">
            <button type="submit" class="theme-btn btn-one">Save Changes </button>
        </div>
    </form>

 

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
@endsection
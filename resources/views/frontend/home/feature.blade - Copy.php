@php
    $featured = App\Models\Property::where('status', '1')->where('featured', '1')->limit(3)->get();
@endphp
   

    <section class="feature-section sec-pad bg-color-1">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h5>Features</h5>
                    <h2>Featured Property</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
                </div>
                <div class="row clearfix">
                @foreach($featured as $item)
   
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{(!empty($item->property_thambnail)) ? asset($item->property_thambnail) : url('upload/no_image.jpg')}}" alt="" style="width:370px; height:250px;" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                        @if($item->agen_id == NULL)
                                            <figure class="author-thumb"><img src="{{url('upload/admin.png')}} " alt=""></figure>
                                            <h6>Admin</h6>
                                        @else
                                            <figure class="author-thumb"><img src="{{(!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg')}} " alt=""></figure>
                                            <h6>{{$item->user->name}}</h6>
                                        @endif
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{url('property/details/'.$item->id.'/'.$item->property_slug)}}">{{$item->property_status}}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="D">{{$item->property_name}}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>{{$item->lowest_price}}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href=""><i class="icon-12"></i></a></li>
                                            <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)" ><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>3 Beds</li>
                                        <li><i class="icon-15"></i>2 Baths</li>
                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="{{url('property/details/'.$item->id.'/'.$item->property_slug)}}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
    
                    
                </div>
                <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All Listing</a></div>
            </div>
    </section>
   
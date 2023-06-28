<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/author-1.jpg" alt=""></figure>
                                    <div class="inner">
                                        <h4>Michael Bean</h4>
                                        <ul class="info clearfix">
                                            <li><i class="fas fa-map-marker-alt"></i>84 St. John Wood High Street, 
                                            St Johns Wood</li>
                                            <li><i class="fas fa-phone"></i><a href="tel:03030571965">030 3057 1965</a></li>
                                        </ul>
                                        <div class="btn-box"><a href="agents-details.html">View Listing</a></div>
                                    </div>
                                </div>
                                <div class="form-inner">
                                @auth
                                @php
                                        $id = Auth::user()->id;
                                        $userData = App\Models\User::find($id);
                                @endphp
                                    <form action="{{route('property.message')}}" method="post" class="default-form">
                                            @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        @if($property->agen_id == NULL)
                                        <input type="hidden" name="agen_id" value="1">
                                        @else
                                        <input type="hidden" name="agen_id" value="{{ $property->agen_id }}">
                                        @endif
                                        <div class="form-group">
                                            <input type="text" name="msg_name" placeholder="Your name" required="" value="{{ $userData->name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="msg_email" placeholder="Your Email" required="" value="{{ $userData->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="msg_phone" placeholder="Phone" required="" value="{{ $userData->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{route('property.message')}}" method="post" class="default-form">
                                            @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        @if($property->agen_id == NULL)
                                        <input type="hidden" name="agen_id" value="1">
                                        @else
                                        <input type="hidden" name="agen_id" value="{{ $property->agen_id }}">
                                        @endif
                                        <div class="form-group">
                                            <input type="text" name="msg_name" placeholder="Your name" required="" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="msg_email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="msg_phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form>

                                    @endauth
                            
                                </div>
                            </div>
                            <div class="calculator-widget sidebar-widget">
                                <div class="calculate-inner">
                                    <div class="widget-title">
                                        <h4>Mortgage Calculator</h4>
                                    </div>
                                    <form method="post" action="mortgage-calculator.html" class="default-form">
                                        <div class="form-group">
                                            <i class="fas fa-dollar-sign"></i>
                                            <input type="number" name="total_amount" placeholder="Total Amount">
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-dollar-sign"></i>
                                            <input type="number" name="down_payment" placeholder="Down Payment">
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-percent"></i>
                                            <input type="number" name="interest_rate" placeholder="Interest Rate">
                                        </div>
                                        <div class="form-group">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                        </div>
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select class="wide">
                                                   <option data-display="Monthly">Monthly</option>
                                                   <option value="1">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
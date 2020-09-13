@extends('font.master')
@section('title')
Bdmati.com || Every Food in Bangladesh
@endsection
@section('content')
 @if (session('order'))
              <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Waiting For Confirmation Call</strong>
              </div>
        @endif
 <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">


                @foreach($slider as $slider)
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">{{$slider->header}}</h2>
                        <h4>{{$slider->title}}</h4>
                        <p>{{$slider->details}}</p>
                        {{-- <a href="#" class="da-link button">Read more</a> --}}
                        <div class="da-img">
                            <img src="{{asset($slider->image)}}" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End first slide -->
                   @endforeach
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Products </h1>
                </div>



                <ul class="nav nav-pills" id="accordion">
                @foreach($category as $cat)
                    <li class="filter"  data-filter="all{{$cat->id}}">                
                        <a href="{{url('/all_products/'.$cat->id)}}">{{$cat->category}}</a>
                    </li>
                @endforeach
                </ul>
        


                <div id="single-project">
              @foreach($products as $pro)

                    <div id="slidingDiv{{$pro->id}}" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="{{asset($pro->image)}}" alt="project 1" style="height:400px;" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>{{$pro->name}}</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Price</span>{{$pro->price}} ৳</div>
                                    <div>
                                        <span>Weight</span>{{$pro->weight}} KG</div>
                                    <div>
                                        <span>Size</span>{{$pro->size}}</div>
                                    <div>
                                        <span>Stock</span>{{$pro->stock}}</div>
                                </div>
                                <p>{{$pro->details}}</p>
                                <form mathod="post" action="{{route('Cart')}}">

                                 <input type="hidden" name="id" value="{{$pro->id }}"/>
                                 <input type="hidden" name="qty" value="1"/>
                                 <input type="hidden" name="role" value="1"/>
                                 <button type="submit" class="btn btn-warning ">Add to Cart</button>

                                 {{-- <input type="submit"  value="SALE" class="btn btn-outline-info"/> --}}
                                </form>
                               <br>
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 1 -->
                   
            @endforeach


                    <ul id="portfolio-grid" class="thumbnails row">

                    @foreach($product as $product)
                        <li class="span4 mix all{{$product->category}}">
                            <div class="thumbnail">
                                <img src="{{asset($product->image)}}" style="height:200px;" alt="project 1" >
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv{{$product->id}}">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>{{$product->name}}</h3>
                                <p>Price : {{$product->price}} ৳</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                       
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>

        <!-- Portfolio section end -->
        
        {{-- <div class="section secondary-section">
            <div class="triangle"></div>
            <div class="container centered">
                <p class="large-text">Elegance is not the abundance of simplicity. It is the absence of complexity.</p>
                <a href="#" class="button">Purshase now</a>
            </div>
        </div> --}}
        <!-- Client section start -->
        <!-- Client section start -->
       
        <div class="section third-section">
            <div class="container centered">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Our Clients</h3>
                        </div>
                        <ul class="client-nav pull-right">
                            <li id="client-prev"></li>
                            <li id="client-next"></li>
                        </ul>
                    </div>
                    <ul class="row client-slider" id="clint-slider">
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo01.png" alt="client logo 1">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo02.png" alt="client logo 2">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo03.png" alt="client logo 3">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo04.png" alt="client logo 4">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo05.png" alt="client logo 5">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo02.png" alt="client logo 6">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="website/images/clients/ClientLogo04.png" alt="client logo 7">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Price section start -->
        <div id="price" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Product Packages</h1>
                    {{-- <p>কয়েক রকমের স্বাদ একটি প্যাকেজে নিতে পারেন।</p> --}}
                </div>
                <div class="price-table row-fluid">

               @foreach($package as $pack)
                    <div class="span4 price-column">
                        <h3>{{$pack->name}}</h3>
                        <ul class="list">
                            <li class="price">{{$pack->price}} Tk / {{$pack->weight}} KG</li>
                            <li><strong>{{$pack->one}}</strong> </li>
                            <li><strong>{{$pack->two}}</strong></li>
                            <li><strong>{{$pack->three}}</strong></li>
                        </ul>
                        <form mathod="post" action="{{route('Cart')}}">

                        <input type="hidden" name="id" value="{{$pack->id }}"/>
                        <input type="hidden" name="qty" value="1"/>
                        <input type="hidden" name="role" value="2"/>
                        <button type="submit"class="button button-ps">Add to Cart</button>
                        </form>
                      
                    </div>
                  @endforeach
                </div>
                <div class="centered">
                    <p class="price-text">We Offer Custom Plans. Contact Us For More Info.</p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>
        </div>
        <!-- Price section end -->
        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Newsletter</h3>
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>A mango is a juicy stone fruit produced from numerous species of tropical trees belonging to the flowering plant genus Mangifera, cultivated mostly for their edible fruit. Most of these species are found in nature as wild mangoes.</p>
                    </div>
                    <div class="span7">
                        <form class="inline-form">
                            <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required />
                            <button id="subscribe" class="button button-sp">Subscribe</button>
                        </form>
                        <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
                    </div>
                </div>
            </div>
        </div>
@endsection

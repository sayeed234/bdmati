@extends('font.master')
@section('title')
Bdmati.com || {{$categorys->category}}
@endsection
@section('content')

 <div id="home">

 <div  style="background:#f7e816;">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
              
<div class="container-fluid">

             <img src="{{asset($categorys->image)}}" style="height:350px;width:100%">
             <img src="{{asset($categorys->image)}}" style="height:350px;width:100%">
       
        </div>
        </div>
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>{{$categorys->category}} </h1>
                    <p style="color:red"><b>{{$categorys->quota}}</b></p>

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
               
            </div>
        </div>
        <!-- Price section end -->
    
@endsection

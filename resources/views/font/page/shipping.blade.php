@extends('font.master')
@section('title')
My Address || Family Fruits 
@endsection
@section('content')
 <div id="price" class="section secondary-section">
            <div class="container">
                <div class="row" style="margin-top:-80px;">
                   <div class="price-table row-fluid"> 
                    <div class="span4 price-column">
                    <br><br>
                    <table class="table table-bordered table-light ">
                    <tbody style="color:gray;">
                     
                         <tr>
                        <td>Subtotal</td>
                        <td>{{Cart::getTotal()}} ৳</td>
                        </tr>
                        <tr>
                        <td>Shipping</td>
                        <td>75 ৳</td>
                        </tr>
                       
                         <tr>
                        <td>Total </td>
                        <td>{{session::get('total')}} ৳</td>
                        </tr>
                         <tr>
                        <td><b>Payble Total</b></td>
                        <td><b>{{session::get('total')}} ৳</b></td>
                        </tr>
                    </tbody>
                    </table>
                       
                    </div>
                     <div class="span8 price-column">
              
                        <h3>My Cart ( {{Cart::getTotalQuantity()}} Item ) </h3>
                           @if (session('mobi'))
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> Please Enter Valid Phone Number!!!!</strong>
              </div>
        @endif
                         <br>
                          <form action="{{url('/shipping/store')}}" method="post" class="inline-form" style="padding-left:50px;padding-right:50px;">
                            @csrf
                            <input type="text" name="name" class="span12" placeholder="Enter your Name" required />

                            <input type="email" name="email" id="nlmail" class="span6" placeholder="Enter your email" />

                              <input type="number" name="phone" class="span6" placeholder="Enter your Phone" required />

                            <select class="span6" required name="division">
                           <option value="">Select Your Division</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Barisal">Barisal</option>
                            </select>

                        <select class="span6" required name="district">
                            <option value="">Select Your district </option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Kishoreganj">Kishoreganj </option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Manikganj">Manikganj </option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Narayanganj">Narayanganj </option>
                            <option value="Narsingdi">Narsingdi </option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Shariatpur ">Shariatpur </option>
                            <option value="Tangail">Tangail</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Bogra">Bogra</option>
                            <option value="Chapainawabganj">Chapainawabganj</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Natore">Natore</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Lalmonirhat ">Lalmonirhat </option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="KhulnMaguraa">Magura</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Narail">Narail</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Feni">Feni</option>
                            <option value="Khagrachhari">Khagrachhari</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            </select>


                           <input type="text" required name="address" class="span12" placeholder="Enter your Shipping Address" />

                         <button class="btn btn-lg btn-warning" type="submit">Continue Payment</button>
                        </form>
                      
                      
                    </div>
            
                </div>
           
                   
                </div>
            </div>
            <br>   
        </div>
@endsection
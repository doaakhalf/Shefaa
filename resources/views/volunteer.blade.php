

@extends('layoutes.layoutes')

@section('content')
  <!--== Page Title Start ==-->
  <section class="default-bg" style="padding-top:23px;padding-bottom:29px">
  	<div class="container">
    	<div class="row white-color">
        	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table" style="height:30px;">
             
              
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right text-xs-left xs-mt-10">
             	<div class="v-align-middle text-right text-xs-center">
                	<!-- <h1 class="text-uppercase mb-0 font-600 font-20px line-height-26 mt-0">Service Boxes</h1> -->
                </div>
             </div>
           </div>
        </div>
  </section>
  <!--== Page Title End ==-->
<section class="white-bg" style="    background-image: url(website/images/te.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
    <div class="container">
 
    	 <div class="row tabs-style-02">
          <div class="col-md-12">
            <div class="light-tabs">
              <!--== Nav tabs ==-->
              <ul style="    background-color: aliceblue;" class="nav nav-tabs text-center" role="tablist">
                <li role="presentation" class=""><a href="#Donation" role="tab" data-toggle="tab" aria-expanded="false"><p style="color:red">{{$donationCount}}</p>Donation Requests</a></li>
                <li role="presentation" class=""><a href="#Request" role="tab" data-toggle="tab" aria-expanded="false"><p style="color:red">{{$requestCount}}</p>Medication Request</a></li>
                <li role="presentation" class=""><a href="#receivedDonation" role="tab" data-toggle="tab" aria-expanded="false"><p style="color:red">{{$donationAcceptedCount}}</p>Received Donation</a></li>
                <li role="presentation" class=""><a href="#receivedRequest" role="tab" data-toggle="tab" aria-expanded="false"><p style="color:red">{{$requestAcceptedCount}}</p>Received Request</a></li>
               
              </ul>
              @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

              <!--== Tab panes ==-->
              <div class="tab-content text-center">
                <div role="tabpanel" class="tab-pane fade" id="Donation">
                 <!-- start -->
                 <div class="row mt-50">
                 @foreach($donationRequests as $don)
                  <div class="col-md-4" style="margin-bottom: 10px;">
                   <div class="post wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                   <div class="post-info grey-bg">
                     <h3 style="    padding-top: 12px;"><a href="blog-grid.html"><span style="color:red">Benifactor Name:</span>{{$don->benifactor->name}}</a></h3>
                        <h6><span style="color:black">Address:</span>{{$don->address}}</h6>
                      <h6><span style="color:black">Phone:</span>0{{$don->benifactor->phonenumber}}</h6>
                      <hr>
                        <!-- <p class="mt-10"> <span> <a class="extras-wrap" href="#"><i class="ion-ios-chatboxes-outline"></i><span>5 Comments</span></a> <span class="extras-wrap"><i class="ion-ios-time-outline"></i><span>5 Minutes</span></span> </span> </p> -->
                      <form method="post" action="{{url('accept_request_donation')}}">
                    @csrf
                      <input type="hidden" value="{{$don->id}}" name="donation_process">
                    
                        <button style="margin-bottom: 10px;    background-color: #5c9eb9;color: white;padding: 5px 5px;"  type="submit" class="" href=""><span>Accept Request</span></button> </div>
                    </form>
                    </div>
                  </div>
                 <!--== Post End ==-->
                   @endforeach

      </div>
                 <!-- end -->
                </div>
                <!-- start tab2 -->
                <div role="tabpanel" class="tab-pane fade" id="Request">
               
                 <!-- start -->
                 <div class="row mt-50">
                 @foreach($patientRequests as $req)
                  <div class="col-md-4" style="margin-bottom: 10px;">
                   <div class="post wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                   <div class="post-info grey-bg">
                     <h3 style="    padding-top: 12px;"><a href="blog-grid.html"><span style="color:red">Patient Name:</span>{{$req->patient->name}}</a></h3>
                        <h6><span style="color:black">Address:</span>{{$req->patient->address}}</h6>
                      <h6><span style="color:black">Phone:</span>0{{$req->patient->phonenumber}}</h6>
                      <hr>
                        <!-- <p class="mt-10"> <span> <a class="extras-wrap" href="#"><i class="ion-ios-chatboxes-outline"></i><span>5 Comments</span></a> <span class="extras-wrap"><i class="ion-ios-time-outline"></i><span>5 Minutes</span></span> </span> </p> -->
                      <form method="post" action="{{url('accept_request_medication')}}">
                    @csrf
                      <input type="hidden" value="{{$req->id}}" name="request_id">
                    
                        <button style="margin-bottom: 10px;    background-color: #5c9eb9;color: white;padding: 5px 5px;" type="submit" class="readmore" href=""><span>Accept Request</span></button> </div>
                    </form>
                    </div>
                  </div>
                 <!--== Post End ==-->
                   @endforeach

      </div>
                 <!-- end -->
                </div>

<!-- end tab2 -->
                <div role="tabpanel" class="tab-pane fade" id="receivedRequest">
                 <!-- start -->
                 <div class="row mt-50">
                 @foreach($requestAccepted as $req)
                  <div class="col-md-4" style="margin-bottom: 10px;">
                   <div class="post wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                   <div class="post-info grey-bg">
                     <h3 style="    padding-top: 12px;"><a href="blog-grid.html"><span style="color:red">Patient Name:</span>{{$req->name}}</a></h3>
                        <h6><span style="color:black">Address:</span>{{$req->address}}</h6>
                      <h6><span style="color:black">Phone:</span>0{{$req->phonenumber}}</h6>
                      <hr>
                        <!-- <p class="mt-10"> <span> <a class="extras-wrap" href="#"><i class="ion-ios-chatboxes-outline"></i><span>5 Comments</span></a> <span class="extras-wrap"><i class="ion-ios-time-outline"></i><span>5 Minutes</span></span> </span> </p> -->
                        <h3>Fill Received Request Form</h3>
                      <form method="post" action="{{url('recive_request_medicine')}}" style=" padding-right: 41px;padding-left: 54px;">
                    @csrf
                      <input type="hidden" value="{{$req->req_process}}" name="req_process">
                      <input readonly style="color:black;border: 1px solid #3283b3" type="text"   class="form-input" name="date"  placeholder="Date"/>
                       
                     
                       
                       <input required type="text" class="form-input" style=" border: 1px solid #3283b3;"  name="address" id="address" placeholder="address"/>
                   
                       <span style="display: inline;">
  <input style="color:black;border: 1px solid #3283b3;    background-color: #55a5c3;" type="submit"  value=" submit form"/> 
</span>
                         </div>
                    </form>
                    </div>
                  </div>
                 <!--== Post End ==-->
                   @endforeach

      </div>
                 <!-- end -->
                </div>

<!-- //////////// -->
                <div role="tabpanel" class="tab-pane fade" id="receivedDonation">
                 <!-- start -->
                 <div class="row mt-50" id="alldonation">
                 @foreach($donationAccepted as $don)
                  <div class="col-md-4" style="margin-bottom: 10px;">
                   <div class="post wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                   <div class="post-info grey-bg">
                     <h3 style="    padding-top: 12px;"><a href="blog-grid.html"><span style="color:red">Benifactor Name:</span>{{$don->name}}</a></h3>
                        <h6><span style="color:black">Address:</span>{{$don->address}}</h6>
                      <h6><span style="color:black">Phone:</span>0{{$don->phonenumber}}</h6>
                      <hr>
                        <!-- <p class="mt-10"> <span> <a class="extras-wrap" href="#"><i class="ion-ios-chatboxes-outline"></i><span>5 Comments</span></a> <span class="extras-wrap"><i class="ion-ios-time-outline"></i><span>5 Minutes</span></span> </span> </p> -->
                     
     <h3>Fill Received Medication Form</h3>
                        <form method="post" action="{{url('recive_request_donation')}}" style=" padding-right: 41px;padding-left: 54px;">
                    @csrf
                      <input type="hidden" value="{{$don->don_process}}" style=" border: 1px solid #3283b3;" name="donation_process">
                     
                            <input readonly style="color:black;border: 1px solid #3283b3" type="text"   class="form-input" name="date"  placeholder="Date"/>
                       
                     
                       
                            <input required type="text" class="form-input" style=" border: 1px solid #3283b3;"  name="address" id="address" placeholder="address"/>
                        
                      <span style="display: inline;">
  <input style="color:black;border: 1px solid #3283b3;    background-color: #55a5c3;" type="submit"  value=" submit form"/> 
</span>
                      </form>

                   
                    
                      
                  
                    </div>
                  </div>
                  </div>
         
                 <!--== Post End ==-->
                   @endforeach
   

      </div>

    
                 <!-- end -->
                </div>
            
              </div>


            </div>
          </div>
        </div>
    </div>
  </section>
  <script src="{{asset('website/assets/js/jquery.min.js')}}"></script>

  <script>

  var today = new Date();

var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

var dateTime = date+' '+time;
// document.getElementsByClassName('dateNow').value=dateTime;
// document.querySelector("form[name='date']").value = dateTime;
$("input[name='date']").each(function() {
 console.log($(this.val));
    $(this).val(dateTime)
});
  </script>
  @endsection
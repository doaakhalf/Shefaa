
@extends('layoutes.layoutes')
@extends('layoutes.custom_donation')
@section('content')
  <!--== Page Title Start ==-->
 <!--== Page Title Start ==-->
 <section class="default-bg" style="padding-top:23px;padding-bottom:55px">
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
  <!--== Page Title End ==-->

  <!--== Service Boxes Style 01 Start ==-->
  <section class="pb-0" style="background-image: url(website/images/req.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;">
    <div class="container" style="margin-top:-70px">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10" style="width: 100%;">
                <i class="icofont icofont-magic font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Write New Medicine </h4>
              	<!-- <p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                  <form style="margin-top: 0px;" id="regForm" method="post" action="{{url('AddMedicine')}}">
 @csrf
  <!-- One "tab" for each step in the form: -->
  

 <input style="color: black;" type="text" name="name" placeholder="Add medicine Name" >
 <input style="color: black;" type="text" name="type" placeholder="Add medicine Type" >


  <div style="overflow:auto;">
    <div style="float:right;">
    
      <button style="color: black;background-color: #5c9eb9;" type="submit" id="nextBtn" >Submit</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
   
    
  </div>
</form>

          
       
           
              </div>
            </div>
            <!-- <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10">
                <i class="icofont icofont-globe-alt font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Development</h4>
              	<p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10">
                <i class="icofont icofont-headphone-alt font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Marketing</h4>
              	<p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </div> -->
        </div>
    </div>

  </section>
  <!--== Service Boxes Style 01 End ==-->

  






@endsection
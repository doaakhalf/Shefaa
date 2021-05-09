
@extends('layoutes.layoutes')

@section('content')

 <!--== Page Title Start ==-->
 <section class="default-bg" style="padding-top:23px;padding-bottom:28px">
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
<section class="white-bg pt-0 pb-0">
	   <div class="container-fluid">
      <div class="row row-flex service-box-style-02">

      @foreach($medicines as $med)
        <div class="col-md-3">
          <div class="col-inner bordered-bg dark-color feature-box border-right">
              <div class="icon-heading">
        				<i class="icofont icofont-magic font-40px default-color"></i>
        				<h5 class="text-uppercase">{{$med->name}}</h5>
              </div>
              <div class="hidden-content">
      				   <p>  <a href="{{url('donation_process')}}">Donate</a></p>
              </div>
          </div>
          </div>
@endforeach
       
  
    
      </div>
    </div>
  </section>
@endsection
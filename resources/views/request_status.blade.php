
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
      @foreach($myrequest as $request)
   
        <div class="col-md-3">
          <div class=" bordered-bg dark-color feature-box border-right">
        
          <p style="color:red">Date:{{$request->request_date}}</p>

          @if(!$request->volunteer_id)
          <i class="icofont icofont-magic font-40px default-color"></i>
          <p style="color:red">Status:Pending</p>
          
          @else
          <i class="icofont icofont-magic font-40px default-color"></i>
          <p style="color:red">Status:Accepted by Volunteer Name {{$request->volunteer->name}}</p>

          @endif
     

          <!-- <h3>Status:pen</h3> -->
      @foreach($request->medicationRequest as $req)
              <div class="">
        				<h5 class="text-uppercase"></h5>
                        <p>  Medicine:{{$req->medicine[0]->name}}</p>
                         <p>  quantity:{{$req->required_quantity}}</p>
              </div>
            
              @endforeach
      
          </div>
          </div>
          @endforeach
  
    
      </div>
    </div>
  </section>
@endsection
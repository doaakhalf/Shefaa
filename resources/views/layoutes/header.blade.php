



<!--== Header Start ==-->
<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full">

    <!--== Start Top Search ==-->
    <div class="fullscreen-search-overlay" id="search-overlay"> <a href="#" class="fullscreen-close" id="fullscreen-close-button"><i class="icofont icofont-close"></i></a>
        <div id="fullscreen-search-wrapper">
            <form method="get"  id="fullscreen-searchform">
                @csrf
              
                <input type="text" value="" name="search" placeholder="Search..." id="fullscreen-search-input" class="search-bar-top">
                <i class="fullscreen-search-icon icofont icofont-search">
                    <input value="" type="submit">
                </i>
            </form>
        </div>
    </div>
    <!--== End Top Search ==-->

    <div class="container">
        <!--== Start Attribute Navigation ==-->
        <div class="attr-nav hidden-xs sm-display-none">
            <ul class="social-media-dark social-top">
            @if((auth()->guard('benifactor')->user())||(auth()->guard('volunteer')->user())||(auth()->guard('patient')->user()))
           <li class="search"><a  class="dropdown-toggle" data-toggle="dropdown">welcome
           {{@(auth()->guard('benifactor')->user()->name)}}
                  {{@(auth()->guard('patient')->user()->name)}}
                  {{@(auth()->guard('volunteer')->user()->name)}}
</a> </li>
            <li> <a href="{{url('logout/')}}" class="dropdown-toggle" data-toggle="dropdown">Logout</a></li>

                @endif
               
            </ul>
        </div>
        <!--== End Attribute Navigation ==-->

        <!--== Start Header Navigation ==-->
        <div class="navbar-header">
            <div class="mobile-navbar">
                <div>
                    <div class="logo">
                        <a >  <img style="max-height: 130px;
       margin-top: -45px;" class="logo logo-display" src="{{asset('website/images/logo1.png')}}" alt="">
                            <img style="max-height: 130px;
    margin-bottom: -42px;" class="logo logo-scrolled" src="{{asset('website/images/logo1.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div style="display: flex">
                   
                  
                        
                        @if(@$count)
                        <span class="badge badge-light" style="background-color: red;border-radius: -42px;border-radius: 50px;height: 21px;/* width: 21px; */margin-top: 24px;margin-right: 6px;">0</span>
                        @endif
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="tr-icon ion-android-menu"></i> </button>
                </div>
            </div>

            <div class="logo mobile-hidden">
                <a href="{{url('/')}}"> <img class="logo logo-display" src="" alt="">
                    <img class="logo logo-scrolled" src="" alt="">
                </a>
            </div>

            {{--
                        <div class="search"><a href="#" id="search-button"><i class="icofont icofont-search"></i></a></div>
            --}}

        </div>
        <!--== End Header Navigation ==-->

        <!--== Collect the nav links, forms, and other content for toggling ==-->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
            @if((auth()->guard('benifactor')->user()))

                <li> <a href="{{url('donation_process')}}">Home</a></li>
                @endif
                @if((auth()->guard('patient')->user()))

<li> <a href="{{url('request_process')}}">Home</a></li>
@endif
@if((auth()->guard('volunteer')->user()))

<li> <a href="{{url('volunteer')}}">Home</a></li>
@endif
                <li><a href="{{url('about')}}">About</a></li>

                <li class="dropdown">
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown">polices</a> -->
                    <ul class="dropdown-menu">
              
                    </ul>
                </li>
                @if((auth()->guard('benifactor')->user()))

                <li><a href="{{url('requierdMedicine')}}">requestedMedicines</a></li>
              @endif
              @if((auth()->guard('benifactor')->user()))

<li><a href="{{url('newMedicine')}}">New Medicine</a></li>
@endif
@if((auth()->guard('benifactor')->user()))

<li><a href="{{url('myDonation')}}">Donation Status</a></li>
@endif     
@if((auth()->guard('patient')->user()))

<li><a href="{{url('myRequest')}}">my Request Status</a></li>

@endif   

<li><a href="{{url('dataManagement')}}">Data Management</a></li>

                <!-- <li><a href="">Contact</a></li> -->
                @if((auth()->guard('benifactor')->user())||(auth()->guard('volunteer')->user())||(auth()->guard('patient')->user()))

                    <li class="dropdown"> 
                       
                    
                  
                        
                    
                        <ul class="dropdown-menu">
                           
                        @if((auth()->guard('benifactor')->user())||(auth()->guard('volunteer')->user())||(auth()->guard('patient')->user()))
                         
                            <li> <a href="{{url('logout/')}}" class="dropdown-toggle" data-toggle="dropdown">Logout</a></li>
                        </ul>
                    </li>
                @endif
              

                    @endif
            </ul>
        </div>
        <!--== /.navbar-collapse ==-->
    </div>
</nav>
<!--== Header End ==-->
<style>
    
    .modal-backdrop{
        z-index:1 ;
    }
</style>
  <div class="modal fade" id="masuk"  role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Select Your choice</h4>
 </div>
<div class="modal-body">
    <a type="button" class="btn btn-color btn-md btn-default" href="" style=" margin-left: 50px;" > Complete Your Campaign </a>
    <!--{{@$count->id}}-->
    <a type="button" href="" class="btn btn-color btn-md btn-default m-t-10"> Save As A Draft  </a>
    </div>
<div class="modal-footer">
<button type="button" class="btn btn-primary m-t-10" data-dismiss="modal"> Close </button>
</div>
</div>
</div>
</div> 


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

<section class="signup" id="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content" style="    border-style: solid;
    border-width: 2px;
    border-color: #1f374c !important;
    padding: 34px 35px;">
   
 
                    <form method="POST" action="{{url('update')}}" id="signup-form" class="signup-form" >
                        @csrf
                        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
                      
                        <h2 class="form-title" style="margin-bottom: 26px;">Update Account</h2>
                      
                        <div class="form-group">
                           
                       
                          
                        </div>
                        <div class="form-group">
                         Name:<input type="text" style="color:black" class="form-input" name="name" id="name" value="{{$current_user->name}}" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">

                           Username:<input type="text" style="color:black" class="form-input" name="username" id="username" value="{{$current_user->username}}" placeholder="Your User Name" required/>
                        </div>
                        <div class="form-group">
                            Phone Number<input type="text" style="color:black" class="form-input" name="phonenumber" id="phone" value="{{$current_user->phonenumber}}" placeholder="Your phone number" required/>
                        </div>
                        <div class="form-group">
                           
                        Password<input style="color:black" type="text" class="form-input" name="password" id="password" placeholder="Password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                        <h5 id="passErr"></h5>
                        Password Confirmation<input  style="color:black" type="password" class="form-input" onchange="match()" name="re_password" id="re_password"  placeholder="Repeat your password"/>
                        </div>
                      
                      
                        @if($current_user->getTable()=="volunteers")
                        <div class="form-group">
                            Birth Date<input  style="color:black" type="date" style="display:none" value="" class="form-input"  name="birthdate" id="birthdate" placeholder="Your Birth date"/>
                        </div>
                   
                        @else
                       

                        <div class="form-group">
                           Address:<select style="color:black" class="form-input" name="address"  id="address" value="{{$current_user->address}}" style="display:none" required>
                                <option value="" disabled selected hidden>Select city</option>
                                <option value="cairo">cairo</option>
                                <option value="Fayoum">Fayoum</option>
                                <option value="Giza">Giza</option>
                            </select>
                          
                        </div>
                        @endif
             
                        
                        <div class="form-group">
                            <input style="color:black;background-color:#019bba;"  type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                  
                </div>
            </div>
        </section>
<
        @endsection
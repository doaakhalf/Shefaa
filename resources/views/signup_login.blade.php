<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shefaa Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="website/images/logo1.png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="website/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="website/css/style.css">
    <style>
    #overlay {
  position: fixed; /* Sit on top of the page content */
 /* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
  z-index: 0; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
    </style>
</head>
<body>
<div id="overlay"></div>
    <div class="main" style="    margin-top: -70px;">

        <section class="signup" id="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
 
                    <form method="POST" action="{{url('register')}}" id="signup-form" class="signup-form" >
                        @csrf
                        <img style="max-height: 130px;
    margin-bottom: -88px;" class="logo logo-scrolled" src="{{asset('website/images/logo1.png')}}" alt="">
                        <h2 class="form-title" style="margin-bottom: 26px;">Create New Account</h2>
                        <p class="loginhere" style="margin-top: 0px;">
                        Have already an account ? <a href="#signin" onclick="signin()" class="loginhere-link">Login here</a>
                    </p>
                        <div class="form-group">
                            <select class="form-input" onchange="showcolum()" name="type" id="type" required>
                                <option value="" disabled selected hidden>Register AS</option>
                                <option value="patient">Patient</option>
                                <option value="volunteer">Volunteer</option>
                                <option value="benifactor">Benifactor</option>
                            </select>
                          
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-input" name="username" id="username" placeholder="Your User Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phonenumber" id="phone" placeholder="Your phone number" required/>
                        </div>
                        <div class="form-group">
                           
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                        <h5 id="passErr"></h5>
                            <input type="password" class="form-input" onchange="match()" name="re_password" id="re_password" required placeholder="Repeat your password"/>
                        </div>
                      
                        <div class="form-group">
                            <input type="date" style="display:none" value="" class="form-input"  name="birthdate" id="birthdate" placeholder="Your Birth date"/>
                        </div>
                        <div class="form-group">
                            <select class="form-input" name="address"  id="address" value="" style="display:none">
                                <option value="" disabled selected hidden>Select city</option>
                                <option value="cairo">cairo</option>
                                <option value="Fayoum">Fayoum</option>
                                <option value="Giza">Giza</option>
                            </select>
                          
                        </div>
             
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere" style="margin-top: 0px;">
                        Have already an account ? <a href="#signin" onclick="signin()" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

        <section class="signin" id="signin" style="display: none;">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" action="{{url('loginlogic')}}" class="signup-form">
                    @csrf
                    <img style="max-height: 130px;
    margin-bottom: -88px;" class="logo logo-scrolled" src="{{asset('website/images/logo1.png')}}" alt="">
                        <h2 class="form-title">Login Form</h2>
                        <div class="form-group">
                            <select class="form-input"  name="type" id="type" required>
                                <option value="" disabled selected hidden>Login AS</option>
                                <option value="patient">Patient</option>
                                <option value="volunteer">Volunteer</option>
                                <option value="benifactor">Benifactor</option>
                            </select>
                          
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Your username"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password1" placeholder="Password"/>
                            <span toggle="#password1" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <!-- <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div> -->
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="login"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Create New account ? <a onclick="signup()" href="#signup" class="loginhere-link">signup here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.validate.unobtrusive.min.js"></script>
    <script>
        function signin(){
           
            document.getElementById('signin').style.display="block";
            document.getElementById('signup').style.display="none";
                    }
                    function signup(){
           
           document.getElementById('signin').style.display="none";
           document.getElementById('signup').style.display="block";
                   }
                   function showcolum(){
                       let user= document.getElementById('type').value;
                       if(user=="volunteer"){
                        document.getElementById('birthdate').style.display="block";
           document.getElementById('address').style.display="none";
                       
                       }
                       else{
                   
                        document.getElementById('birthdate').style.display="none";
           document.getElementById('address').style.display="block";
           
                       }

                   }
                   function match(){
                    let password= document.getElementById('password').value;
                    let repassword= document.getElementById('re_password').value;
                   
                    if(password!=repassword)
                    {
                       
                        document.getElementById('passErr').innerHTML="password not match";
                        return false;
                    
                    }
                    else{
                        document.getElementById('passErr').innerHTML="";
                        return true;
                    }
}

    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
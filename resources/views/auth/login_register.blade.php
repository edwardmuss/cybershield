@extends('layouts.auth')
@section( 'title', "Login Register" )
@section( 'description', 'In order to register for a conference/event at Daystar Conferences, you have to create an account and login for you to procceed the conference registration')
@section( 'image', "https://www.daystar.ac.ke/images/home/home-apply.jpg" )


@section('content')
    {{-- @include('partials.guest.header') --}}
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script> --}}
    <!-- BOOTSTRAP CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css') }}" media="all"/> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
    
    <style>

    
    /**
    * Page background
    */
    .user {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: center;
            justify-content: center;
    -webkit-box-align: center;
            align-items: center;
    width: 100%;
    height: 100vh;
    background: url("https://www.daystar.ac.ke/images/home/subfooter-1.jpg") no-repeat center;
    background-size: cover;
    }
    .error {
        color:red;
        padding-bottom: 10px;
    }

    </style>

    <!--Banner Inner-->
    <section style="display: none">
        <div class="lgx-banner lgx-banner-inner" style="background-image: url('https://www.daystar.ac.ke/images/home/subfooter-1.jpg'), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)); background-blend-mode: overlay; background-position:bottom">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">Login Register</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Login/Register</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->

      <div class="wrapper">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Whoops!</strong> There were problems with input:
                <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

        <div class="alerts">
            @include('includes.flash_message')
        </div>
      <div class="title-text">
        <div class="title login">Login</div>
        <div class="title signup">Signup</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form class="login" name="login" role="form" method="POST" action="{{ url('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="field">
              <input type="email" name="email" placeholder="Email" required autofocus value="{{ old('email') }}" />
            </div>
            <br>
            <div class="field">
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <br>
            <div class="pass-link"><a href="{{ route('auth.password.reset') }}">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <form class="signup" name="registration" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="field">
              <input type="text" placeholder="Title (e.g Prof.)" class="forms_field-input" name="title" value="{{ old('title') }}" required />
                @if ($errors->has('title'))
                    <span class="error">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="field">
              <input type="text" placeholder="First Name" class="forms_field-input" name="first_name" value="{{ old('first_name') }}" required />
                @if ($errors->has('first_name'))
                    <span class="error">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="field">
              <input type="text" placeholder="Last Name" class="forms_field-input" name="last_name" value="{{ old('last_name') }}" required />
                @if ($errors->has('last_name'))
                    <span class="error">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="field">
              @php $genders = ['Male','Female'] @endphp
              <select id="gender" name="gender" class="form-control" required>
                @foreach($genders as $gender)
                    <option value="{{ $gender  }}">{{ $gender  }}</option>
                @endforeach
              </select>
              @if ($errors->has('gender'))
                  <span class="error">
                      <strong>{{ $errors->first('gender') }}</strong>
                  </span>
              @endif
            </div>

            <div class="field">
              <input type="text" class="form-control" id="institution" name="institution" placeholder="Institution/Organisation" required>
              @if ($errors->has('institution'))
                    <span class="error">
                        <strong>{{ $errors->first('institution') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
              <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
              @if ($errors->has('designation'))
                    <span class="error">
                        <strong>{{ $errors->first('designation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
              <select id="country2" class="select2 form-control" placeholder="Country" required>
                @foreach($countries as $country)
                    <option value="{{ $country->name . ',' . $country->phonecode }}">{{ $country->name . ' (+' . $country->phonecode . ')' }}</option>
                @endforeach
              </select>
              @if ($errors->has('country'))
                  <span class="error">
                      <strong>{{ $errors->first('country') }}</strong>
                  </span>
              @endif
            </div>

            <div class="field">
              <div class="input-group">
                  <span class="input-group-addon" id="phonecode"></span>
                  <input type="tel" id="phone1" name="phone" class="form-control" value="{{ old('phone') }}" required>
              </div>
              
              
            </div>

              <input type="hidden" name="code" id="code">
              <input type="hidden" name="country" id="country">

			    <div class="field">
            <input type="email" name="email" placeholder="Email" class="forms_field-input" value="{{ old('email') }}" required />
              {{-- @if ($errors->has('email'))
                  <span class="error">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif --}}
            </div>
			    <div class="field">
            <input type="password" placeholder="Password" name="password" class="forms_field-input" value="{{ old('password') }}" required />
            @if ($errors->has('password'))
                <span class="error">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
			    <div class="field">
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="forms_field-input" name="password_confirmation" required>
            @if ($errors->has('password-confirm'))
                <span class="error">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                </span>
            @endif
          </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup">
            </div>
            <div class="signup-link">Already have an account? <a href="{{ route('auth.login') }}">Login Here</a></div>
            
          </form>
        </div>
      </div>
    </div>

    <script>

      window.onload = function() {
        $('.select2').select2();
          var countryCode = $('#country2').val();
          var phone = $('#phone1').val();
          var country = countryCode.split(',')[0];
          var phonecode = '+' + countryCode.split(',')[1];
          $('#phonecode').html(phonecode);
          $('#code').val(phonecode);
          $('#country').val(country);
      };

      $(document).ready(function(){
            $('.select2').select2();
            $('#country2').on("select2:select", function(e) { 
            var countryCode = this.value;
            var phone = $('#phone1').val();
            var country = countryCode.split(',')[0];
            var phonecode = '+' + countryCode.split(',')[1];
            $('#phonecode').html(phonecode);
            $('#phone').val(phonecode + phone);
            $('#code').val(phonecode);
            $('#country').val(country);
          });
      });
  </script>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>
    <script>
        $(function() {
           $("form[name='login']").validate({
             rules: {
               
               email: {
                 required: true,
                 email: true
               },
               password: {
                 required: true,
                 
               }
             },
              messages: {
               email: "Please enter a valid email address",
              
               password: {
                 required: "Please enter password",
                
               }
               
             },
             submitHandler: function(form) {
               form.submit();
             }
           });
         });
         


        $(function() {
          
          $("form[name='registration']").validate({
            rules: {
              title: "required",
              first_name: "required",
              last_name: "required",
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 6
              }
            },
            
            messages: {
              title: "Please enter your firstname",
              first_name: "Please enter your firstname",
              last_name: "Please enter your lastname",
              password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
              },
              email: "Please enter a valid email address"
            },
          
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
    </script>
@endsection

@extends('layouts.auth')
@section( 'title', "Register" )
@section( 'description', 'In order to register for a conference/event at Daystar Conferences, you have to create an account and login for you to procceed the conference registration')
@section( 'image', "https://www.daystar.ac.ke/images/home/home-apply.jpg" )


@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
    
    <style>
    .error {
        color:red;
        padding-bottom: 10px;
    }

    </style>

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
      </div>
      <div class="form-container">
        <div class="form-inner">
          <form class="login" name="login" role="form" method="POST" action="{{ url('login') }}">
			<div class="signup-link">Not a member? <a href="{{ route('auth.register') }}">Signup now</a></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="field">
				<label for="">Your Email Address</label>
              <input type="email" name="email" placeholder="Email" required autofocus value="{{ old('email') }}" />
            </div>
            <br>
            <div class="field">
				<label for="">Your Password</label>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <br>
            <div class="pass-link"><a href="{{ route('auth.password.reset') }}">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="{{ route('auth.register') }}">Signup now</a></div>
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
       
    </script>
@endsection

@extends('layouts.guest')
@section( 'title', "Login Register" )
@section( 'description', 'In order to register for a conference/event at Daystar Conferences, you have to create an account and login for you to procceed the conference registration')
@section( 'image', "https://www.daystar.ac.ke/images/home/home-apply.jpg" )


@section('content')
    @include('partials.guest.header')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <style>

    * {
    box-sizing: border-box;
    }

    body {
    font-family: "Montserrat", sans-serif;
    font-size: 12px;
    line-height: 1em;
    }

    button {
    background-color: transparent;
    padding: 0;
    border: 0;
    outline: 0;
    cursor: pointer;
    }

    input {
    background-color: transparent;
    padding: 0;
    border: 0;
    outline: 0;
    }
    input[type="submit"] {
    cursor: pointer;
    }
    input::-webkit-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
    }
    input::-moz-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
    }
    input:-ms-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
    }
    input::-ms-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
    }
    input::placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
    }

    /**
    * Bounce to the left side
    */
    @-webkit-keyframes bounceLeft {
    0% {
        -webkit-transform: translate3d(100%, -50%, 0);
                transform: translate3d(100%, -50%, 0);
    }
    50% {
        -webkit-transform: translate3d(-30px, -50%, 0);
                transform: translate3d(-30px, -50%, 0);
    }
    100% {
        -webkit-transform: translate3d(0, -50%, 0);
                transform: translate3d(0, -50%, 0);
    }
    }
    @keyframes bounceLeft {
    0% {
        -webkit-transform: translate3d(100%, -50%, 0);
                transform: translate3d(100%, -50%, 0);
    }
    50% {
        -webkit-transform: translate3d(-30px, -50%, 0);
                transform: translate3d(-30px, -50%, 0);
    }
    100% {
        -webkit-transform: translate3d(0, -50%, 0);
                transform: translate3d(0, -50%, 0);
    }
    }
    /**
    * Bounce to the left side
    */
    @-webkit-keyframes bounceRight {
    0% {
        -webkit-transform: translate3d(0, -50%, 0);
                transform: translate3d(0, -50%, 0);
    }
    50% {
        -webkit-transform: translate3d(calc(100% + 30px), -50%, 0);
                transform: translate3d(calc(100% + 30px), -50%, 0);
    }
    100% {
        -webkit-transform: translate3d(100%, -50%, 0);
                transform: translate3d(100%, -50%, 0);
    }
    }
    @keyframes bounceRight {
    0% {
        -webkit-transform: translate3d(0, -50%, 0);
                transform: translate3d(0, -50%, 0);
    }
    50% {
        -webkit-transform: translate3d(calc(100% + 30px), -50%, 0);
                transform: translate3d(calc(100% + 30px), -50%, 0);
    }
    100% {
        -webkit-transform: translate3d(100%, -50%, 0);
                transform: translate3d(100%, -50%, 0);
    }
    }
    /**
    * Show Sign Up form
    */
    @-webkit-keyframes showSignUp {
    100% {
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
    }
    }
    @keyframes showSignUp {
    100% {
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
    }
    }
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
    .user_options-container {
    position: relative;
    width: 80%;
    }
    .user_options-text {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
            justify-content: space-between;
    width: 100%;
    background-color: rgba(2, 174, 238, 0.85);
    border-radius: 3px;
    }

    /**
    * Registered and Unregistered user box and text
    */
    .user_options-registered,
    .user_options-unregistered {
    width: 50%;
    padding: 75px 45px;
    color: #fff;
    font-weight: 300;
    }

    .user_registered-title,
    .user_unregistered-title {
    margin-bottom: 15px;
    font-size: 1.66rem;
    line-height: 1em;
    color:#fff
    }

    .user_unregistered-text,
    .user_registered-text {
    /* font-size: 0.83rem; */
    line-height: 1.4em;
    color:#fff
    }

    .user_registered-login,
    .user_unregistered-signup {
    margin-top: 30px;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 10px 30px;
    color: #fff;
    text-transform: uppercase;
    line-height: 1em;
    letter-spacing: 0.2rem;
    -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }
    .user_registered-login:hover,
    .user_unregistered-signup:hover {
    color: rgba(34, 34, 34, 0.85);
    background-color: #ccc;
    }

    /**
    * Login and signup forms
    */
    .user_options-forms {
    position: absolute;
    top: 50%;
    left: 30px;
    width: calc(50% - 30px);
    min-height: 500px;
    background-color: #fff;
    /* background-color: rgba(255, 255, 255, 0.9); */
    border-radius: 3px;
    box-shadow: 2px 0 15px rgba(0, 0, 0, 0.25);
    overflow: auto;
    -webkit-transform: translate3d(100%, -50%, 0);
            transform: translate3d(100%, -50%, 0);
    -webkit-transition: -webkit-transform 0.4s ease-in-out;
    transition: -webkit-transform 0.4s ease-in-out;
    transition: transform 0.4s ease-in-out;
    transition: transform 0.4s ease-in-out, -webkit-transform 0.4s ease-in-out;
    }
    .user_options-forms .user_forms-login {
    -webkit-transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
    }
    .user_options-forms .forms_title {
    margin-bottom: 45px;
    font-size: 1.5rem;
    font-weight: 500;
    line-height: 1em;
    text-transform: uppercase;
    color: #02aeee;
    letter-spacing: 0.1rem;
    }
    .user_options-forms .forms_field:not(:last-of-type) {
    margin-bottom: 20px;
    }
    .user_options-forms .forms_field-input {
    width: 100%;
    border-bottom: 1px solid #ccc;
    padding: 6px 20px 6px 6px;
    font-family: "Montserrat", sans-serif;
    font-size: 1rem;
    font-weight: 300;
    color: gray;
    letter-spacing: 0.1rem;
    -webkit-transition: border-color 0.2s ease-in-out;
    transition: border-color 0.2s ease-in-out;
    }
    .user_options-forms .forms_field-input:focus {
    border-color: gray;
    }
    .user_options-forms .forms_buttons {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
            justify-content: space-between;
    -webkit-box-align: center;
            align-items: center;
    margin-top: 35px;
    }
    .user_options-forms .forms_buttons-forgot {
    font-family: "Montserrat", sans-serif;
    letter-spacing: 0.1rem;
    color: #ccc;
    text-decoration: underline;
    -webkit-transition: color 0.2s ease-in-out;
    transition: color 0.2s ease-in-out;
    }
    .user_options-forms .forms_buttons-forgot:hover {
    color: #b3b3b3;
    }
    .user_options-forms .forms_buttons-action {
    background-color: #02aeee;
    border-radius: 3px;
    padding: 10px 35px;
    font-size: 1rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    -webkit-transition: background-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out;
    }
    .user_options-forms .forms_buttons-action:hover {
    background-color: #02aeee;
    }
    .user_options-forms .user_forms-signup,
    .user_options-forms .user_forms-login {
    position: absolute;
    top: 70px;
    left: 40px;
    width: calc(100% - 80px);
    opacity: 0;
    visibility: hidden;
    -webkit-transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, -webkit-transform 0.5s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, -webkit-transform 0.5s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out, -webkit-transform 0.5s ease-in-out;
    }
    .user_options-forms .user_forms-signup {
    -webkit-transform: translate3d(120px, 0, 0);
            transform: translate3d(120px, 0, 0);
    }
    .user_options-forms .user_forms-signup .forms_buttons {
    -webkit-box-pack: end;
            justify-content: flex-end;
    }
    .user_options-forms .user_forms-login {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
    opacity: 1;
    visibility: visible;
    }

    /**
    * Triggers
    */
    .user_options-forms.bounceLeft {
    -webkit-animation: bounceLeft 1s forwards;
            animation: bounceLeft 1s forwards;
    }
    .user_options-forms.bounceLeft .user_forms-signup {
    -webkit-animation: showSignUp 1s forwards;
            animation: showSignUp 1s forwards;
    }
    .user_options-forms.bounceLeft .user_forms-login {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translate3d(-120px, 0, 0);
            transform: translate3d(-120px, 0, 0);
    }
    .user_options-forms.bounceRight {
    -webkit-animation: bounceRight 1s forwards;
            animation: bounceRight 1s forwards;
    }


    /**
    * Responsive 990px
    */
    @media screen and (max-width: 990px) {
    .user_options-forms {
        min-height: 350px;
    }
    .user_options-forms .forms_buttons {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
                flex-direction: column;
    }
    .user_options-forms .user_forms-login .forms_buttons-action {
        margin-top: 30px;
    }
    .user_options-forms .user_forms-signup,
    .user_options-forms .user_forms-login {
        top: 40px;
    }

    .user_options-registered,
    .user_options-unregistered {
        padding: 50px 45px;
    }
    }

    input::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
    color: #444;
    font-size: 16px;
    }
    input:-moz-placeholder,
    textarea:-moz-placeholder {
    color: #444;
    font-size: 16px;
    }
    input::-moz-placeholder,
    textarea::-moz-placeholder {
    color: #444;
    font-size: 16px;
    }
    input:-ms-input-placeholder,
    textarea:-ms-input-placeholder {
    color: #444;
    font-size: 16px;
    }
    .error {
        color:red
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
    <div class="alerts">
        @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were problems with input:
                  <br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            @include('includes.flash_message')
    </div>

    <section class="user">
        <div class="user_options-container">
          <div class="user_options-text col-xs-12">
            <div class="user_options-unregistered">
              <h2 class="user_unregistered-title">Don't have an account?</h2>
              <p class="user_unregistered-text">Sign up in order to register conferences and track the progress</p>
              <button class="user_unregistered-signup" id="signup-button">Sign up</button>
            </div>
      
            <div class="user_options-registered">
              <h2 class="user_registered-title">Already have an account?</h2>
              <p class="user_registered-text">Login in order to register for conferences and track the progress</p>
              <button class="user_registered-login" id="login-button">Login</button>
            </div>
          </div>
          
          <div class="user_options-forms col-xs-12" id="user_options-forms">
            <div class="user_forms-login">
              <h2 class="forms_title">Login</h2>
              <form class="forms_form" name="login" role="form" method="POST" action="{{ url('login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset class="forms_fieldset">
                  <div class="forms_field">
                    <input type="email" name="email" placeholder="Email" class="forms_field-input" required autofocus2 value="{{ old('email') }}" />
                  </div>
                  <div class="forms_field">
                    <input type="password" name="password" placeholder="Password" class="forms_field-input" required />
                  </div>
                </fieldset>
                <div class="forms_buttons">
                  {{-- <button type="button" class="forms_buttons-forgot">Forgot password?</button> --}}
                  <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                  <input type="submit" value="Log In" class="forms_buttons-action">
                </div>
              </form>
            </div>
            <div class="user_forms-signup">
              <h2 class="forms_title">Sign Up</h2>
              <form class="forms_form" name="registration" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <fieldset class="forms_fieldset">
                  <div class="forms_field form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <input type="text" placeholder="Title (e.g Prof.)" class="forms_field-input" name="title" value="{{ old('title') }}" required />
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="forms_field form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <input type="text" placeholder="First Name" class="forms_field-input" name="first_name" value="{{ old('first_name') }}" required />
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="forms_field form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <input type="text" placeholder="Last Name" class="forms_field-input" name="last_name" value="{{ old('last_name') }}" required />
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="forms_field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" placeholder="Email" class="forms_field-input" value="{{ old('email') }}" required />
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="forms_field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" placeholder="Password" name="password" class="forms_field-input" value="{{ old('password') }}" required />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="forms_field">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="forms_field-input" name="password_confirmation" required>
                    
                  </div>
                </fieldset>
                <div class="forms_buttons mb-5">
                  <input type="submit" value="Sign up" class="forms_buttons-action btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <script>
        /**
         * Variables
         */
        const signupButton = document.getElementById('signup-button'),
            loginButton = document.getElementById('login-button'),
            userForms = document.getElementById('user_options-forms')

        /**
         * Add event listener to the "Sign Up" button
         */
        signupButton.addEventListener('click', () => {
        userForms.classList.remove('bounceRight')
        userForms.classList.add('bounceLeft')
        }, false)

        /**
         * Add event listener to the "Login" button
         */
        loginButton.addEventListener('click', () => {
        userForms.classList.remove('bounceLeft')
        userForms.classList.add('bounceRight')
        }, false)

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

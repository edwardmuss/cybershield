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

        {{-- <div class="alerts">
            @include('includes.flash_message')
        </div> --}}
      <div class="title-text">
        <div class="title signup">Register</div>
      </div>
      
      <div class="form-container">
        <div class="form-inner">
          <form class="signup" name="registration" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="signup-link">Already have an account? <a href="{{ route('auth.login') }}">Login Here</a></div>
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
              <label for="gender">Gender</label>
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
              <input type="text" class="form-control" id="institution" name="institution" placeholder="Institution/Organisation" value="{{ old('institution') }}" required>
              @if ($errors->has('institution'))
                    <span class="error">
                        <strong>{{ $errors->first('institution') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
              <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="{{ old('designation') }}" required>
              @if ($errors->has('designation'))
                    <span class="error">
                        <strong>{{ $errors->first('designation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
              <select id="country2" class="select2 form-control" placeholder="Country" required>
                @foreach($countries as $country)
                    <option @selected($country->name == "Kenya") value="{{ $country->name . ',' . $country->phonecode }}">{{ $country->name . ' (+' . $country->phonecode . ')' }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('country'))
                  <span class="error">
                      <strong>{{ $errors->first('country') }}</strong>
                  </span>
              @endif

            <div class="field">
              <div class="input-group">
                  <span class="input-group-addon" id="phonecode"></span>
                  <input type="tel" id="phone1" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="712 345 678" required>
              </div>
              
              
            </div>

              <input type="hidden" name="code" id="code">
              <input type="hidden" name="country" id="country">

              <div class="field">
                <label for="">Select the conference to register </label>
                <select id="event_id" name="event_id" class="select2 form-control" placeholder="Conference">
                    <option value="">Select Conference</option>
                    <option value="">I don't want to register now</option>
                    @foreach($upcoming_events as $event)
                        <option @if(isset($_GET['eid'])) @selected($_GET['eid'] == $event->id) @endif value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
              </div>
              <br>

              <div class="field">
                <label for="">Select the ticket </label>
                <select id="ticket_id" name="ticket_id" class="select2 form-control" placeholder="Country">
                </select>
              </div>
              <br>

              <div class="field">
                <input type="text" class="form-control" id="reference" name="reference" placeholder="Payment Reference" value="{{ old('reference') }}">
                @if ($errors->has('reference'))
                      <span class="error">
                          <strong>{{ $errors->first('reference') }}</strong>
                      </span>
                  @endif
              </div>

            <div class="field">
            <input type="email" name="email" placeholder="Email" class="forms_field-input" value="{{ old('email') }}" required />
              @if ($errors->has('email'))
                  <span class="error">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
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
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="forms_field-input" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            @if ($errors->has('password-confirm'))
                <span class="error">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                </span>
            @endif
          </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Register">
            </div>
            <div class="signup-link">Already have an account? <a href="{{ route('auth.login') }}">Login Here</a></div>
            
          </form>
         
        </div>
      </div>
    </div>
    <br><br>

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

          var id = $('#event_id').val();
          getTicket(id);
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

          $('#event_id').on("select2:select", function(e) { 
                var id = this.value;
                getTicket(id);
          });
          
      });

      function getTicket(id){
        
        $("#ticket_id").empty(); // clear the select first
        
        $.ajax({
                type: "POST",
                url: "registerjson",
                data: {
                    id: id,
                    '_token': $('input[name=_token]').val()
                },
            }).done(function(data){
                var len = 0;
                if (data != null) {

                    len = data.length;

                }

                if (len>0) {

                   
                
                    for (var i = 0; i<len; i++) {

                    var id = data[i].id;
                    var currency = data[i].currency == 1 ? "USD" : "KES";
                    var name = data[i].title + '(' + currency + ' ' + data[i].price + ')';
                    // $('#event_id').style.display = 'block';
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                    $("#ticket_id").append(option);

                }

                }else{
                    var option = "<option value=''>No Ticket Available</option>"; 
                    $("#ticket_id").append(option);
                    
                }
            });
     }
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
              title: "Please enter your title",
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

@extends('layouts.guest')
@section( 'title', "$event->title" )
@section( 'description', strip_tags($event->description))
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/$event->image" )


@section('content')
    @include('partials.guest.event-header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ url('quickadmin/js') }}/select2.full.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #02aeee;
      border: 1px solid #02aeee;
      border-radius: 4px;
      cursor: default;
      float: left;
      margin-right: 5px;
      margin-top: 5px;
      padding: 0 5px;
}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 12px 12px;
        height: 50px;
    }
</style>
    <style>
          .error {
                color:red;
                padding-bottom: 10px;
            }
            .form-control {
              border: 1px solid #999;
            }
    </style>

      <div class="wrapper">
     <!--Banner Inner-->
     <section>
        <div class="lgx-banner lgx-banner-inner" style="background-image: url('{{ asset('uploads/events') }}/{{ $event->image }}');">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading" style="text-shadow: 5px 2px #000000;">{{ $event->title}}</h2>
                                </div>
                                <ul class="breadcrumb" style="text-shadow: 1px 1px #000000;">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Register</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
        <div class="lgx-post-wrapper" style="background-color:#f8f8f8 ">
            <!--News-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <article>
                                <section>
                                  <div class="alerts">
                                    @include('includes.flash_message')
                                </div>
                                    @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were problems with input:
                                    <br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                              @endif
                                  <form class="signup" name="registration" role="form" method="POST" action="{{ url('/event-registration') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                      <input type="text" placeholder="Title (e.g Prof.)" class="form-control" name="title" value="{{ old('title') }}" required />
                                        @if ($errors->has('title'))
                                            <span class="error">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                      <input type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required />
                                        @if ($errors->has('first_name'))
                                            <span class="error">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                      <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" required />
                                        @if ($errors->has('last_name'))
                                            <span class="error">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                      <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required />
                                        @if ($errors->has('email'))
                                            <span class="error">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                      </div>
                                    <div class="form-group mb-4">
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
                        
                                    <div class="form-group mb-4">
                                      <input type="text" class="form-control" id="institution" name="institution" placeholder="Institution/Organisation" value="{{ old('institution') }}" required>
                                      @if ($errors->has('institution'))
                                            <span class="error">
                                                <strong>{{ $errors->first('institution') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                        
                                    <div class="form-group mb-4">
                                      <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="{{ old('designation') }}" required>
                                      @if ($errors->has('designation'))
                                            <span class="error">
                                                <strong>{{ $errors->first('designation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                        
                                    <div class="form-group mb-4">
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
                        
                                    <div class="form-group mb-4">
                                      <div class="input-group">
                                          <span class="input-group-addon" id="phonecode"></span>
                                          <input type="tel" id="phone1" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="712 345 678" required>
                                      </div>
                                      
                                      
                                    </div>
                        
                                      <input type="hidden" name="code" id="code">
                                      <input type="hidden" name="country" id="country">
                        
                                      <input type="hidden" name="event_id" value="7">
                                      
                                      <div class="form-group mb-4">
                                        <label for="type">Participation Type</label>
                                        <select id="type" name="type" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option>Presenter</option>
                                          <option>Speaker</option>
                                          <option>Guest</option>
                                          <option>Participant</option>
                                          <option>Student</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="error">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                      </div>

                                      <div class="form-group mb-4">
                                        <label for="attendance_mode">Mode of Attendance</label>
                                        <select id="attendance_mode" name="attendance_mode" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option>Physical</option>
                                          <option>Virtual</option>
                                        </select>
                                        @if ($errors->has('attendance_mode'))
                                            <span class="error">
                                                <strong>{{ $errors->first('attendance_mode') }}</strong>
                                            </span>
                                        @endif
                                      </div>

                                      <div class="form-group mb-4">
                                        <label for="payment_mode">Payment Mode</label>
                                        <select id="payment_mode" name="payment_mode" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option>MPESA</option>
                                          <option>EFT</option>
                                        </select>
                                        @if ($errors->has('payment_mode'))
                                            <span class="error">
                                                <strong>{{ $errors->first('payment_mode') }}</strong>
                                            </span>
                                        @endif
                                      </div>
                        
                                      <div class="form-group mb-4">
                                        <label for="">Select the ticket </label>
                                        <select id="ticket_id" name="ticket_id" class="select2 form-control" placeholder="Ticket">
                                        </select>
                                      </div>
                        
                                      {{-- <div class="form-group mb-4">
                                        <input type="text" class="form-control" id="reference" name="reference" placeholder="Payment Reference" value="{{ old('reference') }}">
                                        @if ($errors->has('reference'))
                                              <span class="error">
                                                  <strong>{{ $errors->first('reference') }}</strong>
                                              </span>
                                          @endif
                                      </div> --}}
                        
                                    <input class="lgx-btn lgx-btn-red btn-block" type="submit" value="Register">
                                  </form>
                                </section>
                            </article>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </section>
            <!--News END-->
        </div>
    </main>
    {{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
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
                // getTicket(7);
          });
          
      });

      function getTicket(){
        
        $("#ticket_id").empty(); // clear the select first
        
        $.ajax({
                type: "POST",
                url: "registerjson",
                data: {
                    id: 7,
                    '_token': $('input[name=_token]').val()
                },
            }).done(function(data){
                var len = 0;
                if (data != null) {

                    len = data.length;

                }

                if (len>0) {

                   
                  var blank_option = "<option value=''>--Select--</option>";
                  $("#ticket_id").append(blank_option);

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

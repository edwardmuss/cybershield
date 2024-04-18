@extends('layouts.guest')
@section( 'title', 'Dashboard | '. Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name )
@section( 'description', 'User Profiles')
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/1688721335_1685034915_ica-con.jpg" )


<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@section('content')
    @include('partials.guest.event-header')
    <style>
        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 12px 12px;
            height: 50px;
        }
       
        body {
        background: #F1F3FA;
        }

        /* Profile container */
        .profile {
        margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
        }

        .profile-userpic img {
        float: none;
        margin: 0 auto;
        /* width: 50%; */
        /* height: 50%; */
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
        }

        .profile-usertitle {
        text-align: center;
        margin-top: 20px;
        }

        .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
        }

        .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
        }

        .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
        }

        .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
        margin-right: 0px;
        }
            
        .profile-usermenu {
        margin-top: 30px;
        }

        .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
        border-bottom: none;
        }

        .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
        }

        .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
        border-bottom: none;
        }

        .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 100vh;
        }

        .form-control {
            border: solid 1px #555;
        }

        .error {
            color:#F00
        }
        
    </style>

        <div class="container" style="">
            <div class="row profile">
                <div class="col-md-3">
                    <!-- PROFILE SIDEBAR -->
                    @include('includes.profile-sidebar')
                    <!-- END PROFILE SIDEBAR -->
                </div>
                <div class="col-md-9">
                    <div class="profile-content">
                        <div class="card">
                            <div class="card-header">
                                <h3>Welcome {{ Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name }}</h3>
                            </div>
                            <div class="card-body">
                                This is your Dashboard
                                <form class="px-5"  method="POST" action="{{ route('account.profile.store') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
                                        @include('includes.flash_message')
                                            {{-- <input type="hidden" name="event_id" value="{{$event->id}}"> --}}
                                          <div class="form-group col-md-3">
                                            <label for="">Title</label>
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ Auth::user()->title }}">
                                          </div>
                                          <div class="form-group col-md-3">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" placeholder="Frst Name" name="first_name" value="{{  Auth::user()->first_name }}">
                                            @if ($errors->has('first_name'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          <div class="form-group col-md-3">
                                            <label for="">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ Auth::user()->middle_name }}">
                                            @if ($errors->has('middle_name'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          <div class="form-group col-md-3">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ Auth::user()->last_name }}">
                                            @if ($errors->has('last_name'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          <div class="form-group col-md-8">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                            @if ($errors->has('email'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          @php $genders = ['Male','Female'] @endphp
                                          <div class="form-group col-md-4">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                              @foreach($genders as $gender)
                                                  <option @selected($gender == Auth::user()->gender) value="{{ $gender  }}">{{ $gender  }}</option>
                                              @endforeach
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                          
                                        <div class="form-group col-md-6">
                                          <label for="institution">Institution/Organisation</label>
                                          <input type="text" class="form-control" id="institution" name="institution" placeholder="e.g Havard University" value="{{ Auth::user()->institution }}" required>
                                          @if ($errors->has('institution'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('institution') }}</strong>
                                                </span>
                                            @endif
                                        </div>
        
                                        <div class="form-group col-md-6">
                                          <label for="designation">Designation</label>
                                          <input type="text" class="form-control" id="designation" name="designation" placeholder="e.g HoD" value="{{ Auth::user()->designation }}" required>
                                          @if ($errors->has('designation'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('designation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="country2">Country</label>
                                          <select id="country2" class="select2 form-control" required>
                                            @foreach($countries as $country)
                                                <option @selected($country->name == Auth::user()->country) value="{{ $country->name . ',' . $country->phonecode }}">{{ $country->name . ' (+' . $country->phonecode . ')' }}</option>
                                            @endforeach
                                          </select>
                                          @if ($errors->has('country'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Phone</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="phonecode"></span>
                                                <input type="tel" id="phone1" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                                            </div>
                                            <input type="hidden" name="code" id="code">
                                            <input type="hidden" name="country" id="country">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="password">Password (leave empty to retain current password)</label>
                                            <input type="text" class="form-control" id="password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="error">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block lgx-btn">Update Profile</button>
                                        </div>
                                      </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
        
        <script>

            $('.select2').select2();
           
            $('#country2').on('change', function()
            {
                var countryCode = this.value;
                var phone = $('#phone1').val();
                var country = countryCode.split(',')[0];
                var phonecode = '+' + countryCode.split(',')[1];
                $('#phonecode').html(phonecode);
                $('#phone').val(phonecode + phone);
                $('#code').val(phonecode);
                $('#country').val(country);
                
            });
            window.onload = function() {
                var countryCode = $('#country2').val();
                var phone = $('#phone1').val();
                var country = countryCode.split(',')[0];
                var phonecode = '+' + countryCode.split(',')[1];
                $('#phonecode').html(phonecode);
                $('#code').val(phonecode);
                $('#country').val(country);
            };
        </script>

@endsection

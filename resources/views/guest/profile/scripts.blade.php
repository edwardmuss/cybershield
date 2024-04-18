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

    ul {
    list-style-type: none;
    }
    .txt-list li {
    padding-left: 1.3em;
    }
    .txt-list li:before {
    content: "\f192"; /* FontAwesome Unicode */
    font-family: FontAwesome;
    display: inline-block;
    margin-left: -1.3em; /* same as padding-left set on li */
    width: 1.3em; /* same as padding-left set on li */
    }
    
</style>



<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
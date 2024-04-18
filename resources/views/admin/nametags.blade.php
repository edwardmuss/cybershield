<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Id Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .page-break {
            page-break-after: always;
        }

        .main {
            width: 68mm;
            height: 103mm;
            margin: auto;
            margin-bottom: 30px;
            position: relative;
        }

        .background-image {
            width: 68mm;
            height: 103mm;
            border-radius: 6px;
            position: relative;
            border: 1px solid gray;
            position: absolute;
        }

        .main-data {
            width: 345px;
            height: 212px;
            position: absolute;
        }

        .right-div,
        .left-div {
            position: absolute;
            float: left;
            width: 172px;
            height: 212px;
        }

        .logo {
            position: absolute;
            margin: 25px 0 0 18px;
        }

        .info {
            position: absolute;
            padding: 0 12px;
            height: 120px;
            margin-top: 70px;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .register-hr {
            border-bottom: 1px solid black;
            width: 80px;
        }

        .back-div {
            padding: 10px;
            position: absolute;
            height: 194px;
            margin-left: 120px;
            width: 208px;
            display:
        }

        .card{
        width: 20%;
        display: inline-block;
        box-shadow: 2px 2px 20px black;
        border-radius: 5px; 
        margin: 2%;
        }
    </style>
</head>

<body>
    @foreach ($registrations as $data)
    <div>
        <div class="card">
            <div class="main">
                <img class="background-image" src="{{public_path('images/Front.jpg')}}" alt="">
                <div class="main-data">
                    <div class="left-div" style="font-size:15px; line-height: 1.5;">
                        <img class="logo" src="{{public_path('images/diulogoside.png')}}" width="110" alt="">
                        <div class="info">
                            <span class="capitalize">{{$data->user->first_name. " " . $data->user->last_name}}</span><br>
                            <span class="text-md">{{$data->event->title}}</span><br>
                            <span class="text-md">ID: {{$data->event_id}}</span><br>
                            <span class="text-md">Batch: {{$data->user->code}}</span><br>
                            <span class="text-md">Section: {{$data->user->phone}}</span><br>
                        </div>
                    </div>
                    <div class="right-div" style="padding-left: 50px">
                        <img style="height: 80px; margin-left:15px;; margin-top:25px;"
                            src="{{public_path('students/images/' . $data->user->image)}}" alt="" width="75">
                        <div class="flex items-center" style="margin-top: 10px;">
                            <span style="position: absulate;">
                                <img src="{{public_path('images/call.png')}}"
                                    style="position: absulate; color: black; width: 12px;" alt="">
                            </span>
                            <span class="text-xs ml-2" style="font-size: 13px;">{{$data->user->phone}}</span>
                        </div>
                        <div class="flex items-center">
                            <span style="position: absulate;">
                                <img src="{{public_path('images/blood-drop.png')}}"
                                    style="position: absulate; color: black; width: 12px;" alt="">
                            </span>
                            <span class="text-xs ml-2" style="font-size: 13px;">{{$data->user->country}}</span>
                        </div>
                        <img class="mx-auto" src="{{public_path('images/sign.png')}}" alt="" width="45"
                            style="margin-left:20px; margin-top: 5px;">
                        <div class="border-b border-black border-b-1 w-full register-hr"></div>
                        <span class="mx-auto text-center block" style="margin-left: 20px;">Register</span>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    <div>
    </div>
    {{-- @if (!$loop->last)
    <div class="page-break"></div>
    @endif --}}
    @endforeach
</body>

</html>
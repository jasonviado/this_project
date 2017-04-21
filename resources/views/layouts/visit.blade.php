<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/visit.css">
    <link rel="stylesheet" href="/css/global.css">
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/home.js"></script>
    <script type="text/javascript" src="/js/visit.js"></script>
</head>
<body>
<input id="room" name="room" type="hidden" value="{{ $room }}">
<div class="container">
    <div class="col-md-3 yield">@include('yield.left_side')</div>
    <div class="col-md-6 yield">@include('yield.mid_side')</div>
    <div class="col-md-3 yield">@include('yield.right_side')</div>
    <div class="transition_div">
        <div class="transition_btn">
            <img id="img_profile_pic_click" src="/images/profile.jpg" />
        </div>
        <div class="dp_container">
            <div class="profile_container">
                <img id="img_cover_pic" src="/images/sample.png" />
                <div class="change_dp_container"><img id="img_profile_pic" src="/images/profile.jpg" /></div>
            </div>
            <div class="info_container">
                <div class="area_container">
                    <div class="area_left_container">
                        <div class="form-group col-lg-12">
                            <label>Full Name</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nickname</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Address</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Age</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Gender/Sex</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nationality</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Place of Birth</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Date of Birth</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                    </div>
                    <div class="area_right_container">
                        <div class="form-group col-lg-12">
                            <label>School</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Work</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Professional Skills</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Email</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Phone Number</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Status</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Place of Birth</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Date of Birth</label>
                            <p>{{ $visit->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="goHome">

    </div>
</div>
</body>
</html>
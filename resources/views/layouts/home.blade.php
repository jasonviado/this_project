<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/home.css">
    <script type="text/javascript" src="/js/all.js"></script>
    <script type="text/javascript" src="/js/home.js"></script>
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
                        <form id="form-aboutYou" class="form-aboutYou" method="POST">
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput">Full Name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Nickname</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Address</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Age</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Gender/Sex</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Nationality</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Place of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Date of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                    </div>
                    <div class="area_right_container">
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput">School</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Work</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Professional Skills</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Email</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Phone Number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Status</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Place of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Date of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
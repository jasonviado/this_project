<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/global.css">
    <script type="text/javascript" src="/js/app.js"></script>
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
                    <form id="form-aboutYou" class="form-aboutYou">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="area_left_container">
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput">Last Name</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput" name="lname" value="{{ Auth::user()->lname }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput">First Name</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput" name="name" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Nickname</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="nickname" value="{{ $user->nickname }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Email</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Address</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="address" value="{{ $user->address }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Age</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="age" value="{{ intval(date('Y', time() - strtotime(Auth::user()->dateofbirth))) - 1970 }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Gender/Sex</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="gender" value="{{ Auth::user()->gender }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Nationality</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="nationality" value="{{ $user->nationality }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Date of Birth</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="dateofbirth" value="{{ Auth::user()->dateofbirth }}" disabled>
                            </div>
                        </div>
                        <div class="area_right_container">
                            <button class="saveInfo-btn" value="0">Edit</button>
                            <button class="cancel-btn">Cancel</button>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput">School</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput" name="school" value="{{ $user->school }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Work</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="work" value="{{ $user->work }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Professional Skills</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="professional" value="{{ $user->professionalskills }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Phone Number</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="pnumber" value="{{ $user->pnumber }}" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Status</label>
                                <input type="text" class="form-control remove" id="formGroupExampleInput2" name="status" value="{{ $user->status }}" disabled>
                            </div>
                            <!--<div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Place of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="formGroupExampleInput2">Date of Birth</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
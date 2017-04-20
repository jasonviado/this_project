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
<div class="container">
    <div class="col-md-3 yield">@include('yield.left_side')</div>
    <div class="col-md-6 yield">@include('yield.mid_side')</div>
    <div class="col-md-3 yield">@include('yield.right_side')</div>
    <div class="transition_div">
        <div class="transition_btn"></div>
        <p>test</p>
    </div>
</div>
</body>

</html>
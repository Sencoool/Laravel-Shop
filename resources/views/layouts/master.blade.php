<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>@yield("title", "BikeShop | จําหน่ายอะไหล่จักรยานออนไลน์")</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-static-top">
        
        <div class="navbar-header">
        <a class="navbar-brand" href="#">BikeShop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <li><a href="#">หน้าแรก</a></li>
        <li><a href="#">ข้อมูลสินค้า</a></li>
        <li><a href="#">รายงาน</a></li>
        </ul>
        </div>
        
        </nav>
    </div> @yield("content")
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
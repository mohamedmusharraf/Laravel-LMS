<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="../../assets/vendor/js/helpers.js"></script>
</head>
<body>
    <div id="background">
        <div id="header">
            <a href="#" class="fa fa-envelope" style="text-decoration:none;  color: white;">
                musharraf@gmail.com
            </a>
            <a href="#" class="fa fa-phone" style="text-decoration:none; color: white;">
                +94-722561061
            </a>
            <a href="#" class="fa fa-facebook" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-instagram" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-twitter" style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo">LIBRARY<b style="color:#2c7ad6 ;">ZONE</b></div>
            <div id="menu1">
                <ul>
                    <a href="{{ route('auth.admin_login') }}"><li class="fa fa-home">Admin</li></a>
                    <a href="{{ route('auth.user_login') }}"><li class="fa fa-home">User</li></a>
                    <a href="{{ route('user_registration') }}"><li class="fa fa-registered">Register</li></a>  
                    <a href="{{ route('guest.guest_books') }}"><li class="fa fa-glide">Guest</li></a>  
                </ul>
            </div>   
        </div>
        
        @yield('main')

        <div id="down">
            <h3>Stay Connected</h3>
            <a href="#" class="fa fa-facebook" style="text-decoration: none; padding: 10px 12px;color: white; "></a>
            <a href="#" class="fa fa-instagram" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <a href="#" class="fa fa-twitter" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <h2>Contact Address</h2>
            <a href="#" class="fa fa-home" style="text-decoration: none; padding: 10px 12px;color: white; ">
                61/52Q Mannar Road Puttalam
            </a> <br>
            <a href="#" class="fa fa-phone" style="text-decoration: none; padding: 10px 12px;color: white;">
              +94-714184202
            </a> <br>
            <a href="#" class="fa fa-envelope" style="text-decoration: none; padding: 10px 12px; color:white;">
              musharraf@gmail.com
            </a>
        </div>
        <div class="footer">Developed By : Musharraf </div>
    </div>
</body>
</html>

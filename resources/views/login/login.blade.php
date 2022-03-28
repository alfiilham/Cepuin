<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="https://unpkg.com/typeit@8.2.0/dist/index.umd.js"></script>

</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown mt-5">
        <div>
            <div>
                <h2>SELAMAT DATANG</h2>
                <h3 id="myElement"></h3>
            </div>
            @if(session('succses'))
                <div class="alert alert-success">
                    {{ session('succses') }}
                </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{session('message')}}
            </div>
            @endif
            <form class="m-t" action="{{url('/auth/login')}}" method="post">
                    @csrf
                <div class="form-group">
                    <input type="text" id="text" name ="username" class="form-control" placeholder="Username" required="" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control password-field" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>
    <script>
        new TypeIt("#myElement", {
            strings: "Di Admin Page <br>Lembaga Pengaduan",
            }).go();

        function myFunction() {
            var x = document.getElementById("passwordbox-id");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
    </script>
    

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
</body>

</html>

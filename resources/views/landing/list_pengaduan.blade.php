<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body id="pengaduan" class="landing-page">
    @if(session()->has('message'))
     <script>swal("Terima kasih!", "Berhasil Disimpan!", "success");</script>
    @endif
    <div class="navbar-wrapper"> 
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md rounded-0" role="navigation" style="background-color:white">
            <div class="container border-bottom border-4">
                <a class="navbar-brand bg-white" style="color:#1ab394" href="{{asset('index.html')}}">CepuIN</a>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" style="color:#1ab394" href="#page-top">Home</a></li>
                        <li><a class="nav-link page-scroll" style="color:#1ab394" href="#pengaduan">Pengaduan</a></li>
                        <li><a class="nav-link page-scroll" style="color:#1ab394" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container container-md mt-5">
        <div class="row mt-5">
            <div class="col-md-2 border p-3">
                <a href="{{url('form-pengaduan')}}" class="btn btn-primary">Bikin Pengaduan</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-9  border p-5">
                <h3>Pengaduan Masyarakat Terbaru</h3>
                @foreach($data as $d)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h3 class="card-title">{{$d->nik}}</h3>
                                <h5 class="card-title">Categori : {{$d->dataCategori->nama}}</h5>
                                <p class="card-text">{{$d->isi_laporan}}</p>
                                <a href="#" class="text-primary">{{$d->like}} <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                <a href="#" class="text-danger">{{$d->dislike}} <i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                                <p class="card-text"><small class="text-muted">{{$d->created_at}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 50
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 1
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>

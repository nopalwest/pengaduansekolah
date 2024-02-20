<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Art Factory HTML CSS Template</title>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="/landi/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/landi/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/landi/assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="/landi/assets/css/owl-carousel.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">aplikasi pengaduan sekolah</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">bikin pengaduan</a></li>
                            <li class="scroll-to-section"><a href="{{ route('inputaspirasi.search') }}">Search</a></li>
                            <li class="scroll-to-section"><a href="{{ route('profil') }}">profil</a></li>
                            <li class="scroll-to-section"><a href="{{ Route('register') }}">register</a></li>
                            <li class="scroll-to-section"><a href="{{ route('login') }}">login</a></li>


                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>ayo mari kita laporkan <strong>masalah kita</strong></h1>
                        <a href="#about" class="main-button-slider">bikin pengaduan</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="/landi/assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="card-body">

                @if (Session::has('message'))
                <div class="alert alert-success">
                    <span>
                        {{ Session::get('message') }}
                    </span>
                </div>
                    @endif

                    @if (Session::has('message-error'))
                    <div class="alert alert-danger">
                        <span>
                            {{ Session::get('message-error') }}
                        </span>
                    </div>
                        @endif

                <form action="{{ route('inputaspirasi.store') }}" method="post" class="php-email-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-12">
                            {{ __('nisn') }}
                            <input type="nisn" class="form-control form-control-user rounded-0 @error('nisn') is-invalid @enderror" id="nisn" placeholder="NISN" required name="nisn" value="{{ old('nisn') }}">
                        </div>

                        <div class="col-md-12">
                            {{ __('pilih kategori') }}
                            <select class="form-control form-control-user rounded-0 custom-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @php
                                $kategoris = \App\Models\Kategori::all();
                                @endphp
                                @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            {{ __('Lokasi') }}
                            <input type="text" class="form-control form-control-user rounded-0 @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Lokasi" required name="lokasi" value="{{ old('lokasi') }}">
                        </div>

                        <div class="col-md-12">
                            {{ __('keterangan') }}
                            <textarea class="form-control form-control-user rounded-0 @error('keterangan') is-invalid @enderror" name="keterangan" rows="6" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            {{ __('foto') }}
                            <input type="file" name="foto" class="form-control form-control-user rounded-0 @error('foto') is-invalid @enderror" required>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->





    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                      <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->




    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Art Factory Company

                . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/landi/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/landi/assets/js/popper.js"></script>
    <script src="/landi/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/landi/assets/js/owl-carousel.js"></script>
    <script src="/landi/assets/js/scrollreveal.min.js"></script>
    <script src="/landi/assets/js/waypoints.min.js"></script>
    <script src="/landi/assets/js/jquery.counterup.min.js"></script>
    <script src="/landi/assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="/landi/assets/js/custom.js"></script>

  </body>
</html>

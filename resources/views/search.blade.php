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
    <header class="header-area" style="position: sticky ; top:0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">Aplikasi pengaduan sekolah</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">bikin pengaduan</a></li>
                            <li class="scroll-to-section"><a href="{{ route('inputaspirasi.search') }}">Search</a></li>
                            <li class="scroll-to-section"><a href="{{ route('profil') }}">profil</a></li>
                            <li class="scroll-to-section"><a href="{{ Route('register') }}">register</a></li>
                            <li class="scroll-to-section"><a href="{{ route('login') }}">login</a></li>

                        </ul>

                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->





    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <form action="{{ route('inputaspirasi.search') }}" method="GET">
                <input type="text" name="keyword" placeholder="Cari...">
                <button type="submit">Cari</button>
            </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                    <thead>
                        <tr>
                        <th>no</th>
                        <th>nisn</th>
                        <th>lokasi</th>
                        <th>keterangan</th>
                        <th>status</th>
                        <th>foto</th>



                        <tbody>
                            @if (count($inputaspirasis)>0)
                            @foreach ($inputaspirasis as $key=>$inputaspirasi)

                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $inputaspirasi->nisn }}</td>
                                    <td>{{ $inputaspirasi->lokasi }}</td>
                                    <td>{{ $inputaspirasi->keterangan }}</td>
                                    <td>

                                        @if ($inputaspirasi->status == 'menunggu')
                                        <span class="px-3 bg-gradient-danger text-white">{{ $inputaspirasi->status }}</span>

                                    @elseif($inputaspirasi->status == 'proses')
                                    <span class="px-3 bg-gradient-warning text-white">{{ $inputaspirasi->status }}</span>

                                    @else
                                    <span class="px-3 bg-gradient-success text-white">{{ $inputaspirasi->status }}</span>

                                    @endif
                                    {{ $inputaspirasi->status }}</td>

                                    <td><a href="{{ asset('foto') }}/{{ $inputaspirasi->foto }}" target="_blank"><img src="{{ asset('foto') }}/{{ $inputaspirasi->foto }}" width="100"></a></td>



                                </div>


                                </div>
                                </div>
                                {{-- @endif --}}
                                </tr>
            @endforeach

                                @else
                                <td>tidak ada pengaduan yang ditampilkan </td> @endif
                        </tbody>
                    </tbody>
                </table>

                <!-- Footer Section End -->


        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->



 



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

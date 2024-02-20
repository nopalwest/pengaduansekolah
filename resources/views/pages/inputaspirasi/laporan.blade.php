@extends('layouts.frontend.master')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="container-fluid">
                <a href="{{ url('/laporan/cetak') }}"><button class="btn btn-primary">export jadi pdf</button></a>
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">list kategori  <!-- DataTales Example -->
             
            <h6 class="m-0 font-weight-bold text-primary">inputaspirasi</h6>
                </div>
                <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>no</th>
                                <th>nisn</th>
                                <th>lokasi</th>
                                <th>keterangan</th>
                                <th>status</th>



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

                                            @endif </td>




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
                    </div>
                </div>
            </div>

        </div>






</body>

</html>
@endsection

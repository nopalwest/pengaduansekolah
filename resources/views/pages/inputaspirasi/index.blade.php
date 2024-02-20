@extends('layouts.frontend.master')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">list kategori  <!-- DataTales Example -->
                <div class="table-responsive"> <a href="{{ route('inputaspirasi.create') }}"><button class="btn btn-outline-primary">buat masalah</button></a>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">kategori</h6>
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
                                <th>foto</th>
                                <th>action</th>


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
                                        
                                            <td><a href="{{ asset('foto') }}/{{ $inputaspirasi->foto }}" target="_blank"><img src="{{ asset('foto') }}/{{ $inputaspirasi->foto }}" width="100"></a></td>
                                            <td> <form action="{{ route('inputaspirasi.destroy', [$inputaspirasi->id]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    apus</button>
                                            </form>

                                            <a href="{{ route('inputaspirasi.edit', [$inputaspirasi->id]) }}" class="btn btn-warning">edit</a>
                                            <a href="{{ route('inputaspirasi.show', [$inputaspirasi->id]) }}" class="btn btn-warning">detail</a>
                                            </td>



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

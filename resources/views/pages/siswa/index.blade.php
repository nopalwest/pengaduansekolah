@extends('layouts.frontend.master')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">list siswa     </p>      <!-- DataTales Example -->
                <a href="{{ route('siswa.create') }}"><button class="btn btn-outline-primary">buat nisn </button></a>
                <div class="card shadow mb-4">
                <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">siswa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>no</th>
                                <th>nisn</th>
                                <th>kelas</th>
                                <th>action</th>

                                <tbody>
                                    @if (count($siswas)>0)
                                    @foreach ($siswas as $key=>$siswa)

                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->kelas}}</td>
                                            <td> <form action="{{ route('siswa.destroy', [$siswa->nisn]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    apus</button>
                                            </form>
                                            <a href="{{ route('siswa.edit', [$siswa->nisn]) }}" class="btn btn-warning">edit</a>
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

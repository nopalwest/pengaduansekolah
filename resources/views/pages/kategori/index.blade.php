@extends('layouts.frontend.master')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">list kategori  <!-- DataTales Example -->
                <div class="table-responsive"> <a href="{{ route('kategori.create') }}"><button class="btn btn-outline-primary">buat kategori</button></a>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">kategori</h6>
                </div>
                <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>no</th>
                                <th>keterangan</th>
                                <th>action</th>


                                <tbody>
                                    @if (count($kategoris)>0)
                                    @foreach ($kategoris as $key=>$kategori)

                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $kategori->keterangan }}</td>
                                            <td> <form action="{{ route('kategori.destroy', [$kategori->id]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    apus</button>
                                            </form>
                                            <a href="{{ route('kategori.edit', [$kategori->id]) }}" class="btn btn-warning">edit</a>
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

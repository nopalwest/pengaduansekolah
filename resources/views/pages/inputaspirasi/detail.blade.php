@extends('layouts.frontend.master')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="card">
                <div class="card-header"><b>Detail Aspirasi</b></div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            NISN : <b>{{ $inputaspirasi->nisn }}</b><br>
                            Kategori: <b>{{ $inputaspirasi->kategori->keterangan }}</b><br>
                            Lokasi : <b>{{ $inputaspirasi->lokasi }}</b><br>
                            Status:
                            <b class="
                             @if($inputaspirasi->status === 'Menunggu')
                                     bg-danger
                            @elseif($inputaspirasi->status === 'Proses')
                                    bg-warning
                            @elseif($inputaspirasi->status === 'Selesai')
                                    bg-success
                             @else
                                    bg-light
                             @endif text-white p-1">
                                {{ $inputaspirasi->status }}
                            </b><br>

                            Isi Aspirasi : <b>{{ $inputaspirasi->keterangan }}</b><br>
                            Foto :<br>
                            <img src="{{ asset('foto/' . $inputaspirasi->foto) }}" width="50%">
                        </div>
            



                        <div class="form-group">
                            History Aspirasi:
                            @foreach(App\Models\Aspirasi::where('input_aspirasi_id', $inputaspirasi->id)->get() as $aspirasi)
                            <div>

                                <b>{{ $aspirasi->created_at }} - {{ $aspirasi->feedback }}</b>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <a href="{{ route('aspirasi.show', [$inputaspirasi->id]) }}">
                                <button class="btn btn-primary">Beri Tanggapan</button>
                            </a>
                        </div>

                        {{-- @if (is_null($inputaspirasi->aspirasi)) --}}

                        {{-- @else
                        <div class="form-group">
                            <a href="{{ route('aspirasi.edit', [$inputaspirasi->aspirasi->id]) }}">
                                <button class="btn btn-primary">Update Tanggapan</button>
                            </a>
                        </div> --}}
                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

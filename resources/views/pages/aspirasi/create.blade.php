@extends('layouts.frontend.master')
@section('content')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <form action="{{ route('aspirasi.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header"><b>Beri Aspirasi</b></div>
                    <div class="card-body">
                        <input type="hidden" name="input_aspirasi_id" value="{{ $inputaspirasi->id }}">
                        <div class="form-group">
                            <label>Tanggapan</label>
                            <textarea name="feedback" class="form-control @error('Feedback') is-invalid @enderror"></textarea>
                            @error('feedback')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" role="alert">
                                <option value="">Pilih Status</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

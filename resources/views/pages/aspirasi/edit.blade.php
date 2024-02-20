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
            <form action="{{ route('aspirasi.update', [$aspirasi->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}

                <div class="card">
                    <div class="card-header"><b>Update Aspirasi</b></div>

                    <div class="card-body">
                        <input type="hidden" name="input_aspirasi_id" value="{{ $aspirasi->id }}">

                        <div class="form-group">
                            <label>Tanggapan</label>
                            <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror">{{ $aspirasi->feedback }}</textarea>
                            @error('feedback')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" {{ $aspirasi->status ? '' : 'selected' }}>Pilih Status</option>
                                <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Proses" {{ $aspirasi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

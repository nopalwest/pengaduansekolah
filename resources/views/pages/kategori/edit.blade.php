@extends('layouts.frontend.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Keterangan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.update',[$kategoris->id])}}">

                        @csrf
                        {{ method_field('PUT') }}

                        <div class="row mb-3">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $kategoris->keterangan }}" required autocomplete="keterangan">

                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

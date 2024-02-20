@include('layouts.frontend.master')


<div class="container-fluid">
    <div class="card shadow mb-4" style="border-radius: 10px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('inputaspirasi.update', [$inputaspirasis->id]) }}" method="post" class="php-email-form" enctype="multipart/form-data">

                @csrf
                {{ method_field('PUT') }}
                <div class="row gy-4">
                    <div class="col-md-12">
                        <input type="nisn" class="form-control form-control-user rounded-0 @error('nisn') is-invalid @enderror" id="nisn" placeholder="NISN" required name="nisn" value="{{ $inputaspirasis->nisn}}">
                    </div>

                    <div class="col-md-12">
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
                        <input type="text" class="form-control form-control-user rounded-0 @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Lokasi" required name="lokasi" value="{{ $inputaspirasis->lokasi }}">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control form-control-user rounded-0 @error('keterangan') is-invalid @enderror" name="keterangan" rows="6" placeholder="Keterangan" required>{{ $inputaspirasis->keterangan }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="foto" class="form-control form-control-user rounded-0 @error('foto') is-invalid @enderror" required>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit">Kirim</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary"><b>INPUT ASPIRASI</b></div>

        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('inputaspirasi.update', [$inputaspirasi->id_pelaporan]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">

                @csrf
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" value="{{ $inputaspirasi->nik }}" placeholder="NIK" class="form-control @error('nik') is-invalid @enderror" readonly>
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                        <option value=""> - Pilih Kategori - </option>
                        @foreach(App\Models\Kategori::all() as $kategori)
                            <option value="{{ $kategori->id_kategori }}" @if($kategori->id_kategori) selected @endif>{{ $kategori->ket_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $inputaspirasi->lokasi }}" placeholder="Lokasi" class="form-control @error('lokasi') is-invalid @enderror">
                    @error('lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" name="ket" value="{{ $inputaspirasi->ket }}" placeholder="Keterangan" class="form-control @error('ket') is-invalid @enderror">
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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
            <form action="{{ route('inputaspirasi.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" placeholder="NIK" value="{{old('nik')}}" class="form-control @error('nik') is-invalid @enderror">
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
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->ket_kategori }}</option>
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
                    <input type="text" name="lokasi" placeholder="Lokasi" value="{{old('lokasi')}}" class="form-control @error('lokasi') is-invalid @enderror">
                    @error('lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" name="ket" placeholder="Keterangan" value="{{old('ket')}}" class="form-control @error('ket') is-invalid @enderror">
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

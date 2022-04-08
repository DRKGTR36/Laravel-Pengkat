@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary"><b>PENDUDUK</b></div>

        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('penduduk.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="nama">NIK</label>
                    <input type="text" name="nik" placeholder="NIK" value="{{old('nik')}}" class="form-control @error('nik') is-invalid @enderror">
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror">
                    @error('alamat')
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

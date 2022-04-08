@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary"><b>KATEGORI</b></div>

        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="ket_kategori">Keterangan Kategori</label>
                    <input type="text" name="ket_kategori" placeholder="Keterangan" value="{{old('ket_kategori')}}" class="form-control @error('ket_kategori') is-invalid @enderror">
                    @error('ket_kategori')
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

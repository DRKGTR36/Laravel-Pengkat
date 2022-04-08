@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary"><b>ASPIRASI</b></div>

        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('aspirasi.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                {{-- <div class="form-group{{$errors->has('status') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option value=""> - Pilih Status - </option>
                        <option value="menunggu"{{(old('menunggu') == 'menunggu') ? ' selected' : ''}}>Menunggu</option>
                        <option value="proses"{{(old('proses') == 'proses') ? ' selected' : ''}}>Proses</option>
                        <option value="selesai"{{(old('selesai') == 'selesai') ? ' selected' : ''}}>Selesai</option>
                    </select>
                    @if($errors->has('status'))
                        <span class="help-block">{{$errors->first('status')}}</span>
                    @endif
                </div> --}}
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
                    <label for="feedback">Feedback</label>
                    <select name="feedback" class="form-control @error('feedback') is-invalid @enderror">
                        <option value=""> - Pilih Feedback - </option>
                        {{-- @foreach(App\Models\Kategori::all() as $kategori) --}}
                            <option value="sangat baik">😁</option>
                            <option value="cukup baik">😄</option>
                            <option value="baik">🙂</option>
                            <option value="buruk">😞</option>
                            <option value="sangat_buruk">😖</option>
                        {{-- @endforeach --}}
                    </select>
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <input type="text" name="feedback" placeholder="Feedback" value="{{old('feedback')}}" class="form-control @error('feedback') is-invalid @enderror">
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

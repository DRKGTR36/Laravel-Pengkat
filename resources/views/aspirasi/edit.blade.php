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
            <form action="{{ route('aspirasi.update', [$aspirasi->id_aspirasi]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">

                @csrf
                {{ method_field('PUT') }}

                <div class="form-group{{$errors->has('status') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option value=""> - Pilih Status - </option>
                        <option value="menunggu" @if($aspirasi->status == 'menunggu') selected @endif>Menunggu</option>
                        <option value="proses" @if($aspirasi->status == 'proses') selected @endif>Proses</option>
                        <option value="selesai" @if($aspirasi->status == 'selesai') selected @endif>Selesai</option>
                    </select>
                    @if($errors->has('status'))
                        <span class="help-block">{{$errors->first('status')}}</span>
                    @endif
                </div>
                {{-- <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                        <option value=""> - Pilih Kategori - </option>
                        @foreach($aspirasi as $a)
                            <option value="{{ $a->kategori->id_kategori }}" @if($a->kategori->id_kategori) selected @endif>{{ $a->kategori->ket_kategori }}</option>
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
                        <option value="sangat baik" @if($aspirasi->feedback == 'sangat baik') selected @endif>😁</option>
                        <option value="cukup baik" @if($aspirasi->feedback == 'cukup baik') selected @endif>😄</option>
                        <option value="baik" @if($aspirasi->feedback == 'baik') selected @endif>🙂</option>
                        <option value="buruk" @if($aspirasi->feedback == 'buruk') selected @endif>😞</option>
                        <option value="sangat buruk" @if($aspirasi->feedback == 'sangat buruk') selected @endif>😖</option>
                    </select>
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                {{-- <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <input type="text" name="feedback" value="{{ $aspirasi->feedback }}" placeholder="Feedback" class="form-control @error('feedback') is-invalid @enderror">
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

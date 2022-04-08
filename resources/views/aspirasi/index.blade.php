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
            <form class="form" method="get" action="{{ route('search') }}" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan ID Pelaporan">
                    <button type="submit" class="btn btn-primary mb-1">Search</button>
                </div>
            </form>
            {{-- <div class="form-group">
                <a href="/aspirasi/create" class="btn btn-success">Tambah Aspirasi</a>
            </div> --}}
            <p class="text-dark">Total Aspirasi : {{ totalAspirasi() }}</p>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        {{-- <th class="text-center">#</th> --}}
                        <th class="text-center">ID PELAPORAN</th>
                        <th class="text-center">TANGGAL LAPOR</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">KATEGORI</th>
                        {{-- <th class="text-center">KETERANGAN</th> --}}
                        <th class="text-center">FEEDBACK</th>
                        {{-- @auth --}}
                            <th class="text-center">EDIT</th>
                            <th class="text-center">DELETE</th>
                        {{-- @endauth --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($aspirasi)>0)
                    @foreach($aspirasi as $key=>$m)
                    <tr>
                        <td class="text-center">{{ $m->id_aspirasi }}</a></td>
                        <td class="text-center">{{ $m->created_at }}</a></td>
                        <td class="text-center">
                            <h3>
                                @if($m->status == "menunggu")
                                <span class="badge bg-primary text-light">
                                {{$m->status}}
                                </span>
                                @elseif($m->status == "proses")
                                <span class="badge bg-danger text-light">
                                {{$m->status}}
                                </span>
                                @else
                                <span class="badge bg-success text-light">
                                {{$m->status}}
                                </span>
                                @endif
                            </h3>
                        </td>
                        <td class="text-center">{{ $m->kategori->ket_kategori }}</a></td>
                        <td class="text-center">{{ $m->feedback }}</a></td>
                        {{-- <td class="text-center">
                            <a href="{{ route('aspirasi.edit', [$m->id_aspirasi]) }}"><button class="btn btn-success">Edit</button></a>
                        </td> --}}
                        <td class="text-center">
                            @if($m->status == "menunggu")
                            <form action="{{ route('aspirasi.update', [$m->id_aspirasi]) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <button type="submit" class="btn btn-success">Proses</button>
                            </form>
                            @elseif($m->status == "proses")
                            <form action="{{ route('aspirasi.update', [$m->id_aspirasi]) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <button type="submit" class="btn btn-success">Selesai</button>
                            </form>
                            @else()
                                <button type="submit" class="btn btn-success disabled">Selesai</button>
                            @endif
                        </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $m->id_aspirasi }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $m->id_aspirasi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form action="{{ route('aspirasi.destroy', [$m->id_aspirasi]) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Aspirasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah Anda Yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    @endforeach
                    @else
                        <div class="container">
                            <p class="text text-center">Tidak ada Data yang dapat ditampilkan.</p>
                        </div>
                    @endif
                </tbody>
        </table>
        {{ $aspirasi->links() }}
        </div>
    </div>
</div>
@endsection

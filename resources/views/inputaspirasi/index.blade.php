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
            <form class="form" method="get" action="{{ route('search') }}" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan ID Pelaporan">
                    <button type="submit" class="btn btn-primary mb-1">Search</button>
                </div>
            </form>
            {{-- <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search" />
            </div> --}}
            <p class="text-dark">Total Input Aspirasi : {{ totalInputAspirasi() }}</p>
            {{-- <div class="form-group">
                <a href="/inputaspirasi/create" class="btn btn-success">Tambah Input Aspirasi</a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        {{-- <th class="text-center">#</th> --}}
                        <th class="text-center">ID PELAPORAN</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">KATEGORI</th>
                        <th class="text-center">LOKASI</th>
                        <th class="text-center">KETERANGAN</th>
                        <th class="text-center">EDIT</th>
                        <th class="text-center">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($inputaspirasi)>0)
                    @foreach($inputaspirasi as $key=>$m)
                    <tr>
                        {{-- <td class="text-center" scope="row">{{ $key+1 }}</td> --}}
                        <td class="text-center">{{ $m->id_pelaporan }}</a></td>
                        <td class="text-center">
                            <h3>
                                @if($m->aspirasi->status == "menunggu")
                                <span class="badge bg-primary text-light">
                                {{$m->aspirasi->status}}
                                </span>
                                @elseif($m->aspirasi->status == "proses")
                                <span class="badge bg-danger text-light">
                                {{$m->aspirasi->status}}
                                </span>
                                @else
                                <span class="badge bg-success text-light">
                                {{$m->aspirasi->status}}
                                </span>
                                @endif
                            </h3>
                        </td>
                        <td class="text-center">{{ $m->nik }}</a></td>
                        <td class="text-center">{{ $m->aspirasi->kategori->ket_kategori }}</a></td>
                        <td class="text-center">{{ $m->lokasi }}</a></td>
                        <td class="text-center">{{ $m->ket }}</a></td>
                        <td class="text-center">
                            <a href="{{ route('inputaspirasi.edit', [$m->id_pelaporan]) }}"><button class="btn btn-success">Edit</button></a>
                        </td>
                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $m->id_pelaporan }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $m->id_pelaporan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                    <form action="{{ route('inputaspirasi.destroy', [$m->id_pelaporan]) }}" method="POST">
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
        {{-- {{ $inputaspirasi->links() }} --}}
        </div>
    </div>
</div>
@endsection

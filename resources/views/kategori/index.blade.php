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
            <div class="form-group">
                <a href="/kategori/create" class="btn btn-success">Tambah Kategori</a>
            </div>
            <p class="text-dark">Total Kategori : {{ totalKategori() }}</p>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">KATEGORI</th>
                        {{-- @auth --}}
                            <th class="text-center">EDIT</th>
                            <th class="text-center">DELETE</th>
                        {{-- @endauth --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($kategori)>0)
                    @foreach($kategori as $key=>$m)
                    <tr>
                        <td class="text-center" scope="row">{{ $key+1 }}</td>
                        <td class="text-center">{{ $m->ket_kategori }}</a></td>
                        @auth
                            <td class="text-center">
                                <a href="{{ route('kategori.edit', [$m->id_kategori]) }}"><button class="btn btn-success">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $m->id_kategori }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $m->id_kategori }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <form action="{{ route('kategori.destroy', [$m->id_kategori]) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
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
                        @endauth
                    </tr>
                    @endforeach
                    @else
                        <div class="container">
                            <p class="text text-center">Tidak ada Data yang dapat ditampilkan.</p>
                        </div>
                    @endif
                </tbody>
        </table>
        {{ $kategori->links() }}
        </div>
    </div>
</div>
@endsection

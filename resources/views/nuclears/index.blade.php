@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Gambar</th>
                                <th>Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @foreach ($user->students as $item)
                                        <td>{{$item->kelas}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td><img src="{{url('images/'.$item->image)}}" class="rounded-circle" style="object-fit: cover; inline-size: 150px; block-size: 150px;">

                                        </td>
                                    @endforeach
                                    <td>{{$user->roles->implode('name', ', ')}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Maaf, data belum ada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <div class="card text-center">
                    <div class="card-header">
                    <form method="POST" action="{{ route('nuclears.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data? Ini tidak dapat dikembalikan')">
                            Hapus Semua
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

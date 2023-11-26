@extends('layouts.app')

@section('content')
<style>
    .container {
    font-family: Arial, sans-serif;
}



.card {
    box-shadow: 0 4px 8px 0 rgba(0, 54, 170, 0.2)2);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgb(255, 0, 0);
}

.table {
    border-collapse: collapse;
    width: 100%;
}

.table th, .table td {
    text-align: left;
    padding: 8px;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table th {
    background-color:   rgb(20, 126, 126);
    color: white;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-item-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" widht="20" height="20">
                            <path
                                d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"
                                fill="#fff" />
                        </svg>
                        <h6 class="ml-2">Data User</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('users.create')}}" class="btn btn-outline-primary">

                                Tambah data User
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>phone</th>
                                <th>Akses</th>
                                <th>Options</th>
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
                                    @endforeach
                                    <td>{{$user->roles->implode('name', ', ')}}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Maaf Data Belum ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
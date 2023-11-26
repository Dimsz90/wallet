@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Form create months</h3>
                    <form action="{{route('students.update', $student->user)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" value="{{$student->user->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Adress</label>
                            <input type="text" name="alamat" id="" value="{{$student->alamat}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" id="" value="{{$student->phone}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" name="kelas" id="" value="{{$student->kelas}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" class="form-control" value="/images/{{ $student->image }}">
                            <img src="/images/{{ $student->image }}" width="300px">
                        </div>
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

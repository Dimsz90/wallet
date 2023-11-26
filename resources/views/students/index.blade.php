@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    
                    <h3>Student data table</h3>  <a href="{{route('students.create')}}" class="btn btn-secondary">Add New students</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>image</th>
                                <th>Phone Number</th>
                                <th>Kelas</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            
                            <tr>
                                
                                <td>{{$student->user->name}}</td>
                                <td>{{$student->alamat}}</td>
                               <td> <img src="{{url('images/'.$student->image)}}" width="150px" ></td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->kelas}}</td>
                                
                                <td>
                                    <form action="{{route('students.destroy', $student->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('students.edit', $student->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    Student data is not yet available
                                </td>
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

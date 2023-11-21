@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Saving Book</h3>
                        <h3>Month : {{$month->name}}, {{$month->years}}</h3>
                    </div>
                    <form action="{{route('savings.store', $month->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="month_id" value="{{$month->id}}">
                        @foreach ($students as $student)
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="{{$student->name}}" id="" class="form-control" readonly>
                                        <input type="hidden" name="student_id[]" value="{{$student->id}}" id="" class="form-control" readonly> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nominal[]" id="" class="form-control" placeholder="Rp.....">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('input[name="nominal[]"]').mask('000.000.000', {reverse: true});
    });
    </script>
    
    
    

@endsection

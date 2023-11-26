@extends('layouts.app')

@section('content')

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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <input type="text" value="{{$user->name}}" id="" class="form-control" readonly>
                                                <input type="hidden" name="student_id[]" value="{{$user->id}}" id="" class="form-control"  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <input type="text" name="nominal[]" id="" class="form-control" placeholder="Rp.....">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

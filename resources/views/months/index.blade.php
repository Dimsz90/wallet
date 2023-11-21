@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Month data table</h3>
                        <a href="{{route('months.create')}}" class="btn btn-secondary">Add New Month</a>
                    </div>

                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Years</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($months as $month)
                                <tr>
                                    <td>{{$month->name}}</td>
                                    <td>{{$month->years}}</td>
                                    <td>
                                        <a href="{{route('savings.create',$month->id)}}" class="btn btn-small btn-primary">Add Savings</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        Monthly data is not yet available
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

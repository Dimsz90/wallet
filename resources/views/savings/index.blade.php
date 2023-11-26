@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-body">
    <form action="{{route('savings.print')}}" method="get">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="date" name="dari_tgl" class="form-control" id="date">
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center">
                <label for="">S/D</label>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="date" name="sampai_tgl" class="form-control" id="date">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary">Print report</button>
            </div>
            <div class="col-md-3">
                <a href="{{route('savings.print')}}" class="btn btn-outline-secondary">
                    Print all
                </a>
            </div>
        </div>
    </div>
    </form>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Savings Data</h3>
                    <input id="search" type="text" placeholder="Search..">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Month</th>
                                <th>Nominal</th>
                                <th>Option</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($savings as $saving)
                            <tr>
                                <td>{{ $saving['name'] }}</td>
                                <td>{{ $saving['kelas'] }}</td>
                                <td>{{ $saving['nameM'] }}</td>
                                <td>{{ number_format($saving['nominal']) }}</td>
                                <td>
                                    <a href="{{ route('savings.printByName', $saving['name']) }}" class="btn btn-outline-primary">
                                        Print
                                    </a>
                                    
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection

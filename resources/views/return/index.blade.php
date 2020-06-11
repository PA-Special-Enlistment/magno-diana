@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a class="navbar-brand">Return Equipments from   {{ $name }}</a>
                    </div>
                </div>

                <div class="card shadow border-0" id="example2">
                    <div class="table-responsive">  
                        <table class="table">
                        <thead>
                            <tr>
                            <th style="text-align:center">ID/Code</th>
                            <th style="text-align:center">Equipment Type</th>
                            <th style="text-align:center">Product Name</th>
                            <th style="text-align:center">Date Returned</th>
                            <th style="text-align:center">Remarks</th>
                            </tr>
                        </thead>
                        @foreach($record as $data)
                        <tr>
                            <td style="text-align:center">{{ $data->equipment_id }}</td>
                            <td style="text-align:center">{{ $data->type }}</td>
                            <td style="text-align:center">{{ $data->name }}</td>
                            <td style="text-align:center">{{ $data->date_return }}</td>
                            <td style="text-align:center">{{ $data->remarks }}</td>
                        </tr>
                    @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
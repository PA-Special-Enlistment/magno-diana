@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a class="navbar-brand">Assigned Equipments for {{ $name }}</a>
                    </div>
                </div>

                <div class="card shadow border-0" id="example2">
                    <div class="table-responsive">  
                        <table class="table">
                        <thead>
                            <tr>
                            <th style="text-align:center">ID/Code</th>
                            <th style="text-align:center">Equipment Type</th>
                            <th style="text-align:center">Brand</th>
                            <th style="text-align:center">Date Assigned</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        @foreach($record as $data)
                        <tr>
                            <td style="text-align:center">{{ $data->code }}</td>
                            <td style="text-align:center">{{ $data->type }}</td>
                            <td style="text-align:center">{{ $data->name }}</td>
                            <td style="text-align:center">{{ $data->assign_date }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/returnEquip/'.$data->id) }}" class="btn btn-sm btn-warning">Return</a>
                            </td>
                        </tr>
                    @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Resturants</div>
                <div class="card-body">
                    <div class="" id="pills-resturant">
                        @if(isset($resturant))
                        <table class="table table-stripes text-center">
                            <thead>
                                <th>#No.</th>
                                <th>Name</th>
                                <th>Expected Delivery time</th>
                                <th>Controles</th>
                            </thead>
                            <tbody>
                            @foreach($resturant as $key => $rest)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$rest->name}}</td>
                                    <td>{{$rest->delivery_minutes}}</td>
                                    <td>
                                        <span class="btn btn-primary"><i class="fas fa-eye fa-lg"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order Details</div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th>#No.</th>
                            <th>Item Name</th>
                            <th>Item Type</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            @if(isset($items))
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->resturantItem->name}}</td>
                                        <td>{{$item->resturantItem->type}}</td>
                                        <td>{{$item->resturantItem->price . ' L.E'}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Latest Orders</div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th>#No. of Order</th>
                            <th>Ordered By</th>
                            <th>Total Price</th>
                            <th>Ordered At</th>
                            <th>Order Status</th>
                            <th>Message Status</th>
                            <th>Delivered At</th>
                            <th>Controles</th>
                        </thead>
                        <tbody>
                            @if(isset($orders))
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->total . ' L.E'}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->message_status}}</td>
                                        <td>
                                            @if($order->delivered_at == null)
                                                pending
                                            @else
                                                {{$order->delivered_at}}
                                            @endif
                                        </td>    
                                        <td>
                                            <a href="{{url('/order_items/' . $order->id)}}"><span class="btn btn-primary"><i class="fas fa-eye fa-lg"></i></span></a>
                                            <form class="update" action="{{url('/order/' . $order->id)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" title="Mark as delivered" class="btn btn-success">
                                                    <i class="fas fa-check fa-lg"></i>
                                                </button>
                                            </form>
                                        </td>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Make Order</div>
                <div class="card-body">
                    <form id="make_order">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select User: </label>
                            <select class="form-control" id="user_selection">
                                @if(isset($users))
                                    <option value="0" disabled selected>Choose User: </option>
                                    @foreach($users as $key => $user)
                                        <option value="{{$user->id}}">{{$user->name .' - '. $user->email}}</option>
                                    @endforeach
                                @endif
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Restirant: </label>
                            <select class="form-control" onchange="getResturantItems(this.selectedIndex)" id="resturant_selection">
                                @if(isset($resturants))
                                    <option value="0" disabled selected>Choose Resturant: </option>
                                    @foreach($resturants as $key => $resturant)
                                        <option value="{{$resturant->id}}">{{$resturant->name .' - '. $resturant->delivery_minutes}}</option>
                                    @endforeach
                                @endif
                            </select> 
                        </div>
                        <div id="menu">
                            <H4>Resturant Menu:</H4>
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <th>#No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Choose</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

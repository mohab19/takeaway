@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registered Users</div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th>#No.</th>
                            <th>user name</th>
                            <th>E-mail</th>
                            <th>Phone No.</th>
                            <th>Joind since</th>
                        </thead>
                        <tbody>
                            @if(isset($users))
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->created_at}}</td>
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

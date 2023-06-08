@extends('layouts.master')

@section('content')
    <main class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Players Yet Not Define Team</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{route('create.player')}}">Add Player</a>
                        <a class="btn btn-success mx-1" href="{{route('manager.dashboard')}}">Back</a>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark ">
                    <thead style="background: #f2f2f2">
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" style="width: 10%" >Player Name</th>
                        <th scope="col" style="width: 20%">Player Price</th>
                        <th scope="col" style="width: 30%">Player Category</th>
                        <th scope="col" style="width: 10%">Team Name</th>
                        <th scope="col" style="width: 10%">Status</th>
                        <th scope="col" style="width: 10%">publish Date</th>
                        <th scope="col" style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            <th scope="row">{{$player->id}}</th>
                            <td>{{$player->name}}</td>
                            <td>{{$player->price}}</td>
                            <td>{{$player->categories->name}}</td>
                            <td>{{$player->team->name}}</td>
                            <td>{{$player->status}}</td>
                            <td>{{date('d-m-y', strtotime($player->created_at))}}</td>
                            <td >
                                <div class="d-flex">
                                    <a class="btn-sm btn-primary btn" href="">ADD</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </main>



@endsection

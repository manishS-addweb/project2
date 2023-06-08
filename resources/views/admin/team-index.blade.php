@extends('layouts.master')

@section('content')
    <main class="main-content mt-5 ">
        <div class="card ">
            <div class="card-header  ">
                <div class="row ">
                    <div class="col-md-6 ">
                        <h4>Teams</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end  ">

{{--                        <a class="btn btn-secondary mx-1" href="{{route('management.create')}}">Addplayer</a>--}}
                        <a class="btn btn-primary mx-1" href="{{route('team.create')}}">CreateTeam</a>
                        <a class="btn btn-success mx-1" href="{{route('admin.dashboard')}}">Back</a>
                        {{--                        <a class="btn btn-primary mx-1" href="{{route('management.manager',$team->id)}}">Manager Listing</a>--}}
                    </div>
                </div>


            </div>
            <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered border-dark ">
                    <thead style="background: #f2f2f2">
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" style="width: 30%" >Manager Name</th>
                        <th scope="col" style="width: 30%" >Team Name</th>
                        <th scope="col" style="width: 20%">publish Date</th>
                        <th scope="col" style="width: 40%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <th scope="row">{{$team->id}}</th>
                            <td>{{$team->user->name}}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{date('d-m-y', strtotime($team->created_at))}}</td>
                            <td >
                                <div class="d-flex d-flex">

                                    <a class="btn-sm btn-success btn" href="">Player view</a>
                                    <a class="btn-sm btn-primary btn" href="{{route('team.edit',$team->id)}}">Edit Team</a>


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

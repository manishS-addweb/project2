@extends('layouts.master')

@section('content')
    <main class="main-content mt-5 ">
        <div class="card ">
            <div class="card-header  ">
                <div class="row ">
                    <div class="col-md-6 ">
                        <h4>Players Count</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end  ">
                        <a class="btn btn-success mx-1" href="{{route('admin.dashboard')}}">Back</a>

                    </div>
                </div>


            </div>
            <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered border-dark ">
                    <thead style="background: #f2f2f2">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>Player Count</th>
                        <th>Player Name</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->players()->count()}}</td>
                            <td>
                                @foreach ($team->players as $player)
                                    <li>{{ $player->name }}</li>
                                @endforeach
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>



@endsection

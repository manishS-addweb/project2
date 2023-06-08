@extends('layouts.master')

@section('content')
    <main class="main-content mt-5">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>

            @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Edit Team</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{route('team.index')}}">Back</a>

                    </div>
                </div>


            </div>

            <div class="card-body">
                <form  action="{{route('team.update',$teams->id)}}" method="POST" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Team Name</label>
                        <input type="text" class="form-control" name="name" value="{{$teams->name}}" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Manager</label>
                        <select  id="" class="form-control" name="manager_id">
                            <option value="dropdown">Select</option>
                            @foreach($users as $user)
                                <option {{$user->id==$teams->manager_id ? 'selected': ''}} value="{{$user->id}}">{{$user->name}}</option>

                            @endforeach


                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>


                </form>


            </div>

        </div>

    </main>



@endsection


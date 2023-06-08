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
                        <h4>Create player</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{route('admin.dashboard')}}">Back</a>

                    </div>
                </div>


            </div>

            <div class="card-body">
                <form action="{{ route('store.players') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Player Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select  id="" class="form-control" name="category_id">
                            <option value="">Select</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="team_id">Select Team:</label>
                        <select name="team_id" id="team_id" class="form-control">
                            @foreach ($teams as $team)
                                @if($team->players()->count() < 15)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Player</button>
                </form>

            </div>

        </div>

    </main>



@endsection

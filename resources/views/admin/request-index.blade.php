@extends('layouts.master')

@section('content')
    <main class="main-content mt-5 ">
        <div class="card ">
            <div class="card-header  ">
                <div class="row ">
                    <div class="col-md-6 ">
                        <h4>Request</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end  ">

                    </div>
                </div>


            </div>
            <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered border-dark ">
                    <thead style="background: #f2f2f2">
                    <tr>
                        <th scope="col" style="width: 20%" >Manager Name</th>
                        <th scope="col" style="width: 30%" >Team Name</th>
                        <th scope="col" style="width: 40%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{ $request->user->name }}</td>
                            <td>{{ $request->team->name }}</td>
                            <td>
                                <form action="{{ route('requests.approve', $request->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No requests found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>



@endsection

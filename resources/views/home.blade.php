@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">Total User {{ $users->total() }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                      <table class="table">
                        <thead>
                          <tr>

                            <th >Serial No</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Created At</th>


                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $index=>$user)
                          <tr>
                            <td>{{$users->firstItem() + $index }}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('m/d/y h:i:s A')}}</td>


                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{ $users->links() }}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection

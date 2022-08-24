@extends('layouts.dashboard')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">

        {{-- @if (session('editstatus'))
          <div class="alert alert-info">
            {{  session('editstatus') }}

          </div>

        @endif --}}

        {{-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/add/faq') }}">Add Faq</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav> --}}




        <div class="card">
          <div class="card-header">
            Edit Quote

          </div>



          <div class="card-body">


        <form  action="{{ url('quote/edit/post') }}" method="post">
          @csrf

        <div class="form-group">

          <input type="hidden" class="form-control" id="exampleFormControlInput1" name="quote_id"placeholder="" value="{{ $quotes->id }}">
        </div>


        <div class="form-group">
          <label for="exampleFormControlTextarea1" class="form-label"> Quote</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="quote_des">{{ $quotes->quote_des }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        </form>
      </div>
        </div>
      </div>

    </div>

  </div>

@endsection

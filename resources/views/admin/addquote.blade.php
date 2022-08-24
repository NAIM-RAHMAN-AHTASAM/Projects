@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row">


    <div class="col-md-8">
      @if (session('status_quote_add'))
        <div class="alert alert-success">
          {{  session('status_quote_add') }}

        </div>

      @endif
      @if (session('status_quote_deleted'))
        <div class="alert alert-danger">
          {{  session('status_quote_deleted') }}

        </div>

      @endif
      @if (session('status_quote_edit'))
        <div class="alert alert-success">
          {{  session('status_quote_edit') }}

        </div>

      @endif

                <div class="card-header">
                  <h3>Quotes List</h3>

                </div>

      <div class="card-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SL No</th>
                      <th scope="col">Quote</th>
                      <th scope="col">Person Name</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($quotes as $quote)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $quote->quote_des }}</td>
                      <td>{{ $quote->quote_name }}</td>




                      <td>

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a type="button" class="btn btn-info" href="{{ url('quote/edit') }}/{{ $quote->id }}">Edit</a>
                          <a type="button" class="btn btn-danger" href="{{ url('quote/delete') }}/{{ $quote->id }}">Delect</a>


                      </div>

                      </td>


                    </tr>

                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-danger">No Data Availabl</td>
                    </tr>

                @endforelse
                  <div class="btn-group" role="group" aria-label="Basic example">

                  </tbody>
                </table>
                {{ $quotes->links() }}
                </div>
                </div>






    <div class="col-md-4">
      <div class="card-header">
        <h3>Add Quote</h3>

      </div>
      <div class="card-body">


        <form  action="{{ url('add/quote/post') }}" method="post">



        <div class="form-group">
          @csrf
          <label for="exampleFormControlTextarea1" class="form-label">Quote</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"name="quote_des"></textarea>

        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Person Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="quote_name"placeholder="" value="{{ old('quote_name') }}">


            </div>

        <button type="submit" class="btn btn-success">Success</button>
        </form>
      </div>

    </div>

  </div>

</div>


  @endsection

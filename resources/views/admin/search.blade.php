@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row" >
        <div class="col-md-8" >

      <form  action="" >

      <div class="form-group">

        <input type="Search" class="form-control" id="exampleFormControlInput1" name="quote_name"placeholder=" Search By Name" value="{{ old('quote_name') }}">
        </div>
      <button  class="btn btn-info">Search</button>
      </form>



      <div class="card-header">
        <h3>Quotes List</h3>

      </div>


        <div class="card-body">
                    <table class="table table-striped table-dark">

                    <tbody >
                        @foreach ($quotes as $quote)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td >{{ $quote->quote_des }}</td>
                        <td >{{ $quote->quote_name }}</td>
                        </tr>



                  @endforeach


                    </tbody>
                  </table>


                  </div>

                  {{-- <div class="col-md-3">
                  <button type="submit" id="randomData" class="btn btn-success">Random</button>
                    </div> --}}
                    </div>
                    </div>
                    </div>
@endsection

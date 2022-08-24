@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row" >
        <div class="col-md-8" >

      <form  action="{{ url('/search') }}" >

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

                    <tbody id="tablebody">
                        @forelse ($getquotelists as $getquotelist)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td >{{ $getquotelist->quote_des }}</td>
                        <td >{{ $getquotelist->quote_name }}</td>
                        </tr>

                    @empty
                      <tr>
                        <td colspan="6" class="text-center text-danger">No Data Availabl</td>
                      </tr>

                  @endforelse


                    </tbody>
                  </table>


                  </div>

                  <div class="col-md-3">
                  <button type="submit" id="randomData" class="btn btn-success">Random</button>
                    </div>
                    </div>
                    </div>
                    </div>
    @endsection
    @section('footer_section')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
          $('#randomData').click(function(){
              // ajaxSetup start
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              // ajaxSetup end
              // ajaxSetup request start
              $.ajax({
                  type: 'GET',
                  url: '/get/quote/list/ajax',
                  success:function(data){

                    var tablebody = $('#tablebody')
                    tablebody.html('')

                        for (var i = 0; i < data.length; i++){
                        tablebody.append(`<tr>
                          <td>${i+1}</td>
                          <td >${data[i].quote_des }</td>
                          <td >${data[i].quote_name }</td>
                        </tr>`)
                     }






                      // $("#tableData").html("<h1>naim rahman </h1>")
                  }
              });
              // ajaxSetup request end
          });
      });
      </script>
    @endsection

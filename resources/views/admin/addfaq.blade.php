@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row">


    <div class="col-md-8">
      @if (session('status'))
        <div class="alert alert-success">
          {{  session('status') }}

        </div>

      @endif
      @if (session('statusdeleted'))
        <div class="alert alert-danger">
          {{  session('statusdeleted') }}

        </div>

      @endif
      @if (session('editstatus'))
        <div class="alert alert-info">
          {{  session('editstatus') }}

        </div>

      @endif

                <div class="card-header">
                  <h3>Faq List</h3>

                </div>

      <div class="card-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Faq Question</th>
                      <th scope="col">Faq Answer</th>
                      <th scope="col">Created At</th>
                      <th scope="col">updated At</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($faqs as $index=>$faq)
                    <tr>
                      {{-- <td>{{ $loop->index + 1 }}</td> --}}
                      <td>{{$faqs->firstItem() + $index}}</td>
                      <td>{{$faq->faq_question}}</td>
                      <td>{{$faq->faq_answer}}</td>
                      <td>
                        @if (isset($faq->created_at))
                          {{$faq->created_at->format('m/s/Y')}}
                          @else
                            -----

                        @endif
                      </td>
                      <td>
                        @if (isset($faq->updated_at ))
                          {{ $faq->updated_at->diffForHumans() }}
                          {{-- {{ $faq->updated_at->toDateString() }} --}}
                          {{-- {{ $faq->updated_at->subDay() }} --}}
                          @else
                            ----

                        @endif
                      </td>
                      <td>

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a type="button" class="btn btn-info" href="{{ url('faq/edit') }}/{{ $faq->id }}">Edit</a>
                          <a type="button" class="btn btn-danger" href="{{ url('faq/delete') }}/{{ $faq->id }}">Soft Delect</a>


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
                {{ $faqs->links() }}

      </div>
      <div class="card-header">
        <h3> SoftDeletes Faq List</h3>

      </div>


      @if (session('trashstatus'))
        <div class="alert alert-success">
          {{  session('trashstatus') }}

        </div>

      @endif

      <div class="card-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Faq Question</th>
                      <th scope="col">Faq Answer</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($trashfaqs as$trashfaq)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      {{-- <td>{{$trashfaq->firstItem() + $index}}</td> --}}
                      <td>{{$trashfaq->faq_question}}</td>
                      <td>{{$trashfaq->faq_answer}}</td>


                      <td>

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a type="button" class="btn btn-success" href="{{ url('faq/restore') }}/{{ $trashfaq->id }}">Restore</a>
                          <a type="button" class="btn btn-danger" href="{{ url('faq/harddelete') }}/{{ $trashfaq->id }}">Hard Delete</a>


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
                {{ $trashfaqs->links() }}

      </div>
    </div>

    <div class="col-md-4">
      <div class="card-header">
        <h3>Add Faq</h3>

      </div>
      <div class="card-body">
        @if ($errors->all())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>

            @endforeach

          </div>

        @endif

        <form  action="{{ url('/addfaq/post') }}" method="post">
          @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Faq Question</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="faq_question"placeholder="" value="{{ old('faq_question') }}">


            </div>


        <div class="form-group">
          <label for="exampleFormControlTextarea1" class="form-label">Faq Answer</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="faq_answer">{{ old('faq_answer') }}</textarea>
          @error ('faq_answer')
            <small class="text-danger">{{ $message }}</small>

          @enderror
        </div>

        <button type="submit" class="btn btn-success">Success</button>
        </form>
      </div>

    </div>

  </div>

</div>


  @endsection

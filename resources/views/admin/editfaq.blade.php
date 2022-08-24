@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">

        @if (session('editstatus'))
          <div class="alert alert-info">
            {{  session('editstatus') }}

          </div>

        @endif

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/add/faq') }}">Add Faq</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>




        <div class="card">
          <div class="card-header">
            Edit FAQ

          </div>



          <div class="card-body">


        <form  action="{{ url('/faq/edit/post') }}" method="post">
          @csrf
        <div class="form-group">

          <input type="hidden" class="form-control" id="exampleFormControlInput1" name="faq_id"placeholder="" value="{{ $faqs->id }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Faq Question</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="faq_question"placeholder="" value="{{ $faqs->faq_question }}">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1" class="form-label">Faq Answer</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="faq_answer">{{ $faqs->faq_answer }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Success</button>
        </form>
      </div>
        </div>
      </div>

    </div>

  </div>

@endsection

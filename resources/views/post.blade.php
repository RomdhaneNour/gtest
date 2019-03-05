@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AddPost</div>
                @if(Session::has('message')) 
                                <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                    <strong>{{Session::get('message') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                        <span aria-hidden="true">&times;</span> 
                                    </button> 
                                </div> 
                            @endif

                <div class="card-body">
                <form name='n' method='POST' action="/submit">
                @csrf
  <div class="form-group @if($errors->get('title')) has-error @endif" >
    <input type="text" name="title" class="form-control" placeholder='Insert title'required >
    @if ($errors->get('title'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('title') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  </div>

  <div class="form-group @if($errors->get('content')) has-error @endif">
    <textarea name="content" class="form-control" placeholder='Insert content' ></textarea>
    @if ($errors->get('content'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('content') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  </div>
  <input type="submit" class="btn btn-outline-primary" value='submit'>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
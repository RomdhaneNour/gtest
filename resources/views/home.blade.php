@extends('index')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(Session::has('message')) 
                                <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                    <strong>{{Session::get('message') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                        <span aria-hidden="true">&times;</span> 
                                    </button> 
                                </div> 
                            @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    welcome {{Auth::user()->name}}
                    <br>
                    You are logged in!
                    <br>
                    You have {{$count}} posts
                    
                    <table class="table" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
  
    @foreach ($posts as $posts)
      <tr>
        <th scope="row">{{$posts->id}}</th>
        <td>{{$posts->title}}</td>
        <td>{{$posts->content}}</td>
        <td><a href='/update/{{$posts->id}}' class='btn btn-primary '>Update</td>
       <td> <button type="button" data-toggle="modal" data-target="#delete" class="btn btn-primary">Delete</button></td>
<div class="modal" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure to delete ?</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>            
      </div>
      <div class="modal-body">
        Are you sure to delete this post ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
       <a class="btn btn-primary" href='/deletePost/{{$posts->id}}' role="button">yes</a>
      </div>
    </div>
  </div>
</div>
      </tr>
      @endforeach
      </tbody>
      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('index')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To Comment</div>
                @if(Session::has('message')) 
                                <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                    <strong>{{Session::get('message') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                        <span aria-hidden="true">&times;</span> 
                                    </button> 
                                </div> 
                            @endif

                
                <form name='nou' method='post' action='/AddComment'>
                @csrf
                <a href="/tocomment/{{$post->id}}" scope="row">{{$post->title}} </a> 
     <br>
     <h5 > {{$post->content}}</h5>
     <br>
     <br>
     <br>
     <h5>comments:</h5>
     @foreach ($comment as $comment)
     <h5>user : {{Auth::user()->userName($comment->id_user)}}</h5>
     <h5 >Commented: {{$comment->comment}}</h5>
     <h5>{{$comment->created_at->diffForHumans()}}<h5>
     <br>
     <hr>
     @endforeach
     
     <textarea name="comment" class="form-control" placeholder='Insert comment' ></textarea>
     <input type='hidden' name='id_post' value='{{$post->id}}'>
     
  <input type="submit" class="btn btn-outline-primary" value='AddComment'>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
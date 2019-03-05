@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">For comments</div>
                <div class="card-body">
    
       
    @foreach ($posts as $posts)
      
     <a href="/tocomment/{{$posts->id}}" scope="row">{{$posts->title}} </a> 
     <br>
     <a > {{$posts->content}}</a>
     <br>
     <h6> {{$posts->created_at}}</h6>
     <hr>
      @endforeach
 
      
      
                    
      </div>
            </div>
        </div>
    </div>
</div>
@endsection
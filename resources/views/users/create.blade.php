@extends('index')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">users management</div>

                 @if(Session::has('message')) 
                                <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                    <strong>{{Session::get('message') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                        <span aria-hidden="true">&times;</span> 
                                    </button> 
                                </div> 
                            @endif
                            <form class="form-horizontal"  method="POST" action="/add">
                            @csrf
                                     <label for="name" class="col-md-4 control-label">Name</label>
                        
                                    <input  type="text" class="form-control" name="name">
                                    <label for="email" class="col-md-4 control-label">Email</label>
                                    <input  type="text" class="form-control" name="email">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <input type="password" class="form-control" name="password" >
                                   
                                    <label for="roles" class="col-md-4 control-label">Roles</label>
                                    <select  name="roles[]">
                                    @foreach ($roles as $key => $role)
                                            <option value='{{$key}}'>{{$role}}</option>
                                    @endforeach
                                    </select>
                                    
                                    


                                    <input type="submit" value="ADD" name="button">
</div>

</div>
</div>
</div>
 
@endsection
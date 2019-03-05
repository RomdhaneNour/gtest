
<?php ?>
@extends('index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Management</div>

                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $key => $user)

                                <tr class="list-users">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $role)
                                                <label class="label label-success">{{ $role->display_name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                        
                                        <a href='/deleteuser/{{$user->id}}' class='btn btn-danger' data-toggle="modal" data-target="#delete">delete</a>
     
            
     <div class="modal"  id="delete"  tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title">Modal title</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
     </div>
     <div class="modal-body">
     <p>delete????????????</p>
     </div>
     <div class="modal-footer">
     <a href='/deleteuser/{{$user->id}}' class='btn btn-primary'>delete</a>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
     </div>
     </div>
     </div>
      
            </tr>
  
                                      
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('users.create') }}" class="btn btn-success">New User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

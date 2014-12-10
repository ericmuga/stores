@extends('layouts.default')
@section('content')

 <style>
                           #create-user
                           {
                           background:#a9dba9;
                           margin-top: px;
                           width: 400px;
                           margin-left: px;
                           position: relative;
                           text-align: center;
                           }
                           </style>
@if(Auth::check())

   @include('users.partial')
   <div class="panel">Users</div>
                           <table data-toggle="table" data-url="" data-cache="false" data-height="299">
                               <thead>
                                   <tr>
                                       <th data-field="id" style="width: 30px;">ID</th>
                                       <th data-field="name" style="width: 180px;">Name</th>
                                       <th data-field="username" style="width: 260px;">Username</th>
                                       <th data-field="privilege" style="width: 80px;">Privilege</th>
                                       <th data-field="status"style="width: 80px;">Status</th>

                                   </tr>
                                </thead>
                                   @foreach($user as $users)
                                   <tr>
                                   {{Form::open(array('route'=>array('user.destroy',$users->id),'method'=>'delete'))}}
                                      <td>{{ $users->id}}</td>
                                      <td>{{ $users->name }}</td>
                                      <td>{{ $users->username }}</td>
                                      <td>{{ $users->type }}</td>
                                      <td>@if(!$users->status){{'Inactive'}}@else{{'active'}}@endif</td>
                                      <td>@if(Auth::user()->id!=$users->id)<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{ $users->id}}">
                                           Delete
                                          </button>@endif

                                      <div class="modal fade" id="myModal{{ $users->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <h4 class="modal-title" id="myModalLabel">Caution!</h4>
                                            </div>
                                            <div class="modal-body">

                                             Are you sure you want to drop {{$users->name}} from the list of users?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                              {{Form::submit('Ok',array('class'=>'btn btn-danger'))}}
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      </td>
                                      {{Form::close()}}
                                      {{Form::open(array('route'=>array('user.edit',$users->id),'method'=>'GET'))}}

                                      <td>{{Form::submit('Edit',array('class'=>'btn btn-primary'))}}</td>

                                    <tr>
                                    {{Form::close()}}
                                    @endforeach


                           </table>


                           </div>
<?php echo $user->links(); ?>



                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>








   </div>

   @else

   {{'not signed in'}}
   @endif



@endsection



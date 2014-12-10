@extends('layouts.default')
@section('content')

 <style>
#create-user
       {
       background:#a9dba9;
       margin-top: px;
       width: 400px;
       margin-left:140px;
       position: relative;
       text-align: center;
       }
       .panel2 {margin-left:180px; width: 400px;}
       form {margin-left:180px; text-align:center;width: 400px; padding: 20px; background: #e0f2be}
       input{text-align:center; border-color: solid 1px red;}
</style>
@if(Auth::check())

  @include('users.partial')
@if($user!=null)
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
                                      <td>{{Form::submit('Delete',array('class'=>'btn btn-danger'))}}</td>
                                      {{Form::close()}}
                                      {{Form::open(array('route'=>array('user.edit',$users->id),'method'=>'GET'))}}

                                      <td>{{Form::submit('Edit',array('class'=>'btn btn-primary'))}}</td>

                                    <tr>
                                    {{Form::close()}}
                                    @endforeach
</table> </div>
@else {{'<p style="color:red; text-align:center;">User not found</p>'}} @endif









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



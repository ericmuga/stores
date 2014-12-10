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

  @include('Suppliers.partial')
@if($Supplier!=null)
                           <table data-toggle="table" data-url="" data-cache="false" data-height="299">
                               <thead>
                                   <tr>
                                       <th data-field="id" style="width: 30px;">ID</th>
                                       <th data-field="name" style="width: 180px;">Name</th>
                                       <th data-field="username" style="width: 260px;">Phone</th>
                                       <th data-field="privilege" style="width: 80px;">Email</th>
                                       <th data-field="status"style="width: 80px;">AccountNo</th>
                                       <th data-field="status"style="width: 80px;">Balance</th>

                                   </tr>
                                </thead>

                                   @foreach($Supplier as $users)
                                   <tr>
                                   <?php $bank=Bank::find($users->bank_id);?>
                                   {{Form::open(array('route'=>array('supplier.destroy',$users->id),'method'=>'delete'))}}
                                      <td>{{ $users->id}}</td>
                                      <td>{{ $users->name }}</td>
                                      <td>{{ $users->phone }}</td>
                                      <td>{{ $users->email }}</td>
                                      <td>{{ $bank->account_no }}</td>
                                      <td @if($bank->balance>0){{'style="background:white; color:red;"'}}@endif>{{ $bank->balance }}</td>
                                      <td>{{Form::submit('Delete',array('class'=>'btn btn-danger'))}}</td>
                                      {{Form::close()}}
                                      {{Form::open(array('route'=>array('supplier.edit',$users->id),'method'=>'GET'))}}

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



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
   form {margin-left:180px; text-align:center;width: 400px; padding: 20px; background: #FFF8AC}
   input{text-align:center; border-color: solid 1px red;}
   td{border:solid 1px green}
    .well{background: #e0f2be}
        </style>
@if(Auth::check())

   @include('Suppliers.partial')
<div class="panel">Suppliers</div>
<div class="panel">
{{Form::open(array('route'=>array('supplier.show'),'method'=>'GET'))}}
{{Form::text('key')}}
{{Form::submit('search')}}
{{Form::close()}}
</div>
                           <table data-toggle="table" data-url="" data-cache="false" data-height="299">
                               <thead>
                                   <tr>
                                       <th data-field="id" style="width: 30px;">ID</th>
                                       <th data-field="name" style="width: 180px;">Name</th>
                                       <th data-field="username" style="width: 260px;">Phone Number</th>
                                       <th data-field="username" style="width: 260px;">Email</th>
                                       <th data-field="privilege" style="width: 80px;">Account No.</th>
                                       <th data-field="privilege" style="width: 80px;">Balance</th>


                                   </tr>
                                </thead>
                                   @foreach($supplier as $supp)
                                   <tr>
                                   {{Form::open(array('route'=>array('supplier.destroy',$supp->id),'method'=>'delete'))}}
                                      <td>{{ $supp->id}}</td>
                                      <td>{{ $supp->name }}</td>
                                      <td>{{ $supp->phone }}</td>
                                      <td>{{ $supp->email }}</td>
                                      <td>{{ $supp->bank->account_no }}</td>
                                      <td @if($supp->bank->balance>0) {{'style="background:white;color:red"'}}@endif>{{ $supp->bank->balance }}</td>
                                     <td><button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$supp->id}}">Delete</button>

                                                                               <div class="modal fade" id="myModal{{$supp->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                 <div class="modal-dialog">
                                                                                   <div class="modal-content">
                                                                                     <div class="modal-header">
                                                                                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                       <h4 class="modal-title" id="myModalLabel">Caution!</h4>
                                                                                     </div>
                                                                                     <div class="modal-body">

                                                                                      Are you sure you want to drop {{$supp->name}} from the list of suppliers?
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
                                      {{Form::open(array('route'=>array('supplier.edit',$supp->id),'method'=>'GET'))}}

                                      <td>{{Form::submit('Edit',array('class'=>'btn btn-primary'))}}</td>

                                    <tr>
                                    {{Form::close()}}
                                    @endforeach


                           </table>


                           </div>
<?php echo $supplier->links(); ?>



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



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
   .form-inline{margin-left:180px; text-align:center;width: 400px; padding: 20px; background: #FFF8AC}
   input{text-align:center; border-color: solid 1px red;}
   table{background: #e0f2be}


    .well{background: #AD855C}
        </style>
@if(Auth::check())

   @include('Inventories.partial')
<div class="panel">Inventory</div>
<div class="panel">
{{Form::open(array('route'=>array('Inventories.show'),'class'=>'form-inline','method'=>'GET'))}}
{{Form::text('key',null,array('class'=>'form-control','placeholder'=>'Search Item'))}}
{{Form::submit('Go!')}}
{{Form::close()}}
</div>
<div class="table-responsive">
      <table class="table  table-bordered table-hover table-striped table-condensed">
        <thead>
          <tr class="info">
              <th>#</th><th>Item name</th>
              <th>Item Description</th><th>Initials</th><th>Remaining</th>
          </tr>
        </thead>
        <tbody>
         @if($Items===NULL) <tr><td>{{'Item not found'}}</td></tr>@endif



          @foreach($Items as $inv)
          <tr>
            <td>{{$inv->id}}</td>
            <td>{{$inv->name}}</td>
            <td>{{$inv->description}}</td>
            <td>{{$inv->initials}}</td>
            <td>{{$inv->qty}}</td>
            <td>{{Form::open(array('route' => array('Inventories.edit',$inv->id), 'method'=>'GET'  ))}}
                {{Form::submit('Edit',array('class'=>'btn btn-primary'))}}{{Form::close()}}</td>
            <td>
            {{Form::open(array('route'=>array('Inventories.destroy',$inv->id),'method'=>'delete'))}}
              <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{ $inv->id}}">
                                                       Delete
                                                      </button>

                                                  <div class="modal fade" id="myModal{{ $inv->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                          <h4 class="modal-title" id="myModalLabel">Caution!</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                         Are you sure you want to drop {{$inv->name}} from the list of items?
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
           </tr>
          @endforeach

        </tbody>
      </table>
      </div>
      {{$Items->links()}}

@endif
@stop
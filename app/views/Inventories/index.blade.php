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
          @foreach($inventory as $inv)
          <tr>
            <td>{{$inv->id}}</td>
            <td>{{$inv->name}}</td>
            <td>{{$inv->description}}</td>
            <td>{{$inv->initials}}</td>
            <td>{{$inv->qty}}</td>
           </tr>
          @endforeach

        </tbody>
      </table>
      </div>
      {{$inventory->links()}}
@endif
@stop
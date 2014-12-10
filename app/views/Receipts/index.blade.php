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

 <script>
$(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true,
dateFormat:'yy-mm-dd'
});
});
</script>

@if(Auth::check())

   @include('Inventories.partial')
<div class="panel">Receive Inventory</div>

<div class="table-responsive">
      <table class="table  table-bordered table-hover table-striped table-condensed">
        <thead>
          <tr class="info">
              <th style="width: 200px; text-align: center">Item name</th>
              <th style="width: 200px; text-align: center">Qty</th>
              <th style="width: 200px; text-align: center">Unit Cost</th>
              <th style="width: 200px; text-align: center">Supplier</th>
          </tr>
        </thead>
        <tbody>
             <?php
                 $names;$supplier;
                $names['0']='Select item';
                $supplier['0']='Select supplier';
               for($i=1; $i<11; $i++)
                {echo '<tr>';

                  echo Form::open(array('route' => 'receipts.store'));
                   echo '<td style="width: 200px; text-align: center; margin-top: 20px;">';
                     foreach($items  as $item)
                          {

                            $names[$item->id]= $item->name;

                          }
                     echo Form::select('item'.$i,$names,'Select item');
                    echo '<div style="background:white;color:red">'.$errors->first('na

me').'</div>';
                    echo'</td>';
                    echo'<td style="width: 200px; text-align: center">'.
                    Form::text('qty'.$i,null,array('placeholder'=>'quantity')).'<div style="background:white;color:red">'.$errors->first('qty'.$i).'</div></td>';
                    echo '<td style="width: 200px; text-align: center">'.
                    Form::text('cost'.$i,null,array('placeholder'=>'unit-cost')).'<div style="background:white;color:red">'.$errors->first('cost'.$i).'</div></td>';

                    echo '<td style="width: 200px; text-align: center; margin-top: 20px;">';
                                         foreach($suppliers  as $item)
                                              {
                                                $supplier[$item->id]= $item->name;
                                              }
                                         echo Form::select('Supplier'.$i,$supplier,'Select supplier').'<div style="background:white;color:red">'.$errors->first('Supplier'.$i);

                                        echo'</div></td></tr>';


            } //end for
?>
            {{Form::text('date',null,array('placeholder'=>'Date','id'=>"datepicker"))}}
            {{'<div style="background:white;color:red">'.$errors->first('date').'</div>'}}



        </tbody>

      </table>
      {{Form::submit('Receive',array('class'=>'btn btn-primary','style'=>'margin-left:650px;'))}}
      </div>

@endif
@stop
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

    form {margin-left:130px;  text-align:center;width: 500px; padding: 10px; background: #993333; color: #ffffff}
    input{text-align:center; border-color: solid 1px red;}
   .well{background: #AD855C}
 </style>
@if(Auth::check())

   @include('Inventories.partial')
                           <div class="panel">Add Item</div>
                           {{Form::open(array('route' => 'Inventories.store'))}}
                           {{\Way\Form\FormField::name(array('placeholder'=>'Item name in plural (eg, carrots, books etc)'))}}
                           {{$errors->first('name')}}
                           {{\Way\Form\FormField::description(array('type'=>'text', 'placeholder'=>'(eg Stationery, Kitchen,)'))}}
                            {{$errors->first('description')}}
                           {{\Way\Form\FormField::initials()}}
                            {{$errors->first('initials')}} </br></br>
                           {{Form::reset('Reset',array('class'=>'btn btn-default'))}}

                           {{Form::submit('Create',array('class'=>'btn btn-primary'))}}
                           {{Form::close()}}



                           </div>





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









   </div>

   @else

   {{'not signed in'}}
   @endif



@endsection


